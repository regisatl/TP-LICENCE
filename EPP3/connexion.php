<?php

    include 'connexion.inc.php';

    if (isset($_POST['send'])) 
    {
        if (empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['filiere'])) 
        {
            echo '<span style="color: red;">Nom, prénom et filière sont obligatoires</span>';
        }
        else 
        {
            $save = $bdd->prepare('INSERT INTO candidat(nom,prenom,datnais,ville,sexe,codfil) VALUES (?,?,?,?,?,?)');
            $save->execute(array($_POST['nom'],$_POST['prenom'],$_POST['datnais'],$_POST['ville'],$_POST['sexe'],$_POST['filiere']));
            echo '<span style="color: green;">Enregistrement du effectuer avec succès</span>';
        }
    }

?>