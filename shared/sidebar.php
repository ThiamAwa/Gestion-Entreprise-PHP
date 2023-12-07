<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mettre a jour CV</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST"  enctype="multipart/form-data" >
        <div class="modal-body">
            Inserer Votre CV <input type="file" id="cv" name="ficherCV" class="form-control" required accept=".pdf">
            <span class="text-danger" hidden id="erreur">Fichier non pris en charge</span><br>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary" name="majCV">Enregistrer</button>
        </div>
      </form>
     
    </div>
  </div>
</div>
<div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="?page=accueil">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Accueil
                        </a>
                        <a class="nav-link" href="?page=listeOffre" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']!="RH" ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                           Liste des offres
                        </a>
                        <a class="nav-link" href="?page=listeCandidat" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tableau de Bord
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"  <?= !(empty($_SESSION)) && ($_SESSION['user']['nomProfil']=="RH" || $_SESSION['user']['nomProfil']=="admin") ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Parametrage
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="?page=gestionOffre" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?> >Gestion des Offres</a>
                                <a class="nav-link" href="?page=gestionProfil" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="admin" ? "" : "hidden" ?> >Gestion des Profils</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="?page=gestionEmployes" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="RH" ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Gestion des Employés
                        </a>
                        <a class="nav-link" href="?page=mesCandidatures" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="Candidat" ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Mes Candidatures
                        </a>
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" <?= !(empty($_SESSION)) && $_SESSION['user']['nomProfil']=="Candidat" ? "" : "hidden" ?> >
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Mettre a jour mon CV
                        </a>
                        <span class="text-danger" hidden id="erreur">Fichier non pris en charge</span><br>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4 mt-2">
<script>
    const cv= document.getElementById('cv');
    const erreur= document.getElementById('erreur');
    cv.onchange=function (){
        let extension= /(\.pdf)$/i;
        if(cv.value!="" && extension.exec(cv.value)){
            erreur.setAttribute('hidden', '');
        }else{
            cv.value="";
            erreur.removeAttribute('hidden');
        }
        // let tab = cv.value.split(".");
        // let extension =tab[tab.length-1];
        // if (extension != "pdf") {
        //     cv.value=""; 
        //    
        // }else{
        //     
        // }
            

    }
</script>