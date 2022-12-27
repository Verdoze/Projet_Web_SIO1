<?php 
    include "page_persos.php"; include "connectToBdd.php"
?>
<?php 
    $neloth = $db->prepare('SELECT * FROM personnages WHERE idPerso=1');
    //execution de la requéte
    $neloth->execute();
    $result = $neloth->fetchAll();                    
?>
<div class="row ">        
                
    <?php
        if (isset ($result['prenomPerso'])):
            echo "<p " .$result['prenomPerso']. "</p>";

        else :
            echo "non défini";
    ?>
                               
</div>