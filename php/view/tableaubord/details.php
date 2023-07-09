<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {

		header("location:index.php");
	  }
?>
	<div id="corps">
	<?php
            require_once('php/classe/classeArticle.php');
            $article = new article();
            $list = $article-> rechercheArticle($opt[1]);
			foreach ($list as $valueArticle) {
				echo '
				<a class="block-link" href="#">
					<div class="block">
						<h1 style="text-align:center;">' . $valueArticle['titre'] . '</h1>
						<p style="color: black;">' . $valueArticle['contenu'] . '</p>
						<h3 style="text-align:center; color: black;">Date de creation : ' . $valueArticle['dateCreation'] . '</h3>
						<h3 style="text-align:center; color: black;">Date de modification : ' . $valueArticle['dateModification'] . '</h3>
					</div>
				</a>
				
				';
				echo '<a href="tableaubord_modifier-'. $valueArticle['id'] .'" > Modifier </a>
				<button class="btn btn-light " onclick="location.href=tableaubord_liste;">Retour</button>
				<button type="submit" class="btn btn-primary mr-2" name="action" onclick="location.href=tableaubord_modifier-' . $valueArticle['id'] .';">Modifier</button>
				';
			}

	?>

	</div>