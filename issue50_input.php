<?php
session_start();
?>

<!DOCTYPE html>
<html>  
<head>
  <meta charset="UTF-8">
  <title>issue50</title>
</head>

<body>
<?php
$error = array("lastname" => "" ,"firstname" => "", "gender" => "", "postcode" => "", "mailaddress" => "", "other" => "", "opinion" => "");

$lastnameErr = $firstnameErr = $genderErr = $postcodeErr = $prefectureErr = $posetcodeErr = $mailaddressErr = $otherErr = $opinionErr ="";
$lastname = $firstname = $gender = $postcodeFirst = $postcodeSecond = $postcodeSecond  = $prefecture = $posetcode = $mailaddress = $other = $opinion ="";
$hobbyMusic = $hobbyMovie = $hobbyOther = $hobbyOtherText = "";

if (!empty($_SESSION["lastname"])) { $lastname = $_SESSION["lastname"]; }
if (!empty($_SESSION["firstname"])) { $firstname = $_SESSION["firstname"]; }
if (!empty($_SESSION["gender"])) { $gender = $_SESSION["gender"]; }
if (!empty($_SESSION["postcodeFirst"])) { $postcodeFirst = $_SESSION["postcodeFirst"]; }
if (!empty($_SESSION["postcodeSecond"])) { $postcodeSecond = $_SESSION["postcodeSecond"]; }
if (!empty($_SESSION["prefecture"])) { $prefecture = $_SESSION["prefecture"]; }
if (!empty($_SESSION["mailaddress"])) { $mailaddress = $_SESSION["mailaddress"]; }
if (!empty($_SESSION["opinion"])) { $opinion =  $_SESSION["opinion"]; }
if (!empty($_SESSION["hobbyMusic"])) { $hobbyMusic =  $_SESSION["hobbyMusic"]; }
if (!empty($_SESSION["hobbyMovie"])) { $hobbyMovie =  $_SESSION["hobbyMovie"]; }
if (!empty($_SESSION["hobbyOther"])) { $hobbyOther =  $_SESSION["hobbyOther"]; }
if (!empty($_SESSION["hobbyOtherText"])) { $hobbyOtherText =  $_SESSION["hobbyOtherText"]; }


if ($_SERVER['HTTP_REFERER'] != "http://ec2-54-178-213-111.ap-northeast-1.compute.amazonaws.com/") {
    if (empty($lastname)) {
        $lastnameErr = "姓を入力して下さい．";
    }else{
        if (mb_strlen($lastname) >= 50){ 
            $lastnameErr = "姓は50文字以内で入力してください。";
        }
    }
    
    if (empty($firstname)) {
        $firstnameErr = "名を入力して下さい．";
    }else{
        if (mb_strlen($firstname) >= 50){ 
            $firstnameErr = "名は50文字以内で入力してください。";
        }
    }

    if (empty($gender)) {
        $genderErr = "性別を選択して下さい．";
    }

    if (empty($postcodeFirst)) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        if (!preg_match("/^[0-9]+$/", $postcodeFirst)) { 
            $postcodeErr = "郵便番号を正しく入力してください．" ;
        }
    }

    if (empty($postcodeSecond)) {
        $postcodeErr = "郵便番号を入力してください．";
    } else {
        if (!preg_match("/^[0-9]+$/", $postcodeSecond)) { 
            $postcodeErr = "郵便番号を正しく入力してください．" ;
        }
    }

    if (($prefecture == "--")) {
        $prefectureErr = "都道府県を選択してください．";
    }

    if (empty($mailaddress)) {
       $mailaddressErr = "メールアドレスを入力してください．";
    } else {
        if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mailaddress)) {
            $mailaddressErr = "郵便番号を正しく入力してください。";
       }
    }

    if (empty($hobbyOther) == 0 && empty($hobbyOtherText)) {
        $otherErr = "その他の詳細を入力してください．";
    }

    if (empty($opinion)) {
        $opinionErr = "名を入力して下さい．";
    } else {
        $opinion = $_SESSION["opinion"];
    }
}

$prefectureNames = array("北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県",
                        "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県",
                        "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県",  
                        "鳥取県", "島根県", "岡山県", "広島県", "山口県", "徳島県", "香川県", "愛媛県", "高知県", "福岡県", 
                        "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県");
$selectbox = "";
foreach ($prefectureNames as &$prefectureName) { 
          if ($prefectureName == $prefecture) {
              $selectbox .= '<option value="'. $prefectureName. '"selected>'.$prefectureName. '</option>'. "\n"; 
          }else{
              $selectbox .= '<option value="'. $prefectureName. '">'.$prefectureName. '</option>'. "\n"; 
          }
}  
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
      男性<input type="radio" name="gender" value="男" id="male" <?php if ($gender == "男") {echo 'checked';}?>>
      女性<input type="radio" name="gender" value="女" id="gender" <?php if ($gender == "女") {echo 'checked';}?>>
      <font color="#ff0000">
        <?php echo $genderErr;?>
      </font> 
      <br>  
      <label for="postcode">郵便番号：</label>
      <input type="text" name="postcodeFirst" size="3" id="postcode" <?php echo "value=\"$postcodeFirst\""; ?>>
      - <input type="text" name="postcodeSecond" size="4" id="postcode" <?php echo "value=\"$postcodeSecond\""; ?>>
      <font color="#ff0000">
        <?php echo $postcodeErr; ?>
      </font> 
      <br>
      <label for="prefecture">都道府県：</label>
      <select name="prefecture" id="prefecture">
        <option value="--">--</option>
      <?php 
      echo $selectbox;
      ?>
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
      <input type="checkbox" name="hobbyMusic" value="音楽鑑賞" id="music" <?php if ($hobbyMusic == "音楽鑑賞") {echo 'checked';} ?>>音楽鑑賞
      <input type="checkbox" name="hobbyMovie" value="映画鑑賞" id="movie" <?php  if ($hobbyMovie == "映画鑑賞") {echo 'checked';} ?>>映画鑑賞
      <input type="checkbox" name="hobbyOther" value="その他" id="other"  <?php if ($hobbyOther == "その他") {echo 'checked';} ?>>その他
      <input type="text" name="hobbyOtherText" size="20" id="othertext" <?php echo "value=\"$hobbyOtherText\""; ?>>
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
