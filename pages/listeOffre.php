<div class="row">
    <?php 
    foreach ($listeOffresP as $key => $offre) { ?>
        <div class="col-md-4 mb-3 ">
            <div class="card border border-primary">
                <div class="card-body bg-light text-primary">
                    <h4><?= $offre['poste']?></h4>
                </div>
                <div class="card-footer">
                    <a href="?page=detailOffre&idOffre=<?= $offre['idOffre'] ?>"  class="btn btn-primary btn-sm float-end">Detail</a>
                </div>
            </div>
        </div>
    <?php  }  ?>
   
</div>