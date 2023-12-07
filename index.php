<?php
session_start();
ob_start();
include_once("shared/header.php");
include_once("shared/topbar.php");
include_once("shared/sidebar.php");
require_once("models/offreModel.php");
require_once("models/profilModel.php");
require_once("models/employeModel.php");

$listeCandidat=getCandidat();
$listeOfferPostuler=getOffrePostuler();
if(isset($_GET['idOffre'])){
    extract($_GET);
    $listeCandidatOffre = getListByOffre($idOffre);
}
if(isset($_GET['idOffre'],$_GET['etatC'])){
    extract($_GET);
   switch($_GET['choix']){
        case 'accepter':
            $listeCandidatOffre = getListByOffreEtat1($idOffre);
            break;
        case 'refuser': 
            $listeCandidatOffre = getListByOffreEtat0($idOffre);
            break; 
         case 'attente': 
            $listeCandidatOffre = getListByOffreEtatAttent($idOffre);
            break;    
   }
}

$listeOffres=getOffres();
$listeOffresP=getOffrePub();
$offreDetail=isset($_GET['idOffre']) ? findOffreById($_GET['idOffre']) : null;
$listeProfil=getProfils();
$listeEmploye=getEmploye();


//$verifCandidature=($offreDetail!=null) ? verifierCandidature($offreDetail['idOffre'],$_SESSION['user']['idUser']) : 0;

if(!empty($_SESSION)){
    $verifCandidature = ($offreDetail!=null) ? verifierCandidature($offreDetail['idOffre'],$_SESSION['user']['idUser']) : 0 ;
    $listeCandidature = getCandidatureByIdUser($_SESSION['user']['idUser']);
}
if (isset($_GET['idOffre'], $_GET['etatC'],$_GET['idUser'])) {
    extract($_GET);
    updateCandidature($idOffre, $etatC, $idUser);
    header("location:http://localhost/glese/?page=infoOffre&idOffre=$idOffre");
}

$page = isset($_GET['page']) ? $_GET['page'] : "accueil";

if(isset($_POST['connecter'])){
    extract($_POST);
    $user=findUserByLogin($login,$mdp);
    if($user){
        $_SESSION['user']=$user;
        header("location:http://localhost/glese/");
    }else{
        $erreurConnexion="Login ou Mot de passe Incorrecte";
    
    }
}
//inscription
if(isset($_POST['inscrire'])){
    extract($_POST);
    $candidat = addEmploye($prenom, $nom, $tel, $email, $login, $mdp, $adresse, "", $idProfil);
    if ($candidat!=false) {
        $fileName = "CV_" . $candidat['idUser'].".pdf";
        if (move_uploaded_file($_FILES['ficherCV']['tmp_name'], "public/document/$fileName")) {
            $res = updateCV($fileName, $candidat['idUser']);
            if ($res == 1) {
                header("location:http://localhost/glese/?page=connexion");
            }else{
    
            }
        }
        
    }
  
}
if (isset($_POST['majCV'])) {
    extract($_POST);
    $fileName = "CV_" . $_SESSION['user']['idUser'].".pdf";
    if (move_uploaded_file($_FILES['ficherCV']['tmp_name'], "public/document/$fileName")) {
        $res = updateCV($fileName, $_SESSION['user']['idUser']);
        if ($res == 1) {
            header("location:http://localhost/glese/?page=listeOffre");
        }else{

        }
    }

}


if(isset($_GET['deconnexion'])){
    $_SESSION=[];
    session_destroy();
    header("location:http://localhost/glese/?page=connexion");
}

if ($page !="") {
    if (file_exists("pages/$page.php")) {
        if($page!="accueil" && $page!="detailOffre" && $page!="listeOffre"&& $page!="auth" && $page!="connexion" ){
            if(empty($_SESSION)){
            header("location:http://localhost/glese/?page=connexion");
            }else{
                include_once("pages/$page.php");
            }
        }else{
            include_once("pages/$page.php");
        }  
    }else{
     include_once("pages/error.php");  
    }
}


if (isset($_POST['ajoutOffre'])) {
    extract($_POST);
    $etat=isset($publier) ? 1 : 0;
    $res=addOffre($poste,$description,$competences,$type,$etat);
    if ($res==1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }else {
        $message="erreur lors de l'insertion";

    }
}

if (isset($_POST['modifOffre'])) {
    extract($_POST);
    $etat=isset($publier) ? 1 : 0;
    $res=updateOffre($idOffre,$poste,$description,$competences,$type,$etat);
    if ($res==1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }else {
        $message="erreur lors de l'insertion";

    }
}

if (isset($_POST['ajoutProfil'])) {
    extract($_POST);
   $res=addProfil($nomProfil);
   if ($res==1) {
    header("location:http://localhost/glese/?page=gestionProfil");
    }else {
    $message="erreur lors de l'insertion";
}
}
if (isset($_GET['idOffre'],$_GET['etat'])){
    $id=$_GET['idOffre'];
    $etat=$_GET['etat'];
    if(updateEtat($etat,$id)==1){
        header("location:http://localhost/glese/?page=gestionOffre");
    }else{
        $erreur="Erreur lors de l'operation";
    }
} 

//Employe
if (isset($_POST['ajoutEmploye'])) {
    extract($_POST);
   $res=addEmploye($prenom,$nom,$tel,$email,$login,$mdp,$adresse,$ficherCv,$idProfil);
   if ($res!=false) {
    header("location:http://localhost/glese/?page=gestionEmployes");
    }else {
    $message="erreur lors de l'insertion";
    }
}
//Candidat

if (isset($_POST['postuler'])) {
   if(empty($_SESSION)){
        header("location:http://localhost/glese/?page=connexion");
   }else{
        extract($_POST);
        $res=addCandidat($_SESSION['user']['idUser'],$idOffre);
        if ($res=1) {
            header("location:http://localhost/glese/?page=detailOffre&idOffre=$idOffre");
        }
   }
}
if (isset($_GET['idOffre'],$_GET['etatC'],$_GET['idUser'])){
    extract($_GET);
    $to = 'aichajdiagne@gmail.com';
    $subject = 'Sujet de votre message';
    $message = 'votre candidature a ete accepter .';
    $headers = 'From: nt4257422@gmail.com' . "\r\n" ;

    mail($to, $subject, $message, $headers);
    header("location:http://localhost/glese/?page=infoOffre&idOffre=$idOffre");

}


?>

<?php
include_once("shared/footer.php");

?>