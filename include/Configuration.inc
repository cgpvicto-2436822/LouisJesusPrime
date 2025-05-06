<?php
// Initialiser la session
session_start();

// Inclure le fichier de bibliothèque si nécessaire
require_once 'include/ma-bibliotheque.php';

$nomPage = basename($_SERVER['SCRIPT_NAME']);

$titre = "";
$description = "";
$h1 = "";
$texte = "";
$accroche = "";

$supabase_pooler_url = getenv('SUPABASE_POOLER_URL');

if ($supabase_pooler_url) {
    // Convertir l'URL PostgreSQL (type URI) en DSN compatible PDO
    $parsed = parse_url($supabase_pooler_url);

    if (!$parsed || !isset($parsed['host'], $parsed['user'], $parsed['pass'], $parsed['path'])) {
        die("L'URL de connexion est invalide ou mal formée.");
    }

    $host = $parsed['host'];
    $port = $parsed['port'] ?? 5432; // Valeur par défaut
    $user = $parsed['user'];
    $pass = $parsed['pass'];
    $dbname = ltrim($parsed['path'], '/'); // Supprimer le / initial

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        // echo "Connexion réussie.";
    } catch (PDOException $e) {
        die("Erreur de connexion à la base Supabase : " . $e->getMessage());
    }
} else {
    die("La variable d'environnement SUPABASE_POOLER_URL n'est pas définie.");
}

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

    $stmt->closeCursor();
    $pdo = null; // Fermer la connexion PDO
}
?>
