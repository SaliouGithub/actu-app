
<script type="text/javascript" src="php/view/article/article.js"></script>

<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {

		header("location:index.php");
	  }
?>

<div id="corps">
       
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h3 class="font-weight-bold">Liste des articles</h3>
      <div class="template-demo" style="padding: 8px">
        <button type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal" onclick="ajouter()">Ajouter</button>
      </div>

      <div class="table-responsive" style="padding: 12px">
        <table class="table table-striped" id="order-listing">
          <thead>
            <tr>
              <th>&#8470;</th>
              <th>Titre</th>
              <th>Categorie</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            require_once('php/classe/classeArticle.php');
            $article = new article();
            $list = $article->listArticle();
            $i = 1;
            foreach ($list as $value) {
              echo '
                            <tr id="' . $value['id'] . '">
                                <td class="py-1">' . $i++ . '</td>
                                <td>' . $value['titre'] . '</td>    
                                <td>' . $value['nomCategorie'] . '</td>  
                                <td>
                                    <button type="button" onclick="supprimer(' . $value['id'] . ')" class="btn btn-danger btn-rounded btn-icon">
                                        <i class="ti-trash" style="margin: -5px;"></i>
                                    </button>
                                    <button onclick="window.location.href = \'article_modifier-'.$value['id'].'\';"  type="button" class="btn btn-dark btn-rounded btn-icon" data-toggle="modal" data-target="#exampleModal">
                                        <i class="ti-pencil-alt" style="margin: -5px;"></i>
                                    </button>
                                </td>
                            </tr>
                        ';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

        <!-- ajouter article  -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #4B49AC;">
                    <h5 class="modal-title" id="titre" style="color: #FFF">Ajouter article</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" id="monForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="titre">titre</label>
                                <input required type="text" name="titre" class="form-control" id="titre" placeholder="Titre">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="contenu">contenu</label>
                                <input required type="text" name="contenu" class="form-control" id="contenu" placeholder="Contenu">
                            </div>
                        </div>
						<div class="col-md-4">
							<div class="form-group">
								<label>Categorie</label>
								<select id="categorie" name="categorie" class="form-control">
								<option value="" selected disabled>-Choisir-</option>
								<?php
								require_once('php/classe/classeCategorie.php');
								$categorie = new Categorie();
								$list = $categorie->listCategorie();
								foreach ($list as $value) {
								?>
									<option value="<?php echo $value['id']; ?>"><?php echo $value['libelle']; ?></option>
								<?php  }
								?>
								</select>

							</div>
						</div>
                    </div>
                        <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="ajouter" id="ajouter">
                            <button class="btn btn-light" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary mr-2" name="action">Valider</button>
                        
                        </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

	</div>

	<script>
		function supprimer(idElement) {
    swal({
      title: "Supprimer article",
      text: "Êtes-vous sûr de vouloir supprimer cette article ?",
      icon: 'warning',
      dangerMode: true,
      buttons: {
        cancel: 'Non',
        delete: 'Oui'
      }
    }).then(function(willDelete) {
      if (willDelete) {
        $('.loaderMessage').addClass('is-active');
        $.ajax({
          type: "GET",
          url: "php/controller/article.php?supprimer=" + idElement,
          data: $(this).serialize(),
          success: function(msg) {
            if (parseInt(msg) == 1) {
              location.reload();
              // swal.close();
              // M.toast({html: '<span style="color:#fff;">Suppression effectuée avec succ&egrave;s</span>'}, 3000);

            } else {
              swal({
                title: "Désolé",
                text: "Une erreur est survenue lors de la connexion &agrave; la base de données, veuillez réessayer plus tard",
                imageUrl: 'dist/img/icones/errorDb.png',
                html: true
              });
            }
            $('.loaderMessage').removeClass('is-active');
          },
          error: function() {
            $('.loaderMessage').removeClass('is-active');
            swal({
              title: "Désolé",
              text: "Une erreur est survenue veuillez contacter l'administrateur",
              imageUrl: 'images/icones/error.png',
              html: true
            });
          }
        });
      } else {
        swal.close();
      }
    });
  }
</script>