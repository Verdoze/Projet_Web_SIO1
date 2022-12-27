<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">

    <title>Page Armes</title>

  </head>
  <body>
    <?php include "navbar.php"; include "footer.php"; include "connectToBdd.php"; include "Arme.php"?>

    <?php //récupère l'id via l'URL lors du clic sur l'arme et génère l'objet de la classe Arme grâce aux données récupérés dans la BD
      if (isset($_GET['arme'])) { 
        
        $arme = $_GET['arme'];
        
        $sqlRequete = "SELECT * FROM armes WHERE idArme = :arme";
        $query = $db -> prepare($sqlRequete);
        $query->execute([
            ':arme' => $arme
        ]);
        $results = $query -> fetchAll();

        foreach ($results as $ligneArme)
        {
          $id = $ligneArme['idArme'];
          $name = $ligneArme['nomArme'];
          $degats = $ligneArme['degatsArme'];
          $valeur = $ligneArme['valeur'];
          $poids = $ligneArme['poids'];
          $typeArme = $ligneArme['typeArme'];
          $inGameId = $ligneArme['inGameID'];
          $imageSrc = $ligneArme['imgSource'];
          $description = $ligneArme['description'];
        }

        $currentArme = new Arme($id, $name, $degats, $valeur, $poids, $typeArme, $inGameId, $imageSrc, $description); //instanciation de l'arme choisie
      }

      
    ?>

    <div class="container-fluid" >
      <div id="titlebar">
          <p>Armes</p>
      </div>
    <div class="row navicon">
      <div class="col-sm-8"> <!-- zone contenant la séléction des armes-->
        <div class="col-sm-3 box">        
          <ul style="display:inline"> <p class="title_liste" > Armes légères <p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="page_armes.php?arme=1">Dague d'ébonite</a></p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme"href="http://localhost/projet_HTML/page_armes.php?arme=2">Epée de verre</a></p>
          </ul>
        </div>
        <div class="col-sm-3 box">
          <ul  style="display: inline"> <p class="title_liste"> Armes lourdes <p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=3">Hache d'armes d'acier</a></p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=4">Espadon elfique</a></p>
          </ul>      
        </div>
        <div class="col-sm-3 box">
          <ul style="display:inline"> <p class="title_liste"> Armes à distance <p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link" id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=5">Arc Falmer</a></p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=6">Arbalète Dwemer</a></p>
          </ul>      
        </div>
        <div class="col-sm-3 box">
          <ul> <p class="title_liste" > Artéfacts Daedriques <p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=7">le Wabbajak</a></p>
            <p  classe="liste_armes" style="display:inline"><a class="nav-link"  id="link_arme" href="http://localhost/projet_HTML/page_armes.php?arme=8">Aubéclat</a></p>
          </ul>     
        </div>
        <div class="texte_arme"><!-- zone contenant la description de l'arme --> 
        <p>
        <?php
              if (isset($currentArme)) {
                echo $currentArme->getDescription();
              } else {
                echo "Aucune arme sélectionnée";
              }
            ?>
        </p>
        </div>
    </div>
    <div class="col-sm-4 table tableau_arme" style="width:auto"> <!-- tableau d'informations sur la droite de la page -->
      <div style="text-align:center">
      <img class="img_arme"  src=
        <?php
        if (isset($currentArme)) {
          if($currentArme->getImageSrc() == NULL)
          {
            echo "Images/Skyrim_logo.jpg";
          }else
          {
            echo $currentArme->getImageSrc();
          }            
        } else 
        {
          echo "Images/Skyrim_logo.jpg" ;      
        }?>>
      </div>  
      <div class="row ">
      <div class="col-12">
        <p class="table; champ_table valeur_table">
          <?php
            if (isset($currentArme)) {
              echo $currentArme->getName();
            } else {
              echo "Aucune arme sélectionnée";
            }
          ?>
        </p>
      </div>
      </div>
      <div class="row ">
        <div class="col-4">
          <p class="table; champ_table valeur_table">
            <?php
                if (isset($currentArme)) {
                  echo $currentArme->getDegats();
                } else {
                  echo "";
                }
            ?>
          </p>
        </div>
        <div class="col-4">            
            <p class="table; champ_table valeur_table">
              <?php
                if (isset($currentArme)) {
                  echo $currentArme->getPoids();
                } else {
                  echo "";
                }
              ?>
            </p>
        </div>
        <div class="col-4">            
            <p class="table; champ_table valeur_table">
              <?php
                if (isset($currentArme)) {
                  echo $currentArme->getValeur();
                } else {
                  echo "";
                }
              ?>
            </p>
        </div>
      </div>
      <div class="row ">
        <div class="col-6">
          <p class="table; champ_table">Type d'arme:</p>
        </div>  
        <div class="col-6">
          <p class="table champ_table valeur_table">
          <?php
            if (isset($currentArme)) {
              echo $currentArme->getTypeArme();
            } else {
              echo "Aucune arme sélectionnée";
            }
          ?>
          </p>
        </div>        
      </div>
      <div class="row ">
        <div class="col-6">
          <p class="table; champ_table">ID:S</p>
        </div>  
        <div class="col-6">
          <p class="table; champ_table valeur_table">
          <?php
            if (isset($currentArme)) {
              echo $currentArme->getInGameId();
            } else {
              echo "Aucune arme sélectionnée";
            }
          ?>
          </p>
        </div>        
      </div>     
    </div>

  </body>
  </html>
