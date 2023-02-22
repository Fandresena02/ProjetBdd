<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste logements</title>
    <link rel="stylesheet" href="../assets/css/logement.css">
</head>


<header class="style1" id="one">
    <center>
	    <h2>Voici la liste des logements</h2>
    </center>
<button onclick="myFunction()">Click me</button>
</header><hr>
    <div id="demo"></div>
<section class="cards-wrapper">
<?php
 
    foreach($lesLogements as $list_logement)
    {
?>
            <div class="card-grid-space">
                <a class="card" href="../controlleur/index.php?action=detail&id=<?php echo $list_logement['idLogement'];?>" style="--bg-img: url(https://pichet.twic.pics/var/site/storage/images/_aliases/product_item/4/0/5/1/971504-1-fre-FR/f7edd2a36461-Teasing_vignette_690x380.jpg)">
                <div>
                    <h2><?php echo $list_logement['type'], " " ,$list_logement['surface'];?> m²</h2>
                    <p>Propriétaire : <?php echo $list_logement['nom']," ", $list_logement['prenom'];?> </p>
                    <p><?php echo $list_logement['nbPieces'];?> pièces, <?php echo $list_logement['prixVenteLocation'];?>€</p>
                    <div class="date"><?php echo $list_logement['dateDispo'];?></div>
                    <div class="tags">
                    <div class="tag">En savoir plus</div>
                    </div>
                </div>
                </a>
            </div>
       
   
            <!-- <?php echo $list_logement['etatHabitation'];?>
            
            <?php echo $list_logement['commition'];?>€
            <?php echo $list_logement['libelle'];?> -->
            <!-- <td><a href="index.php?action=inscrire&numero=<?php echo $list_Cours['id'];?>">S'inscrire</a></td> -->

<?php
    }
?>
 </section>
</html>