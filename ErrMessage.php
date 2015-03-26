<?php
class ErrMessage {
    private $errMessages = array("lastnameErr" => "", "firstnameErr" => "", "genderErr" => "", "postcodeErr" => "", 
                                 "prefectureErr" => "", "mailaddressErr" => "", "otherErr" => "", "opinionErr" => "");

    public function __construct($user_array) { 
        if (empty($user_array["lastname"])) {
            $this->errMessages["lastnameErr"] = "姓を入力して下さい．";
        } else {
            if (mb_strlen($user_array["lastname"], "UTF-8") >= 50) { 
                $this->errMessages["lastnameErr"] = "姓は50文字以内で入力してください。";
            }
            if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $user_array["lastname"])) { 
                $this->errMessages["lastnameErr"] = "全角で入力してください。";
            }
        }
        
        if (empty($user_array["firstname"])) {
            $this->errMessages["firstnameErr"] = "名を入力して下さい．";
        } else {
            if (mb_strlen($user_array["firstname"], "UTF-8") >= 50) { 
                $this->errMessages["firstnameErr"] = "姓は50文字以内で入力してください。";
            }
            if (!preg_match("/^[ぁ-んァ-ヶー一-龠]+$/u", $user_array["firstname"])) { 
                $this->errMessages["firstnameErr"] = "全角で入力してください。";
            }
        }

        if (empty($user_array["gender"])) {
            $this->errMessages["genderErr"] = "性別を選択して下さい．";
        }

        if (empty($user_array["postcodeFirst"])) {
            $this->errMessages["postcodeErr"] = "郵便番号を入力してください．";
        } else {
            if (!preg_match("/^[0-9]{3}+$/", $user_array["postcodeFirst"])) { 
                $this->errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
            }
        }

        if (empty($user_array["postcodeSecond"])) {
            $this->errMessages["postcodeErr"] = "郵便番号を入力してください．";
        } else {
            if (!preg_match("/^[0-9]{4}+$/", $user_array["postcodeSecond"])) { 
                $this->errMessages["postcodeErr"] = "郵便番号を正しく入力してください．";
            }
        }

        if ($user_array["prefecture"] == "--") {
            $this->errMessages["prefectureErr"] = "都道府県を選択してください．";
        }

        if (empty($user_array["mailaddress"])) { 
            $this->errMessages["mailaddressErr"] = "メールアドレスを入力してください．";
        } else {
            if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $user_array["mailaddress"])) {
                $this->errMessages["mailaddressErr"] = "メールアドレスを正しく入力してください。";
            }
        }

        if (!empty($user_array["hobbyOther"]) && empty($user_array["hobbyOtherText"])) {
            $this->errMessages["otherErr"] = "その他の詳細を入力してください．";
        }
        
    }

    // getter
    public function getErrMessages() {
        return $this->errMessages;
    }
}
