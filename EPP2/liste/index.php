<?php 
 
try {
    # code...
    $bd = new PDO ('mysql:localhost=host; dbname=projets; charset=utf8;', 'root', '');
} catch (Exception $e) {
    # code...
    die('Une erreur est survenue:' . $e->getMessage());
}

$insertInfosProjet = $bd->query("SELECT * FROM projet");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Liste</title>
</head>
<body>
<div class="table">
    <table>
        <thead>
            <th>ID DU PROJET</th>
            <th>CODE DU PROJET</th>
            <th>NOM DU PROJET</th>
            <th>DATE DE LANCEMENT</th>
            <th>DUREE</th>
            <th>LOCALITE</th>
            <th>ACTION</th>
        </thead>
        <tbody>
        <?php 
     while($key = $insertInfosProjet->fetch()){
    ?>
    <tr>
        <td><?= $key['idProjet'];?></td>
        <td><?= $key['codeProjet'];?></td>
        <td><?= $key['nomProjet'];?></td>
        <td><?= $key['dateLancement'];?></td>
        <td><?= $key['duree'];?></td>
        <td><?= $key['nomLocalite'];?></td>
        <td><a class="button" href="../modifier/?idProjet=<?= $key['idProjet'];?>">MODIFIER</a></td>
    </tr>
<?php
}
?>
        </tbody>
    </table>
</div>
    
</body>
</html>