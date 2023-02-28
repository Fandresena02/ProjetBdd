<?php
session_start();
        include '../vue/header.php';
        require '../modele/fonctions.php';
 

if (!isset($_SESSION["is_loged"]))
{
    $_SESSION["is_loged"] = "false";
}

if(!isset($_REQUEST['action']))
{
    if (!isset($_SESSION["id"]))
    {
        $action = 'connexion';
    }
    else{
        $action = 'acceuil';
    }

}else 
{
    $action = $_REQUEST['action'];

    if ($action == 'validerConnexion')
        {
            if (isset ($_POST["login"]))
                {
                    $login = htmlspecialchars(isset($_POST['Email']))? $_POST['Email'] : '' ;
                    $mdp = htmlspecialchars(isset($_POST['Password']))? $_POST['Password'] : '' ;

                    $res = seConnecter($login, $mdp);

                    if (!is_array($res))
                        {
                            header("Location: ../vue/connexion.php");
                    } else{

                        $_SESSION['is_loged'] = "true";
                        connect($res['id']);
                        header("Location: index.php?action=accueil");
                            
                        }
                }

        }
}
            
if (!isset($_SESSION["id"]) && isset($_REQUEST['action']))
{
    $action ='connexion';
}


        switch ($action)
            {
                 case 'accueil':
                    include ("../vue/accueil.php");
                 break;
                case 'logement':
                    if (isset ($_POST["search"]))
                    {
                        $type = htmlspecialchars(isset($_POST['type']))? $_POST['type'] : '' ;
                        if($type == "tous") $lesLogements = getLogement();
                        else $lesLogements = getMaisonApart($type);
                    }else{
                        $lesLogements = getLogement();
                    }
                    include("../vue/voir_logement.php");
                    break;
                case 'client':
                    $lesClients = getClient();
                    include ("../vue/voir_client.php");
                    break;
                case 'detail' :
                    $numero = $_REQUEST['id'];
                    $unLogement = getunLogement($numero);
                    include ("../vue/unLogement.php");
                break;
                // case 'inscrire' :
                //     $numero = $_REQUEST['numero'];
                //     $lesAdherent = getAdherent();
                //     include ("../vues/inscrire.php");
                //     break;
                case 'valider' :
                    try{
                    if (isset ($_POST["save"]))
                        {
                
                            $idnomProprietaire = htmlspecialchars(isset($_POST['idnomproprietaire']))? $_POST['idnomproprietaire'] : '' ;
                            $type = htmlspecialchars(isset($_POST['type']))? $_POST['type'] : '' ;
                            $nbPieces = htmlspecialchars(isset($_POST['nbPieces']))? $_POST['nbPieces'] : '' ;
                            $surface = htmlspecialchars(isset($_POST['surface']))? $_POST['surface'] : '' ;
                            $etatHabitation= htmlspecialchars(isset($_POST['etatHabitation']))? $_POST['etatHabitation'] : '' ;
                            $objectifGestion= htmlspecialchars(isset($_POST['objectifGestion']))? $_POST['objectifGestion'] : '' ;
                            $prixVenteLocation= htmlspecialchars(isset($_POST['prix']))? $_POST['prix'] : '' ;
                            $dateDispo= htmlspecialchars(isset($_POST['date']))? $_POST['date'] : '' ;
                            $commition= htmlspecialchars(isset($_POST['commition']))? $_POST['commition'] : '' ;
                            $idAdresse= htmlspecialchars(isset($_POST['adresse']))? $_POST['adresse'] : '' ;

                          $tableau = array($idnomProprietaire, $type, $nbPieces, $surface, $etatHabitation, $objectifGestion, $prixVenteLocation, $dateDispo, $commition, $idAdresse, 1);

                        }
                        validerFiche($tableau);
                        header("Location: index.php?action=logement");
                        
                 } 
                   catch (Exception $e){
                       echo $e -> getMessage();
                }    
                break;
                case 'ajouter' :
                    $proprietaires = getProprietaire();
                    $adresses = getAdresse();
                     include ("../vue/ficheLogement.php");
                break;
                case 'connexion':
                    header("Location: ../vue/connexion.php");
                    break;

                case 'deconnexion':
                    deconnexion();
                    // $action = 'connexion';
                    header("Location: index.php");
                break;
                default : 
                    include ("../vue/accueil.php");
            }
        include '../vue/footer.php';
    ?>
