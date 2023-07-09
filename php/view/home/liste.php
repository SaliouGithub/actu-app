<div id="corps">
		<h1 style="text-align:center;">Les dernières actualités</h1>
		<?php
		require_once('php/classe/classeArticle.php');
		$article = new article();
    
		if(isset($opt[1])) { 
			$categorieId = $opt[1];
			$list = $article->listArticleCategorie($categorieId);
			$nombre = count($list);
			if($nombre > 0){
				foreach ($list as $valueArticle) {
					echo '
						<a class="block-link" href="home_details-' . $valueArticle['id'] . '">
							<div class="block">
								<h1>' . $valueArticle['titre'] . '</h1>
								<p>' . $valueArticle['contenu'] . '</p>
							</div>
							</a>
							';
					}
				}
				else
					{
						echo '
							<h2 style="text-align:center;">Aucunes actualités</h2>
						';
					}
			
		}
		else
		{

			$list = $article->listArticle();
			foreach ($list as $valueArticle) {
				echo '
					<a class="block-link" href="home_details-' . $valueArticle['id'] . '">
						<div class="block">
							<h1>' . $valueArticle['titre'] . '</h1>
							<p>' . $valueArticle['contenu'] . '</p>
						</div>
					</a>
							';
			}
		
		}
		?>
	</div>