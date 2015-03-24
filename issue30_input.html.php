<!DOCTYPE html>
<html>  
<head>
  <meta charset="UTF-8">
  <title>issue50</title>
</head>

<body>
  <h1>フォーム > 入力</h1>
  <form action="issue50_confirm.php" method="POST">
    <fieldset>
      <legend>フォーム</legend>
      <label for="name"> 名前：</label>
      <input type="text" name="lastname" size="10" id="name" value="<?php echo $formValues["lastname"]; ?>">
      <input type="text" name="firstname" size="10" value="<?php echo $formValues["firstname"]; ?>">
      <font color="#ff0000">
        <?php echo $errMessages["lastnameErr"]; ?>
      </font> 
      <font color="#ff0000">
        <?php echo $errMessages["firstnameErr"]; ?>
      </font> 
      <br>
      <label for="male">性別：</label>
      男性<input type="radio" name="gender" value="男" id="male" <?php if ($formValues["gender"] == "男") { echo 'checked'; } ?>>
      女性<input type="radio" name="gender" value="女" id="gender" <?php if ($formValues["gender"] == "女") { echo 'checked'; } ?>>
      <font color="#ff0000">
        <?php echo $errMessages["genderErr"]; ?>
      </font> 
      <br>  
      <label for="postcode">郵便番号：</label>
      <input type="text" name="postcodeFirst" size="3" id="postcode" value="<?php echo $formValues["postcodeFirst"]; ?>">
      - <input type="text" name="postcodeSecond" size="4" id="postcode" value="<?php echo $formValues["postcodeSecond"]; ?>">
      <font color="#ff0000">
        <?php echo $errMessages["postcodeErr"]; ?>
      </font> 
      <br>
      <label for="prefecture">都道府県：</label>
      <select name="prefecture" id="prefecture">
        <option value="--">--</option>
        <?php echo $selectbox; ?>
      </select>
      <font color="#ff0000">
        <?php echo $errMessages["prefectureErr"]; ?>
      </font> 
      <br>        
      <label for="mailaddress">メールアドレス：</label>
      <input type="text" name="mailaddress" size="40" id="mailaddress" value="<?php echo $formValues["mailaddress"]; ?>"><br>
      <font color="#ff0000">
        <?php echo $errMessages["mailaddressErr"]; ?>
      </font> 
      <br>
      趣味：
      <input type="checkbox" name="hobbyMusic" value="音楽鑑賞" id="music" <?php if ($formValues["hobbyMusic"] == "音楽鑑賞") {echo 'checked';} ?>>音楽鑑賞
      <input type="checkbox" name="hobbyMovie" value="映画鑑賞" id="movie" <?php if ($formValues["hobbyMovie"] == "映画鑑賞") {echo 'checked';} ?>>映画鑑賞
      <input type="checkbox" name="hobbyOther" value="その他" id="other"  <?php if ($formValues["hobbyOther"] == "その他") {echo 'checked';} ?>>その他
      <input type="text" name="hobbyOtherText" size="20" id="othertext" value="<?php echo $formValues["hobbyOtherText"]; ?>">
      <font color="#ff0000">
        <?php echo $errMessages["otherErr"];?>
      </font> 
      <br>
      <label for="opinion">ご意見：</label>
      <textarea name="opinion" rows="2" cols="20" id="opinion"><?php echo $formValues["opinion"]; ?></textarea><br>
      <input type="submit" value="確認" id="opinion"><br>
    </fieldset>
  </form> 
  <p>Copyright 2014</p>
</body>
</html>
