<?php
require_once 'LoginDb.php';

class InProfilControl extends LoginDb {

    public $textFrom_get;
    private $email;
    protected $savedText;

    public $color;
    public $background_color;

    public function __construct($textFrom_get, $email, $savedText, $color, $background_color) {
        $this->textFrom_get = $textFrom_get;
        $this->email = $email;
        $this->savedText = $savedText;

        $this->color = $color;
        $this->background_color = $background_color;
    }

    public function setText () {
        if ($this->textFrom_get == 'text') {
            $text = $this->savedText;
            $email = $this->email;
            $_SESSION['savedText'] = $text;

            if (parent::setTextToDb($text, $email)) {
                $_SESSION['success'] = 'Text update successfully complete';
            } else {
                $_SESSION['error'] = 'Update error.';
            }

            header('location:profil_body.php?text=add');
        }
    }

    public function setBackground () {
        if($this->color == 'color') {
            setcookie('background', $this->background_color, time() +(86400 * 365));
            header('location:' .$_SERVER['HTTP_REFERER'] ?? 'index.php');
        }
    }
}