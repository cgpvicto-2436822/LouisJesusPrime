<?php
// deconnecter.php
// Toujours commencer par <?php sans aucun espace ni BOM avant
// 1) Démarrer ou reprendre la session avant toute sortie
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2) Vider toutes les variables de session
$_SESSION = [];

// 3) Supprimer le cookie de session si utilisé
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

// 4) Détruire la session côté serveur
session_destroy();

// 5) Rediriger vers la page de login (ou accueil)
header('Location: index.php');
exit;