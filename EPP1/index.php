<?php
session_start();
require('connexion/connexion.php');

if(isset($_POST['connecte'])){
	if (!empty($_POST['nom']) and !empty($_POST['mdp'])) {

	$nom = htmlspecialchars($_POST['nom']);
	$mdp = htmlspecialchars($_POST['mdp'], PASSWORD_DEFAULT);

	$checkIfUsersAlreadyExists = $bd->prepare("INSERT INTO login (nom, mdp) VALUES(?, ?)");
	$checkIfUsersAlreadyExists ->execute(array($nom, $mdp));
    
    $checkIfUsersAlreadyExists = $bd ->prepare('SELECT * FROM login WHERE nom = ?');
    $checkIfUsersAlreadyExists -> execute(array($nom));

       
    if($checkIfUsersAlreadyExists ->rowCount() > 0){

     
    $usersInfos = $checkIfUsersAlreadyExists->fetch();

    if(password_verify($mdp, $usersInfos['mdp'])){

     
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $usersInfos['id'];
    $_SESSION['nom'] = $usersInfos['nom'];
   
    header('Location: menuFBF/');


        }else{
      
        $errorMsg="Votre mot de passe est incorrect...";
        }

        }else{
        
        $errorMsg="Votre nom est incorrect...";
         }  

        }else{
       
        $errorMsg="Veuillez complèter tous les champs...";
        }
        }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/logins.css">
	<link rel="icon" type="text/css" href="../images/logo.jpg">
</head>
<body>

<div class="container">
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
	<form action="" method="POST">
		<div class="tete">
			<h2>Connectez vous</h2>
		</div>
		<div class="corps">
			<div class="group">
				<label for="nom">Nom:</label>
				<input type="text" name="nom" placeholder="nom...">
			</div>
			<div class="group">
				<label for="mdp">Mot de passe:</label>
				<input type="password" name="mdp" placeholder="Mot de passe...">
			</div>
		</div>
		<div class="pied">
			<button type="submit" name="connecte">Connexion</button>
		</div>
	</form>
	
</div>


</body>
</html>