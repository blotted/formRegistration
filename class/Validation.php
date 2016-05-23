<?php

class Validation
{
    public static function hasPresence($value)
    {
        $value = (isset($value) || $value !== "") ? $value : false;
        return $value;
    }

    public static function hasLength($value, $min, $max)
    {
        $value = (strlen($value) <= $max && strlen($value) >= $min) ? $value : false;
        return $value;
    }

    public static function phoneValidate($value)
    {
        $value = (preg_match('/^\+?3?8? ?\(?[0-9]{3}\)? [0-9]{3}-[0-9]{2}-[0-9]{2}$/', $value)) ? $value : false;
        return $value;
    }

    public static function formatValidate($value)
    {
        $value = (preg_match('/^[a-zA-Z0-9]*$/', $value)) ? $value : false;
        return $value;
    }
}