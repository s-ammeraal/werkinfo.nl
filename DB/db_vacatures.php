<?php
    $db = new PDO("mysql:host=localhost;dbname=werkinfo", "root", "");
    $query = $db->prepare("SELECT * FROM vacatures");
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
?>