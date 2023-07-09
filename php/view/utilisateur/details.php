<!-- <script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script> -->
<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {
        
        header("location:index.php");
    }
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="font-weight-bold">Détails utilisateur</h3>

            <?php
            require_once('php/classe/classeUtilisateur.php');
            $Utilisateur = new Utilisateur();
            $list = $Utilisateur->rechercheUtilisateur($opt[1]);
            foreach ($list as $value) {
            ?>
                <div style="padding: 12px">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <h6 name="prenom" class="form-control" id="prenom"><?php echo $value['prenom']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <h6 name="nom" class="form-control" id="nom"><?php echo $value['nom']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <h6 name="email" class="form-control" id="email"><?php echo $value['email']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <h6 name="login" class="form-control" id="login"><?php echo $value['login']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <h6 name="telephone" class="form-control" id="telephone"><?php echo $value['telephone']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <h6 name="adresse" class="form-control" id="adresse"><?php echo $value['adresse']; ?></h6>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <h6 name="role" class="form-control" id="role"><?php echo $value['role']; ?></h6>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-light " onclick="location.href='utilisateur_liste';">Retour</button>
                            <button class="btn btn-primary mr-2" name="action" onclick="location.href='utilisateur_modifier-<?php echo $value['idUtilisateur']; ?>';">Modifier</button>
                        </div>
                    </div>
                </div>

            <?php } ?>
        </div>
    </div>
</div>