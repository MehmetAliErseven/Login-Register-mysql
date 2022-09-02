<?php

class Logout {
    public function __construct($con_out){
        if ($con_out == 'logout') {
            session_destroy();
            session_start();
            $_SESSION['error'] = 'Logged out successful';
            header('location:index.php');
        }
    }
}
