<?php
require_once 'Db.php';

class City
{
    /**
     * Returns an array of cities
     */
    public static function getCitiesListBeCountryName($country)
    {
        $db = Db::getConnection();
        $country = trim(strip_tags($country));
        $citiesList = [];

        $result = $db->query("SELECT ct.id_city, ct.city_name, cn.country_name " .
            "FROM cities ct " .
            "INNER JOIN countries cn ON ct.id_country = cn.id_country " .
            "WHERE country_name = '$country'");


        $i = 1;
        while($row = $result->fetch()) {
            $citiesList[$i] = $row['city_name'];
            $i++;
        }

        return $citiesList;
    }

    /**
     * Returns id of city
     */
    public static function getCityId($city_name)
    {
        $db = Db::getConnection();
        $country = trim(strip_tags($city_name));

        $result = $db->query("SELECT id_city " .
            "FROM cities " .
            "WHERE city_name = '$city_name'");

        $cityId = $result->fetch();
        return $cityId[0];
    }
}