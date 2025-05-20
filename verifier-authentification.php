<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require('include/Configuration.inc');

if (!empty($_POST)) {
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
            $usager = $resultat->fetch(PDO::FETCH_ASSOC);

            if ($usager)
            {
                if ($code === $usager['code'])
                {
                    $codeOk = true;
                }

                if (password_verify($mdp, $usager['motdepasse']))
                {
                    $mdpOk = true;
                }

                if ($usager['actif'])
                {
                    $actifOk = true;
                }

                if ($codeOk && $mdpOk && $actifOk)
                {
                    $_SESSION['message_operation'] = "Vous avez été connecté avec succès " . $usager['prenom'] . " " . $usager['nomfamille'] . "!";
                    $_SESSION['est_authentifie'] = true;
                    header('Location: index.php');
                } else {
                    $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'authentification";
                }
            } else {
                $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'authentification";
            }
        }
        catch (PDOException $e)
        {
            echo "<p class='message-erreur'>Nous sommes désolés, les équipes ne peuvent pas être affichées.</p>";
            error_log("Erreur PDO: " . $e->getMessage());
        }
    }
}
exit;