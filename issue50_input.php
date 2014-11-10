<!DOCTYPE html>
<html>  
<head>
  <meta charset="UTF-8">
  <title>issue17</title>
</head>

<body>
<?php
$lastnameErr = $firstnameErr = $genderErr = $postcodeErr = $prefectureErr = $posetcodeErr = $mailaddressErr = $otherErr = $opinionErr ="";
$lastname = $firstname = $gender = $postcodeFirst = $postcodeSecond  = $prefecture = $posetcode = $mailaddress = $other = $opinion ="";
$errorCount = 8;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lastname"])) {
        $lastnameErr = "姓を入力して下さい．";
    } else {
        $lastname = $_POST["lastname"];
        $errorCount--;
    }

    if (empty($_POST["firstname"])) {
        $firstnameErr = "名を入力して下さい．";
    } else {
        $firstname = $_POST["firstname"];
        $errorCount--;
    }

    if (empty($_POST["gender"])) {
        $genderErr = "性別を選択して下さい．";
    } else {
        $gender = $_POST["gender"];
        $errorCount--;
    }

    if (empty($_POST["postcodeFirst"])) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        $postcodeFirst  = $_POST["postcodeFirst"];
        $errorCount--;
    }

    if (empty($_POST["postcodeSecond"])) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        $postcodeSecond  = $_POST["postcodeSecond"];
        $errorCount--;
    }

    if (($_POST["prefecture"] == "--")) {
        $prefectureErr = "都道府県を選択してください．";
    } else {
        $prefecture  = $_POST["prefecture"];
        $errorCount--;
    }

    if (empty($_POST["mailaddress"])) {
        $mailaddressErr = "メールアドレスを入力してください．";
    } else {
        $mailaddress  = $_POST["mailaddress"];
        $errorCount--;
    }

    $hobby = $_POST["hobbys"]; 
    if (empty($hobby[2]) == 0 && empty($hobby[3])) {
        $otherErr = "その他の詳細を入力してください．";
        $errorCount++;
    } else {
        $other  = $hobby[3];
        $errorCount--;
    }
    
    if (empty($_POST["opinion"])) {
        $opinionErr = "名を入力して下さい．";
    } else {
        $opinion = $_POST["opinion"];
    }
}
echo $postcodeSecond;
?>
 <h1>フォーム > 入力</h1>
 <form action="issue50_confirm.php" method="POST">
   <fieldset>
      <legend>フォーム</legend>
      <label for="name"> 名前：</label>
      <input type="text" name="lastname" size="10" id="name" value="<?php echo $lastname;?>">
      <input type="text" name="firstname" size="10" value="<?php echo $firstname;?>">
      <font color="#ff0000">
        <?php echo $lastnameErr;?>
      </font> 
      <font color="#ff0000">
        <?php echo $firstnameErr;?>
      </font> 
      <br>
      <label for="male">性別：</label>
      男性<input type="radio" name="gender" value="男" id="male">
      女性<input type="radio" name="gender" value="女" id="gender">
      <font color="#ff0000">
        <?php echo $genderErr;?>
      </font> 
      <br>  
      <label for="postcode">郵便番号：</label>
      <input type="text" name="postcodeFirst" size="3" id="postcode" <?php echo "value=\"$postcodeFirst\""; ?>>
      - <input type="text" name="postcodeSecond" size="4" id="postcode" <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo "value=\"$postcodeSecond\"";} ?>>
      <font color="#ff0000">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {echo $postcodeErr;} ?>
      </font> 
      <br>
      <label for="prefecture">都道府県：</label>
      <select name="prefecture" id="prefecture">
        <option value="--">--</option>
        <option value="東京都">東京都</option>
        <option value="京都府">京都府</option>
        <option value="愛知県">愛知県</option>
      </select>
      <font color="#ff0000">
        <?php echo $prefectureErr;?>
      </font> 
      <br>        
      <label for="mailaddress">メールアドレス：</label>
      <input type="text" name="mailaddress" size="40" id="mailaddress" value="<?php echo $mailaddress; ?>"><br>
      <font color="#ff0000">
        <?php echo $mailaddressErr;?>
      </font> 
      <br>
      <label for="music">趣味：</label>
      <input type="checkbox" name="hobbys[0]" value="音楽鑑賞" id="music" <?php if (empty($hobby[0]) == 0) {echo "checked";} ?>>音楽鑑賞
      <input type="checkbox" name="hobbys[1]" value="映画鑑賞" id="movie" <?php if (empty($hobby[1]) == 0) {echo "checked";} ?>>映画鑑賞
      <input type="checkbox" name="hobbys[2]" value="その他" id="other"  <?php if (empty($hobby[2]) == 0) {echo "checked";} ?>>その他
      <input type="text" name="hobbys[3]" size="20" id="othertext" <?php echo "value=\"$other\""; ?>>
      <font color="#ff0000">
        <?php echo $otherErr;?>
      </font> 
      <br>
      <label for="opinion">ご意見：</label>
          <textarea name="opinion" rows="2" cols="20" id="opinion"><?php echo $opinion; ?></textarea><br>
          <input type="submit" value="確認" id="opinion"><br>
    </fieldset>
  </form> 
  <p>Copyright 2014</p>
</body>
</html>

