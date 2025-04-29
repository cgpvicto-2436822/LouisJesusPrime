<?php
require ('include/Configuration.inc');
require ('entete.inc');
?>
    <form onsubmit="validerFormulaireJoueur(event)" id="mon-formulaire" method="post" action="traiter-joueur.php">
        <label for="nom">* Nom:</label>
        <input type="text" id="nom" name="nom" maxlength="100">
        <div id="nomerreur" class="" style="display: none;">Le nom est obligatoire</div>

        <label for="prenom">* Prenom:</label>
        <input type="text" id="prenom" name="prenom" maxlength="100">
        <div id="prenomerreur" class="" style="display: none;">Le prenom est obligatoire</div>

        <label for="pseudo">* Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" maxlength="100">
        <div id="pseudoerreur" class="" style="display: none;">Le pseudo est obligatoire</div>

        <label for="email">* Courriel:</label>
        <input type="text" id="email" name="email" maxlength="100">
        <div id="emailerreur" class="" style="display: none;">Oups, il y a un probleme, l'adresse doit avoir un @ et un .</div>

        <label for="date">* Date</label>
        <input type="date" id="date" name="date" maxlength="100" value="Aujourd'hui">
        <div id="dateerreur" class="" style="display: none;">la date n'est pas valide</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc')
?>