<?php
// Config.php is bedoeld om een standaard aanroeping te hebben
$host = 'db';
$dbname = 'db_blog';
$username = 'root'; 
$password = 'root';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // Als het mislukt, stop dan en laat de fout zien
    die("Fout bij verbinden met de database: " . $e->getMessage());
}
?>