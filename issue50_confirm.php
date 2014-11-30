<?php
session_start();

$lastname = $firstname = $gender = $postcodeFirst = $postcodeSecond = $postcodeSecond = $prefecture = $mailaddress = $other = $opinion ="";
$hobbyMusic = $hobbyMovie = $hobbyOther = $hobbyOtherText = "";

//空白処理・session更新-----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($_SESSION as $key => $listValue) {
        if (empty($_POST[$key])) {
            $_SESSION[$key] = "";
        } else { 
            $_POST[$key] = trim($_POST[$key], " ");//空白処理 
            $_POST[$key] = trim($_POST[$key], "　");//空白処理 
            $_POST[$key] = htmlspecialchars($_POST[$key]);  //htmlエスケープ処理
            $_SESSION[$key] = $_POST[$key];//sessionの更新
        }
    }
}


//エラーフラグ初期化--------------------
$lastnameFlag = False;
$firstnameFlag = False;
$genderFlag = False;
$postcodeFirstFlag  = False;
$postcodeSecondFlag  = False;
$prefectureFlag  = False;
$mailaddressFlag  = False;
$hobbyFlag = False;

//エラー処理 ----------------------------
if (empty($_POST["lastname"])) {
    $lastnameFlag = True;//エラー処理
} else {
    $lastname = $_POST["lastname"];
        if (strlen($lastname) >= 50){ 
            $lastnameFlag = "True";
        }
}

if (empty($_POST["firstname"])) {
    $firstnameFlag = True;
} else {
    $firstname = $_POST["firstname"];
       if (strlen($firstname) >= 50){ 
            $firstnameFlag = "True";
        }
}

if (empty($_POST["gender"])) {
    $genderFlag = True;
} else {
    $gender = $_POST["gender"];
}

if (empty($_POST["postcodeFirst"])) {
    $postcodeFirstFlag = True;
} else {
    $postcodeFirst  = $_POST["postcodeFirst"];
    if (!preg_match("/^[0-9]+$/", $postcodeFirst)) { 
        $postcodeFirstFlag = True;
    }
}

if (empty($_POST["postcodeSecond"])) {
    $postcodeSecondFlag = True; 
} else { 
    $postcodeSecond  = $_POST["postcodeSecond"]; 
    if (!preg_match("/^[0-9]+$/", $postcodeSecond)) { 
        $postcodeSecondFlag = True;
    }
}

if (($_POST["prefecture"] == "--")) {
    $prefectureFlag = True;
} else {
    $prefecture  = $_POST["prefecture"]; 
}

if (empty($_POST["mailaddress"])) {
    $mailaddressFlag = True;
} else {
    $mailaddress  = $_POST["mailaddress"];
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mailaddress)) {
        $mailaddressFlag = True;
    }
}


if (empty($_POST["hobbyOther"]) == 0 && empty($_POST["hobbyOtherText"])) {
        $hobbyFlag = True;
} 

if (empty($_POST["hobbyMusic"])) {
} else {
    $hobbyMusic  = $_POST["hobbyMusic"];
}
   
if (empty($_POST["hobbyMovie"])) {
} else {
    $hobbyMovie  = $_POST["hobbyMovie"];
}

if (empty($_POST["hobbyOther"])) {
} else {
    $hobbyOther  = $_POST["hobbyOther"];
}

if (empty($_POST["hobbyOtherText"])) {
} else {
    $hobbyOtherText  = $_POST["hobbyOtherText"];
}

if (empty($_POST["opinion"])) {
} else {
    $opinion = $_POST["opinion"];
}


$errorFlag = $lastnameFlag || $firstnameFlag || $genderFlag || $postcodeFirstFlag || $postcodeSecondFlag || $prefectureFlag || $mailaddressFlag || $hobbyFlag;
if ($errorFlag == 1 ) {
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
        <td>名前：<?php echo $_POST["lastname"]. $_POST["firstname"];?></td>
          <input type="hidden" name="lastname" value="<?php echo $_POST["lastname"];?>">
          <input type="hidden" name="firstname" value="<?php echo $_POST["firstname"];?>">
      </tr>
      <tr>
        <td>性別：<?php echo $_POST["gender"];?></td>
          <input type="hidden" name="gender" value="<?php echo $_POST["gender"];?>">
      </tr>
      <tr> 
        <td>郵便番号：<?php echo $_POST["postcodeFirst"]. $_POST["postcodeSecond"];?></td>
          <input type="hidden" name="postcodeFirst" value="<?php echo $_POST["postcodeFirst"];?>">
          <input type="hidden" name="postcodeSecond" value="<?php echo $_POST["postcodeSecond"];?>">
      </tr>
      <tr> 
        <td>都道府県：<?php echo $_POST["prefecture"];?></td>
          <input type="hidden" name="prefecture" value="<?php echo $_POST["prefecture"];?>">
      </tr>
      <tr> 
        <td>メールアドレス：<?php echo $_POST["mailaddress"];?></td>
          <input type="hidden" name="mailaddress" value="<?php echo $_POST["mailaddress"];?>">
      </tr>
      <tr> 
        <td>趣味：
        <?php 
                echo $hobbyMusic. ' '.$hobbyMovie.' '. $hobbyOther.' '. $hobbyOtherText;
        ?>
        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $_POST["opinion"];?></td>
      </tr>
    </table>
    <input type="submit" value="戻る" formaction="issue50_input.php">
    <br>
    <input type="submit" value="送信" formaction="issue17_complete.html">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
