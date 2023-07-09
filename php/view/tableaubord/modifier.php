<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {

		header("location:index.php");
	  }
?>
<script type="text/javascript" src="php/view/tableaubord/article.js"></script>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 style="text-align:center;" class="font-weight-bold">Modifier Article</h3>
            <?php
              require_once('php/classe/classeArticle.php');
              $article = new article();
              $list = $article-> rechercheArticle($opt[1]);
              foreach ($list as $valueArticle) {
            ?>
              
            <div style="padding: 12px">
              <form class="forms-sample" id="monFormMod">
              <!-- <blockquote class="blockquote blockquote-primary">                 -->
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="titre">Titre</label>
                              <input required type="text" name="titre" value="<?php echo $valueArticle['titre']; ?>" class="form-control" id="titre2" placeholder="Titre">
                          </div>
                      </div>
                      <div class="col-md-10">
                          <div class="form-group">
                          <label for="contenu">Contenu</label>
                          <input required type="text" name="contenu" value="<?php echo $valueArticle['contenu']; ?>" class="form-control" id="contenu2" placeholder="Contenu">
                          </div>
                      </div>            
                  </div>
                  <!-- <footer class="blockquote-footer"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="modifier" id="modifier" value="<?php echo $valueArticle['id']; ?>">
                            <button class="btn btn-light " onclick="location.href='tableaubord_liste';" >Annuler</button>
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

