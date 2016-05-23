<?php
require_once 'Db.php';

class User
{
    /**
     * Returns an array of users
     */
    public static function getUsersList()
    {
        $db = Db::getConnection();

        $usersList = [];

        $result = $db->query('SELECT u.id_user, u.login, u.password, u.phone, c.city_name, u.invite ' .
            'FROM users u ' .
            'INNER JOIN cities c ON u.id_city = c.id_city ' .
            'ORDER BY u.id_user DESC');

        $i = 0;
        while($row = $result->fetch()) {
            $usersList[$i]['id_user'] = $row['id_user'];
            $usersList[$i]['login'] = $row['login'];
            $usersList[$i]['password'] = $row['password'];
            $usersList[$i]['phone'] = $row['phone'];
            $usersList[$i]['city_name'] = $row['city_name'];
            $usersList[$i]['invite'] = $row['invite'];
            $i++;
        }

        return $usersList;
    }

    public static function insertUserToBase($login, $password, $phone, $id_city, $invite)
    {
        $id_city = (int)$id_city;
        $invite = (int)$invite;

        $db = Db::getConnection();
        $sql = 'INSERT INTO users(login, password, phone, id_city, invite) VALUES (:login, :password, :phone, :id_city, :invite)';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id_city', $id_city);
        $stmt->bindParam(':invite', $invite);
        $result = $stmt->execute();

        if ($result)
            return true;
    }
}