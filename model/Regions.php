<?php
class Regions {
    public $region_name;

    function setRegion_name($par)
    {
        $this->region_name = $par;
    }
    function getRegion_name()
    {
        echo $this->region_name . "<br>";
    }
}

