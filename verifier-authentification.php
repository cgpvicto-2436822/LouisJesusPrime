<?php
require('include/Configuration.inc');

if (!empty($_POST)) {
// traiter le formulaire
// effectuer ensuite une redirection vers une autre page

    $codeOk = false;
    $mdpOk = false;
    $actifOk = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $code = htmlspecialchars($_POST['code'], ENT_QUOTES);
    $mdp = htmlspecialchars($_POST['motdepasse'], ENT_QUOTES);

    $requete = "SELECT code, motdepasse, actif, prenom, nomfamille FROM usagers WHERE code = '$code'";
    try
    {
        $resultat = $pdo->query($requete);

        if ($resultat)
        {
            while ($enreg = $resultat->fetch(PDO::FETCH_ASSOC))
            {
                if ($code === $enreg['code'])
                {
                    $codeOk = true;
                }
                else
                {
                    $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'authentification";
                }
                if (password_verify($mdp, $enreg['motdepasse']))
                {
                    $mdpOk = true;
                }
                else
                {
                    $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'authentification";
                }
                if ($enreg['actif'])
                {
                    $actifOk = true;
                }
                else
                {
                    $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'authentification";
                }

                if ($codeOk && $mdpOk && $actifOk)
                {
                    $_SESSION['message_operation'] = "Vous avez été connecté avec succès " . $enreg['prenom'] . " " . $enreg['nomfamille'] . "!";
                    $_SESSION['est_authentifie'] = true;
                    header('Location: index.php');
                    exit;
                }
            }
        }
    }

    catch (PDOException $e)
    {
        echo "<p class='message-erreur'>Nous sommes désolés, les équipes ne peuvent pas être affichées.</p>";
        error_log("Erreur PDO: " . $e->getMessage());
    }
}}