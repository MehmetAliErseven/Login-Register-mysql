<?php
require 'db_con.php';

function saveUser($name, $surname, $email, $b_day, $p_number, $password) {
    $conSave = connect();

    $ask = $conSave->prepare("INSERT INTO user(name, surname, email, b_day, p_number, password) VALUES(?,?,?,?,?,?)");

    $ask->bind_param('ssssss', $name, $surname, $email, $b_day, $p_number, $password);
    $ask->execute();

    if ($conSave->errno > 0) {
        die("<b>Sorgu Hatası:</b> " . $conSave->error);
        return "Kaydetme sırasında bir hata oluştu";
    }

    $ask->close();
    $conSave->close();
}


function checkEmail ($email) {
    $con = connect();
    $select = mysqli_query($con, "SELECT `email` FROM `user` WHERE `email` = '$email'") or exit(mysqli_error($con));
    if(mysqli_num_rows($select)) {
        $_SESSION['m_error'] = 'This email address is used by another user, please try another...';
        header('location:signup.php');
        exit();
    }
    $con ->close();
}


if (post('password') === post('r_password')) {
    if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['b_day'], $_POST['p_number'], $_POST['password'])) {

        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
        $surname = trim(filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
        $b_day = trim(date("Y-m-d", strtotime($_POST['b_day'])));
        $p_number = trim(filter_input(INPUT_POST, 'p_number', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        checkEmail($email);
        saveUser($name, $surname, $email, $b_day, $p_number, $password);

        header('location:index.php');
    }
}
else {
    $_SESSION['error'] = 'Your password not same';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            margin: 1vw auto;
        }
    </style>
</head>
<body>
<ul class="nav nav-pills nav-justified mb-2" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="index.php" role="tab"
           aria-controls="pills-login" aria-selected="false">Login</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="signup.php" role="tab"
           aria-controls="pills-register" aria-selected="true">Register</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="post" action="signup.php">
            <div class="text-center mb-3">
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

            <div class="form-floating mb-4">
                <input name="name" type="text" id="registerName" class="form-control" required="required" />
                <label for="registerName">Name</label>
            </div>

            <div class="form-floating mb-4">
                <input name="surname" type="text" id="registerSurname" class="form-control" required="required" />
                <label for="registerSurname">Surname</label>
            </div>

            <div class="form-floating mb-4">
                <input name="email" type="email" id="registerEmail" class="form-control" required="required" />
                <label for="registerEmail">Email</label>
            </div>

            <?php if (session('m_error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('m_error'); ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-4">
                <input name="b_day" type="date" id="registerDate" class="form-control" required="required" />
                <label for="registerDate">Birth Day</label>
            </div>

            <div class="form-floating mb-4">
                <input name="p_number" type="text" id="registerPhone" class="form-control" required="required" />
                <label for="registerPhone">Phone Number</label>
            </div>

            <div class="form-floating mb-4">
                <input name="password" type="password" id="registerPassword" class="form-control" required="required" minlength="6" />
                <label for="registerPassword">Password</label>
            </div>

            <?php if (session('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session('error'); ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-4">
                <input name="r_password" type="password" id="registerRepeatPassword" class="form-control" required="required" minlength="6" />
                <label for="registerRepeatPassword">Repeat password</label>
            </div>

            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                       aria-describedby="registerCheckHelpText" />
                <label class="form-check-label" for="registerCheck">
                    I have read and agree to the terms
                </label>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
$_SESSION['error'] = null;
$_SESSION['m_error'] = null;
?>