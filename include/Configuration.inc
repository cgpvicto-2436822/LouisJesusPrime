<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
/**
 * Configuration.inc
 *
 * Initialise la session, inclut la bibliothèque, définit les variables de page,
 * établit la connexion PDO (PostgreSQL ou fallback MySQL), et charge le contenu dynamique.
 */

// ─── 1. Session & authentification ─────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    if (!isset($_SESSION['est_authentifie'])) {
        $_SESSION['est_authentifie'] = false;
    }
}

// ─── 2. Inclusion de la bibliothèque commune ────────────────────────────
require_once __DIR__ . '/ma-bibliotheque.php';

// ─── 3. Variables initiales de la page ─────────────────────────────────
$nomPage      = basename($_SERVER['SCRIPT_NAME']);
$titre        = "";
$description  = "";
$h1           = "";
$texte        = "";
$accroche     = "";
// Ajoute ici d'autres variables si besoin : $chemin_assets, $titre_page, etc.

// ─── 4. Connexion PDO (PostgreSQL Supabase ou MySQL fallback) ───────────
$supabase_pooler_url = getenv('SUPABASE_POOLER_URL');
if ($supabase_pooler_url) {
    // Connexion PostgreSQL
    $parsed = parse_url($supabase_pooler_url);
    if (!$parsed || !isset($parsed['host'], $parsed['user'], $parsed['pass'], $parsed['path'])) {
        die("L'URL de connexion Supabase est invalide ou mal formée.");
    }
    $host   = $parsed['host'];
    $port   = $parsed['port'] ?? 5432;
    $user   = $parsed['user'];
    $pass   = $parsed['pass'];
    $dbname = ltrim($parsed['path'], '/');
    $dsn    = "pgsql:host=$host;port=$port;dbname=$dbname";
    try {
        $pdo = new PDO($dsn, $user, $pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        die("Erreur de connexion PostgreSQL : " . $e->getMessage());
    }
} else {
    // Fallback MySQL (Render)
    $dbHost = getenv('MYSQL_HOST')     ?: 'localhost';
    $dbName = getenv('MYSQL_DATABASE') ?: 'db_name';
    $dbUser = getenv('MYSQL_USER')     ?: 'user';
    $dbPass = getenv('MYSQL_PASSWORD') ?: 'pass';
    $dsn    = "mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4";
    try {
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    } catch (PDOException $e) {
        die("Erreur de connexion MySQL : " . $e->getMessage());
    }
}

// ─── 5. Chargement du contenu de la page depuis la base ────────────────
if (isset($pdo)) {
    $sql  = "SELECT titre, description, h1, texte, accroche FROM pages WHERE url = :nomPage";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nomPage', $nomPage);
    $stmt->execute();
    $enreg = $stmt->fetch();
    if ($enreg) {
        $titre       = $enreg['titre'];
        $description = $enreg['description'];
        $h1          = $enreg['h1'];
        $texte       = $enreg['texte'];
        $accroche    = $enreg['accroche'];
    }
    $stmt->closeCursor();
}

// \$titre, \$description, \$h1, \$texte, \$accroche sont prêts pour le template
?>
