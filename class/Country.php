<?php
require_once 'Db.php';

class Country
{
    /**
     * Returns an array of countries
     */
    public static function getCountriesList()
    {
        $db = Db::getConnection();

        $countriesList = [];

        $result = $db->query('SELECT id_country, country_name ' .
            'FROM countries ' .
            'ORDER BY country_name');

        $i = 0;
        while($row = $result->fetch()) {
            $countriesList[$i]['id_country'] = $row['id_country'];
            $countriesList[$i]['country_name'] = $row['country_name'];
            $i++;
        }

        return $countriesList;
    }
}