<?php

include 'helper.php';
session_start();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login page</title>
    <!-- Font Awesome -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- MDB -->
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.4.0/mdb.min.css"
            rel="stylesheet"
    />
    <style>
        body {
            width: 50vw;
            margin: 5vw auto;
        }
    </style>
</head>
<body>
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="index.php" role="tab"
           aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="signup.php" role="tab"
           aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form action="db_con.php?con=login" method="post">
            <div class="text-center mb-3">
                <p>Sign in with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                    <i class="fab fa-github"></i>
                </button>
            </div>

            <p class="text-center">or:</p>
            <?php if (session('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session('error'); ?>
            </div>
            <?php endif; ?>
            <div class="form-floating mb-4">
                <input name="email" type="email" id="loginName" class="form-control" value="<?= session('email') ?>" />
                <label for="loginName">Email</label>
            </div>

            <div class="form-floating mb-4">
                <input name="password" type="password" id="loginPassword" class="form-control" value="<?= session('password') ?>" />
                <label for="loginPassword">Password</label>
            </div>

            <div class="row mb-4">
                <div class="col-md-6 d-flex justify-content-center">
                    <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <div class="text-center">
                <p>Not a member? <a href="signup.php">Register</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
$_SESSION['error'] = null;
$_SESSION['email'] = null;
$_SESSION['password'] = null;
?>