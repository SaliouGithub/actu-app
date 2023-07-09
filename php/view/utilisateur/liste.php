<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {
        
        header("location:index.php");
    }
?>

<script type="text/javascript" src="php/view/utilisateur/utilisateur.js"></script>

<style>
    .modal-lg {
        max-width: 70% !important;
        bottom: 60px;
    }
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h3 class="font-weight-bold">Liste des utilisateurs</h3>
            <div class="template-demo" style="padding: 8px">
                <button type="button" class="btn btn-primary btn-rounded btn-fw" data-toggle="modal" data-target="#exampleModal" onclick="ajouter()">Ajouter</button>
            </div>

            <div class="table-responsive" style="padding: 12px">
                <table class="table table-hover" id="order-listing">
                    <thead>
                        <tr>
                            <th>&#8470;</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Téléphone</th>
                            <th>Login</th>
                            <th>Role</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once('php/classe/classeUtilisateur.php');
                        $utilisateur = new utilisateur();
                        $list = $utilisateur->listUtilisateur();
                        $i = 1;
                        $etat = 0;
                        $color = '';
                        foreach ($list as $value) {
                            if ($value['etat'] == 1) {
                                $etat = 'Activé';
                                $color = 'success';
                            } else {
                                $etat = 'Désactivé';
                                $color = 'danger';
                            }
                            echo '
                            <tr id="' . $value['idUtilisateur'] . '">
                                <td class="py-1">' . $i++ . '</td>
                                <td>' . $value['prenom'] . '</td>
                                <td>' . $value['nom'] . '</td>
                                <td>' . $value['telephone'] . '</td>
                                <td>' . $value['login'] . '</td>
                                <td>' . $value['role'] . '</td>
                                <td class="font-weight-medium"><div class="badge badge-' . $color . '" >' . $etat . '</div></td>
                                <td>
                                    <button type="button" onclick="changerEtat(' . $value['idUtilisateur'] . ')" class="btn btn-danger btn-rounded btn-icon">
                                        <i class="ti-trash" style="margin: -5px;"></i>
                                    </button>
                                    <button onclick="window.location.href = \'utilisateur_modifier-' . $value['idUtilisateur'] . '\';" type="button" class="btn btn-dark btn-rounded btn-icon">
                                        <i class="ti-pencil-alt" style="margin: -5px;"></i>
                                    </button>
                                    <button onclick="window.location.href =\'utilisateur_details-' . $value['idUtilisateur'] . '\';" type="button" class="btn btn-secondary btn-rounded btn-icon">
                                        <i class="ti-user" style="margin: -5px;"></i> 
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


<!-- Modal début -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #4B49AC;">
                <h5 class="modal-title" id="titre" style="color: #FFF">Ajouter utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" id="monForm">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input required type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input required type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input required type="text" name="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input required type="text" name="adresse" class="form-control" id="adresse" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                                <input required type="tel" name="telephone" class="form-control" id="telephone" placeholder="Téléphone">
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="idRole">Choisir un rôle</label>
                                <select id="idRole" name="idRole" class="form-control">
                                    <?php
                                    require_once('php/classe/classeUtilisateur.php');
                                    $Utilisateur = new Utilisateur();
                                    $list = $Utilisateur->listRole();
                                    foreach ($list as $value) {
                                    ?>
                                        <option value="<?php echo $value['idRole']; ?>"><?php echo $value['libelle']; ?></option>
                                    <?php  }
                                    ?>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="login">Login</label>
                                <input required type="text" name="login" class="form-control" id="login" placeholder="Login">
                            </div>
                        </div>
                       

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="motDePasse">Mot de passe</label>
                                <input required type="password" name="motDePasse" class="form-control" id="motDePasse" placeholder="Mot de passe">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cmotDePasse">Confirmer mot de passe</label>
                                <input required type="password" name="cmotDePasse" class="form-control" id="cmotDePasse" placeholder="Retaper mot de passe">
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

<!-- Modal fin -->

<script type="text/javascript">
    function ajouter() {
        document.getElementById("titre").innerHTML = 'Ajouter utilisateur';

        $("#prenom").val('');
        $("#nom").val('');
        $("#telephone").val('');
        $("#note").val('');
        $("#modifier").val('');

        //Désactive un élément
        document.getElementById('modifier').disabled = true;
        //Active un élément
        document.getElementById('ajouter').disabled = false;

    }

    function myDetails(idUtilisateur, prenom, nom, telephone, note) {

        document.getElementById("titre").innerHTML = 'Modifier utilisateur';

        //Désactive un élément
        document.getElementById('ajouter').disabled = true;
        //Active un élément
        document.getElementById('modifier').disabled = false;

        $("#prenom").val(prenom);
        $("#nom").val(nom);
        $("#telephone").val(telephone);
        $("#note").val(note);
        $("#modifier").val(idUtilisateur);
    }

    function changerEtat(idElement) {
        swal({
            title: "Désactiver cet utilisateur",
            text: "Êtes-vous sûr de vouloir désactiver cet utilisateur ?",
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
                    url: "php/controller/utilisateur.php?changerEtat=" + idElement,
                    data: $(this).serialize(),
                    success: function(msg) {
                        
                        if (parseInt(msg) == 1) {
                            location.reload();
                            // swal.close();
                            // M.toast({html: '<span style="color:#fff;">Suppression effectuée avec succ&egrave;s</span>'}, 3000);

                        } else {
                            swal({
                                title: "Désolé",
                                text: "Une erreur est survenue lors de la connexion à la base de données, veuillez réessayer plus tard",
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

    $("#idRole").change(function() {
        var idRole = $('#idRole').val();
        if (idRole == 1 || idRole == 2) {
            document.getElementById("groupe").style.display = "block";
        } else {
            document.getElementById("groupe").style.display = "none";
        }
    })
</script>