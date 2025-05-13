<?php
require ('include/Configuration.inc');
require ('entete.inc');

if ($_SESSION['est_authentifie'] == true) {
    echo '<form id="mon-formulaire" method="post" action="enregistrer-page-accueil.php">';
    echo '    <label for="texte">* Texte de la page du menu</label>';
    echo '    <textarea id="texte" name="texte">';
    echo '    <button type="submit">Envoyer</button>';
    echo '</form>';
}
else
{
    echo "<br>";
    echo "Vous devez etre authentifié pour pouvoir effectuer cette action";
}

require ('pied_page.inc');
require ('include/nettoyage.inc')
?>