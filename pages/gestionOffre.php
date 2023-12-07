<div class="card">
    <div class="card-header">
        <span class="h4"> GESTION OFFRES</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModalO">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Poste</th>
                    <th>Type Offre</th>
                    <th>Date Creation</th>
                    <th>Date Publication</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeOffres as $key => $offre){ ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $offre['poste']?></td>
                        <td><?= $offre['typeOffre']?></td>
                        <td><?= $offre['dateOffre']?></td>
                        <td><?= $offre['DatePub']?></td>
                        <td>
                            <a href="?idOffre=<?= $offre['idOffre']?>&etat=1" class="btn btn-sm btn-success text-white" <?= $offre['etatOffre']==1 ? 'hidden' : "" ?>  >Publier</a>
                            <a href="?idOffre=<?= $offre['idOffre']?>&etat=0" class="btn btn-sm btn-dark" <?= $offre['etatOffre']==0 ? 'hidden' : "" ?>>Desactiver</a>
                            <a class="btn btn-sm btn-danger" href=""><i class="fas fa-trash"></i></a>
                            <button  onclick="loadModal(<?= $offre['idOffre']?>)" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal1" ><i class="fas fa-edit text-white"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Ajout Offre -->
<div class="modal fade" id="exampleModalO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Offre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST">
        <div class="modal-body">
            <label for="">Poste</label>
            <input type="text" class="form-control" name="poste">
            <label for="">Description</label>   
            <textarea class="form-control" name="description"></textarea>
            <label for="">Competences</label>
            <textarea class="form-control" name="competences"></textarea>
            <label for="">Type Offre</label>
            <select name="type" id="" class="form-control">
                <option value="emploi">Emploi</option>
                <option value="stage">Stage</option>
            </select>
            <div class="mt-2 text-primary">
                <input type="checkbox" name="publier"> Publier
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary" name="ajoutOffre">Enregistrer</button>
        </div>
      </form>
     
    </div>
  </div>
</div>
<!-- Modal Modifier Offre -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning" >
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modifier Offre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST">
        <div class="modal-body">
            <input type="hidden" name="idOffre" id="idOffre">
            <label for="">Poste</label>
            <input type="text" class="form-control" name="poste" id="poste">
            <label for="">Description</label>   
            <textarea class="form-control" name="description" id="description"></textarea>
            <label for="">Competences</label>
            <textarea class="form-control" name="competences" id="competences"></textarea>
            <label for="">Type Offre</label>
            <select name="type" id="type" class="form-control">
                <option value="emploi">Emploi</option>
                <option value="stage">Stage</option>
            </select>
            <div class="mt-2 text-primary">
                <input type="checkbox" name="publier" id="publier"> Publier
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button></div>
            <button type="submit" class="btn btn-warning" name="modifOffre">Enregistrer</button>
        </div>
      </form>
     
    </div>
  </div>

<script>
    function loadModal(id) {
        $.ajax({
            url : "http://localhost/glese/public/json/offre.php?action=findOffre&id="+id,
            dataType : "json",
            method : "GET",
            success : function(dataResult){
                if(dataResult!="0"){
                    $("#idOffre").val(dataResult.idOffre);
                    $("#poste").val(dataResult.poste);
                    $("#description").val(dataResult.description);
                    $("#competences").val(dataResult.competence);
                    $("#type").val(dataResult.typeOffre);
                    let check=dataResult.etatOffre==0 ? false : true;
                    $("#publier"). prop("checked",check);

                }
            }
        });
    }
</script>