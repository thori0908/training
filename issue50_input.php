<?php session_start(); 

$formValues = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 

$errMessages = array("lastnameErr" => "", "firstnameErr" => "", "genderErr" => "", "postcodeErr" => "", "prefectureErr" => "",
                     "mailaddressErr" => "", "otherErr" => "", "opinionErr" => "");

foreach ($formValues as $key => $value) {
    if (empty($_SESSION[$key])) {
        $formValues[$key] = "";
    } else {
        $formValues[$key] =  $_SESSION[$key];
    } 
}
if (!empty($_SERVER['HTTP_REFERER'])) { 
    if ($_SERVER['HTTP_REFERER'] != "http://ec2-54-178-213-111.ap-northeast-1.compute.amazonaws.com/index.php" ) {
        if (empty($formValues["lastname"])) {
            $errMessages["lastnameErr"] = "姓を入力して下さい．";
        } else {
            if (strlen($formValues["lastname"]) >= 50) { 
                $errMessages["lastnameErr"] = "姓は50文字以内で入力してください。";
            }
        }
        
        if (empty($formValues["firstname"])) {
            $errMessages["firstnameErr"] = "名を入力して下さい．";
        } else {
            if (strlen($formValues["firstname"]) >= 50) { 
                $errMessages["firstnameErr"] = "名は50文字以内で入力してください。";
            }
        }

        if (empty($formValues["gender"])) {
            $errMessages["genderErr"] = "性別を選択して下さい．";
        }

        if (empty($formValues["postcodeFirst"])) {
            $errMessages["postcodeErr"] = "郵便番号を入力してください．";
        } else {
            if (!preg_match("/^[0-9]+$/", $formValues["postcodeFirst"])) { 
                $errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
            }
        }

        if (empty($formValues["postcodeSecond"])) {
            $errMessages["postcodeErr"] = "郵便番号を入力してください．";
        } else {
            if (!preg_match("/^[0-9]+$/", $formValues["postcodeSecond"])) { 
                $errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
            }
        }

        if (($formValues["prefecture"] == "--")) {
            $errMessages["prefectureErr"] = "都道府県を選択してください．";
        }

        if (empty($formValues["mailaddress"])) {
            $errMessages["mailaddressErr"] = "メールアドレスを入力してください．";
        } else {
            if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $formValues["mailaddress"])) {
                $errMessages["mailaddressErr"] = "メールアドレスを正しく入力してください。";
            }
        }

        if (!empty($formValues["hobbyOther"]) && empty($formValues["hobbyOtherText"])) {
            $errMessages["otherErr"] = "その他の詳細を入力してください．";
        }
    }
}
$prefectureNames = array("北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県",
                        "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県",
                        "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県",  
                        "鳥取県", "島根県", "岡山県", "広島県", "山口県", "徳島県", "香川県", "愛媛県", "高知県", "福岡県", 
                        "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県");
$selectbox = "";
foreach ($prefectureNames as &$prefectureName) { 
    if ($prefectureName == $formValues["prefecture"]) {
        $selectbox .= '<option value="' . $prefectureName . '"selected>' . $prefectureName . '</option>' . "\n"; 
    } else {
        $selectbox .= '<option value="' . $prefectureName . '">' . $prefectureName . '</option>' . "\n"; 
    }
}  
?>

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
