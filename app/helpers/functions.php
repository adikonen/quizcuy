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
    return redirect($_SERVER['HTTP_REFERER'], $msg);
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