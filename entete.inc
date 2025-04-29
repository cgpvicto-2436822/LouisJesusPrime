<?php
    inclureJsPropreALaPageActuelle();
?>

<?php

echo "<!DOCTYPE html>";
echo "<html lang='fr-CA'>";
echo "<head>";
echo "    <title>$titre</title>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1'>";
echo "    <meta name='description' content='Une ou deux phrases qui décrivent le contenu de la page Web'>";
echo "    <meta name='author' content='Christiane Lagacé : https://christianelagace.com'>";
echo "    <link rel='icon' href='favicon.ico'>";
echo "    <link rel='apple-touch-icon' href='apple-touch-icon.png'>";
echo "    <link rel='stylesheet' href='css/style.css'>";
echo "    <link rel='stylesheet' href='css/mes-styles.css'>";
echo "    <script src='https://kit.fontawesome.com/1ec114f421.js' crossorigin='anonymous'></script>";
echo "</head>";
echo "<body>";
echo "<nav>";
echo "<div class='container'>";
echo '<a href="index.php" class="' . (basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '') . '">Accueil</a>';
echo '<a href="a-propos.php" class="' . (basename($_SERVER['PHP_SELF']) == 'a-propos.php' ? 'active' : '') . '">À propos</a>';
echo '<a href="a-venir.php" class="' . (basename($_SERVER['PHP_SELF']) == 'a-venir.php' ? 'active' : '') . '">Menu 2</a>';
echo '<a href="resultats.php" class="' . (basename($_SERVER['PHP_SELF']) == 'resultats.php' ? 'active' : '') . '">Résultats</a>';
echo '<a href="formulaire-contact.php" class="' . (basename($_SERVER['PHP_SELF']) == 'formulaire-contact.php' ? 'active' : '') . '">Nous Contacter</a>';
echo '<a href="joueurs.php" class="' . (basename($_SERVER['PHP_SELF']) == 'joueurs.php' ? 'active' : '') . '">Joueurs</a>';
echo "    </div>";
echo "</nav>";
echo "<div class='separation'></div>";
echo "<header>";
echo "    <div class='logo-text container'>";
echo "        <div class='logo'><img src='medias/commun/logoLanParty.png'></div>";
echo "        <div>";
echo "            <div class='title'>$titre</div>";
echo "            <div class='slogan'>$accroche</div>";
echo "                <br>";
echo "             <meta name='description'>$description</meta>";
echo "        </div>";
echo "    </div>";
echo "</header>";
echo "<div class='separation'></div>";
echo "<div id='main'>";
echo "    <div class='container'>";
echo "        <h1>$h1</h1>";
echo "        $texte";
?>
