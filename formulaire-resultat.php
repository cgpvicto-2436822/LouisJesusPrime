<?php
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

?>
    <form onsubmit="validerFormulaireResultat(event)" id="mon-formulaire" method="post" action="ajouter-resultat.php">

        <label for="equipe">Choisissez une équipe via son slogan :</label>
        <select id="equipe" name="equipe">

            <?php
            if ($resultat1) {
                while ($enreg1 = $resultat1->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<option name='equipe' value='" . htmlspecialchars($enreg1['id']) . "'>" . htmlspecialchars($enreg1['slogan']) . "</option>";
                }
                $resultat1->closeCursor(); // Fermer le curseur après utilisation
            } else {
                echo "<option value=''>Aucune équipe disponible</option>";
            }
            ?>
        </select>

        <label for="score">* Le score:</label>
        <input type="number" id="score" name="score">
        <div id="scoreerreur" class="" style="display: none;">Le score est obligatoire et doit être entre 0 et 100</div>

        <label for="rang">* Le rang:</label>
        <input type="number" id="rang" name="rang">
        <div id="rangerreur" class="" style="display: none;">Le rang est obligatoire et doit être entre 1 et 10</div>

        <label for="date">* Date</label>
        <input type="date" id="date" name="date" maxlength="100" value="<?php echo date('Y-m-d'); ?>">
        <div id="dateerreur" class="" style="display: none;">la date n'est pas valide</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc');
?>