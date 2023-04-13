<?php 
try {
    # code...
    $bd = new PDO ('mysql:localhost=host; dbname=projets; charset=utf8;', 'root', '');
} catch (Exception $e) {
    # code...
    die('Une erreur est survenue:' . $e->getMessage());
}



if(isset($_GET['idProjet'])){
         
    $id = $_GET['idProjet'];
    $recupInfosProjet =  $bd ->prepare("SELECT * FROM projet WHERE idProjet = ?");
    $recupInfosProjet->execute(array($id));

    $sql = $recupInfosProjet->fetch();


if(isset($_POST['valider'])){
    $newCode = $_POST['codeProjet'];
    $newName = $_POST['nomProjet'];
    $newDate = $_POST['dateLancement'];
    $newDuree = $_POST['duree'];
    $newLocalite = $_POST['nomLocalite'];

    $sqlInfos = $bd->prepare("UPDATE projet SET codeProjet = ?, nomProjet = ?, dateLancement0 = ?, duree = ?, nomLocalite = ? WHERE idProjet = ?");
    $sqlInfos->execute(array($newCode, $newName, $newDate, $newDuree, $newLocalite, $id));

    echo  "Modification effectuée avec succès";

    header('Location: ../liste/');
}

}
 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
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
            <td class="titreInput"><input type="text" name="codeProjet" value="<?= $sql['codeProjet'];?>"></td>
            </tr>
            <tr>
            <td class="titre">Nom du projet</td>
            <td class="titreInput"><input type="text" name="nomProjet" value="<?= $sql['nomProjet'];?>"></td>
        </tr>
           <tr>
           <td class="titre">Date du lancement</td>
            <td class="titreInput"><input type="text" name="dateLancement" value="<?= $sql['dateLancement'];?>"></td>
           </tr>
           <tr>
           <td class="titre">Durée</td>
            <td class="titreInput"><input type="text" name="duree" value="<?= $sql['duree'];?>"></td>
           </tr>
           <tr>
           <td class="titre">Localité</td>
            <td class="titreInput">
                <select name="nomLocalite" id="">
                <?php 
      $RecupInfosProjet = $bd->query('SELECT * FROM localite');

      while($nomsInfos = $RecupInfosProjet->fetch()){

        echo '<option value="'.$nomsInfos['nomLocalite'].'">'.$nomsInfos['nomLocalite'].'</option>';
      }
?>
                </select>
            </td>
           </tr>
           <tr>
            <td><button type="submit" name="valider">Modifier</button></td>
           </tr>
            </table>
        </fieldset>
    </form>
</div>

</body>
</html>