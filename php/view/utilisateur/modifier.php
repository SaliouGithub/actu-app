<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {
        
        header("location:index.php");
    }
?>
<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="font-weight-bold">Modifier utilisateur</h3>
            <?php
            require_once('php/classe/classeUtilisateur.php');
            $Utilisateur = new Utilisateur();
            $list = $Utilisateur->rechercheUtilisateur($opt[1]);
            foreach ($list as $value) {
            ?>

                <div style="padding: 12px">
                    <form class="forms-sample" id="monFormMod">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input required type="text" name="prenom" value="<?php echo $value['prenom']; ?>" class="form-control" id="prenom" placeholder="Prénom">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input required type="text" name="nom" value="<?php echo $value['nom']; ?>" class="form-control" id="nom" placeholder="Nom">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" value="<?php echo $value['email']; ?>" class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input required type="tel" name="telephone" value="<?php echo $value['telephone']; ?>" class="form-control" id="telephone" placeholder="Téléphone">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <input required type="tel" name="adresse" value="<?php echo $value['adresse']; ?>" class="form-control" id="adresse" placeholder="Adresse">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Choisir le role</label>
                                    <select id="idRole" name="idRole" class="form-control">
                                        <?php
                                        require_once('php/classe/classeUtilisateur.php');
                                        $utilisateur = new Utilisateur();
                                        $list = $utilisateur->listRole();
                                        foreach ($list as $valueRole) {
                                        ?>
                                            <option <?php if ($valueRole['idRole'] == $value['idRole']) echo 'selected' ?> value="<?php echo $valueRole['idRole']; ?>"><?php echo $valueRole['libelle']; ?></option>
                                        <?php  }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" value="<?php echo $value['login']; ?>" class="form-control" id="login" placeholder="Login">
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="motDePasse">Mot de passe</label>
                                    <input type="password" name="motDePasse"  class="form-control" id="motDePasse" placeholder="Mot de passe">
                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="modifier" id="modifier" value="<?php echo $value['idUtilisateur']; ?>">
                                <button class="btn btn-light " onclick="location.href='utilisateur_liste';">Annuler</button>
                                <button type="submit" class="btn btn-primary mr-2" name="action">Valider</button>

                            </div>
                        </div>
                    </form>
                </div>

            <?php } ?>
        </div>
    </div>
</div>

