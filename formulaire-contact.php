<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require ('include/Configuration.inc');
require ('entete.inc');

if ($_SESSION['est_authentifie'] == true) {
    echo '<form onsubmit="validerFormulaire(event)" id="mon-formulaire" method="post" action="traiter-contact.php">';
    echo '    <label for="nom">* Nom:</label>';
    echo '    <input type="text" id="nom" name="nom" maxlength="100">';
    echo '    <div id="nomerreur" class="" style="display: none;">Le nom est obligatoire</div>';
    echo '';
    echo '    <label for="email">* Courriel:</label>';
    echo '    <input type="text" id="email" name="email" maxlength="100">';
    echo '    <div id="emailerreur" class="" style="display: none;">Oups, il y a un probleme, l\'adresse doit avoir un @ et un .</div>';
    echo '';
    echo '    <label for="sujet">* Sujet:</label>';
    echo '    <input type="text" id="sujet" name="sujet" maxlength="100">';
    echo '    <div id="sujeterreur" class="" style="display: none;">le sujet n\'est pas valide</div>';
    echo '';
    echo '    <label for="message">* Message:</label>';
    echo '    <textarea id="message" name="message"></textarea>';
    echo '    <div id="messageerreur" class="" style="display: none;">il n\'y a pas de message</div>';
    echo '';
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