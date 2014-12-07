<?php
session_start();

$formNames = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 

//エラーフラグ初期化--------------------
$isErrors = array("lastname" => empty($_POST["lastname"]), "firstname" => empty($_POST["firstname"]), "gender" => empty($_POST["gender"]), 
                    "postcodeFirst" => empty($_POST["postcodeFirst"]), "postcodeSecond" => empty($_POST["postcodeSecond"]),
                    "prefecture" => empty($_POST["prefecture"]),
                    "mailaddress" => empty($_POST[ "mailaddress"]), "hobby" => empty($_POST["hobby"])); 
//空白処理・session更新-----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($formNames as $key => $listValue) {
        if (empty($_POST[$key])) {
            $_SESSION[$key] = "";
            $formNames[$key] = "";
        } else { 
            $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $_POST[$key]);//全角空白置換 
            $formNames[$key] = trim($_POST[$key], " ");//空白処理 
            $formNames[$key] = htmlspecialchars($_POST[$key]);  //htmlエスケープ処理
            $_SESSION[$key] = $formNames[$key];//sessionの更新
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
    if (strlen($formNames["lastname"]) >= 50) { 
        $isErrors["lastname"] = True;
    }
}

if (!$isErrors["firstname"]) {
    if (strlen($formNames["firstname"]) >= 50) { 
        $isErrors["firstname"] = True;
    }
}

if (!$isErrors["postcodeFirst"]) {
    if (!preg_match("/^[0-9]+$/", $formNames["postcodeFirst"])) { 
        $isErrors["postcodeFirst"] = True;
    }
}

if (!$isErrors["postcodeSecond"]) {
    if (!preg_match("/^[0-9]+$/", $formNames["postcodeSecond"])) { 
        $isErrors["postcodeSecond"] = True;
    }
}

if (($_POST["prefecture"] == "--")) {
    $isErrors["prefecture"] = True;
}

if (!$isErrors["mailaddress"]) {
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $formNames["mailaddress"])) {
        $isErrors["mailaddress"] = True;
    }
}

if (!empty($_POST["hobbyOther"]) && empty($_POST["hobbyOtherText"])) {
    $isErrors["hobby"] = True;
} else { 
    $isErrors["hobby"] = False;
}

if (empty($_POST["hobbyOther"]) && !empty($_POST["hobbyOtherText"])) {
    $_SESSION["hobbyOther"] = $formNames["hobbyOther"] = "その他";
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
        <td>名前：<?php echo $formNames["lastname"] . $formNames["firstname"]; ?></td>
          <input type="hidden" name="lastname" value="<?php echo $formNames["lastname"]; ?>">
          <input type="hidden" name="firstname" value="<?php echo $formNames["firstname"]; ?>">
      </tr>
      <tr>
        <td>性別：<?php echo $formNames["gender"]; ?></td>
          <input type="hidden" name="gender" value="<?php echo $formNames["gender"]; ?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $formNames["postcodeFirst"] . "-" . $formNames["postcodeSecond"]; ?></td>
          <input type="hidden" name="postcodeFirst" value="<?php echo $formNames["postcodeFirst"]; ?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $formNames["postcodeSecond"]; ?>">
      </tr>
      <tr> 
        <td>都道府県：<?php echo $formNames["prefecture"]; ?></td>
          <input type="hidden" name="prefecture" value="<?php echo $formNames["prefecture"]; ?>">
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $formNames["mailaddress"]; ?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $formNames["mailaddress"]; ?>">
      </tr>
      <tr> 
        <td>趣味：
        <?php echo $formNames["hobbyMusic"] . ' ' . $formNames["hobbyMovie"] . ' ' . $formNames["hobbyOther"] . ' ' . $formNames["hobbyOtherText"]; ?>

        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $formNames["opinion"]; ?></td>
      </tr>
    </table>
    <input type="submit" value="戻る" formaction="issue50_input.php">
    <br>
    <input type="submit" value="送信" formaction="issue17_complete.html">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
