<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

    <title>Page personnages</title>   

  </head>
  <body>
    <?php include "navbar.php"; include "footer.php"; include "connectToBdd.php"; include "Personnage.php"; ?>
    <?php
      if (isset($_GET['perso'])) {
        
        $perso = $_GET['perso'];
        
        $sqlRequete = "SELECT * FROM personnages WHERE idPerso = :perso";
        $query = $db -> prepare($sqlRequete);
        $query->execute([
            ':perso' => $perso
        ]);
        $results = $query -> fetchAll();

        foreach ($results as $lignePerso)
        {
          $id = $lignePerso['idPerso'];
          $surname = $lignePerso['nomPerso'];
          $name = $lignePerso['prenomPerso'];
          $race = $lignePerso['racePerso'];
          $classe = $lignePerso['classe'];
          $inGameId = $lignePerso['inGameID'];
          $imageSrc = $lignePerso['imageSource'];
          $description = $lignePerso['descriptionPerso'];
        }

        $currentPerso = new Personnage($id, $name, $surname, $race, $classe, $inGameId, $imageSrc, $description);
      }
    ?>

    <div class="container" >
      <div class="row">
      <div class="col-8" >
        <div class="liste_persos">
        <ul>
         <li><a class="nav-link" href="http://localhost/projet_HTML/page_persos.php?perso=1">Néloth</a></li>
         <li><a class="nav-link" href="http://localhost/projet_HTML/page_persos.php?perso=2">Ralof</a></li>
          <li><a class="nav-link" href="http://localhost/projet_HTML/page_persos.php?perso=3">Ulfric Sombrage</a></li>
          <li><a class="nav-link" href="http://localhost/projet_HTML/page_persos.php?perso=4">Général Tullius</a></li>
       </ul>
       </div>
       <div class="texte-perso">
        <p>
        <?php
              if (isset($currentPerso)) {
                echo $currentPerso->getDescription();
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
        </p>
        </div>
      </div>      
      <div class="col-4 table">
        <img class="img_persos" src=
          <?php
          if (isset($currentPerso)) {
            if($currentPerso->getImageSrc() == NULL)
            {
              echo "Images/Skyrim_logo.jpg";
            }else
            {
              echo $currentPerso->getImageSrc();
            }            
          } else 
          {
            echo "Images/Skyrim_logo.jpg" ;      
          }?>>
        <div class="row ">
          <div class="col-6">
          <p class="table; champ_table">Prénom:</p>
        </div>
        <div class="col-6">
          <p class="table; champ_table">
            <?php
              if (isset($currentPerso)) {
                echo $currentPerso->getName();
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
          </p>
        </div>
        </div>
        <div class="row ">
          <div class="col-6"> 
            <p class="table; champ_table">Affiliation:</p>
          </div>
          <div class="col-6">            
              <p class="table; champ_table">
              <?php
              if (isset($currentPerso)) {
                if ($currentPerso->getSurname() == NULL) {
                  echo "Inconnu";
                } else {
                  echo $currentPerso->getSurname();
                }
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
              </p>
          </div>
        </div>
        <div class="row ">
          <div class="col-6">
            <p class="table; champ_table">Race:</p>
          </div>  
          <div class="col-6">
            <p class="table; champ_table">
            <?php
              if (isset($currentPerso)) {
                echo $currentPerso->getRace();
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
            </p>
          </div>        
        </div>
        <div class="row ">
          <div class="col-6">
            <p class="table; champ_table">Classe de combat:</p>
          </div>  
          <div class="col-6">
            <p class="table; champ_table">
            <?php
              if (isset($currentPerso)) {
                echo $currentPerso->getClasse();
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
            </p>
          </div>        
        </div>
        <div class="row ">
          <div class="col-6">
            <p class="table; champ_table">ID:</p>
          </div>  
          <div class="col-6">
            <p class="table; champ_table">
            <?php
              if (isset($currentPerso)) {
                echo $currentPerso->getInGameId();
              } else {
                echo "Aucun personnage sélectionné";
              }
            ?>
            </p>
          </div>        
        </div>     
        
    </div>
  </div>

  </body>
  </html>