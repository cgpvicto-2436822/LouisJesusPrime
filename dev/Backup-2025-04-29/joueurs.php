<?php
require ("include/Configuration.inc");
require ("entete.inc");

// le squelette provient d'apical:
$requete1 = "SELECT DISTINCT prenom, nomfamille, pseudo, dateinscription  FROM joueurs";
$resultat1 = $mysqli->query($requete1);

/*if ($resultat1 == false) {
    echo "IL N'Y A AUCUN RÉSULTAS";
}*/

echo "<table>";
echo "<tr>";
echo "<th>Prenom</th>";
echo "<th>Nom</th>";
echo "<th>Pseudo</th>";
echo "<th>Inscrit le:</th>";
echo "</tr>";
while ($enreg1 = $resultat1->fetch_row()) {
    echo "<tr>";
    echo "<td>$enreg1[0]  </td>";
    echo "<td>$enreg1[1]  </td>";
    echo "<td>$enreg1[2]  </td>";
    echo "<td>$enreg1[3]  </td>";
    echo "</tr>";
}
echo "</table>";

echo "<div class='boutonBleu'>";
echo "<a href='formulaire-joueur.php'><button type='button'>Ajouter un joueurs!</button></a>";
echo "</div>";

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>