<?php

function publicUrl(string $givenUrl): string
{
    if($givenUrl[0] !== '/' && BASEURL[strlen(BASEURL) - 1] !== '/'){
        $givenUrl = '/' . $givenUrl;
    }
    return BASEURL . $givenUrl;
}

function url(string $givenUrl): string
{
    if($givenUrl[0] !== '/' && BASEURL[strlen(BASEURL) - 1] !== '/'){
        $givenUrl = '/' . $givenUrl;
    }
    return BASEURL . $givenUrl;
}
function redirect(string $path, ?array $message = null)
{
    if($message !== null)
    {
        foreach($message as $key => $value)
        {
            $_SESSION[$key] = $value;
        }    
    }
    if($path[0] == '/'){
        ltrim($path, '/');
    }
    $path = publicUrl($path);
    header("Location: $path");
    die;
}

function redirectBack(?array $msg = null)
{
    $url = back();
    if($msg !== null)
    {
        foreach($msg as $key => $value)
        {
            $_SESSION[$key] = $value;
        }    
    }
    header("Location: $url");
    die;
}

function error(string $errorKey)
{
    return $_SESSION[$errorKey] ?? '';
}
function close_all_session_except(?string ...$sessionKeys)
{
    $enableSessionKeys = array_keys($_SESSION);

    foreach($enableSessionKeys as $single)
    {
        if(!in_array($single, $sessionKeys))
        {
            unset($_SESSION[$single]);
        }
    }

}

function isInvalid($sessionKey)
{
    if(isset($_SESSION[$sessionKey]))
    {
        return "is_invalid border-danger";
    }
}

function back()
{
    return $_SERVER['HTTP_REFERER'];
}

function image($path)
{
    $path ??= ".jpg";
    return url($path);
}