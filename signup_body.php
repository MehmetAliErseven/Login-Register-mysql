<?php
require 'signup_db.php';
require 'helper.php';
require 'db_actions.php';
session_start();
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
        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="signup_body.php" role="tab"
           aria-controls="pills-register" aria-selected="true">Register</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="post" action="signup_body.php">

            <?php
            if (post('password') === post('r_password')) {
                if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['hire_date'], $_POST['phone_number'], $_POST['password'], $_POST['salary'], $_POST['job_title'])) {

                    $first_name = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING));
                    $last_name = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING));
                    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
                    $hire_date = date("Y-m-d", strtotime($_POST['hire_date']));
                    $phone_number = trim(filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING));
                    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
                    $salary = trim(filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_NUMBER_INT));
                    $job_title = $_POST['job_title'];
                    $job_id = getJobId($job_title);

                    checkEmail($email);
                    saveUser($first_name, $last_name, $email, $hire_date, $phone_number, $password, $salary, $job_id);

                    header('location:index.php');
                }
            }
            else {
                $_SESSION['error'] = 'Your password not same';
            }
            ?>

            <div class="form-floating mb-3">
                <input name="first_name" type="text" id="registerName" class="form-control" required="required" />
                <label for="registerName">Name</label>
            </div>

            <div class="form-floating mb-3">
                <input name="last_name" type="text" id="registerSurname" class="form-control" required="required" />
                <label for="registerSurname">Surname</label>
            </div>

            <div class="form-floating mb-3">
                <input name="email" type="email" id="registerEmail" class="form-control" required="required" />
                <label for="registerEmail">Email</label>
            </div>

            <?php if (sessionCall('m_error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= sessionCall('m_error'); ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input name="phone_number" type="text" id="registerPhone" class="form-control" required="required" />
                <label for="registerPhone">Phone Number</label>
            </div>

            <div class="form-floating mb-3">
                <select name="job_title" id="job_title" class="form-select" aria-label="Default select example">
                    <?php getJobs(); ?>
                </select>
                <label for="job_title">Choose a job</label>
            </div>

            <div class="form-floating mb-3">
                <input name="hire_date" type="date" id="registerDate" class="form-control" required="required" />
                <label for="registerDate">Hire Day</label>
            </div>

            <div class="form-floating mb-3">
                <input name="salary" type="number" id="registerSalary" class="form-control" required="required" />
                <label for="registerSalary">Salary</label>
            </div>

            <div class="form-floating mb-3">
                <input name="password" type="password" id="registerPassword" class="form-control" required="required" minlength="6" />
                <label for="registerPassword">Password</label>
            </div>

            <?php if (sessionCall('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= sessionCall('error'); ?>
                </div>
            <?php endif; ?>

            <div class="form-floating mb-3">
                <input name="r_password" type="password" id="registerRepeatPassword" class="form-control" required="required" minlength="6" />
                <label for="registerRepeatPassword">Repeat password</label>
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