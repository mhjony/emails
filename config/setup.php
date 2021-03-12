<?php

require_once 'database.php';

try{
	$con = new PDO("mysql:host=$DB_DSN;", $DB_USER, $DB_PASSWORD);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlQuery = "CREATE DATABASE IF NOT EXISTS liana";
	$con->exec($sqlQuery);
}
catch(PDOException $e){
	echo 'Connection failed: ' . $e->getMessage();
}

try{
	$con = new PDO("mysql:host=$DB_DSN;dbname=$DB_NAME", $DB_USER, $DB_PASSWORD);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sqlQuery = "CREATE TABLE IF NOT EXISTS `users` (
		`user_id` int(11) NOT NULL AUTO_INCREMENT,
		`name` varchar (50) NOT NULL,
		`email` varchar(100) NOT NULL,
		PRIMARY KEY (`user_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8";
	  $con->exec($sqlQuery);
}
catch(PDOException $e){
	echo 'Create new user failed: ' . $e->getMessage();
}
