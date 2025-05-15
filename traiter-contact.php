<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require('include/Configuration.inc');

if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $sujet = htmlspecialchars($_POST['sujet'], ENT_QUOTES);

    if (!$pdo) {
        die("Erreur de connexion à la base de données.");
    }

    $requete2 = "INSERT INTO contacts (nom, message, email, sujet) VALUES (:nom, :message, :email, :sujet)";
    $stmt = $pdo->prepare($requete2);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':sujet', $sujet);

    if ($stmt->execute()) {
        $_SESSION['operation_reussie'] = true;
        $_SESSION['message_operation'] = "Votre message a été envoyé avec succès !";
    } else {
        $_SESSION['operation_reussie'] = false;
        $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'envoi du message.";
        // Vous pouvez afficher l'erreur SQL pour le débogage si nécessaire
        // error_log("Erreur SQL: " . $stmt->errorInfo()[2]);
    }
    $stmt->closeCursor();
    }

    header('Location: index.php');
    exit; // Assurez-vous d'arrêter l'exécution du script après la redirection

} else {
    // réagir si l'appel ne provient pas du formulaire
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    include ('entete.inc');
    echo "Veuillez accéder à cette page à partir du formulaire de contact.";
    include ('pied_page.inc');
}

require('include/nettoyage.inc');
?>
