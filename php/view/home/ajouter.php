
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #4B49AC;">
        <h5 class="modal-title" id="titre" style="color: #FFF">Ajouter catégorie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" id="monForm">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="libelle">Libellé</label>
                <input required type="text" name="libelle" class="form-control" id="libelle" placeholder="Libellé">
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <input type="hidden" name="ajouter" id="ajouter">
                <input type="hidden" name="modifier" id="modifier">
                <button type="submit" class="btn btn-primary mr-2" name="action">Valider</button>
                <button class="btn btn-light" data-dismiss="modal">Annuler</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>