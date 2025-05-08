<?php
require ('include/Configuration.inc');
require ('entete.inc');
?>

<?php
if (isset($_GET['id']))
{
    $id = $_GET['id'];

    try {
        $requete = "SELECT prenom, nomfamille, pseudo FROM joueurs INNER JOIN equipes_joueurs ON joueurs.id = equipes_joueurs.joueur_id WHERE equipes_joueurs.equipe_id = :id";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row_count = $stmt->rowCount();


        echo "<table>";
        echo "<tr>";
        echo "<th>Prenom</th>";
        echo "<th>Nom</th>";
        echo "<th>Pseudo</th>";
        echo "</tr>";


        if ($row_count > 0)
        {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC))
            {

                echo "<tr>";
                echo "<td>" . htmlspecialchars($enreg['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($enreg['nomfamille']) . "</td>";
                echo "<td>" . htmlspecialchars($enreg['pseudo']) . "</td>";
                echo "</tr>";

            }
        }

        else
        {
            echo "<tr><td colspan='5'><p class='message-avertissement'>Aucun résultat trouvé.</p></td></tr>";
        }

        $stmt->closeCursor();

    }

    catch (PDOException $e)
    {
        echo "<p class='message-erreur'>Nous sommes désolés, les clients ne peuvent pas être affichés.</p>";
        error_log("Erreur PDO: " . $e->getMessage());
    }
}

else {
    // Gérer le cas où id n'est pas défini
}
?>
</div>
</div>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc');
?>
