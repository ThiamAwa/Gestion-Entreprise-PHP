<div class="card">
    <div class="card-header h3 text-center">Mes Candidatures (offres postulées)</div>
    <div class="card-body">
        
        <div class="row">
            <?php 
                foreach($listeCandidature as $value){?>
                <div class="col-md-4 mb-3">
                    <div class="card border border-primary bg-info">
                        <div class="card-body bg-light">
                            <h4><?=$value['poste']?></h4>
                            <h6 class="text-warning" <?= ($value['etatC']==-1) ? "" : "hidden" ?>>En attente de validation</h6>
                            <h6 class="text-primary" <?= ($value['etatC']==1) ? "" : "hidden" ?>>Candidature valider</h6>
                            <h6 class="text-danger" <?= ($value['etatC']==0) ? "" : "hidden" ?>>Candidature refuser</h6>
                        </div>
                        <div class="card-footer">
                            <a class="btn btn-info btn-sm float-end" href="?page=detailOffre&idOffre=<?=$value['idOffre']?>">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>