<?php
class Jobs {
    public $job_title;
    public $min_salary;
    public $max_salary;

    function setJob_title($par)
    {
        $this->job_title = $par;
    }
    function getJob_title()
    {
        echo $this->job_title . "<br>";
    }

    function setMin_salary($par)
    {
        $this->min_salary = $par;
    }
    function getMin_salary()
    {
        echo $this->min_salary . "<br>";
    }

    function setMax_salary($par)
    {
        $this->max_salary = $par;
    }
    function getMax_salary()
    {
        echo $this->max_salary . "<br>";
    }
}