<?php

function checkEmail ($email) {
    $con = connect();
    $select = mysqli_query($con, "SELECT email FROM employees WHERE email = '$email'") or exit(mysqli_error($con));
    if(mysqli_num_rows($select)) {
        $_SESSION['m_error'] = 'This email address is used by another user, please try another...';
        header('location:signup_body.php');
        exit();
    }
    $con ->close();
}

function getJobs () {
    $connection = connect();
    $sql = "SELECT job_title FROM jobs";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['job_title']."'>".$row['job_title']."</option>";
        }
    } else {
        echo "<option selected>Empty</option>";
    }
    $connection->close();
}

function getJobId ($job_title) {
    $connection = connect();
    $sql = "SELECT job_id FROM jobs WHERE job_title = '$job_title'";
    $result = $connection->query($sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $connection->close();
    return $row['job_id'];
}