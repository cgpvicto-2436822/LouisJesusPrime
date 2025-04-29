<?php
require ('entete.inc');
require ('include/Configuration.inc');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $requete = "SELECT prenom, nomfamille, pseudo FROM joueurs INNER JOIN equipes_joueurs ON joueurs.id = equipes_joueurs.joueur_id WHERE equipes_joueurs.equipe_id = $id";
    $resultat = $mysqli->query($requete);     // exécute la requête

    if ($resultat)
    {    // si la requête a fonctionné
        if ($mysqli->affected_rows > 0)
        {    // si la requête a retourné au moins un enregistrement

            while ($enreg = $resultat->fetch_row()) {
                echo "$enreg[0] $enreg[1], surnommé: $enreg[2]";
                echo "<br>";
            }

        }
        else {
            echo "<p class='message-avertissement'>Il n'y a aucun client dans le système.</p>";
        }

        $resultat->free();   // libère immédiatement la mémoire qui était allouée

    }
    else {
        echo "<p class='message-erreur'>Nous sommes désolés, les clients ne peuvent pas être affichés.</p>";
        echo_debug($mysqli->error);
    }
}
else {

}
?>
</div>
    <?php
require ('pied_page.inc');
require ('include/nettoyage.inc')
?>
