<?php
// Initialiser la session
session_start();

// Inclure le fichier de bibliothèque si nécessaire
// Assurez-vous que le chemin est correct
require_once 'include/ma-bibliotheque.php';

$nomPage = basename($_SERVER['SCRIPT_NAME']);

// ... votre code précédent ...

$supabase_pooler_url = getenv('SUPABASE_POOLER_URL');

if ($supabase_pooler_url) {
    try {
        $pdo = new PDO($supabase_pooler_url);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion à PostgreSQL via le pooler (variable d'environnement) réussie!";
    } catch (PDOException $e) {
        die("Échec lors de la connexion à la base de données via le pooler (variable d'environnement) : " . $e->getMessage());
    }
} else {
    // Gérer le cas où la variable d'environnement n'est pas définie
    die("La variable d'environnement SUPABASE_POOLER_URL n'est pas définie.");
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
