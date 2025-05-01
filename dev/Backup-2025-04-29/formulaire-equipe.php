<?php
require ('include/Configuration.inc');
require ('entete.inc');


// le squelette provient d'apical:
$requete1 = "SELECT nom  FROM jeux";
$resultat1 = $mysqli->query($requete1);

/*if ($resultat1 == false) {
    echo "IL N'Y A AUCUN RÉSULTAS";
}*/

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
            while ($enreg1 = $resultat1->fetch_row())
            {
                echo "<option name='jeu' value=$enreg1[0]>$enreg1[0]</option>";
            }
            ?>
        </select>

        <label for="date">* Date</label>
        <input type="date" id="date" name="date" maxlength="100" value="Aujourd'hui">
        <div id="dateerreur" class="" style="display: none;">la date n'est pas valide</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc')
?>