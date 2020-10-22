<?php

$pdo = new PDO('mysql:host=mysql;dbname=basdetest;host=127.0.0.1', 'root', '', [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

$sql="INSERT INTO user (lastname, firstname) VALUES ('kiki','quentin')";

$pdo -> exec ($sql);

?>