<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    </head><?php include "navbar.php"; include "footer.php"; include "connectToBdd.php"; ?> 
    <body id="bodyformulaire">
        
        <div class="page">       
            <div class="container formulaire">
                <h2>Formulaire de connexion</h2>
                <form action="formulaire.php" method="post">
                <div class="form-group">
                     Identifiant: <input type="text"  name="identifiant" class="form-control" placeholder="Saisir l'identifiant">                
                     Mot de Passe:<input type="password" name="password" class="form-control" placeholder="Saisir le mot de passe" >
                </div>                
                 <button type="submit" action="index.php" class="btn btn-default seubmite">Soumettre</button>
                </form>
                
                <?php
                    if (isset($_POST["identifiant"]))
                    {
                        
                        $username = $_POST['identifiant'];
                        $password = $_POST['password'];

                        //mieux vaut faire une requéte préparé , elles sont plus sécurisées
                        $sqlRequete = "INSERT INTO utilisateurs (identifiant, motDePasse) VALUES (:identifiant, :description)";
                        $ajoutUser = $db -> prepare($sqlRequete);
                        $ajoutUser->execute([
                            'identifiant' => $username,
                            'description' => $password
                        ]);
                        echo 'instruction bien envoyée !';
                    }
                ?>
            </div>
        </div>     

        <?php include "footer.php" ;?> 
    </body>
</html>
