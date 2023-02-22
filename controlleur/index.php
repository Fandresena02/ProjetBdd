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
                     $lesLogements = getLogement();
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
                // case 'supprimer' :
                //     $num = $_REQUEST['numeroInscription'];
                //     supprimerInscription($num);
                //     header('Location: index.php?action=inscriptions');
                //     break;
                // case 'voirPdf' :
                //     $lesInscriptions = getInscription();
                //     $num = $_REQUEST['numeroInscription'];
                //     $uneInscription = $lesInscriptions[$num];
                //    // var_dump($uneInscription);
                //     include ("../vues/voir_pdf.php");

                //     $pdf = creerPdf($uneInscription);
                //     break;
                // case  'validerInscription' :
                //     try{
                //         if (isset ($_POST["save"]))
                //         {
                
                //             $nom = htmlspecialchars(isset($_POST['nom']))? $_POST['nom'] : '' ;
                //             $prenom = htmlspecialchars(isset($_POST['prenom']))? $_POST['prenom'] : '' ;
                //             $tel = htmlspecialchars(isset($_POST['tel']))? $_POST['tel'] : '' ;
                //             $adresse = htmlspecialchars(isset($_POST['adresse']))? $_POST['adresse'] : '' ;
                //             $mail= htmlspecialchars(isset($_POST['mail']))? $_POST['mail'] : '' ;
                //             $numero= htmlspecialchars(isset($_POST['numero']))? $_POST['numero'] : '' ;

                //             $tableau = array($nom, $prenom, $tel, $adresse, $mail, $numero);

                //         }
                //         validerInscription($tableau);
                //         include("../vues/confirmeInscription.php");
                        
                //     } 
                //     catch (Exception $e){
                //         echo $e -> getMessage();
                //     }                   
                //     break;
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
