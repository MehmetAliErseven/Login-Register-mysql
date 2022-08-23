<?php
class Dependents {
    public $first_name;
    public $last_name;
    public $relationship;
    protected $employee_id;

    function setFirst_name ($par) {
        $this->first_name = $par;
    }
    function getFirst_name () {
        echo $this->first_name . "<br>";
    }

    function setLast_name ($par) {
        $this->last_name = $par;
    }
    function getLast_name () {
        echo $this->last_name . "<br>";
    }

    function setRelationship($par)
    {
        $this->relationship = $par;
    }
    function getRelationship()
    {
        echo $this->relationship . "<br>";
    }

    function setEmployee_id($par)
    {
        $this->employee_id = $par;
    }
    function getEmployee_id()
    {
        echo $this->employee_id . "<br>";
    }
}
