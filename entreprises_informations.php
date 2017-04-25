<?php 
	try {
	$bdd = new PDO('mysql:host=localhost; dbname=gestion_stages; charset=utf8', 'root', '');
	} catch(Exeption $e) {
		die($e);
	}

	$repEntreprise = $bdd->query('SELECT * FROM entreprise')
?>
<?php
	include '/view/includes/header.php';
	include '/view/includes/menu.php';
	include '/view/includes/menu_vertical.php';
?>
	<div class="container">
		<div id="content">
			<h2>NOM DE L'ENTREPRISE</h2> 

			<br>
			<!-- Affiche le nombre de stage pour l'entreprise selectionnée -->
			Cette société totalise <?php 'SELECT count(id_stage) FROM stage WHERE id_entreprise=...)'?> stages à son actif. 
			<br><br>

			<form method="post" action="#">
					
				<label for="entreprise">Nom de l'entreprise :</label>
				<!-- Affichage des entreprises contenues dans la bdd -->
				<select>
					<?php while ($donnees = $repEntreprise->fetch())
					{ 
					?>
					<option value=<?php echo $donnees['id_entreprise']; ?>><?php echo $donnees['id_entreprise'];  ?> </option>
					<?php  
					}

					$repEntreprise->closeCursor();
					?>
					<input type="submit" name="valider" value="valider">
				</select>
			
			</form>

			<br><br>
			
			<!-- Formulaire permettant  d'ajouter une entreprise -->
			<h2>Nouvelle entreprise</h2>
			
			<form>
				<label>Nom de l'entreprise :</label>
				<input  value="" name="nom_entreprise" />
				
				<br>
				
				<label>Type d'entreprise :</label>
				
				<select name="type_entreprise">
					<!-- Affichage des types d'entreprises -->
					<?php $repEntreprise = $bdd->query('SELECT * FROM entreprise'); 
					while ($donnees = $repEntreprise->fetch())
					{ 
					?>
					<option value=<?php echo $donnees['id_type']; ?>><?php echo $donnees['id_type']; ?> </option>
					<?php  
					}
					$repEntreprise->closeCursor();
					?>
				</select>

				<label> Ou nouveau :</label>
					<input type="text" name="nouv_type_entreprise" />
				
				<br>
				
				<label>Chiffre d'affaires :</label>
				<input  value="" name="ca_entreprise" />
				
				<br>
				
				<label>Adresse postale :</label>
				<textarea name="adresse_entreprise"></textarea>
				
				<br>
				
				<label>Téléphone :</label>
				<input  value="" name="tel_entreprise"/>
				
				<br>
				
				<label>Resp. technique :</label>
				<select name="resp_tech_entreprise">
					<option>
						<!-- Affichage des référents pro enregistrés dans la bdd -->
						<?php $repRespTech = $bdd->query('SELECT * FROM rf_pro'); 
						while ($donnees = $repRespTech->fetch())
						{ 

						?>
						<option value=<?php echo $donnees['id_rf_pro']; ?>><?php echo $donnees['id_rf_pro']; ?> </option>
						<?php  
						}

						$repEntreprise->closeCursor();
						?>
					</option>
				</select>
				
				<label> Ou nouveau :</label>
					<input type="text" name="nouv_resp_technique" />
				
				<br>
				
				<input type="submit" name="valider" value="Editer les informations">
			</form>
		</div>
	</div>
<?php 
	include '/view/includes/footer.php';
?>
