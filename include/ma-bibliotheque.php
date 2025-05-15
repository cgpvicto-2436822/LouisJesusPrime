<?php
// Cette page ainsi que le site au complet a été réaliser par Louis Hince, inspiré de la maquette de Christianne Lagacé.
// Plusieurs fonctions et bouts de code proviennent d'Apical.
/**
* Affiche une information de débogage seulement lorsque DEVEL est à true.
* @author Christiane Lagacé <christiane.lagace@hotmail.com>
*
* Utilisation : echo_debug($mysqli->error);
* Suppositions critiques : pour un meilleur affichage, définir la classe debug dans la feuille de style.
* @param String $message Information à afficher. Affichera "débogage" si ne reçoit aucun paramètre.
*/
function echo_debug($message = 'débogage') {

if (defined('DEVEL') && DEVEL === false) {
echo '<div class="debug">';

    if (is_array($message) || is_object($message)) {
    print_r($message);
    }
    else {
    echo $message;
    }

    echo '</div>';
}
}

/**
 * Proviens d'apical
 */
function inclureJsPropreALaPageActuelle(){
    $dossierRacineSite = dirname(__FILE__, 2);

    // Le deuxième paramètre de basename permet de supprimer cette chaîne de la valeur retournée
    $pageActuelleSansExtension = basename( $_SERVER['SCRIPT_NAME'], '.php' );

    if ( file_exists( $dossierRacineSite . '/js/scriptspages/' . $pageActuelleSansExtension . '.js' ) ) {
        echo "<script src='js/scriptspages/$pageActuelleSansExtension.js' defer></script>";
    }
}

?>