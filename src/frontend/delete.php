<?php

// Kopieer code van connect.php naar dit bestand
include 'classblog.php';

// Als er in de url een id is meegegeven van de rij, dan de id aan variabele geven
if (isset($_GET['id'])) {
    $id = $_GET['id'];


$_Blog->deleteBlog($id);

}
?>


