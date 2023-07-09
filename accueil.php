<?php
@session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>mon site</title>
	<link rel="stylesheet" type="text/css" href="assets/css/tp.css"> 


	<!-- plugins:css -->
	<link rel="stylesheet" href="assets/vendors/feather/feather.css">
	<link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
	<link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
	<link rel="stylesheet" href="assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendors/quill/quill.snow.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="assets/css/vertical-layout-light/style.css">
	<!-- endinject -->
	<!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->

	<!-- plugins:css -->
	<link rel="stylesheet" href="assets/vendors/feather/feather.css">
	<!-- endinject -->

	<!-- inject:css -->
	<link rel="stylesheet" href="css/vertical-layout-light/style.css">

	<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> -->
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<?php

	$URL = $_SERVER['REQUEST_URI'];

	$URL = str_replace('/actu/', "", $URL);

	$tableau_chemin = explode("_", $URL);

	$message = "";



	?>

	<div id="entete">ACTUALITES POLYTECHNICIENNES</div>
	<div id="menu">
		<ul>

			
			<?php
			$route= "" ;
		    if (isset($_SESSION['Actuconnected']))  {
				$route = 'tableaubord';
				echo '<li><a class="lien" href="tableaubord_liste">Accueil</a></li>';
			}else{
				$route = 'home';
				echo '<li><a class="lien" href="home_liste">Accueil</a></li>';
			}
			require_once('php/classe/classeCategorie.php');
			$categorie = new categorie();
			$list = $categorie->listCategorie();
			foreach ($list as $valueCategorie) {
				echo '
				<li><a class="lien" href="'.$route.'_liste-' . $valueCategorie['id'] . '">'  . $valueCategorie['libelle'] . '</a></li>
				';
			}
			
			?>
			<?php
			if (isset($_SESSION['Actuconnected']))  {
				echo '
				<li><a class="lien" style="text-align:right;" href="utilisateur_liste">Utilisateurs</a></li>
				<li><a class="lien" style="text-align:right;" href="deconnexion.php">Deconnexion</a></li>
				';
			}
			else{
				echo '<li><a class="lien" style="text-align:right;" href="index.php">Connexion</a></li>';
			}
			?>
		</ul>
	</div>
	

	 <!-- partial -->
	 <div class="main-panel">

		<!-- Début include -->
	
			<?php

			$tab["menu"]["tableaubord"]["liste"] = 1;

			$tab["menu"]["tableaubord"]["index"] = 1;

			$tab["menu"]["tableaubord"]["ajouter"] = 1;

			$tab["menu"]["tableaubord"]["modifier"] = 1;

			$tab["menu"]["tableaubord"]["supprimer"] = 1;

			$tab["menu"]["tableaubord"]["details"] = 1;

			

			$tab["menu"]["article"]["liste"] = 1;

			$tab["menu"]["article"]["ajouter"] = 1;

			$tab["menu"]["article"]["modifier"] = 1;

			$tab["menu"]["article"]["supprimer"] = 1;

			$tab["menu"]["article"]["details"] = 1;


			$tab["menu"]["categorie"]["liste"] = 1;

			$tab["menu"]["categorie"]["ajouter"] = 1;

			$tab["menu"]["categorie"]["modifier"] = 1;

			$tab["menu"]["categorie"]["supprimer"] = 1;

			$tab["menu"]["categorie"]["details"] = 1;



			$tab["menu"]["utilisateur"]["liste"] = 1;

			$tab["menu"]["utilisateur"]["index"] = 1;

			$tab["menu"]["utilisateur"]["ajouter"] = 1;

			$tab["menu"]["utilisateur"]["modifier"] = 1;

			$tab["menu"]["utilisateur"]["supprimer"] = 1;

			$tab["menu"]["utilisateur"]["details"] = 1;

			

			$tab["menu"]["home"]["liste"] = 1;

			$tab["menu"]["home"]["ajouter"] = 1;

			$tab["menu"]["home"]["details"] = 1;

			$tab["menu"]["home"]["supprimer"] = 1;
		

			$URL = $_SERVER['REQUEST_URI'];


			$URL = str_replace('/actu/', "", $URL);

			$tableau_chemin = explode("_", $URL);

			$taille = sizeof($tableau_chemin);

			switch ($taille) {

			case 1: {

				$a = !empty($tab["menu"][$tableau_chemin[0]]);

				if ($a == 1)

					include('php/view/home/' . $tableau_chemin[0] . '.php');

				break;
				}
			case 2: {

				$tab1 = explode('-', $tableau_chemin[1]);

				$a = !empty($tab["menu"][$tableau_chemin[0]][$tab1[0]]);

				if ($a == 1) {

					$opt = $tableau_chemin[1];

					include('php/controller/' . $tableau_chemin[0] . '.php');
				}

				break;
				}
			case 3: {

				$a = !empty($tab["menu"][$tableau_chemin[0]][$tableau_chemin[1]]);



				$opt = $tableau_chemin[2];

				if ($a == 1) {

					include('php/controller/' . $tableau_chemin[1] . '.php');
				}

				break;
				}
			}

			?>
		<!-- Fin include -->
		<!-- partial -->
		</div>
		<!-- main-panel ends -->

	<div id="pied">Copyright &#169; DGI 2023</div>
	<script src="assets/vendors/sweetalert/sweetalert.min.js"></script>


	 <!-- plugins:js -->
	  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="assets/js/dataTables.select.min.js"></script> -->


  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- <script src="assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <script src="assets/vendors/select2/select2.min.js"></script>
  <script src="assets/vendors/quill/quill.min.js"></script> -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->

  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="assets/js/file-upload.js"></script>
  <script src="assets/js/typeahead.js"></script>
  <script src="assets/js/select2.js"></script> -->
  <!-- End custom js for this page-->

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <!-- <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script> -->
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/Chart.roundedBarCharts.js"></script>
  <script src="assets/js/data-table.js"></script>
  <script src="assets/js/Chart.roundedBarCharts.js"></script>
  <script src="assets/js/jquery.cookie.js" type="text/javascript"></script> -->
  <!-- End custom js for this page-->



</body>
</html>
