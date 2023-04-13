<?php
 require('../connexion/connexion.php');

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>RechercheFBF</title>
	<link rel="stylesheet" type="text/css" href="../css/reche.css">
	<link rel="icon" type="text/css" href="../images/logo.jpg">
</head>
<body>

<div class="pied">
 <a href="../menuFBF/">MENU FBF</a>
 </div>
 
<div class="container">
<fieldset>
	<legend>Liste des joueurs d'un club par saison</legend>
	
	<form action="" method="POST">
		<table>
			<tr>
				<td>Club:</td>
				<td>
					<select name="idClub" id="">
						<?php 
						$req = $bd->query("SELECT * FROM club") ;
						$tab = $req->fetchAll();
						foreach($tab as $key){
							echo '<option value="'.$key['id'].'">'.$key['nomClub'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Saison:</td>
				<td>
				<select name="saison" id="">
						<?php 
						$req = $bd->query("SELECT DISTINCT saison FROM inscriptions") ;
						$tab = $req->fetchAll();
						foreach($tab as $key){
							echo '<option value="'.$key['saison'].'">'.$key['saison'].'</option>';
						}
						?>
					</select>
				</td>
			</tr>
		</table>
		<input type="submit" value="Rechercher" name="rech">
	</form>
	</fieldset>
	</div>
<div class="tableau">
<?php 

if(isset($_POST['rech'])){

	$club = $_POST['idClub'];
	$saison = $_POST['saison'];
	
	$sql = $bd->prepare("SELECT nom, prenom, type FROM joueur, inscriptions, categorie WHERE idJoueur = ? AND saison = ? AND joueur.id = inscriptions.idJoueur");
	$sql ->execute(array($club, $saison));

	$tab = $sql->fetchAll();

	echo '<table class="tab">
			<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Catégorie</th>
			</tr>';

			foreach($tab as $key){
				echo 	
							'<tr>
							<td>'.$key['nom'].'</td>
							<td>'.$key['prenom'].'</td>
							<td>'.$key['type'].'</td>
							</tr>';
			}
}

?>

</div>


</body>
</html>