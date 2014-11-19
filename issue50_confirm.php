<?php
session_start();

$lastnameFlag = 0;
$firstnameFlag =0;
$genderFlag = 0;
$postcodeFirstFlag  = 0;
$postcodeSecondFlag  = 0;
$prefectureFlag  = 0;
$mailaddressFlag  = 0;

if (empty($_POST["lastname"])) {
} else {
    $lastnameFlag = 1;
    $lastname = $_POST["lastname"];
    $_SESSION["lastname"] = $_POST["lastname"];
}

if (empty($_POST["firstname"])) {
} else {
    $firstnameFlag = 1;
    $firstname = $_POST["firstname"];
    $_SESSION["firstname"] = $_POST["firstname"];
}

if (empty($_POST["gender"])) {
} else {
    $genderFlag = 1;
    $gender = $_POST["gender"];
    $_SESSION["gender"] = $_POST["gender"];
}

if (empty($_POST["postcodeFirst"])) {
} else {
    $postcodeFirstFlag = 1;
    $postcodeFirst  = $_POST["postcodeFirst"];
    $_SESSION["postcodeFirst"] = $_POST["postcodeFirst"];
}

if (empty($_POST["postcodeSecond"])) {
} else {
    $postcodeSecondFlag = 1;
    $postcodeSecond  = $_POST["postcodeSecond"];
    $_SESSION["postcodeSecond"] = $_POST["postcodeSecond"];
}

if (($_POST["prefecture"] == "--")) {
} else {
    $prefectureFlag = 1; $prefecture  = $_POST["prefecture"]; $_SESSION["prefecture"] = $_POST["prefecture"]; }

if (empty($_POST["mailaddress"])) {
} else {
    $mailaddressFlag = 1;
    $mailaddress  = $_POST["mailaddress"];
    $_SESSION["mailaddress"] = $_POST["mailaddress"];
}

if (empty($_POST["hobbyMusic"])) {
} else {
    $hobbyMusic  = $_POST["hobbyMusic"];
    $_SESSION["hobbyMusic"] = $_POST["hobbyMusic"];
}
   
if (empty($_POST["hobbyMovie"])) {
} else {
    $hobbyMovie  = $_POST["hobbyMovie"];
    $_SESSION["hobbyMovie"] = $_POST["hobbyMovie"];
}

if (empty($_POST["hobbyOther"])) {
} else {
    $hobbyOther  = $_POST["hobbyOther"];
    $_SESSION["hobbyOther"] = $_POST["hobbyOther"];
}

if (empty($_POST["hobbyOtherText"])) {
} else {
    $hobbyOtherText  = $_POST["hobbyOtherText"];
    $_SESSION["hobbyOtherText"] = $_POST["hobbyOtherText"];
}

if (empty($_POST["opinion"])) {
} else {
    $opinion = $_POST["opinion"];
    $_SESSION["opinion"] = $_POST["opinion"];
}
$errorFlag = 1 - $lastnameFlag * $firstnameFlag * $genderFlag * $postcodeFirstFlag * $postcodeSecondFlag * $prefectureFlag* $mailaddressFlag ;  

if ($errorFlag == 1 ) {
    header("Location: http://ec2-54-178-213-111.ap-northeast-1.compute.amazonaws.com/issue50_input.php");
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
        $hobby = $_POST["hobbys"]; 
        for ($i = 0; $i < sizeof($hobby); $i++){
            if (empty($hobby[$i]) == 0) { 
                echo $hobby[$i]. ' ';
                echo '<input type="hidden" name="hobbys['. $i. ']" value="'. $hobby[$i]. '">';
            }
        }
        ?>
        </td>
      </tr>
      <tr> 
        <td>ご意見：<?php echo $_POST["opinion"];?></td>
      </tr>
    </table>
    <input type="submit" value="戻る" formaction="issue50_input.php">
    <br>
    <input type="submit" value="送信" formaction="issue50_complete.php">
  </form>
  <p>Copyright 2014</p>
</body>
</html>
