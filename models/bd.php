<?php
    $serveur="localhost";
    $user="root";
    $password="";
    $nomBd="glese";
    try {
        $connexion= new PDO("mysql:host=$serveur;dbname=$nomBd",$user,$password,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        echo " Erreur de connexion ".$e->getMessage();
        die;
    }
?>