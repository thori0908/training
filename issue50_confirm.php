<?php
require('User.php');
session_start();

$formValues = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 

//エラーフラグ初期化--------------------
$isErrors = array("lastname" => empty($_POST["lastname"]), "firstname" => empty($_POST["firstname"]), "gender" => empty($_POST["gender"]), 
                    "postcodeFirst" => empty($_POST["postcodeFirst"]), "postcodeSecond" => empty($_POST["postcodeSecond"]),
                    "prefecture" => empty($_POST["prefecture"]),
                    "mailaddress" => empty($_POST[ "mailaddress"]), "hobby" => empty($_POST["hobby"])); 
//空白処理・session更新-----------------------------
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    foreach ($formValues as $key => $listValue) {
//        if (empty($_POST[$key])) {
//            $_SESSION[$key] = "";
 //           $formValues[$key] = "";
//        } else { 
//            $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $_POST[$key]);//全角空白置換 
//            $formValues[$key] = trim($_POST[$key], " ");//空白処理 
//            $formValues[$key] = htmlspecialchars($_POST[$key]);  //htmlエスケープ処理
//            $_SESSION[$key] = $formValues[$key];//sessionの更新
//        }
//    }
//}
//
$user = new User($_POST);
//var_dump($user);

$user_array = (array) $user;
foreach($user_array as $key =>$value) {
    if (empty($user_array[$key])) { 
        $_SESSION[$key] = "";
    } else { 
        $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $user_array[$key]);//全角空白置換 
        $_SESSION[$key] = $user_array[$key];//sessionの更新
    }
}
var_dump($_SESSION);

foreach ($isErrors as $key => $value) {
    if (!$isErrors[$key]) {
        $isErrors[$key] = False;
    }
}

//バリデーション-------------------
if (!$isErrors["lastname"]) {
    if (mb_strlen($formValues["lastname"], "UTF-8") >= 50) { 
        $isErrors["lastname"] = True;
    }
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["firstname"])) { 
        $isErrors["lastname"] = True;
    }
}

if (!$isErrors["firstname"]) {
    if (mb_strlen($formValues["firstname"], "UTF-8") >= 50) { 
        $isErrors["firstname"] = True;
    }
    if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $formValues["firstname"])) { 
        $isErrors["firstname"] = True;
    }
}

if (!$isErrors["postcodeFirst"]) {
    if (!preg_match("/^[0-9]{3}+$/", $formValues["postcodeFirst"])) { 
        $isErrors["postcodeFirst"] = True;
    }
}

if (!$isErrors["postcodeSecond"]) {
    if (!preg_match("/^[0-9]{4}+$/", $formValues["postcodeSecond"])) { 
        $isErrors["postcodeSecond"] = True;
    }
}

if (($_POST["prefecture"] == "--")) {
    $isErrors["prefecture"] = True;
}

if (!$isErrors["mailaddress"]) {
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $formValues["mailaddress"])) {
        $isErrors["mailaddress"] = True;
    }
}

if (!empty($_POST["hobbyOther"]) && empty($_POST["hobbyOtherText"])) {
    $isErrors["hobby"] = True;
} else { 
    $isErrors["hobby"] = False;
}

if (empty($_POST["hobbyOther"]) && !empty($_POST["hobbyOtherText"])) {
    $_SESSION["hobbyOther"] = $formValues["hobbyOther"] = "その他";
}

$isError = $isErrors["lastname"] || $isErrors["firstname"] || $isErrors["gender"] || $isErrors["postcodeFirst"]
           || $isErrors["postcodeSecond"] || $isErrors["prefecture"] || $isErrors["mailaddress"] || $isErrors["hobby"];

//flagチェック
if ($isError == True) {
    header("Location:". $_SERVER['HTTP_REFERER']);
} 

include 'issue30_confirm.html.php';
