<?php
require('include/Configuration.inc');

if (!empty($_POST)) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $code = htmlspecialchars($_POST['code'], ENT_QUOTES);
        $mdp = htmlspecialchars($_POST['motdepasse'], ENT_QUOTES);

        $requete = "SELECT code, motdepasse, actif, prenom, nomfamille FROM usagers WHERE code = '$code'";
        try {
            $resultat = $pdo->query($requete);
            $utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);

            if ($utilisateur) {
                if ($code === $utilisateur['code']) {
                    if (password_verify($mdp, $utilisateur['motdepasse'])) {
                        if ($utilisateur['actif']) {
                            $_SESSION['message_operation'] = "Vous avez été connecté avec succès " . $utilisateur['prenom'] . " " . $utilisateur['nomfamille'] . "!";
                            $_SESSION['est_authentifie'] = true;
                            // Effectuer ici la redirection vers la page souhaitée après la connexion
                            // header('Location: page_apres_connexion.php');
                            exit(); // Assurez-vous de terminer le script après la redirection
                        } else {
                            $_SESSION['message_operation'] = "Votre compte est inactif.";
                        }
                    } else {
                        $_SESSION['message_operation'] = "Mot de passe incorrect.";
                    }
                } else {
                    $_SESSION['message_operation'] = "Code d'utilisateur incorrect.";
                }
            } else {
                $_SESSION['message_operation'] = "Aucun utilisateur trouvé avec ce code.";
            }
        } catch (PDOException $e) {
            echo "<p class='message-erreur'>Nous sommes désolés, une erreur s'est produite lors de la vérification.</p>";
            error_log("Erreur PDO: " . $e->getMessage());
        }
    }
}

header('Location: index.php');
exit;