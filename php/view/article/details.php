<?php 
	if (!isset($_SESSION['Actuconnected']) && !isset($_SESSION['Actuadministrateur']) ) {

		header("location:index.php");
	  }
?>
	<div id="corps">
	<!-- <button type="submit" class="btn btn-primary mr-2" name="action" onclick="location.href='article_modifier'">Modifier</button> -->
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
				echo '<a href="article_modifier-'. $valueArticle['id'] .'" > Modifier </a> ';
			}

	?>

	</div>