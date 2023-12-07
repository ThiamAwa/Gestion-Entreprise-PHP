<div class="card">
    <div class="card-header">
        <span class="h4">Gestion Profil </span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModalP">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeProfil as $key => $profil){ ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $profil['nomProfil']?></td>
                        <td>
                            <button class="btn btn-sm btn-warning text-white"> <i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

<!-- Modal Ajout Offre -->
<div class="modal fade" id="exampleModalP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header bg-primary" >
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajout Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form  method="POST">
        <div class="modal-body">
            <label for="">Nom Profil</label>
            <input type="text" class="form-control" name="nomProfil">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-primary" name="ajoutProfil">Enregistrer</button>
        </div>
      </form>
     
    </div>
  </div>
</div>