<?php
    require_once("bd.php");
    function getOffres(){
        global $connexion;
        $sql="SELECT * FROM offre";
        return $connexion->query($sql)->fetchAll();
    }
    function addOffre($poste,$des,$comp,$type,$etat){
        global $connexion;
        $numero="OF_".date("dmYHis");
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        // $sql="INSERT INTO offre(numero,dateOffre,poste,etatOffre,description,competence,typeOffre)
        // values('$numero','$date','$poste',$etat,'$des','$comp','$type')";
        // return $connexion->exec($sql);
        $sql="INSERT INTO offre(numero,dateOffre,poste,etatOffre,description,competence,typeOffre,DatePub) values(:numero,:date,:poste,$etat,:des,:comp,:type,:datePub)";
        $state=$connexion->prepare($sql);
        $state->bindValue("numero",$numero,PDO::PARAM_STR);
        $state->bindValue("date",$date,PDO::PARAM_STR);
        $state->bindValue("poste",$poste,PDO::PARAM_STR);
        $state->bindValue("des",$des,PDO::PARAM_STR);
        $state->bindValue("comp",$comp,PDO::PARAM_STR);
        $state->bindValue("type",$type,PDO::PARAM_STR);
        $state->bindValue("datePub",$datePub,PDO::PARAM_STR);
        return $state->execute();
    }
    
    function updateEtat($etat,$idOffre){
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        $sql="UPDATE offre SET DatePub='$datePub',etatOffre=$etat WHERE idOffre=$idOffre";
        global $connexion;
        return $connexion->exec($sql);
    }
    function getOffrePub(){
        global $connexion;
        $sql="SELECT * FROM offre WHERE etatOffre=1";
        return $connexion->query($sql)->fetchAll();
    }
    function findOffreById($id){
        global $connexion;
        $sql="SELECT * FROM offre WHERE idOffre=$id";
        return $connexion->query($sql)->fetch();
    }
    function addCandidat($idUser,$idOffre){
        global $connexion;
        $dateC=date("d-m-Y H:i");
        $sql="INSERT INTO candidature(idUserF,idOffreF,dateC) VALUES ($idUser,$idOffre,'$dateC')";
        return $connexion->exec($sql);
    }
    function verifierCandidature($idOffre,$idUser){
        global $connexion;
        $sql ="SELECT * FROM candidature WHERE idUserF=$idUser AND idOffreF=$idOffre";
        return $connexion->query($sql)->fetch();
    }
    function getCandidatureByIdUser($idUser){
        global $connexion;
        $sql="SELECT * FROM offre, candidature, utilisateur WHERE idUserF=idUser AND idOffreF=idOffre AND idUser=$idUser";
        return $connexion->query($sql)->fetchAll();
    }
    function getOffrePostuler(){
        global $connexion;
        $sql="SELECT *, COUNT(idCandidature) as nb FROM offre,candidature where idOffreF=idOffre AND etatOffre=1 group BY idOffre";
        return $connexion->query($sql)->fetchAll();
    }
    function getListByOffre($idOffre){
        global $connexion;
    $sql = "SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreF=$idOffre ";
    return $connexion->query($sql)->fetchAll();

    }
    function getListByOffreEtat1($idOffre){
        global $connexion;
    $sql = "SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreF=$idOffre AND etatC=1 ";
    return $connexion->query($sql)->fetchAll();

    }
    function getListByOffreEtat0($idOffre){
        global $connexion;
    $sql = "SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreF=$idOffre AND etatC=0 ";
    return $connexion->query($sql)->fetchAll();

    }
    function getListByOffreEtatAttent($idOffre){
        global $connexion;
    $sql = "SELECT * FROM utilisateur,candidature WHERE idUserF=idUser AND idOffreF=$idOffre AND etatC=-1 ";
    return $connexion->query($sql)->fetchAll();

    }

    
     function updateCandidature($idOffre, $etatC, $idUser){
        global $connexion;
        $sql = "UPDATE candidature SET etatC=$etatC WHERE idOffreF=$idOffre AND idUserF=$idUser";
        return $connexion->exec($sql);
    
    }
    function updateOffre($idOffre,$poste,$des,$comp,$type,$etat){
        global $connexion;
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        // $sql="INSERT INTO offre(numero,dateOffre,poste,etatOffre,description,competence,typeOffre)
        // values('$numero','$date','$poste',$etat,'$des','$comp','$type')";
        // return $connexion->exec($sql);
        $sql = "UPDATE offre SET poste=:poste,description=:des,competence=:comp,typeOffre=:type,DatePub=:datePub WHERE idOffre=$idOffre";
        $state=$connexion->prepare($sql);
        $state->bindValue("poste",$poste,PDO::PARAM_STR);
        $state->bindValue("des",$des,PDO::PARAM_STR);
        $state->bindValue("comp",$comp,PDO::PARAM_STR);
        $state->bindValue("type",$type,PDO::PARAM_STR);
        $state->bindValue("datePub",$datePub,PDO::PARAM_STR);
        return $state->execute();
    }
    
   

?>