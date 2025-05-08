<?php
require ("include/Configuration.inc");
require ("entete.inc");

// le squelette provient d'apical:
$requete1 = "SELECT DISTINCT prenom, nomfamille, pseudo, dateinscription  FROM joueurs";
try {
    $resultat1 = $pdo->query($requete1);
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des joueurs.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
    $resultat1 = false; // Pour que la boucle while ne s'exécute pas
}

echo "<table>";
echo "<tr>";
echo "<th>Prénom</th>";
echo "<th>Nom</th>";
echo "<th>Pseudo</th>";
echo "<th>Inscrit le:</th>";
echo "</tr>";

if ($resultat1) {
    while ($enreg1 = $resultat1->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($enreg1['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['nomfamille']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['pseudo']) . "</td>";
        echo "<td>" . htmlspecialchars($enreg1['dateinscription']) . "</td>";
        echo "</tr>";
    }
    $resultat1->closeCursor(); // Fermer le curseur après utilisation
} else {
    echo "<tr><td colspan='4'><p class='message-avertissement'>Aucun joueur trouvé.</p></td></tr>";
}

echo "</table>";

if ($_SESSION['est_authentifie']) {
echo "<div class='boutonBleu'>";
echo "<a href='formulaire-joueur.php'><button type='button'>Ajouter un joueur!</button></a>";
echo "</div>";}

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>