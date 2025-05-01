<?php
require ('include/Configuration.inc');
require ('entete.inc');

// le squelette provient d'apical:
$requete1 = "SELECT nom  FROM jeux";
try {
    $resultat1 = $pdo->query($requete1);
} catch (PDOException $e) {
    echo "<p class='message-erreur'>Erreur lors de la récupération des jeux.</p>";
    error_log("Erreur PDO: " . $e->getMessage());
    // Vous pourriez envisager un message plus convivial pour l'utilisateur final
    $resultat1 = false; // Pour que la boucle while ne s'exécute pas
}

?>
    <form onsubmit="validerFormulaireEquipe(event)" id="mon-formulaire" method="post" action="traiter-equipe.php">
        <label for="nom" class="texteblanc">* nom:</label>
        <input type="text" id="nom" name="nom" maxlength="100">
        <div id="nomerreur" class="" style="display: none;">Le nom est obligatoire</div>

        <label for="slogan">* Slogan:</label>
        <input type="text" id="slogan" name="slogan" maxlength="100">
        <div id="sloganerreur" class="" style="display: none;">Le slogan est obligatoire</div>

        <label for="commentaire">* Commentaire:</label>
        <input type="text" id="commentaire" name="commentaire" maxlength="100">
        <div id="commentaireerreur" class="" style="display: none;">Le commentaire est obligatoire</div>

        <label for="jeu">Choisissez une option :</label>
        <select id="jeu" name="jeu">
            <?php
            if ($resultat1) {
                while ($enreg1 = $resultat1->fetch(PDO::FETCH_ASSOC))
                {
                    echo "<option name='jeu' value='" . htmlspecialchars($enreg1['nom']) . "'>" . htmlspecialchars($enreg1['nom']) . "</option>";
                }
                $resultat1->closeCursor(); // Fermer le curseur après utilisation
            } else {
                echo "<option value=''>Aucun jeu disponible</option>";
            }
            ?>
        </select>

        <label for="date">* Date</label>
        <input type="date" id="date" name="date" maxlength="100" value="<?php echo date('Y-m-d'); ?>">
        <div id="dateerreur" class="" style="display: none;">la date n'est pas valide</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc');
?>