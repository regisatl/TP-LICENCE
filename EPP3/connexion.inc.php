<?php

    try
    {
        $bdd = new PDO ('mysql:host=localhost;dbname=essai','root','');
    }
    catch(PDOException $e)
    {
        die('Une erreur a été trouvée...'.$e->getMessage());
    }

?>