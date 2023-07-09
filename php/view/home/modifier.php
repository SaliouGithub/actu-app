<script type="text/javascript" src="php/view/categorie/categorie.js"></script>
<script type="text/javascript">

  function modifier(libelle,idElement){
    $("#libelle2").val(libelle);
    $("#modifier").val(idElement);
  }

</script>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="font-weight-bold">Modifier Categorie</h3>
            <?php
              require_once('php/classe/classeCategorie.php');
              $categorie = new Categorie();
              $list = $categorie->rechercheCategorie($opt[1]);
              foreach($list as $value){
            ?>
              
            <div style="padding: 12px">
              <form class="forms-sample" id="monFormMod">
                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <label for="libelle">Libellé</label>
                              <input required type="text" name="libelle" value="<?php echo $value['libelle']; ?>" class="form-control" id="libelle2" placeholder="Libellé">
                          </div>
                      </div>
                            
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          <input type="hidden" name="modifier" id="modifier" value="<?php echo $value['idCategorie']; ?>">
                          <button class="btn btn-light " onclick="location.href='categorie_liste';" >Annuler</button>
                          <button type="submit" class="btn btn-primary mr-2" name="action">Valider</button>
                          
                      </div>
                  </div>
              </form>
            </div>

            <?php } ?>
        </div>
    </div>
</div>

