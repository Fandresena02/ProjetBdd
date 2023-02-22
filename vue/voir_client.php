<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste logements</title>
    <link rel="stylesheet" href="../assets/css/logement.css">
</head>
<hr id="one">
<center>
    <h2>La liste des clients</h2>
</center>
<hr>

<header class="bande">
    <div class="table-wrapper">
        <table >
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($lesClients as $unClient)
            {
            ?>
                <tr>
                    <td><?php echo $unClient['nom'];?></td>
                    <td><?php echo $unClient['prenom'];?></td>
                    <td><?php echo $unClient['libelle'],", ",$unClient['cp'], " ", $unClient['ville'] ;?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</header>