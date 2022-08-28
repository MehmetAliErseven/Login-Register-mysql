<?php
require 'DB_connection.php';

class Get_jobs  extends DB_connection {
    protected function sql () {
        $connection = $this->connect();
        $sql = "SELECT job_title FROM jobs";
        $result = $connection->query($sql);
        $connection->close();
        return $result;
    }
}