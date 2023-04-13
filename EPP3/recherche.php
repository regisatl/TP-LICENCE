<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
</head>
<body>
<fieldset>
      <form action="recherche.php" method="POST">
          <h3>Rechercher les candidats d'une filière</h3>
          <table>
              <tr>
                  <td>Dans la filière:</td>
                  <td>
                      <select name="filiere">
                          <option value="AGE">AGE</option>
                          <option value="AGRO">AGRO</option>
                          <option value="RIT">RIT</option>
                          <option value="SIL">SIL</option>
                      </select>
                  </td>
              </tr>
              <tr>
                  <td>Envoyer</td>
                  <td><input type="submit" name="envoyer" value="Ok"></td>
              </tr>
          </table>
      </form>
  
<h5> LISTE DES CANDIDATS </h5>
            <table style="border: 1px solid black;">
                <tr>
                    <td style="border: 1px solid black;">NOM</td>
                    <td style="border: 1px solid black;">PRENOM</td>
                    <td style="border: 1px solid black;">SEXE</td>
                </tr>

            <?php
                include_once('connexion.inc.php');
                if (isset($_POST['envoyer'])) 
                {
                    if (empty($_POST['filiere']))
                    {
                        echo '<span style="color: red;"> Indiquez la filière svp </span>';
                    }
                    else 
                    {
                        $requet = $bdd->prepare('SELECT * FROM candidat WHERE codfil=?');
                        $requet->execute(array($_POST['filiere']));
                        $filieres = $requet->fetchAll();
                        foreach ($filieres as $filiere) 
                        {
            ?>


                    <tr>
                        <td style="border: 1px solid black;"><?php echo $filiere['nom'] ?></td>
                        <td style="border: 1px solid black;"><?php echo $filiere['prenom'] ?></td>
                        <td style="border: 1px solid black;"><?php echo $filiere['sexe'] ?></td>
                    </tr>
            <?php
                        }
                    }
                }
            ?>
            </table>
            </fieldset>
</body>
</html>
          