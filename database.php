<?php
$servername = "localhost";
$username = "root";
$password = "xurshid1128";
$database = "kutubxona";

try {
$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}