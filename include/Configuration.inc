<?php
// Initialiser la session
//session_start();
session_start();

// Inclure le fichier de biblioth�que si n�cessaire
require_once 'include/ma-bibliotheque.php';

$nomPage = basename($_SERVER['SCRIPT_NAME']);

try {

    $mysqli = new mysqli("127.0.0.1", "root", "mysql", "lanparty_hincelouis");
} catch (Exception $e) {
    die('&Eacute;chec lors de la connexion &agrave; la base de donn&eacute;es.');
}

$mysqli->set_charset("utf8mb4");

$nomPage = basename($_SERVER['SCRIPT_NAME']);
$requete = "SELECT titre, description, h1, texte, url, accroche FROM pages WHERE url = '$nomPage'";
$resultat = $mysqli->query($requete);     // exécute la requête

$titre = "";
$description = "";
$h1 = "";
$texte = "";
$accroche = "";

$enreg = $resultat->fetch_row();
$titre = $enreg[0];
$description = $enreg[1];
$h1 = $enreg[2];
$texte = $enreg[3];
$accroche = $enreg[5];

$resultat->close();

?>