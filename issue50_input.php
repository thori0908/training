<?php 
session_start(); 
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
if (!empty($_SESSION)) { 
    if (empty($formValues["lastname"])) {
        $errMessages["lastnameErr"] = "姓を入力して下さい．";
    } else {
        if (mb_strlen($formValues["lastname"], "UTF-8") >= 50) { 
            $errMessages["lastnameErr"] = "姓は50文字以内で入力してください。";
        }
        if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["lastname"])) { 
            $errMessages["lastnameErr"] = "全角で入力してください。";
        }
    }
    
    if (empty($formValues["firstname"])) {
        $errMessages["firstnameErr"] = "名を入力して下さい．";
    } else {
        if (mb_strlen($formValues["firstname"], "UTF-8") >= 50) { 
            $errMessages["firstnameErr"] = "姓は50文字以内で入力してください。";
        }
        if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["firstname"])) { 
            $errMessages["firstnameErr"] = "全角で入力してください。";
        }
    }

    if (empty($formValues["gender"])) {
        $errMessages["genderErr"] = "性別を選択して下さい．";
    }

    if (empty($formValues["postcodeFirst"])) {
        $errMessages["postcodeErr"] = "郵便番号を入力してください．";
    } else {
        if (!preg_match("/^[0-9]{3}+$/", $formValues["postcodeFirst"])) { 
            $errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
        }
    }

    if (empty($formValues["postcodeSecond"])) {
        $errMessages["postcodeErr"] = "郵便番号を入力してください．";
    } else {
        if (!preg_match("/^[0-9]{4}+$/", $formValues["postcodeSecond"])) { 
            $errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
        }
    }

    if ($formValues["prefecture"] == "--") {
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

include 'issue30_input.html.php';
?>
