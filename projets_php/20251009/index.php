<?php
session_start();

$_SESSION['langage'] = 'PHP';
$_tableau = [ "Un", "Deux", "Trois", "quatre" ];
$_SESSION['tableau'] = $_tableau;

