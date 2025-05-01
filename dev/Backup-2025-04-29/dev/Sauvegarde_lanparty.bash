#!/bin/bash
# Copie un dossier et ses sous-dossiers dans le nuage (Google Drive, DropBox ou autre dossier synchronisé sur un serveur)
# en ajoutant la date du jour au dossier principal.
# Crée également un script SQL de la base de données MySQL et le copie dans le même dossier.
# Programmé par Christiane Lagacé : https://christianelagace.com
# Dernier ajustement le 16 janvier 2024

# *************************
# ***** Configuration *****
# *************************

# ***** VOUS DEVEZ REMPLIR CETTE SECTION *****

# Chemin pour accéder au dossier du projet
# (ex sous Mac : "/Applications/AMPPS/www")
# (ex sous Windows : "C:\\Program Files\\Ampps\\www") 
cheminSource="E:\\AMPS\\Ampps\\www\\LanParty"

# Nom du dossier contenant le projet à sauvegarder (ex : monprojet)
dossierSource=lanparty-hincelouis


# Chemin du dossier infonuagique
# (ex sous Mac : "/Volumes/GoogleDrive/Mon disque")
# (ex sous Windows : "C:\\Users\\MonNom\\Google Drive"
cheminCible="E:\\AMPS\\Ampps\\www\\LanParty\\lanparty-hincelouis\\dev"

# Nom du dossier dans lequel le projet doit être copié (ex : monprojet)
# Le dossier sera créé sur Google Drive ou DropBox avec la date du jour à la fin de son nom.
dossierCible=Backup

# Requis seulement si le serveur de bases de données est installé directement sur votre ordinateur (pas dans un conteneur)
# Chemin du dossier qui contient le fichier mysqldump.exe
# (ex sous Mac : "/Applications/AMPPS/mysql/bin" ou /Applications/XAMPP/xamppfiles/bin)
# (ex sous Windows : "C:\\Program Files\\Ampps\\mysql\\bin"
cheminMySQLBin="E:\\AMPS\\Ampps\\mysql\\bin"

# Requis seulement si le serveur de bases de données est installé dans un conteneur
# Nom du conteneur MySQL (docker ps permet de lister les conteneurs)
# (ex : devilbox-mysql-1)
#conteneur=devilbox-mysql-1

# Nom de l'usager MySQL qui détient les droit requis pour sauvegarder la base de données
usagerMySQL=root

# Nom de la base de données à sauvegarder
nomBD=lanparty_hincelouis

# *****************************
# ***** Fin configuration *****
# *****************************

echo ""
echo "*************************"
echo "***** Copie du site *****"
echo "*************************"
aujourdhui=$(date +%Y-%m-%d)
cp -rf "$cheminSource\\$dossierSource\\" "$cheminCible\\$dossierCible-$aujourdhui" \
&& okFichiers=true || okFichiers=false

if [ $okFichiers == true ]
then
    echo "Les fichiers ont été copiés dans le dossier"
    echo "$cheminCible/$dossierCible-$aujourdhui"
else
    echo "+------------------------------------------------------------------+"
    echo "| Oups, un problème a été rencontré lors de la copie des fichiers. |"
    echo "+------------------------------------------------------------------+"
fi
echo ""
echo "***********************************************"
echo "***** Création du script pour la BD MySQL *****"
echo "***********************************************"
mkdir -p "$cheminCible/$dossierCible-$aujourdhui/dev"
cd "$cheminMySQLBin"


./mysqldump -u $usagerMySQL -p --default-character-set=utf8 --routines --comments --triggers $nomBD > "$cheminCible/$dossierCible-$aujourdhui/dev/$nomBD-$aujourdhui.sql" \
&& okBD=true || okBD=false

if [ $okBD == true ]
then
    echo "La base de données est exportée dans le fichier"
    echo "$cheminCible/$dossierCible-$aujourdhui/dev/$nomBD-$aujourdhui.sql"
else
    echo "+--------------------------------------------------------------------+"
    echo "| Oups, un problème a été rencontré lors de la génération du script. |"
    echo "+--------------------------------------------------------------------+"
fi