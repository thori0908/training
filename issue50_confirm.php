<?php
require('User.php');
require('ErrMessage.php');
session_start();

//エラーフラグ初期化--------------------
$isErrors = array("lastname" => empty($_POST["lastname"]), "firstname" => empty($_POST["firstname"]), "gender" => empty($_POST["gender"]), 
                  "postcode" => empty($_POST["postcodeFirst"]),
                  "prefecture" => empty($_POST["prefecture"]),
                  "mailaddress" => empty($_POST[ "mailaddress"]), "hobby" => empty($_POST["hobby"])); 

foreach ($isErrors as $key => $value) {
    $isErrors[$key] = False;
}

$user = new User($_POST);
$user_array = $user->toArray();

// SESSION更新
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach($user_array as $key =>$value) {
        if (empty($user_array[$key])) { 
            $_SESSION[$key] = "";
        } else { 
            $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $user_array[$key]);//全角空白置換 
            $_SESSION[$key] = $user_array[$key];//sessionの更新
        }
    }
}

$errMessages_obj = new ErrMessage($user_array);
$errMessages = $errMessages_obj->getErrMessages();

// バリデーション
foreach ($errMessages as $key => $value) {
    if (!empty($errMessages[$key])) { 
        $isErrors[$key] = True;
    } 
}

$isError = $isErrors["lastname"] || $isErrors["firstname"] || $isErrors["gender"] || $isErrors["postcode"]
           || $isErrors["prefecture"] || $isErrors["mailaddress"] || $isErrors["hobby"];

//flagチェック
if ($isError == True) {
    header("Location:". $_SERVER['HTTP_REFERER']);
} 

include 'issue30_confirm.html.php';
