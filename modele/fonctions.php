<?php

function getLogement()
{
    include 'db_connect.php';
    
    $req = "select l.idLogement, pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commission, a.libelle from logement as l
    inner join proprietaire as p on p.idProp = l.idProprietaire
    inner join personne as pers on pers.idPersonne = p.idPersonne
    inner join adresse as a on a.idAdresse = l.idAdresse
    inner join agence as ag on ag.idAgence = l.idAgence";
    $res = $dbh -> prepare($req);
    $res -> execute();
    $data = $res -> fetchAll(PDO::FETCH_ASSOC);
    
    return ($data);
}
function getMaisonApart($typeLogement)
{
    include 'db_connect.php';
    
    $req1 = "select l.idLogement, pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commission, a.libelle from logement as l
    inner join proprietaire as p on p.idProp = l.idProprietaire
    inner join personne as pers on pers.idPersonne = p.idPersonne
    inner join adresse as a on a.idAdresse = l.idAdresse
    inner join agence as ag on ag.idAgence = l.idAgence
    where l.type = ?";
    $res1 = $dbh -> prepare($req1);
    $res1 -> bindParam(1,$typeLogement);
    $res1 -> execute();
    $data1 = $res1 -> fetchAll(PDO::FETCH_ASSOC);
    
    return ($data1);
}
function getunLogement($numero)
{
    include 'db_connect.php';
    $req2 = "select pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commission, a.libelle, a.ville, a.cp from logement as l
    inner join proprietaire as p on p.idProp = l.idnomProprietaire
    inner join personne as pers on pers.idPersonne = p.idPersonne
    inner join adresse as a on a.idAdresse = l.idAdresse
    inner join agence as ag on ag.idAgence = l.idAgence
    where l.idLogement = ?";
    $res2 = $dbh -> prepare($req2);
    $res2 -> bindParam(1,$numero);
    $res2 -> execute();
    $data2 = $res2 -> fetch(PDO::FETCH_ASSOC);

    return ($data2);
}

function getClient()
{
    include 'db_connect.php';

    $req5 = "select p.nom, p.prenom, p.autorise, a.libelle, a.cp, a.ville from personne as p
    inner join adresse as a on a.idAdresse = p.idAdresse";

    $res5 = $dbh -> prepare($req5);
    $res5 -> execute();
    $data3 = $res5 -> fetchAll(PDO::FETCH_ASSOC);
    return ($data3);
}

function getProprietaire()
{
    include 'db_connect.php';

    $req6 = "select a.idProp, p.nom, p.prenom from personne as p
    inner join proprietaire as a on a.idPersonne = p.idPersonne";

    $res6 = $dbh -> prepare($req6);
    $res6 -> execute();
    $data6 = $res6 -> fetchAll(PDO::FETCH_ASSOC);
    return ($data6);
}

function getAdresse()
{
    include 'db_connect.php';

    $req7 = "select a.idAdresse, a.libelle, a.cp, a.ville from adresse as a";

    $res7 = $dbh -> prepare($req7);
    $res7 -> execute();
    $data7 = $res7 -> fetchAll(PDO::FETCH_ASSOC);
    return ($data7);
}
function validerFiche($tableau)
{
    
    include 'db_connect.php';

    $req1 = "insert into logement (idnomProprietaire, type, nbPieces, surface, etatHabitation, objectifGestion, prixVenteLocation, dateDispo, commission, idAdresse, idAgence) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $res1 = $dbh -> prepare($req1);
    $res1 -> bindParam(1, $tableau[0]);
    $res1 -> bindParam(2, $tableau[1]);
    $res1 -> bindParam(3, $tableau[2]);
    $res1 -> bindParam(4, $tableau[3]);
    $res1 -> bindParam(5, $tableau[4]);
    $res1 -> bindParam(6, $tableau[5]);
    $res1 -> bindParam(7, $tableau[6]);
    $res1 -> bindParam(8, $tableau[7]);
    $res1 -> bindParam(9, $tableau[8]);
    $res1 -> bindParam(10, $tableau[9]);
    $res1 -> bindParam(11, $tableau[10]);
    $res1 -> execute(); 
}

function seConnecter($login, $mdp)
{
    include 'db_connect.php';
    $req9 = "select id, count(*) as nb from user where login = ? and mdp =? group by id";
    $res9 = $dbh -> prepare($req9);
    $res9 -> bindParam(1,$login);
    $res9 -> bindParam(2,$mdp);
    $res9 -> execute();
    $data4 = $res9-> fetch(PDO::FETCH_ASSOC);
    /*$nb = $data4['nb'];

    if ($nb > 0)
    {
        return "true";
    }else {
        return "false";
    }*/
    return($data4);
}

function connect($id)
{
    $_SESSION["id"] = $id;
}

function deconnexion()
{
    session_destroy();
    
}
?>