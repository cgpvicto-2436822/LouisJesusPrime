<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
require ("include/Configuration.inc");
require ("entete.inc");

    echo '<form id="mon-formulaire" method="post" action= "verifier-authentification.php">';
    echo '    <div class="ligne-formulaire">';
        echo '        <label for="code">* Code : </label>';
        echo '        <input type="text" id="code" name="code">';
        echo '    </div>';
    echo '    <div class="ligne-formulaire">';
        echo '        <label for="motdepasse">* Mot de passe : </label>';
        echo '        <input type="password" id="motdepasse" name="motdepasse">';
        echo '    </div>';
    echo '    <div class="ligne-formulaire">';
        echo '        <input type="submit" id="soumettre" name="soumettre" value="Soumettre">';
        echo '    </div>';
    echo '</form>';

require ('pied_page.inc');
require ('include/nettoyage.inc')
?>