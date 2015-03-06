<?php

    class Car
    {
        private $make_model;
        private $price;
        private $miles;

        function __construct($make_model, $price, $miles)
        {
            $this->make_model = $make_model;
            $this->price = $price;
            $this->miles = $miles;
        }

        function worthBuying($max_price)
        {
            return $this->price < ($max_price + 100 );
        }

        function worthMileage($max_mileage)
        {
            return $this->miles < ($max_mileage + 100);
        }

        function setMakeModel($new_make_model)
        {
            $this->make_model = $new_make_model;
        }

        function setPrice($new_price)
        {
            $this->price = $new_price;
        }

        function setMiles($new_miles)
        {
            $this->miles = $new_miles;
        }

        function getMakeModel()
        {
            return $this->make_model;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getMiles()
        {
            return $this->miles;
        }

        function save()
        {
            array_push($_SESSION['home'], $this);
        }

        static function getAll()
        {
            return $_SESSION['home'];
        }

        static function deleteAll()
        {
            $_SESSION['home'] = array();
        }

    }

?>
