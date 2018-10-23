<?php

class Cordenadas{
    private $Id;
    private $Latitude;
    private $Longitude;
    private $Data;
    private $IMEI;
    
    function __construct() {
        
    }

    
    function getId() {
        return $this->Id;
    }

    function getLatitude() {
        return $this->Latitude;
    }

    function getLongitude() {
        return $this->Longitude;
    }

    function getData() {
        return $this->Data;
    }

    function getIMEI() {
        return $this->IMEI;
    }

    function setId($Id) {
        $this->Id = $Id;
    }

    function setLatitude($Latitude) {
        $this->Latitude = $Latitude;
    }

    function setLongitude($Longitude) {
        $this->Longitude = $Longitude;
    }

    function setData($Data) {
        $this->Data = $Data;
    }

    function setIMEI($IMEI) {
        $this->IMEI = $IMEI;
    }


            
}

