<?php
require 'helper.php';
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
            margin: 10vw auto;
        }
    </style>
</head>
<body>
<ul class="nav nav-pills nav-justified mb-5" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="index.php" role="tab"
           aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="signup_body.php" role="tab"
           aria-controls="pills-register" aria-selected="false">Register</a>
    </li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form action="profil_login_post.php?con=login" method="post">
            <?php if (sessionCall('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= sessionCall('error'); ?>
            </div>
            <?php endif; ?>

            <?php if (sessionCall('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= sessionCall('success'); ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-4">
                <input name="email" type="email" id="loginName" class="form-control" value="<?= sessionCall('email') ?>" />
                <label for="loginName">Email</label>
            </div>

            <div class="form-floating mb-4">
                <input name="password" type="password" id="loginPassword" class="form-control" />
                <label for="loginPassword">Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <div class="text-center">
                <p>Not a member? <a href="signup_body.php">Register</a></p>
            </div>
        </form>
    </div>
</div>
</body>
</html>

<?php
$_SESSION['error'] = null;
$_SESSION['email'] = null;
$_SESSION['success'] = null;
?>