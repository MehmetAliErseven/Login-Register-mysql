<?php
require_once'Profil_login.php';

class Profil_settext extends Profil_login {

    private $textFrom_get;
    private $email;
    private $savedText;

    public function __construct($textFrom_get, $email, $savedText) {
        $this->textFrom_get = $textFrom_get;
        $this->email = $email;
        $this->savedText = $savedText;
    }

    public function setText () {
        if ($this->textFrom_get == 'text') {
            $text = $this->savedText;
            $email = $this->email;
            $_SESSION['savedText'] = $text;

            if (parent::setTextToDb($text, $email) === TRUE) {
                $_SESSION['success'] = 'Text update successfully complete';
            } else {
                $_SESSION['error'] = 'Update error.';
            }

            header('location:profil_body.php?text=add');
        }
    }
}

class Profil_background {
    private $color;
    private $background_color;

    public function __construct($color, $background_color) {
        $this->color = $color;
        $this->background_color = $background_color;
    }

    public function setBackground () {
        if($this->color == 'color') {
            setcookie('background', $this->background_color, time() +(86400 * 365));
            header('location:' .$_SERVER['HTTP_REFERER'] ?? 'index.php');
        }
    }
}