<div class="row alert alert-success" <?= isset($verifCandidature) && $verifCandidature != 0 && $verifCandidature !=false  ? " " : "hidden"?>>
    <h3>Vousavez  deja postuler pour cette Offre (<?= $verifCandidature['dateC'] ?>)</h3>
    <h2 class="text-warning" <?= $verifCandidature['etatC']==-1  ? "" : "hidden" ?>>En attente de validation</h2>
    <h2 class="text-primary" <?= $verifCandidature['etatC']==1  ? "" : "hidden"?>>Candidature Validé</h2>
    <h2 class="text-danger" <?= $verifCandidature['etatC']==0  ? "" : "hidden"?>>Candidature refusé</h2>
</div>
<div class="card">
    <div class="card-header">
        <h3><?= $offreDetail['poste']?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="" method="POST">
                <button  <?= ( isset($verifCandidature) && $verifCandidature != 0 && $verifCandidature !=false ) ? "hidden" : ""?> class="btn btn-primary btn-sm float-end" type="submit" name="postuler">Postuler</button> 
        </div>
        <p class="text-justify"><?= $offreDetail['description']?></p>
        <input type="hidden" name="idOffre" value="<?= $offreDetail['idOffre']?>">
        <h3>COMPETENCES</h3>
        <p class="text-justify"><?= $offreDetail['competence']?></p>
        </form>
    </div>
</div>