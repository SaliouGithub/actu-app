<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {

		header("location:index.php");
	  }
?>
<script type="text/javascript" src="php/view/categorie/categorie.js"></script>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 style="text-align:center;" class="font-weight-bold">Modifier Categorie</h3>
            <?php
              require_once('php/classe/classeCategorie.php');
              $categorie = new Categorie();
              $list = $categorie-> rechercheCategorie($opt[1]);
              foreach ($list as $valueCategorie) {
            ?>
              
            <div style="padding: 12px">
              <form class="forms-sample" id="monFormMod">
              <!-- <blockquote class="blockquote blockquote-primary">                 -->
                  <div class="row">
                      <div class="col-md-10">
                          <div class="form-group">
                          <label for="libelle">Libelle</label>
                          <input required type="text" name="libelle" value="<?php echo $valueCategorie['libelle']; ?>" class="form-control" id="libelle2" placeholder="Libelle">
                          </div>
                      </div>            
                  </div>
                  <!-- <footer class="blockquote-footer"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="modifier" id="modifier" value="<?php echo $valueCategorie['id']; ?>">
                            <button class="btn btn-light " onclick="location.href='categorie_liste';" >Annuler</button>
                            <button type="submit" class="btn btn-primary mr-2" name="action">Valider</button>       
                        </div>
                    </div>
                  <!-- </footer>
                  </blockquote> -->
              </form>
            </div>

            <?php } ?>
        </div>
    </div>
</div>

