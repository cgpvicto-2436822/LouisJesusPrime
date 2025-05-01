<?php
require ('include/Configuration.inc');
require ('entete.inc');
?>
    <form onsubmit="validerFormulaire(event)" id="mon-formulaire" method="post" action="traiter-contact.php">
        <label for="nom">* Nom:</label>
        <input type="text" id="nom" name="nom" maxlength="100">
        <div id="nomerreur" class="" style="display: none;">Le nom est obligatoire</div>

        <label for="email">* Courriel:</label>
        <input type="text" id="email" name="email" maxlength="100">
        <div id="emailerreur" class="" style="display: none;">Oups, il y a un probleme, l'adresse doit avoir un @ et un .</div>

        <label for="sujet">* Sujet:</label>
        <input type="text" id="sujet" name="sujet" maxlength="100">
        <div id="sujeterreur" class="" style="display: none;">le sujet n'est pas valide</div>

        <label for="message">* Message:</label>
        <textarea id="message" name="message"></textarea>
        <div id="messageerreur" class="" style="display: none;">il n'y a pas de message</div>

        <button type="submit">Envoyer</button>
    </form>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc')
?>