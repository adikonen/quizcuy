<?php 
if( !session_id() ) session_start();

require_once '../app/init.php';

$app = new App;
close_all_session_except("user_login");