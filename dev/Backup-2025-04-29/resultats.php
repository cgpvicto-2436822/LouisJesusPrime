<?php
require ("include/Configuration.inc");
require ("entete.inc");

// le squelette provient d'apical:
$requete1 = "SELECT DISTINCT slogan, rang, score_final, date_partie, equipes_joueurs.equipe_id
FROM resultats
INNER JOIN equipes ON resultats.equipe_id = equipes.id 
INNER JOIN equipes_joueurs ON equipes.id = equipes_joueurs.equipe_id
INNER JOIN joueurs ON equipes_joueurs.joueur_id = joueurs.id
ORDER BY date_partie ASC";
$resultat1 = $mysqli->query($requete1);

/*if ($resultat1 == false) {
    echo "IL N'Y A AUCUN RÉSULTAS";
}*/

echo "<table>";
echo "<tr>";
echo "<th>Solgan</th>";
echo "<th>Rang</th>";
echo "<th>Score Final</th>";
echo "<th>date</th>";
echo "<th>joueurs</th>";
echo "</tr>";
while ($enreg1 = $resultat1->fetch_row()) {
    echo "<tr>";
    echo "<td>$enreg1[0]  </td>";
    echo "<td>$enreg1[1]  </td>";
    echo "<td>$enreg1[2]  </td>";
    echo "<td>$enreg1[3]  </td>";
    echo "<td><button><a href='détails-équipes.php?id=$enreg1[4]'>Afficher</button>  </td>";
    echo "</tr>";
}
echo "</table>";

echo "<a href='formulaire-resultat.php'><button type='button'>Ajouter un résultat</button></a>";

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>