<?php
require_once 'class/City.php';

$cityList = City::getCitiesListBeCountryName($_GET['country']);

echo json_encode($cityList);