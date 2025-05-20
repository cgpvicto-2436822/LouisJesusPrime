<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require ("include/Configuration.inc");
require ("entete.inc");

if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page
    header('Location: index.php');
}

echo isset($_SESSION['message_operation']) ? $_SESSION['message_operation'] : "";


$_SESSION['message_operation'] = null;
$_SESSION['operation_reussie'] = null;

echo "<div class='items'>";

$requete = "SELECT nom, slogan, id FROM equipes";
try {
    $resultat = $pdo->query($requete);

    if ($resultat) {
        $nb = 0;
        while ($enreg = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class= 'item first item-bg' id='un'>";
            echo   " <a href='#'>";
            echo "        <div class='content'>";
            echo "        </div>";
            echo "<div class='caption'>";
            echo "    <div class='middle'>";
            echo "        <i class='fa-solid fa-dumbbell'></i>";
            echo "    </div>";
            echo "    <div class='title' >" . htmlspecialchars($enreg['nom']) . "</div>";
            echo "    <div class='subtitle' >" . htmlspecialchars($enreg['slogan']) . "</div>";
            echo "</div>";
            echo "<div><a href='détails-équipes.php?id=" . htmlspecialchars($enreg['id']) . "'><button>Joueurs</button></a></div>";
            echo "</a>";
            echo "</div>";
            $nb++;
        }
        $resultat->closeCursor();
        echo "<script src='js/scriptspages/index.js'></script>";
    } else {
        echo "<p class='message-avertissement'>Il n'y a aucune équipe dans le système.</p>";
    }
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Nous sommes désolés, les équipes ne peuvent pas être affichées.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
}

echo "    </div>";

if ($_SESSION['est_authentifie']) {
    echo "<a href='formulaire-equipe.php'><button type='button'>Ajouter une équipe</button></a>";
}
echo "<br>";
if ($_SESSION['est_authentifie']) {
    echo "<a href='formulaire-page-accueil.php'><button type='button'>Modifiez le texte de l'accueil</button></a>";
}
echo "</div>";
echo "</div>";

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>
