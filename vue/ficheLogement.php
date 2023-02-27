<center><h2>Fiche logement</h2></center>
<section>
    <form method="post" action="../controlleur/index.php?action=valider">
        <div class="row gtr-uniform">
            <div class="col-6">
                <select name="idnomproprietaire" id="demo-category">
                <?php foreach($proprietaires as $unproprietaire) 
                        {
                    ?>
                
                <option value="<?php echo $unproprietaire['idProp'];?>"><?php echo $unproprietaire['idProp'],"- ",$unproprietaire['nom']," ",$unproprietaire['prenom'];?></option>
                
                <?php
                            } 
                ?>
                </select>
            </div>
            <div class="col-6">
                <select name="objectifGestion" id="demo-category">
                    <option value="vente">Vente</option>
                    <option value="location">Location</option>
                </select>
            </div>
            <div class="col-4 col-12-xsmall">
            <select name="type" id="demo-category">
                    <option value="maison">Maison</option>
                    <option value="appartement">Appartement</option>
            </select>
            </div>
            <div class="col-4 col-12-xsmall">
                <input type="number" name="nbPieces" id="demo-email" placeholder="Nombre de pièces" required/>
            </div>
            <div class="col-4 col-12-xsmall">
                <input type="number" name="surface" id="demo-email" placeholder="Surface en m²" required/>
            </div>
            <div class="col-4 col-12-xsmall">
            <select name="etatHabitation" id="demo-category">
                <option value="neuf">Neuf</option>
                <option value="très bon état">Très bon état</option>
                <option value="bon état">Bon état</option>
                <option value="à renover">A rénover</option>
            </select>
            </div>
            <div class="col-4 col-12-xsmall">
                <input type="number" name="prix" id="demo-name" placeholder="Prix de vente ou location (en €)" required/>
            </div>
            <div class="col-4 col-12-xsmall">
                <input type="number" name="commition" id="demo-name" placeholder="Commition (en €)" required/>
            </div>
            <div class="col-6">
            <select name="adresse" id="demo-category">
                <?php foreach($adresses as $uneadresse) 
                        {
                    ?>
                
                <option value="<?php echo $uneadresse['idAdresse'];?>"><?php echo $uneadresse['libelle']," ", $uneadresse['cp']," ",$uneadresse['ville'];?></option>
                
                <?php
                            } 
                ?>
            </select>
            </div>
            <div class="col-6">
            <input type="date" name="date" id="demo-name" placeholder="Date de disponibilité" required/>
            </div>
            <div class="col-12">
                <ul class="actions">
                    <center><li><input type="submit" value="Ajouter logement" name = "save" class="primary" /></li></center>
                </ul>
            </div>
        </div>
    </form>
</section>