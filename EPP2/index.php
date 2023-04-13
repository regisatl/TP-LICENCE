<?php 
try {
    # code...
    $bd = new PDO ('mysql:localhost=host; dbname=projets; charset=utf8;', 'root', '');
} catch (Exception $e) {
    # code...
    die('Une erreur est survenue:' . $e->getMessage());
}

if(isset($_POST['valider'])){
    if(!empty($_POST['codeProjet']) AND !empty($_POST['nomProjet']) AND !empty($_POST['dateLancement']) AND !empty($_POST['duree']) AND !empty($_POST['nomLocalite'])){
 
         $code = $_POST['codeProjet'];
         $nom = $_POST['nomProjet'];
         $date = $_POST['dateLancement'];
         $duree = $_POST['duree'];
         $localite = $_POST['nomLocalite'];
 
        
         $insertInfosProjet = $bd->prepare("INSERT INTO projet(codeProjet, nomProjet, dateLancement, duree, nomLocalite) VALUES (?, ?, ?, ?, ?)");
         $insertInfosProjet->execute(array($code, $nom, $date, $duree, $localite));
 
         echo '<span style="color:green;"Informations du projet enregistrée avec succès</span>';
 
     }else{
         echo '<span style="color:red;" Veuillez remplir les champs vide</span>';
     }
     header('Location: ../liste/');
 }
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Formulaire</title>
</head>
<body>
    
<div class="formulaire">
    <form action="" method="POST">
        <fieldset>
        <table class="tableau">
            <h1>SAISIE DES PROJETS</h1>
            <tr>
            <td class="titre">Code du Projet</td>
            <td class="titreInput"><input type="text" name="codeProjet" placeholder="XXXXXX"></td>
            </tr>
            <tr>
            <td class="titre">Nom du projet</td>
            <td class="titreInput"><input type="text" name="nomProjet" placeholder="XXXXXX"></td>
        </tr>
           <tr>
           <td class="titre">Date du lancement</td>
            <td class="titreInput"><input type="text" name="dateLancement" placeholder="XXXXXX"></td>
           </tr>
           <tr>
           <td class="titre">Durée</td>
            <td class="titreInput"><input type="text" name="duree" placeholder="XXXXXX"></td>
           </tr>
           <tr>
           <td class="titre">Localité</td>
            <td class="titreInput">
                <select name="nomLocalite" id="">
                    <option selected disabled value="">...</option>
<?php 
      $insertInfosProjet = $bd->query('SELECT * FROM localite');

      while($nomInfos = $insertInfosProjet->fetch()){

        echo '<option value="'.$nomInfos['nomLocalite'].'">'.$nomInfos['nomLocalite'].'</option>';
      }
?>
                </select>
            </td>
           </tr>
           <tr>
            <td><button type="submit" name="valider">Soumettre</button></td>
            <td><button type="reset" class="btn">Annuler</button></td>
           </tr>
            </table>
        </fieldset>
    </form>
</div>

</body>
</html>