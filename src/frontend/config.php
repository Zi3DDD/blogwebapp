<?php
$host = 'db';
$dbname = 'use';
$username = 'user';
$password = 'password';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Fout bij verbinden met de database: " . $e->getMessage());
}
?>