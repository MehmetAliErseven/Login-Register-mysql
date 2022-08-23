<?php
class Countries {
    public $country_id;
    public $country_name;
    public $region_id;

    function setCountry_id($par)
    {
        $this->country_id = $par;
    }
    function getCountry_id()
    {
        echo $this->country_id . "<br>";
    }

    function setCountry_name($par)
    {
        $this->country_name = $par;
    }
    function getCountry_name()
    {
        echo $this->country_name . "<br>";
    }

    function setRegion_id($par)
    {
        $this->region_id = $par;
    }
    function getRegion_id()
    {
        echo $this->region_id . "<br>";
    }
}
