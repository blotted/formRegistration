<?php

class Db
{
    public static function getConnection()
    {
        $params = [
            'host' => 'localhost',
            'dbname' => 'registration',
            'user' => 'root',
            'password' => 'root',
        ];

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);
        $db->exec("set names utf8");

        return $db;
    }
}