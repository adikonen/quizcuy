<?php
require_once("app/config/config.php");
require_once("app/core/Database.php");

$db = new Database();

$db->quickQuery("DROP DATABASE IF EXISTS quizcuy");
$db->quickQuery("CREATE DATABASE quizcuy");
echo "berhasil menghapus semua table!" . PHP_EOL;