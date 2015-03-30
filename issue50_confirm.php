<?php
session_start();

$formValues = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 

//エラーフラグ初期化--------------------
$isErrors = array("lastname" => empty($_POST["lastname"]), "firstname" => empty($_POST["firstname"]), "gender" => empty($_POST["gender"]), 
                    "postcodeFirst" => empty($_POST["postcodeFirst"]), "postcodeSecond" => empty($_POST["postcodeSecond"]),
                    "prefecture" => empty($_POST["prefecture"]),
                    "mailaddress" => empty($_POST[ "mailaddress"]), "hobby" => empty($_POST["hobby"])); 
//空白処理・session更新-----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($formValues as $key => $listValue) {
        if (empty($_POST[$key])) {
            $_SESSION[$key] = "";
            $formValues[$key] = "";
        } else { 
            $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $_POST[$key]);//全角空白置換 
            $formValues[$key] = trim($_POST[$key], " ");//空白処理 
            $formValues[$key] = htmlspecialchars($_POST[$key]);  //htmlエスケープ処理
            $_SESSION[$key] = $formValues[$key];//sessionの更新
        }
    }
}

foreach ($isErrors as $key => $value) {
    if (!$isErrors[$key]) {
        $isErrors[$key] = False;
    }
}

//バリデーション-------------------
if (!$isErrors["lastname"]) {
    if (mb_strlen($formValues["lastname"], "UTF-8") >= 50) { 
        $isErrors["lastname"] = True;
    }
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["firstname"])) { 
        $isErrors["lastname"] = True;
    }
}

if (!$isErrors["firstname"]) {
    if (mb_strlen($formValues["firstname"], "UTF-8") >= 50) { 
        $isErrors["firstname"] = True;
    }
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["firstname"])) { 
        $isErrors["firstname"] = True;
    }
}

if (!$isErrors["postcodeFirst"]) {
    if (!preg_match("/^[0-9]{3}+$/", $formValues["postcodeFirst"])) { 
        $isErrors["postcodeFirst"] = True;
    }
}

if (!$isErrors["postcodeSecond"]) {
    if (!preg_match("/^[0-9]{4}+$/", $formValues["postcodeSecond"])) { 
        $isErrors["postcodeSecond"] = True;
    }
}

if (($_POST["prefecture"] == "--")) {
    $isErrors["prefecture"] = True;
}

if (!$isErrors["mailaddress"]) {
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $formValues["mailaddress"])) {
        $isErrors["mailaddress"] = True;
    }
}

if (!empty($_POST["hobbyOther"]) && empty($_POST["hobbyOtherText"])) {
    $isErrors["hobby"] = True;
} else { 
    $isErrors["hobby"] = False;
}

if (empty($_POST["hobbyOther"]) && !empty($_POST["hobbyOtherText"])) {
    $_SESSION["hobbyOther"] = $formValues["hobbyOther"] = "その他";
}

$isError = $isErrors["lastname"] || $isErrors["firstname"] || $isErrors["gender"] || $isErrors["postcodeFirst"]
           || $isErrors["postcodeSecond"] || $isErrors["prefecture"] || $isErrors["mailaddress"] || $isErrors["hobby"];

//flagチェック
if ($isError == True) {
    header("Location:". $_SERVER['HTTP_REFERER']);
} 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>issue17</title>
</head>

<body>
  <h1>フォーム > 確認</h1>
  <form action="issue50_input.php" method="POST">
    <table>
      <tr>
      <tr>
        <td>名前：<?php echo $formValues["lastname"] . $formValues["firstname"]; ?></td>
          <input type="hidden" name="lastname" value="<?php echo $formValues["lastname"]; ?>">
          <input type="hidden" name="firstname" value="<?php echo $formValues["firstname"]; ?>">
      </tr>
      <tr>
        <td>性別：<?php echo $formValues["gender"]; ?></td>
          <input type="hidden" name="gender" value="<?php echo $formValues["gender"]; ?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $formValues["postcodeFirst"] . "-" . $formValues["postcodeSecond"]; ?></td>
          <input type="hidden" name="postcodeFirst" value="<?php echo $formValues["postcodeFirst"]; ?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $formValues["postcodeSecond"]; ?>">
      </tr>
      <tr> 
        <td>都道府県：<?php echo $formValues["prefecture"]; ?></td>
          <input type="hidden" name="prefecture" value="<?php echo $formValues["prefecture"]; ?>">
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $formValues["mailaddress"]; ?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $formValues["mailaddress"]; ?>">
      </tr>
      <tr> 
        <td>趣味：
        <?php echo $formValues["hobbyMusic"] . ' ' . $formValues["hobbyMovie"] . ' ' . $formValues["hobbyOther"] . ' ' . $formValues["hobbyOtherText"]; ?>

        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo nl2br($formValues["opinion"]); ?></td>
      </tr>
    </table>
    <input name="return"  type="submit" value="戻る" formaction="issue50_input.php">
    <br>
  </form>
  <form action="issue29_complete.php" method="POST">
    <input type="hidden" name="lastname" value="<?php echo $formValues["lastname"]; ?>">
    <input type="hidden" name="firstname" value="<?php echo $formValues["firstname"]; ?>">
    <input type="hidden" name="mailaddress" value="<?php echo $formValues["mailaddress"]; ?>">
    <input type="hidden" name="prefecture" value="<?php echo $formValues["prefecture"]; ?>">
    <input type="submit" value="送信" formaction="issue29_complete.php">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
