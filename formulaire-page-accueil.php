<?php
require ('include/Configuration.inc');
require ('entete.inc');

echo '<script src="https://cdn.tiny.cloud/1/5m45apnq1crleiocbdn7ki3zjk6k6zylhmzp9dyhltdif5x1/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>';
echo '<script>
tinymce.init({
    selector:"textarea.tinymce",
    menubar: false,
    plugins: "link, image, lists, code, table",
    toolbar: "bold italic | link image | bullist numlist | table | pastetext removeformat | code"
})
</script>';


if ($_SESSION['est_authentifie'] == true) {
    echo '<form id="mon-formulaire" method="post" action="enregistrer-page-accueil.php">';
    echo '    <label for="texte">* Texte de la page du menu</label>';
    echo '    <textarea class="tinymce" id="texte" name="texte"></textarea>';
    echo '    <button type="submit">Envoyer</button>';
    echo '</form>';
}
else
{
    echo "<br>";
    echo "Vous devez etre authentifié pour pouvoir effectuer cette action";
}

require ('pied_page.inc');
require ('include/nettoyage.inc')
?>