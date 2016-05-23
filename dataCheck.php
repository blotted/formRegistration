<?php
require_once 'class/Validation.php';
require_once 'class/User.php';
require_once 'class/City.php';
require_once 'class/Invite.php';

$login = Validation::formatValidate(Validation::hasLength(Validation::hasPresence(trim(strip_tags($_POST['login']))), 5, 20));
$password = Validation::formatValidate(Validation::hasLength(Validation::hasPresence(trim(strip_tags($_POST['password']))), 5, 20));
$phone = Validation::phoneValidate(Validation::hasPresence(trim(strip_tags($_POST['phone']))));
$country = Validation::hasPresence(trim(strip_tags($_POST['country'])));
$city = Validation::hasPresence(trim(strip_tags($_POST['city'])));
$invite = Validation::hasLength(Validation::hasPresence(abs((int)($_POST['invite']))), 6, 6);


$inviteArray = Invite::getArrayOfInvites();

if ( in_array($invite, $inviteArray) ) {
    if(!$login)
        echo "Корректно заполните поле  - Логин";
    elseif(!$password)
        echo "Корректно заполните поле  - Пароль";
    elseif(!$phone)
        echo "Корректно заполните поле  - Телефон";
    elseif(!$country)
        echo "Корректно заполните поле  - Страна";
    elseif(!$city)
        echo "Корректно заполните поле  - Город";
    else {

        $password = password_hash($password, PASSWORD_DEFAULT);
        $phone = preg_replace("/[+() -]/i","", $phone);
        $id_city = (int) City::getCityId($city);

        if (User::insertUserToBase($login, $password, $phone, $id_city, $invite) ) {
            if ( Invite::updateStatusInvite($invite) ) {
                echo "Регистрация прошла успешно.";
            }
        }
    }
} else {
    echo "Корректно заполните поле  - Инвайт";
}