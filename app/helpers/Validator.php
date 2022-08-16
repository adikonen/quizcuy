<?php

class Validator {
 
    private static bool $hasError = false;
    private static $currentKey;
    
    public static function check(array $payload)
    { 
        foreach($payload as $key => $rules){ 
            static::$currentKey = $key;
            static::minLength($_POST[$key], $rules);
            static::maxLength($_POST[$key], $rules);
        }
        return new Validator();
    } 
    public function ifHasErrorThrowTo($location){
        if(static::$hasError){
            redirect($location);
        }
    }
    public static function maxLength(string $data, array $rules)
    {
        if(isset($rules['max'])){
            if(strlen($data) > $rules['max']){
                $_SESSION[static::$currentKey] = 'jumlah input karakter harus kurang dari ' . $rules['max'] . ' karakter';
                static::$hasError = true;
            }
        }
    }
    public static function minLength(string $data, array $rules)
    {
        if(isset($rules['min'])){
            if(strlen($data) < $rules['min']){
                $_SESSION[static::$currentKey] = 'jumlah input karakter harus lebih dari ' . $rules['min'] . ' karakter';
                static::$hasError = true;
            }
        }
    }

    public static function hasError(string $errorKey) : bool
    {
        return in_array($errorKey, $_SESSION);
    }

    public static function print(string $errorKey)
    {
        if(static::hasError($errorKey)){
            echo $_SESSION[$errorKey];
        }
    }

    
}