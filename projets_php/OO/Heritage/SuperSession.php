<?php 
session_start();

class SuperSession{
    public function __set($name, $value){
        $_SESSION[$name] = $value;
    }
    public function __get($name){
        return $_SESSION[$name] ?? null;
    }
}