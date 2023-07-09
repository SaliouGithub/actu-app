<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>
<div class="container" style="background-color: white; padding: 30px; margin-top: 10px;">
  <div class="loader loaderMessage loader-bar" data-text="Envoi des données en cours. Veuillez patienter" data-rounded></div>
  <div id="mail-app" class="section">
    <div class="row">
      <div class="col s12 m12 l12">
        <h4 class="header2">Ajout utilisateur</h4> <br>
        <div class="row">
          
          <form class="col s12" id="monForm">
            <div class="row">
              <div class="input-field col s12 m3 l3">
                <input required id="matricule" name="matricule" type="text">
                <label for="matricule">Matricule</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="nom" name="nom" type="text">
                <label for="nom">Nom</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="prenom" name="prenom" type="text">
                <label for="prenom">Prénom</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="email" name="email" type="email">
                <label for="email">E-mail</label>
              </div>
            </div>

            <div class="row">
              <div class="input-field col s12 m3 l3">
                <input id="telephone" name="telephone" type="text">
                <label for="telephone">Téléphone</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="login" name="login" type="text">
                <label for="login">Login</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="motDePasse" name="motDePasse" type="password">
                <label for="motDePasse">Mot de passe</label>
              </div>
              <div class="input-field col s12 m3 l3">
                <input required id="motDePasse2" name="motDePasse2" type="password">
                <label for="motDePasse2">Confirmer mot de passe</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12 m3 l3">
                <div class="input-field">
                  <select id="idRole" name="idRole" class="select2 browser-default">
                    <?php
                      require_once('php/classe/classeUtilisateur.php');
                      $Utilisateur = new Utilisateur();
                      $list = $Utilisateur->listRole();
                      foreach($list as $value){
                    ?>
                      <option value="<?php echo $value['idRole']; ?>"><?php echo $value['libelle']; ?></option>  
                    <?php  }
                    ?>
                  </select>
                  <label>Choisir un r&ocirc;le</label>
                </div>
              </div>

              <div class="col s12 m3 l3">
                <div class="input-field">
                  <select id="idEquipe" name="idEquipe" class="select2 browser-default">
                    <?php
                      require_once('php/classe/classeEquipe.php');
                      $Equipe = new Equipe();
                      $list = $Equipe->listEquipe();
                      foreach($list as $value){
                    ?>
                      <option value="<?php echo $value['idEquipe']; ?>"><?php echo $value['libelle']; ?></option>  
                    <?php  }
                    ?>
                  </select>
                  <label>Choisir une équipe</label>
                </div>
              </div>
              <!-- <div class="col-md-12 form-control">
                <label for="description">Description</label>
                  <textarea id="description" name="description" class="materialize-textarea summernote" style="height: 90px;"></textarea>
              </div>  -->
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input type="hidden" name="ajouter">
                <button class="btn green waves-effect waves-light right" type="submit" name="action">Valider</button>
                <a class="btn mr-1 red waves-effect waves-light right" href="utilisateur_liste">Annuler
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>