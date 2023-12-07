<?php
    require_once("bd.php");
    function getProfils(){
        global $connexion;
        $sql="SELECT * FROM profil";
        return $connexion->query($sql)->fetchAll();
    }
    function addProfil($nomProfil){
        global $connexion;
        $sql="INSERT INTO profil(nomProfil) values(:nomProfil)";
        $state=$connexion->prepare($sql);
        $state->bindValue("nomProfil",$nomProfil,PDO::PARAM_STR);
        return $state->execute();
    }
?>