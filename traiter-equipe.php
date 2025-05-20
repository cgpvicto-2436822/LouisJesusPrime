<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require('include/Configuration.inc');

if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
        $slogan = htmlspecialchars($_POST['slogan'], ENT_QUOTES);
        $commentaire = htmlspecialchars($_POST['commentaire'], ENT_QUOTES);
        $jeu = htmlspecialchars($_POST['jeu'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);

        if (!$pdo) {
            die("Erreur de connexion à la base de données.");
        }

        $requete3 = "INSERT INTO equipes (nom, slogan, commentaire, dateajout, jeu) VALUES (:nom, :slogan, :commentaire, :dateajout, :jeu)";
        $stmt = $pdo->prepare($requete3);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':slogan', $slogan);
        $stmt->bindParam(':commentaire', $commentaire);
        $stmt->bindParam(':dateajout', $date);
        $stmt->bindParam(':jeu', $jeu);

        if ($stmt->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "L'équipe a été ajoutée avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'ajout de l'équipe.";
            // Vous pouvez afficher l'erreur SQL pour le débogage si nécessaire
            // error_log("Erreur SQL: " . $stmt->errorInfo()[2]);
        }
        $stmt->closeCursor();
    }

    // La redirection doit se faire APRES le traitement du formulaire
    header('Location: .php');
    exit; // Assurez-vous d'arrêter l'exécution du script après la redirection

} else {
    // réagir si l'appel ne provient pas du formulaire
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    include ('entete.inc');
    echo "Veuillez accéder à cette page à partir du formulaire d'ajout d'équipe.";
    include ('pied_page.inc');
}

require('include/nettoyage.inc');
?>