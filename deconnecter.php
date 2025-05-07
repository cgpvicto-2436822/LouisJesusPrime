<?php
$_SESSION = [];

// 3. Supprimer le cookie de session (pour être certain)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 4. Détruire la session côté serveur
session_destroy();

// 5. Redirection vers la page de login (ou accueil)

header("Location: index.php");   // renvoie vers une autre page
exit;