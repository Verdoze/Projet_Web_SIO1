<?php 
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=bdd_site_skyrim;charset=utf8',
            'root');
        }
        catch (Exception $e)
        {
            die('Erreur :' . $e->getMessage());
        }

        $database = "bdd_site_skyrim";
?>