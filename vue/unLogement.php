<link rel="stylesheet" href="../assets/css/detail.css">
<body>
<main class="container">
 
  <!-- Left Column / Headphones Image -->
  <div class="left-column">
    <img src="../images/logo.webp" alt="">
  </div>
 
 
  <!-- Right Column -->
  <div class="right-column">
 
    <!-- Product Description -->
    <div class="product-description">
      <span><?php echo $unLogement['surface'];?>m²</span>
      <h1><?php echo $unLogement['type'];?></h1>
      <p><?php echo $unLogement['libelle'],", ",$unLogement['cp']," ",$unLogement['ville'];?></p><br>
      <p><?php ;?></p>
    </div>
 
    <!-- Product Configuration -->
    <div class="product-configuration">
  
      <!-- Cable Configuration -->
        <div class="cable-config">
            <span>Configuration du logement</span>
    
            <div class="cable-choose">
                <button><?php echo $unLogement['nbPieces'];?> pièces</button>
                <button><?php echo $unLogement['dateDispo'];?></button>
                <button><?php echo $unLogement['etatHabitation'];?></button>
            </div>
 
            <a href="#">Comment réserver?</a>
        </div>
    </div>
 
    <!-- Product Pricing -->
    <div class="product-price">
      <span>Prix: <?php echo $unLogement['prixVenteLocation'];?>€</span>
      <a href="../controlleur/index.php?action=logement#one" class="cart-btn">Retour à la liste</a>
    </div>
  </div>
</main>
</body>