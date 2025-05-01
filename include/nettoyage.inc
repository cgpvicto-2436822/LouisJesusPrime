<?php
// Nettoyage pour PDO
if (isset($pdo)) {
    $pdo = null; // Fermer la connexion PDO en détruisant l'objet
}
?>