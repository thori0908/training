<?php
session_start();

$lastname = $firstname = $gender = $postcodeFirst = $postcodeSecond = $postcodeSecond = $prefecture = $mailaddress = $other = $opinion ="";
$hobbyMusic = $hobbyMovie = $hobbyOther = $hobbyOtherText ="";

$listNames = array("lastname", "firstname", "gender", "postcodeFirst", "postcodeSecond",
                   "prefecture", "mailaddress", "opinion", "hobbyMusic", "hobbyMovie", 
                   "hobbyOther", "hobbyOtherText");
//空白処理・session更新-----------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 0; $i < 12; $i++) {
        if (empty($_POST[$listNames[$i]])) {
            $_SESSION[$listNames[$i]] = "";
        } else { 
            $_POST[$listNames[$i]] = trim($_POST[$listNames[$i]], " ");//空白処理 
            $_POST[$listNames[$i]] = htmlspecialchars($_POST[$listNames[$i]]);  //htmlエスケープ処理
            $_POST[$listNames[$i]] = addcslashes($_POST[$listNames[$i]], '"|&|<|>|\\');  //SQLエスケープ処理
            $_SESSION[$listNames[$i]] = $_POST[$listNames[$i]];//sessionの更新
        }
    }
}


//エラーフラグ初期化--------------------
$lastnameFlag = 0;
$firstnameFlag = 0;
$genderFlag = 0;
$postcodeFirstFlag  = 0;
$postcodeSecondFlag  = 0;
$prefectureFlag  = 0;
$mailaddressFlag  = 0;
$hobbyFlag = 0;

//エラー処理 ----------------------------
if (empty($_POST["lastname"])) {
    $lastnameFlag = 1;//エラー処理
} else {
    $lastname = $_POST["lastname"];
}

if (empty($_POST["firstname"])) {
    $firstnameFlag = 1;
} else {
    $firstname = $_POST["firstname"];
}

if (empty($_POST["gender"])) {
    $genderFlag = 1;
} else {
    $gender = $_POST["gender"];
}

if (empty($_POST["postcodeFirst"])) {
    $postcodeFirstFlag = 1;
} else {
    $postcodeFirst  = $_POST["postcodeFirst"];
}

if (empty($_POST["postcodeSecond"])) {
    $postcodeSecondFlag = 1; 
} else { 
    $postcodeSecond  = $_POST["postcodeSecond"]; 
}

if (($_POST["prefecture"] == "--")) {
    $prefectureFlag = 1;
} else {
    $prefecture  = $_POST["prefecture"]; 
}

if (empty($_POST["mailaddress"])) {
    $mailaddressFlag = 1;
} else {
    $mailaddress  = $_POST["mailaddress"];
}


if (empty($_POST["hobbyOther"]) == 0 && empty($_POST["hobbyOtherText"])) {
        $hobbyFlag = 1;
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

$errorFlag = 1 - (1 - $lastnameFlag) * (1 - $firstnameFlag) * (1 - $genderFlag) * (1 - $postcodeFirstFlag)
               * (1 - $postcodeSecondFlag) * (1 - $prefectureFlag) * (1 - $mailaddressFlag) * (1 - $hobbyFlag);  

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
