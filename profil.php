<?php

include 'helper.php';
session_start();

if (!isset($_SESSION['login']) || !$_SESSION['login']){
    header('location:index.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connect database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        body {
            overflow: hidden;
        }
        #main {
            position: relative;
            top: 15vh;
            left: 30vw;
        }
        .bg-dark {
            background: #181818;
            color: lightblue;
        }
        h5, h6 {
            text-align: left;
            margin-left: 2.2rem;
        }
    </style>
</head>
<body class="bg-dark">
<div id="main" class="container text-center">
    <div class="card bg-dark" style="width: 22rem;">
        <div class="card-body">
            <h6 class="card-title">Welcome</h6>
            <h5 class="card-title"><?= session('username') ?></h5>
            <form action="">
                <textarea class="bg-dark mt-1" name="" id="" cols="30" rows="10" style="max-height: 22rem; min-height: 11rem;" >Some quick example text to build on the card title and make up the bulk of the card's content.Some quick example text to build on the card title and make up the bulk of the card's content.</textarea>
                <button class="btn btn-sm col-3 btn-primary mt-3" type="submit">Save</button>
            </form>
            <a href="index.php" class="btn btn-success btn-sm mt-3 w-75">Logout</a>
        </div>
        <div class="card-body">
            <a href="" class="btn btn-light card-link">Light Mode</a>
            <a href="" class="btn btn-light card-link">Dark Mode</a>
        </div>
    </div>
</div>
</body>
</html>