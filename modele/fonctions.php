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

    $req5 = "select pers.nom as nomAd, pers.prenom as prenomAd, c.jourHeure as date, 
    c.nbPlace as place, pers1.nom as nomProf, pers1.prenom as prenomProf, i.nomInstru as instru,
    ins.idAdherent as idAd, ins.idCours as idC
    from inscription ins
    inner join adherent as a on a.id = ins.idAdherent
    inner join cours as c on c.id = ins.idCours
    inner join professeur as prof on prof.id = c.idProfesseur
    inner join personnes as pers on pers.id = a.id
    inner join personnes as pers1 on pers1.id = prof.id
    inner join instrument as i on i.id = c.idInstrument";

    $res5 = $dbh -> prepare($req5);
    $res5 -> execute();
    $data3 = $res5 -> fetchAll(PDO::FETCH_ASSOC);
    /*var_dump($data3);*/
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