<?php
require 'Get_jobs.php';

class GetJobs_control extends Get_jobs {

    public function getJobs () {

        $result = $this->sql();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['job_title']."'>".$row['job_title']."</option>";
            }
        } else {
            echo "<option selected>Empty</option>";
        }
    }
}