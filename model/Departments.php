<?php
class Departments {
    public $department_name;
    public $location_id;

    function setDepartment_name($par)
    {
        $this->department_name = $par;
    }
    function getDepartment_name()
    {
        echo $this->department_name . "<br>";
    }

    function setLocation_id($par)
    {
        $this->location_id = $par;
    }
    function getLocation_id()
    {
        echo $this->location_id . "<br>";
    }
}
