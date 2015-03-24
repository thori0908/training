<? php 
class User
{
    //
    private $formValues = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 
    
    //空白処理・session更新-----------------------------
    foreach ($formValues as $key => $listValue) {
        if (empty($_POST[$key])) {
            $_SESSION[$key] = "";
            $formValues[$key] = "";
        } else { 
            $_POST[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $_POST[$key]);//全角空白置換 
            $formValues[$key] = trim($_POST[$key], " ");//空白処理 
            $formValues[$key] = htmlspecialchars($_POST[$key]);  //htmlエスケープ処理
            $_SESSION[$key] = $formValues[$key];//sessionの更新
        }
    }

    function getFormValue($key)
    {
        $this->formValues $formValues[$key]; 
    }
}
