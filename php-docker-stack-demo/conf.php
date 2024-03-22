<?php 
session_start();
$connect = new mysqli(
    'db',             // service name
    'php_docker',     // username
    'password', // password
    'php_docker'      // database name
);
?>