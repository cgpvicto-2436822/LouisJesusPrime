<?php
require('include/Configuration.inc');


if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page
    header('Location: index.php');
}
else {
    // réagir si l'appel ne provient pas du formulaire
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    include ('entete.inc');
    echo "Veuillez accéder a cette page a partir du formulaire.";
    include ('pied_page.inc');
}

$nom = $_POST['nom'];
$message = $_POST['message'];
$email = $_POST['email'];
$sujet = $_POST['sujet'];

/*echo "$nom, $message, $email, $sujet";*/

if ($mysqli->connect_error) {
    die("Connexion échouée : " . $mysqli->connect_error);
}

$requete2 = "INSERT INTO contacts (nom, message, email, sujet) VALUES (?,?,?,?)";
$resultat2 = $mysqli->prepare($requete2);
$resultat2->bind_param("ssss", $nom, $message, $email, $sujet);
if ($resultat2->execute()) {
    $_SESSION['operation_reussie'] = true;
    $_SESSION['message_operation'] = "La demende a été affectué avec succès !";
} else {
    $_SESSION['operation_reussie'] = false;
    $_SESSION['message_operation'] = "oups...!";
}
$resultat2->close();

// *** protection XSS ******************************************************************
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur, ENT_QUOTES);
}




require('include/nettoyage.inc')
?>
