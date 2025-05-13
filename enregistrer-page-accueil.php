<?php
require('include/Configuration.inc');

if (!empty($_POST)) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $texte = htmlspecialchars($_POST['texte'], ENT_QUOTES);

        $requete = $pdo->prepare("UPDATE pages SET texte = $texte WHERE url = 'index.php'");

        $requete->bindParam(':texte', $texte);

        $resultat = $requete->execute();

        if ($resultat) {
            $_SESSION['message_operation'] = "Vous avez modifiez le texte avec succès!";
            $_SESSION['est_authentifie'] = true;
        }

        else {
            $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'enregistrement";
        }

    }
}
else{
    echo "<p class='message-erreur'>Nous sommes désolés, les équipes ne peuvent pas être affichées.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
}

header('Location: index.php');
exit;