<?php

require('../connexion/connexion.php');

if(isset($_POST['valider'])){

		$nom = htmlspecialchars($_POST['nom']);
		$prenom =htmlspecialchars($_POST['prenom']);
		$datNais = htmlspecialchars($_POST['datNais']);
		$ville = htmlspecialchars($_POST['ville']);

		$insertInfos = $bd -> prepare ('INSERT INTO joueur (nom, prenom, datNais, ville) VALUES (?, ?, ?, ?)');
		$insertInfos ->execute(array($nom, $prenom, $datNais, $ville));

		$successMsg = "Vos données ont été bien envoyés"; 
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
	<title>Joueur</title>
	<link href="../images/logo.jpg" rel="icon">
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
  <div class="tete-formulaire">
  	 <legend class="titre-formulaire">
   		<h2>Enregistrement des joueurs</h2>
   	</legend>
  </div> 
  
   <div class="corps-formulaire">
   	 <div class="form-group">
      <label for="nom">Nom:</label>
      <input type="text" placeholder="Entrer votre nom" name="nom" required="">
    </div>
     <div class="form-group">
      <label for="prenom">Prénom:</label>
      <input type="text" placeholder="Entrer votre prénom" name="prenom" required="">
    </div>
      <div class="form-group">
      <label for="date">Date de Naissance:</label>
      <input type="date" placeholder="Entrer votre date de naissance" name="datNais" required="">
    </div>
     <div class="form-group">
      <label for="ville">Ville:</label>
      <input type="text" placeholder="Entrer votre ville" name="ville" required="">
    </div>
   </div>
 <div class="pied-formulaire">
    <button type="submit" name="valider">Enregistrer</button>
</div>
  </fieldset>
</form>
</div>

<div class="container">
	
<?php 

$insertInfos = $bd->query('SELECT * FROM joueur');

?>
    <table>
        <tr class="en-tete">
        <th>Numéro</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de Naissance</th>
        <th>Ville</th>
        </tr>
<?php 

while($donnees = $insertInfos->fetch()){

?>
        <tr class="corps-table">
            <td><?=  $donnees['id'] ?></td>
            <td><?=  $donnees['nom'] ?></td>
            <td><?=  $donnees['prenom'] ?></td>
            <td><?=  $donnees['datNais'] ?></td>
            <td><?=  $donnees['ville'] ?></td>
        </tr>
<?php

}

?>
    </table>
</div>
</body>
</html>