<?php
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

        if ($mysqli->connect_error) {
            die("Connexion échouée : " . $mysqli->connect_error);
        }

        $requete3 = "INSERT INTO equipes (nom, slogan, commentaire, dateajout, jeu) VALUES (?,?,?,?,?)";
        $resultat3 = $mysqli->prepare($requete3);
        $resultat3->bind_param("sssss", $nom, $slogan, $commentaire, $date, $jeu);

        if ($resultat3->execute()) {
            $_SESSION['operation_reussie'] = true;
            $_SESSION['message_operation'] = "La demende a été affectué avec succès !";
        } else {
            $_SESSION['operation_reussie'] = false;
            $_SESSION['message_operation'] = "oups...!";
        }
        $resultat3->close();
    }}

else {
    // réagir si l'appel ne provient pas du formulaire
    // par exemple, ici, on redirige vers la page d'accueil sans avertissement
    include ('entete.inc');
    echo "Veuillez accéder a cette page a partir du formulaire.";
    include ('pied_page.inc');
}

header('Location: index.php');
// *** protection XSS ******************************************************************
foreach ($_POST as $cle => $valeur) {
    $_POST[$cle] = htmlspecialchars($valeur, ENT_QUOTES);
}

require('include/nettoyage.inc')
?>