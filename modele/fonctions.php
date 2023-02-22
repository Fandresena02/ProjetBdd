<?php

function getLogement()
{
    include 'db_connect.php';
    
    $req = "select l.idLogement, pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commition, a.libelle from logement as l
    inner join proprietaire as p on p.idProp = l.idnomProprietaire
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
    
    $req1 = "select l.idLogement, pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commition, a.libelle from logement as l
    inner join proprietaire as p on p.idProp = l.idnomProprietaire
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
    $req2 = "select pers.nom, pers.prenom, l.type, l.nbPieces, l.surface, l.etatHabitation, l.objectifGestion, l.prixVenteLocation, l.dateDispo, l.commition, a.libelle, a.ville, a.cp from logement as l
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

function seConnecter($login, $mdp)
{
    include 'db_connect.php';
    $req9 = "select id, count(*) as nb from user where login = ? and mdp =?";
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