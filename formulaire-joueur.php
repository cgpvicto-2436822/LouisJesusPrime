<?php
require ('include/Configuration.inc');
require ('entete.inc');

if ($_SESSION['est_authentifie'] == true) {
echo '    <form onsubmit="validerFormulaireJoueur(event)" id="mon-formulaire" method="post" action="traiter-joueur.php">';
echo '        <label for="nom">* Nom:</label>';
echo '        <input type="text" id="nom" name="nom" maxlength="100">';
echo '        <div id="nomerreur" class="" style="display: none;">Le nom est obligatoire</div>';
echo '';
echo '        <label for="prenom">* Prenom:</label>';
echo '        <input type="text" id="prenom" name="prenom" maxlength="100">';
echo '        <div id="prenomerreur" class="" style="display: none;">Le prenom est obligatoire</div>';
echo '';
echo '        <label for="pseudo">* Pseudo:</label>';
echo '        <input type="text" id="pseudo" name="pseudo" maxlength="100">';
echo '        <div id="pseudoerreur" class="" style="display: none;">Le pseudo est obligatoire</div>';
echo '';
echo '        <label for="email">* Courriel:</label>';
echo '        <input type="text" id="email" name="email" maxlength="100">';
echo '        <div id="emailerreur" class="" style="display: none;">Oups, il y a un probleme, l\'adresse doit avoir un @ et un .</div>';
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
require ('include/nettoyage.inc')
?>