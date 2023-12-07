 <div class="card col-md-6 offset-3">
    <div class="card-header">
        <h1 class="text-info text-center">S'incrire</h1>
    </div>
    <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            Prenom <input type="text" id="prenom" name="prenom" class="form-control" required>
            Nom <input type="text" id="Nom" name="nom" class="form-control" required>
            Tel <input type="text" id="tel" name="tel" class="form-control" required>
            Email <input type="email" id="email" name="email" class="form-control" required>
            Addresse <input type="text" id="adresse"name="adresse" class="form-control" required>
            login <input type="text" id="login" onblur="verifLogin()"  name="login" class="form-control" required>
            <span class="text-danger" hidden id="erreurLogin">Login existant</span><br>
            Mot de Pass <input type="password" id="mdp"  name="mdp"class="form-control" required>
            Inserer Votre CV <input type="file" id="cv" name="ficherCV" class="form-control" required accept=".pdf">
            <span class="text-danger" hidden id="erreur">Fichier non pris en charge</span><br>
            <select hidden name="idProfil" id="" class="form-control">
                <?php  foreach ($listeProfil as $key => $profil) {
                    if (strtolower($profil['nomProfil']) == "candidat") { ?>
                            <option value="<?= $profil['idProfil'] ?>"><?= $profil['nomProfil'] ?></option>
                      
                    <?php } } ?>
            </select>
            <button class="btn btn-sm btn-info float-end mt-2 text-white fw-bold" name="inscrire">S'inscrire</button>
        </form>
    </div>
</div>
<script>
    
    cv.onchange=function (){
        const cv= document.getElementById('cv');
    const erreur= document.getElementById('erreur');
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
        //     erreur.setAttribute('hidden', '');
        // }else{
        //     erreur.removeAttribute('hidden');
        // }

    }
    function verifLogin(){
        let login=document.getElementById("login");
        let erreurLogin=document.getElementById("erreurLogin");
        $.ajax({
            url : "http://localhost/glese/public/json/user.php?action=findUser&login="+login.value,
            dataType : "json",
            method : "GET",
            success : function(dataResult){
                if(dataResult!="0"){
                 erreurLogin.removeAttribute('hidden');
                login.value="";
                }else{
                  erreurLogin.setAttribute('hidden', '');
                }
            }
        });
    }
</script>