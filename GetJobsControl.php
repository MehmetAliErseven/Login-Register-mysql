<?php
require 'GetJobs.php';

class GetJobsControl extends GetJobs {

    public function getJobs () {

        $result = parent::fetchJobs();

        if (empty($result)) {
            echo "<option selected>Empty</option>";
        } else {
            foreach ($result as $row) {
                echo "<option value='".$row['job_title']."'>".$row['job_title']."</option>";
            }
        }
    }
}