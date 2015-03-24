<? php 
class User {

    private $formValues = array("lastname" => "", "firstname" => "", "gender" => "", "postcodeFirst" => "", "postcodeSecond" => "", 
                   "postcodeSecond " => "", "prefecture" => "", "postcode" => "", "mailaddress" => "", "other" => "",  
                   "opinion" => "", "hobbyMusic" => "", "hobbyMovie" => "", "hobbyOther" => "", "hobbyOtherText" => ""); 

    function __construct ($post, $session) {
    //空白処理・session更新-----------------------------
    foreach ($formValues as $key => $listValue) {
        if (empty($post[$key])) {
        $session[$key] = "";
        $formValues[$key] = "";
        } else { 
        $post[$key] = mb_ereg_replace ('^[\s　]*(.*?)[\s　]*$', '\1', $post[$key]);//全角空白置換 
        $formValues[$key] = trim ($post[$key], " ");//空白処理 
        $formValues[$key] = htmlspecialchars ($post[$key]);  //htmlエスケープ処理
        $session[$key] = $formValues[$key];//sessionの更新
        }
    }
    }

    function getFormValue ($key) {
        $this->formValues $formValues[$key]; 
    }
}
