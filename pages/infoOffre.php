<div class="card">
    <div class="card-header">
        <span class="h4">Detail Offre
        </span>
    </div>
    <div class="card-body">
        <div class="row  mt-2">
            <span class="fw-bold">Description : </span>
            <p ><?=$offreDetail['description']?></p>
            <span class="fw-bold">Competences : </span>
            <p><?=$offreDetail['competence']?></p>
        </div>
        <div class="row mt-2">
            <h4>Listes des Candidat</h4>
            <div class="row mt-2">
                <div class="d-flex justify-content-center">
                <div>
                    <a  href="?page=infoOffre&idOffre=<?=$offreDetail['idOffre']?>&etatC=1&choix=accepter"  class="btn btn-sm btn-info text-white fw-bold" >Valider</a>
                    <a href="?page=infoOffre&idOffre=<?=$offreDetail['idOffre']?>&etatC=0&choix=refuser"  class="btn btn-sm btn-danger text-white fw-bold" >Refuser</a>
                    <a  href="?page=infoOffre&idOffre=<?=$offreDetail['idOffre']?>&etatC=-1&choix=Attente" class="btn btn-sm btn-warning text-white fw-bold" >En Attente</a>
                    <a  href="?page=pdf.php" class="btn btn-sm btn-success text-white fw-bold" >Imprimer</a>

                </div>
            </div>
            <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listeCandidatOffre as $key => $emp){ ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $emp['prenom']?></td>
                        <td><?= $emp['nom']?></td>
                        <td><?= $emp['tel']?></td>
                        <td><?= $emp['email']?></td>
                        <td>
                            <a <?=$emp['ficherCV'] != "" ? "" : "hidden"?> target="_blank" class="btn btn-sm btn-info text-white fw-bold" href="http://localhost/glese/public/document/<?=$emp['ficherCV']?>" >Voir CV</a>

                            <a  href="?idOffre=<?=$offreDetail['idOffre']?>&etatC=-1&idUser=<?=$emp['idUser']?>" <?=$emp['ficherCV'] != "" ? "" : "hidden"?> target="_blank" class="btn btn-sm btn-warning text-white fw-bold" name="accepter" >Accepter</a>

                            <a   href="?idOffre=<?=$offreDetail['idOffre']?>&etatC=0&idUser=<?=$emp['idUser']?>" <?=$emp['ficherCV'] != "" ? "" : "hidden"?> target="_blank" class="btn btn-sm btn-danger text-white fw-bold"  name="refu" >Refuser</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>