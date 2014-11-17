<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
        $lastnameErr = "姓を入力して下さい．";
    } else {
        $lastname = $_POST["lastname"];
        $_SESSION['errorCount']--;
    }

    if (empty($_POST["firstname"])) {
        $firstnameErr = "名を入力して下さい．";
    } else {
        $firstname = $_POST["firstname"];
        $_SESSION['errorCount']--;
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性別を選択して下さい．";
    } else {
        $gender = $_POST["gender"];
        $_SESSION['errorCount']--;
    }

    if (empty($_POST["postcodeFirst"])) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        $postcodeFirst  = $_POST["postcodeFirst"];
        $_SESSION['errorCount']--;
    }

    if (empty($_POST["postcodeSecond"])) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        $postcodeSecond  = $_POST["postcodeSecond"];
        $_SESSION['errorCount']--;
    }

    if (($_POST["prefecture"] == "--")) {
        $prefectureErr = "都道府県を選択してください．";
    } else {
        $prefecture  = $_POST["prefecture"];
        $_SESSION['errorCount']--;
    }

    if (empty($_POST["mailaddress"])) {
        $mailaddressErr = "メールアドレスを入力してください．";
    } else {
        $mailaddress  = $_POST["mailaddress"];
        $_SESSION['errorCount']--;
    }

    $hobbys = $_POST["hobbys"]; 
    for ($i=0; $i<=3; $i++){
        if (empty($hobbys[$i]) == 1) {
            $hobbys[$i] ="";
        }
    }
    if (empty($hobbys[2]) == 0 && empty($hobbys[3])) {
        $otherErr = "その他の詳細を入力してください．";
        $_SESSION['errorCount']--;
    } else {
        $other  = $hobbys[3];
        $_SESSION['errorCount']--;
    }
    
    if (empty($_POST["opinion"])) {
        $opinionErr = "名を入力して下さい．";
    } else {
        $opinion = $_POST["opinion"];
    }

}
if ($_SESSION["errorCount"] != 0 ) {
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
