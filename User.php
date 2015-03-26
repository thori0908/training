<?php 
class User {
    private $fullname = "";
    private $lastname = "";
    private $firstname = "";
    private $gender = "";
    private $postcodeFirst = "";
    private $postcodeSecond = "";
    private $prefecture = "";
    private $mailaddress = "";
    private $other = "";
    private $opinion = "";
    private $hobbyMusic = "";
    private $hobbyMovie = "";
    private $hobbyOther = "";
    private $hobbyOtherText = "";

    public function __construct($post) {
        if (!empty($post["lastname"])) {
            $this->lastname       = $this->escapeFormValue($post["lastname"]);
        }

        if (!empty($post["firstname"])) {
            $this->firstname      = $this->escapeFormValue($post["firstname"]);
        }

        $this->fullname = $this->fullname($this->lastname, $this->firstname);

        if (!empty($post["gender"])) {
            $this->gender         = $this->escapeFormValue($post["gender"]);
        }
        
        if (!empty($post["postcodeFirst"])) {
            $this->postcodeFirst  = $this->escapeFormValue($post["postcodeFirst"]);
        }

        if (!empty($post["postcodeSecond"])) {
            $this->postcodeSecond = $this->escapeFormValue($post["postcodeSecond"]);
        }
        
        if (!empty($post["prefecture"])) {
            $this->prefecture     = $this->escapeFormValue($post["prefecture"]);
        }
        
        if (!empty($post["mailaddress"])) {
            $this->mailaddress    = $this->escapeFormValue($post["mailaddress"]);
        }
        
        if (!empty($post["other"])) {
            $this->other          = $this->escapeFormValue($post["other"]);
        }
        if (!empty($post["opinion"])) {
            $this->opinion        = $this->escapeFormValue($post["opinion"]);
        }
        
        if (!empty($post["hobbyMusic"])) {
            $this->hobbyMusic     = $this->escapeFormValue($post["hobbyMusic"]);
        }
        
        if (!empty($post["hobbyMovie"])) {
            $this->hobbyMovie     = $this->escapeFormValue($post["hobbyMovie"]);
        }
        
        if (!empty($post["hobbyOther"])) {
            $this->hobbyOther     = $this->escapeFormValue($post["hobbyOther"]);
        }
        
        if (!empty($post["hobbyOtherText"])) {
            $this->hobbyOtherText = $this->escapeFormValue($post["hobbyOtherText"]);
        }
    }

    public function escapeFormValue($formValue) {
        $modifiedValue;
        if (empty($formValue)) { 
            $modifiedValue = "";
        } else { 
            $formValue = mb_ereg_replace('^[\s　]*(.*?)[\s　]*$', '\1', $formValue);//全角空白置換 
            $modifiedValue = trim($formValue, " ");//空白処理 
            $modifiedValue = htmlspecialchars($formValue);  //htmlエスケープ処理
        }
        return $modifiedValue;
    }
   
    public function fullname($lastname, $firstname) {
       return sprintf('%s %s', $lastname, $firstname);
    }

    // getter
    public function getFullname() {
        return $this->fullname; 
    }

    public function getLastname() {
        return $this->lastname; 
    }

    public function getFirstname() {
        return $this->firstname; 
    }

    public function getGender() {
        return $this->gender; 
    }

    public function getPostcodeFirst() {
        return $this->postcodeFirst; 
    }

    public function getPostcodeSecond() {
        return $this->postcodeSecond; 
    }

    public function getPrefecture() {
        return $this->prefecture; 
    }

    public function getMailaddress() {
        return $this->mailaddress; 
    }

    public function getOther() {
        return $this->other; 
    }

    public function getOpinion() {
        return $this->opinion; 
    }

    public function getHobbyMusic() {
        return $this->hobbyMusic; 
    }

    public function getHobbyMovie() {
        return $this->hobbyMovie; 
    }

    public function getHobbyOther() {
        return $this->hobbyOther; 
    }

    public function getHobbyOtherText() {
        return $this->hobbyOtherText; 
    }
}
