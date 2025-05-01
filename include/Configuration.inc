<?php
// Initialiser la session
session_start();

// Inclure le fichier de bibliothèque si nécessaire
// Assurez-vous que le chemin est correct
require_once 'include/ma-bibliotheque.php';

$nomPage = basename($_SERVER['SCRIPT_NAME']);

$host = parse_url(getenv('SUPABASE_URL'), PHP_URL_HOST);
$port = parse_url(getenv('SUPABASE_URL'), PHP_URL_PORT) ?: 5432; // Port par défaut de PostgreSQL
$dbname = trim(parse_url(getenv('SUPABASE_URL'), PHP_URL_PATH), '/');
$user = parse_url(getenv('SUPABASE_URL'), PHP_URL_USER);
$password = parse_url(getenv('SUPABASE_URL'), PHP_URL_PASS);

$pdo = null; // Initialiser l'objet PDO à null

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Définir le mode d'erreur PDO sur Exception pour une meilleure gestion des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion à PostgreSQL réussie!"; // Pour le débogage
} catch (PDOException $e) {
    die("Échec lors de la connexion à la base de données : " . $e->getMessage());
}

$titre = "";
$description = "";
$h1 = "";
$texte = "";
$accroche = "";

if ($pdo) {
    $requete = "SELECT titre, description, h1, texte, url, accroche FROM pages WHERE url = :nomPage";
    $stmt = $pdo->prepare($requete);
    $stmt->bindParam(':nomPage', $nomPage);
    $stmt->execute();
    $enreg = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($enreg) {
        $titre = $enreg['titre'];
        $description = $enreg['description'];
        $h1 = $enreg['h1'];
        $texte = $enreg['texte'];
        $accroche = $enreg['accroche'];
    }

    $stmt->closeCursor(); // Fermer le curseur
    $pdo = null; // Fermer la connexion PDO
}

?>