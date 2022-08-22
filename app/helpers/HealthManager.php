<?php

class UserHealth 
{
    public static int $health;
    
    public static function increase(int $amount)
    {
        $_SESSION['user_login']['jumlah_nyawa'] += $amount;
        static::$health = $_SESSION['user_login']['jumlah_nyawa'];
    }

    public static function decrease(int $amount = 1)
    {
        $_SESSION['user_login']['jumlah_nyawa'] -= $amount;
        static::$health = $_SESSION['user_login']['jumlah_nyawa'];
    }

    public function check()
    {

    }


}