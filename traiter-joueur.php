<?php
require('include/Configuration.inc');

if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
        $prenom = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
        $pseudo = htmlspecialchars($_POST['pseudo'], ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);

        if (!$pdo) {
            die("Erreur de connexion à la base de données.");
        }

        $requete3 = "INSERT INTO joueurs (nomfamille, prenom, pseudo, dateinscription, courriel) VALUES (:nomfamille, :prenom, :pseudo, :dateinscription, :courriel)";
        $stmt = $pdo->prepare($requete3);
        $stmt->bindParam(':nomfamille', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':dateinscription', $date);
        $stmt->bindParam(':courriel', $email);

        if ($stmt->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "Le joueur a été ajouté avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Oups, une erreur s'est produite lors de l'ajout du joueur.";
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
    echo "Veuillez accéder à cette page à partir du formulaire d'ajout de joueur.";
    include ('pied_page.inc');
}

require('include/nettoyage.inc');
?>