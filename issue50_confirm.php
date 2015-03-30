<?php
require('User.php');
require('ErrMessage.php');
session_start();

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
if ($errMessages_obj->getIsError() == True) {
    header("Location:". $_SERVER['HTTP_REFERER']);
} 

include 'issue30_confirm.html.php';
