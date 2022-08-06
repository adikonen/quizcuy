<?php

function publicUrl(string $givenUrl): string
{
    if($givenUrl[0] !== '/' && BASEURL[strlen(BASEURL) - 1] !== '/'){
        $givenUrl = '/' . $givenUrl;
    }
    return BASEURL . $givenUrl;
}