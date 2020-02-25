<?php include('head.php') ?>
<link rel="stylesheet" href="public/css/style-forum.css">

<body>
	<?php include('header-image.php') ?>
	<main>
	<div class="container">
            <div class="containerAll">
				<h2>Forum :</h2>
				<div class="divForum">
					<h3>Nos forums : </h3>
					<div class="listeDesForums">
						<input type="button" class="forum" value="Artiste">
						<input type="button" class="forum" value="Album">
						<input type="button" class="forum" value="Concert">
						<input type="button" class="forum" value="Création musicale">
						<input type="button" class="forum" value="Mixage audio">
						<input type="button" class="forum" value="Matériel">
						<input type="button" class="forum" value="Autoradio">
						<input type="button" class="forum" value="Synthétiseur">
					</div>
				</div>
				<div class="divTopic">
					
							
					<div class="topic">
						<h3>Liste des derniers messages : </h3>
						<a href="insert_sujet.php">Insérer un sujet</a>

						<?php
						$query = 'SELECT T.id, M.id, pseudo, idAuteur, titre, creation, lastModification FROM topic T, membre M WHERE M.id = idAuteur ORDER BY lastModification LIMIT 4';
						$sql = $bdd->query($query);
						$nb_sujets = $sql->rowCount();
						?>
						<?php
							if ($nb_sujets == 0) {
								echo '<label>Aucun sujet</label>';
							}
							else {
						?>
						<ul class="listetopic">
							<li>
								<label>Auteur</label>
								<label>Titre du sujet</label>
								<label>Date dernière réponse</label>
							</li>
							<?php
								while ($data = $sql->fetch()) {
								// on décompose la date
								sscanf($data['lastModification'], "%4s-%2s-%2s %2s:%2s:%2s", $annee, $mois, $jour, $heure, $minute, $seconde);

								// on affiche les résultats
								echo '<li>';
								echo '<label>';

								// on affiche le nom de l'auteur de sujet
								echo htmlentities(trim($data['pseudo']));
								echo '</label>';

								// on affiche le titre du sujet, et sur ce sujet, on insère le lien qui nous permettra de lire les différentes réponses de ce sujet
								echo '<a href="articleForum.php?id_sujet_a_lire=' , $data['T.id'] , '">' , htmlentities(trim($data['titre'])) , '</a>';

								echo '<label>';

								// on affiche la date de la dernière réponse de ce sujet
								echo $jour , '-' , $mois , '-' , $annee , ' ' , $heure , ':' , $minute;
								}
								echo '</label></li>'
							?>
						</ul>
					<div class="pagination">
						<button  class="active" class="button">1</button>
						<a href="#"><button>2</button></a> 
                	</div>
				</div>
				<?php
					}
					$reponse->closeCursor();
				?>
				</div>
			</div>
		</div>
		</main>
	<?php include('footer.php') ?>
</body>

</html>