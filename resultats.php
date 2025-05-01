<?php
require ("include/Configuration.inc");
require ("entete.inc");

// le squelette provient d'apical:
$requete1 = "SELECT DISTINCT e.slogan, r.rang, r.score_final, r.date_partie, r.equipe_id
FROM resultats r
INNER JOIN equipes e ON r.equipe_id = e.id
ORDER BY r.date_partie ASC";
try {
    $resultat1 = $pdo->query($requete1);
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des résultats.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
    $resultat1 = false; // Pour que la boucle while ne s'exécute pas
}

echo "<table>";
echo "<tr>";
echo "<th>Slogan</th>";
echo "<th>Rang</th>";
echo "<th>Score Final</th>";
echo "<th>Date</th>";
echo "<th>Joueurs</th>";
echo "</tr>";

if ($resultat1) {
    while ($enreg1 = $resultat1->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($enreg1['slogan']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['rang']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['score_final']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['date_partie']) . "</td>";
        echo "<td><button><a href='détails-équipes.php?id=" . htmlspecialchars($enreg1['equipe_id']) . "'>Afficher</button></td>";
        echo "</tr>";
    }
    $resultat1->closeCursor(); // Fermer le curseur après utilisation
} else {
    echo "<tr><td colspan='5'><p class='message-avertissement'>Aucun résultat trouvé.</p></td></tr>";
}

echo "</table>";

echo "<a href='formulaire-resultat.php'><button type='button'>Ajouter un résultat</button></a>";

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>