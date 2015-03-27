<?php 
session_start(); 
require('User.php');
require('ErrMessage.php');

$user = new User($_SESSION);
$user_array = $user->toArray();

$errMessages_obj = new ErrMessage($user_array);
$errMessages = $errMessages_obj->getErrMessages();

// エラーメッセージ初期状態
if (empty($_SESSION)) { 
    foreach ($errMessages as $key => $value) {
        $errMessages[$key] = "";
    }
}

// ユーザー情報リダイレクト
foreach ($user_array as $key => $value) {
    if (empty($_SESSION[$key])) {
        $user_array[$key] = "";
    } else {
        $user_array[$key] = $_SESSION[$key];
    } 
}

$prefectureNames = array("北海道", "青森県", "岩手県", "宮城県", "秋田県", "山形県", "福島県", "茨城県", "栃木県", "群馬県",
                        "埼玉県", "千葉県", "東京都", "神奈川県", "新潟県", "富山県", "石川県", "福井県", "山梨県", "長野県",
                        "岐阜県", "静岡県", "愛知県", "三重県", "滋賀県", "京都府", "大阪府", "兵庫県", "奈良県", "和歌山県",  
                        "鳥取県", "島根県", "岡山県", "広島県", "山口県", "徳島県", "香川県", "愛媛県", "高知県", "福岡県", 
                        "佐賀県", "長崎県", "熊本県", "大分県", "宮崎県", "鹿児島県", "沖縄県");

$selectbox = "";
foreach ($prefectureNames as &$prefectureName) { 
    if ($prefectureName == $user_array["prefecture"]) {
        $selectbox .= '<option value="' . $prefectureName . '"selected>' . $prefectureName . '</option>' . "\n"; 
    } else {
        $selectbox .= '<option value="' . $prefectureName . '">' . $prefectureName . '</option>' . "\n"; 
    }
}  

include 'issue30_input.html.php';
