<div class="card col-md-6 offset-3">
    <div class="card-header">
        <h1 class="text-info text-center">Authentification</h1>
    </div>
    <div class="card-body">
        <div class="row alert alert-danger" <?= isset($erreurConnexion) ?  "" :"hidden" ?> ><?= isset($erreurConnexion) ? $erreurConnexion :" " ?></div>
        <form method="POST">
            <label for="">Nom d'utilisateur</label>
            <input type="text" name="login" class="form-control">
            <label for="">Mot de passe</label>
            <input type="password" name="mdp" class="form-control">
            <button class="btn btn-sm btn-info float-end mt-2 text-white fw-bold" name="connecter">Se connecter</button>
            <a href="?page=auth" class="btn btn-sm btn-info mt-2 text-white" name="inscrire">S'inscrire</a>
        </form>
    </div>
</div>