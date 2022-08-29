<?php
require 'helper.php';
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
            border-color: #5D6D7E;
        }
        .bg-light {
            border-color: lightblue;
        }
        h5, h6 {
            text-align: left;
            margin-left: 2.2rem;
        }
    </style>
</head>
<body class="<?=cookieCall('background') ?cookieCall('background') : 'bg-dark'; ?>">
<div id="main" class="container text-center">
    <div class="card <?=cookieCall('background') ?cookieCall('background') : 'bg-dark'; ?>" style="width: 22rem;">
        <div class="card-body">
            <h5 class="card-title">Welcome <?= sessionCall('username') ?></h5>
            <h6 class="card-title">You can take notes below.</h6>
            <form action="profil_login_post.php?p_text=text" method="post">
                <textarea class="<?=cookieCall('background') ?cookieCall('background') : 'bg-dark'; ?> mt-1" name="text" id="" cols="30" rows="10" style="max-height: 22rem; min-height: 11rem;" maxlength="390" ><?= sessionCall('savedText') ?></textarea>

                <?php if (sessionCall('success')): ?>
                    <div class="alert alert-success mt-3" role="alert" style="margin: 8px 32px">
                        <?= sessionCall('success'); ?>
                    </div>
                <?php endif; ?>

                <?php if (sessionCall('error')): ?>
                    <div class="alert alert-success mt-3" role="alert" style="margin: 8px 32px">
                        <?= sessionCall('error'); ?>
                    </div>
                <?php endif; ?>

                <button class="btn btn-sm col-3 btn-primary mt-3" type="submit">Save</button>
            </form>
            <a href="profil_login_post.php?con_out=logout" class="btn btn-success btn-sm mt-3 w-75">Logout</a>
        </div>
        <div class="card-body">
            <a href="profil_login_post.php?p_color=color&background=bg-light" class="btn btn-light card-link">Light Mode</a>
            <a href="profil_login_post.php?p_color=color&background=bg-dark" class="btn btn-light card-link">Dark Mode</a>
        </div>
    </div>
</div>
</body>
</html>

<?php
$_SESSION['success'] = null;
$_SESSION['error'] = null;
?>