<?php
require ("include/Configuration.inc");
require ("entete.inc");


if (!empty($_POST)) {
    // traiter le formulaire
    // effectuer ensuite une redirection vers une autre page
    header('Location: index.php');
}

if ($_SESSION['operation_reussie'] == true)
{
    echo "<div class='alert alert-success' role='alert'>";
}
elseif ($_SESSION['operation_reussie'] == null)
{
    echo"<div>";
}
else
{
    echo "<div class='alert alert-danger' role='alert'>";

}

echo $_SESSION['message_operation'];
echo "</div>";

$_SESSION['message_operation'] = null;
$_SESSION['operation_reussie'] = null;


echo "<div class='items'>";

$requete = "SELECT nom, slogan, id FROM equipes";
$resultat = $mysqli->query($requete);     // exécute la requête

if ($resultat)
{    // si la requête a fonctionné
    if ($mysqli->affected_rows > 0)
    {    // si la requête a retourné au moins un enregistrement

        $nb = 0;

        while ($enreg = $resultat->fetch_row()) {     // extrait chaque ligne une à une

            echo "<div class= 'item first item-bg' id='un'>";
            echo   " <a href='#'>";
            echo "        <div class='content'>";

                    echo "</div>";

             echo "<div class='caption'>";
                        echo "<div class='middle'>";
                        echo "    <i class='fa-solid fa-dumbbell'></i>";
                        echo "</div>";
                        echo "<div class='title' > $enreg[0]</div>";
                        echo "<div class='subtitle' > $enreg[1]</div>";
                    echo "</div>";
                    echo "<div><a href='détails-équipes.php?id=$enreg[2]'><button>Joueurs</button></a></div>";
                echo "</a>";
            echo "</div>";

            $nb++;
        }

        echo "<script src='js/scriptspages/index.js'></script>";

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

echo "    </div>";

    echo "<a href='formulaire-equipe.php'><button type='button'>Ajouter une équipe</button></a>";
echo "</div>";
echo "</div>";

require ("pied_page.inc");
require ("include/nettoyage.inc");
?>
