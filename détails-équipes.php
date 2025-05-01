<?php
require ('entete.inc');
require ('include/Configuration.inc');
?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $requete = "SELECT prenom, nomfamille, pseudo FROM joueurs INNER JOIN equipes_joueurs ON joueurs.id = equipes_joueurs.joueur_id WHERE equipes_joueurs.equipe_id = :id";
        $stmt = $pdo->prepare($requete);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $row_count = $stmt->rowCount();

        if ($row_count > 0) {
            while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo htmlspecialchars($enreg['prenom']) . " " . htmlspecialchars($enreg['nomfamille']) . ", surnommé: " . htmlspecialchars($enreg['pseudo']);
                echo "<br>";
            }
        } else {
            echo "<p class='message-avertissement'>Il n'y a aucun client dans le système.</p>";
        }

        $stmt->closeCursor();

    } catch (PDOException $e) {
        echo "<p class='message-erreur'>Nous sommes désolés, les clients ne peuvent pas être affichés.</p>";
        error_log("Erreur PDO: " . $e->getMessage());
    }
}
else {
    // Gérer le cas où id n'est pas défini
}
?>
</div>
<?php
require ('pied_page.inc');
require ('include/nettoyage.inc');
?>
