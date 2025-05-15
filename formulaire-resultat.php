<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require ('include/Configuration.inc');
require ('entete.inc');

// le squelette provient d'apical:
$requete1 = "SELECT id, slogan  FROM equipes";
try {
    $resultat1 = $pdo->query($requete1);
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des équipes.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
    $resultat1 = false; // Pour que la boucle while ne s'exécute pas
}

if ($_SESSION['est_authentifie'] == true) {
echo '    <form onsubmit="validerFormulaireResultat(event)" id="mon-formulaire" method="post" action="ajouter-resultat.php">';
echo '';
echo '        <label for="equipe">Choisissez une équipe via son slogan :</label>';
echo '        <select id="equipe" name="equipe">';
echo '';
if ($resultat1) {
    while ($enreg1 = $resultat1->fetch(PDO::FETCH_ASSOC))
    {
        echo "<option name='equipe' value='" . htmlspecialchars($enreg1['id']) . "'>" . htmlspecialchars($enreg1['slogan']) . "</option>";
    }
    $resultat1->closeCursor(); // Fermer le curseur après utilisation
} else {
    echo "<option value=''>Aucune équipe disponible</option>";
}
echo '        </select>';
echo '';
echo '        <label for="score">* Le score:</label>';
echo '        <input type="number" id="score" name="score">';
echo '        <div id="scoreerreur" class="" style="display: none;">Le score est obligatoire et doit être entre 0 et 100</div>';
echo '';
echo '        <label for="rang">* Le rang:</label>';
echo '        <input type="number" id="rang" name="rang">';
echo '        <div id="rangerreur" class="" style="display: none;">Le rang est obligatoire et doit être entre 1 et 10</div>';
echo '';
echo '        <label for="date">* Date</label>';
echo '        <input type="date" id="date" name="date" maxlength="100" value="' . date('Y-m-d') . '">';
echo '        <div id="dateerreur" class="" style="display: none;">la date n\'est pas valide</div>';
echo '';
echo '        <button type="submit">Envoyer</button>';
echo '    </form>';}
else
{
    echo "Vous devez etre authentifié pour pouvoir effectuer cette action";
}

require ('pied_page.inc');
require ('include/nettoyage.inc');
?>