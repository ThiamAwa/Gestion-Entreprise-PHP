
<div class="card">
    <div class="card-header">
        <span class="h4">Listes Offre</span>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Tel</th>
                    <th>Email</th>
                    <th>Profil</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeEmploye as $key => $emp) { ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?=$emp['prenom'] ?></td>
                        <td><?=$emp['nom'] ?></td>
                        <td><?=$emp['tel'] ?></td>
                        <td><?=$emp['email'] ?></td>
                        <td><?=$emp['nomProfil'] ?></td>
                        <td>
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-sm btn-warning"><i class="fas fa-info-circle text-white"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>