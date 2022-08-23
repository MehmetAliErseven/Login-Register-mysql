<?php
class Locations {
    protected $street_address;
    public $postal_code;
    public $city;
    public $state_province;
    public $country_id;

    function setStreet_address ($par) {
        $this->street_address = $par;
    }
    function getStreet_address () {
        echo $this->street_address . "<br>";
    }

    function setPostal_code ($par) {
        $this->postal_code = $par;
    }
    function getPostal_code () {
        echo $this->postal_code . "<br>";
    }

    function setCity($par)
    {
        $this->city = $par;
    }
    function getCity()
    {
        echo $this->city . "<br>";
    }

    function setState_province($par)
    {
        $this->state_province = $par;
    }
    function getState_province()
    {
        echo $this->state_province . "<br>";
    }

    function setCountry_id($par)
    {
        $this->country_id = $par;
    }
    function getCountry_id()
    {
        echo $this->country_id . "<br>";
    }
}

