<?php
require 'helper.php';
session_start();

if (isset($_POST['email']) || isset($_POST['password'])) {

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

    $con = get('con');

    require 'LoginControl.php';
    $login = new LoginControl($email, $pass, $con);
    $login->login();
}

if(get('p_text') || get('p_color')) {
    $textFrom_get = get('p_text');
    $savedText = trim(htmlspecialchars(post('text')));
    $email = $_SESSION['email'];

    $color = get('p_color');
    $background_color = get('background');

    require 'InProfilControl.php';
    $profil_in = new InProfilControl($textFrom_get, $email, $savedText, $color, $background_color);
    $profil_in->setText();
    $profil_in->setBackground();
}

if (get('con_out')) {
    $con_out = get('con_out');
    require 'Logout.php';
    $logout = new Logout($con_out);
}