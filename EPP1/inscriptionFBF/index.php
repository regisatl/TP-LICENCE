<?php
require('../connexion/connexion.php');

if(isset($_POST['save'])){

	$categorie = htmlspecialchars($_POST['categorie']);
	$nom = htmlspecialchars($_POST['idJoueur']);
	$club = htmlspecialchars($_POST['idClub']);
	$saison = htmlspecialchars($_POST['saison']);

    $infoSql = $bd->prepare('INSERT INTO inscriptions (categorie, idClub, idJoueur, saison) VALUES(?, ?, ?, ?)');
    $infoSql->execute(array($categorie, $club, $nom, $saison));

    $successMsg = "Enregistrement effectué avec succès";
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inscriptions des joueurs</title>
	<link rel="stylesheet" type="text/css" href="../css/mains.css">
	<link rel="icon" type="text/css" href="../images/logo.jpg">
</head>
<body>

 <div class="formulaire">
	 <form action="" method="POST">  
<?php
if(isset($successMsg)){
?>
<div class="txt1" role="alert">
<?php echo $successMsg; }

elseif(isset($errorMsg)){
?>
<div class="txt2" role="alert">
<?php echo $errorMsg; ?>
</div> 
<?php } 
?>      

  	<fieldset>
  	 <legend class="titre-formulaire">
   		<h2>Inscription annuelle pour le championnat</h2>
   	</legend>
  <table class="table">
    <tr>
        <td>Categorie</td>
        <td>
        <select name="categorie">
            	<option selected disabled>Choisissez une catégorie...</option>
                <?php 
                $categorieInfos =$bd -> query("SELECT * FROM categorie");
                while($categorieSql = $categorieInfos->fetch()){
                    echo '<option value="'.$categorieSql['type'].'">'.$categorieSql['type'].'</option>';
                }
                ?>  
            </select>
        </td>
    </tr>
    <tr>
        <td>Club</td>
        <td> <select name="idClub">
            	<option selected disabled>Choisissez un club...</option>
                <?php 
                $clubInfos =$bd -> query("SELECT * FROM club");
                while($clubSql = $clubInfos->fetch()){
                    echo '<option value="'.$clubSql['nomClub'].'">'.$clubSql['nomClub'].'</option>';
                }
                ?>  
            </select></td>
    </tr>
    <tr>
        <td>Nom et Prénom</td>
        <td>
        <select name="idJoueur">
            	<option selected disabled>Choisissez un nom et prenom...</option>
                <?php 
                $nomInfos =$bd -> query("SELECT * FROM joueur");
                while($nomSql = $nomInfos->fetch()){
                    echo '<option value="'.$nomSql['nom'].'">'.$nomSql['nom'].'
                    '.$nomSql['prenom'].'</option>';
                }
                ?>  
            </select>
        </td>
    </tr>
    <tr>
        <td>Saison</td>
        <td>
            <input type="text" name="saison">
        </td>
    </tr>
  </table>
 <div class="pied-formulaire">
    <button type="submit" name="save">Enregistrer</button>
</div>
  </fieldset>
</form>


<div class="container">
	
<?php 

$infoSql = $bd->query("SELECT nom, prenom, saison, type, nomClub  FROM joueur, inscriptions, categorie, club WHERE inscriptions.idJoueur = joueur.id AND inscriptions.categorie = categorie.id AND inscriptions.idclub = club.id");

?>
    <table>...
        <tr class="en-tete">
        <th>NOM DU JOUEUR</th>
        <th>PRENOM DU JOUEUR</th>
        <th>SAISON</th>
        <th>CATEGORIE</th>
        <th>CLUB</th>
        </tr>
<?php 

while($donnees =  $infoSql->fetch()){

?>
        <tr class="corps-table">
            <td><?=  $donnees['nom'] ?></td>
            <td><?=  $donnees['prenom'] ?></td>
            <td><?=  $donnees['saison'] ?></td>
            <td><?=  $donnees['type'] ?></td>
            <td><?=  $donnees['nomClub'] ?></td>
        </tr>
<?php
}
?>
    </table>
</div>
</div>
</body>
</html>