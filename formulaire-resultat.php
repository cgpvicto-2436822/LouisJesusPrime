<?php
require ('include/Configuration.inc');
require ('entete.inc');


// le squelette provient d'apical:
$requete1 = "SELECT *  FROM equipes";
$resultat1 = $mysqli->query($requete1);

/*if ($resultat1 == false) {
    echo "IL N'Y A AUCUN RÉSULTAS";
}*/

?>
    <form onsubmit="validerFormulaireResultat(event)" id="mon-formulaire" method="post" action="ajouter-resultat.php">

        <label for="equipe">Choisissez une equipe via son slogan :</label>
        <select id="equipe" name="equipe">

            <?php
            while ($enreg1 = $resultat1->fetch_assoc())
            {
                echo "<option name='equipe' value={$enreg1['id']}>{$enreg1['slogan']}</option>";
            }
            ?>
        </select>

        <label for="score">* Le score:</label>
        <input type="number" id="score" name="score">
        <div id="scoreerreur" class="" style="display: none;">Le score est obligatoire et doit etre entre 0 et 100</div>

        <label for="rang">* Le rang:</label>
        <input type="number" id="rang" name="rang">
        <div id="rangerreur" class="" style="display: none;">Le rang est obligatoire et doit etre entre 1 et 10</div>

        <label for="date">* Date</label>
        <input type="date" id="date" name="date" maxlength="100" value="">
        <div id="dateerreur" class="" style="display: none;">la date n'est pas valide</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc')
?>