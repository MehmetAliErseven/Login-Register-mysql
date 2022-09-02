<?php
require 'Database.php';

class GetJobs  {
    protected function fetchJobs () {
        $db = new Database();
        $connection = $db->connect();
        $sql = "SELECT job_title FROM jobs";
        $jobs = $connection->query($sql);
        return $jobs->fetchAll(PDO::FETCH_ASSOC);
    }
}