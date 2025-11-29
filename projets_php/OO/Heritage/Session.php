<?php 
 spl_autoload_register(function ($class_name) {
     require_once __DIR__ . '/' . $class_name . '.php';
 });


require "SuperSession.php";

$session = new SuperSession();
$moto = new Moto();
$session->username = "JeanDupont";

var_dump($_SESSION);