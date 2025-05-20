<?php
require('include/Configuration.inc');
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $score = intval(htmlspecialchars($_POST['score'], ENT_QUOTES));
        $rang = intval(htmlspecialchars($_POST['rang'], ENT_QUOTES));
        $equipe = htmlspecialchars($_POST['equipe'], ENT_QUOTES);
        $date = htmlspecialchars($_POST['date'], ENT_QUOTES);

        if (!$pdo) {
            die("Erreur de connexion à la base de données.");
        }

        $requete3 = "INSERT INTO resultats (equipe_id, rang, score_final, date_partie) VALUES (:equipe, :rang, :score, :date)";
        $stmt = $pdo->prepare($requete3);
        $stmt->bindParam(':equipe', $equipe);
        $stmt->bindParam(':rang', $rang, PDO::PARAM_INT);
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);
        $stmt->bindParam(':date', $date);

        if ($stmt->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "La demande a été effectuée avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "Oups...!";
            // Vous pouvez afficher l'erreur SQL pour le débogage si nécessaire
            // error_log("Erreur SQL: " . $stmt->errorInfo()[2]);
        }
        $stmt->closeCursor();
    }
} else {
    // réagir si l'appel ne provient pas du formulaire
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    include ('entete.inc');
    echo "Veuillez accéder à cette page à partir du formulaire.";
    include ('pied_page.inc');
}

// *** protection XSS ******************************************************************
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur, ENT_QUOTES);
}

require('include/nettoyage.inc');
?>