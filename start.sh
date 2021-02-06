#!/bin/bash
cp .env.example .env

echo "Configuration du serveur SMTP (Serveur par défaut : smtp.googlemail.com. Mettre à jour le fichier .env pour le modifier.)"
TTY=$(tty)
while [ -z "$SMTP_USERNAME" ]
do
  echo "Username : "
  read -r SMTP_USERNAME >"$TTY"
done
while [ -z "$SMTP_PASSWORD" ]
do
  echo "Password : "
  read -sr SMTP_PASSWORD >"$TTY"
done
echo "Ajout des variables dans le fichier .env..."
sed -i "s/MAIL_USERNAME=/MAIL_USERNAME=$SMTP_USERNAME/" .env
sed -i "s/MAIL_PASSWORD=/MAIL_PASSWORD=$SMTP_PASSWORD/" .env
echo "Ajoutées."

echo "Démarrage des conteneurs Docker, peut prendre quelques minutes..."
docker-compose up -d
wait $!
docker exec -it doctocnam_app_1 composer update

echo "Création du fichier de log et ajout des droits d'écriture"
docker exec -it doctocnam_app_1 touch storage/logs/laravel.log
sudo chown $USER:docker storage/logs/laravel.log
sudo chmod 666 storage/logs/laravel.log

echo "Initialisation de Laravel Vessel (Configuration Docker)"
docker exec -it doctocnam_app_1 php artisan vendor:publish --provider="Vessel\VesselServiceProvider"
sleep 2
bash vessel init
sleep 2
echo "Ajout des droits d'exécution de vessel (besoin d'être sudoer)"
sudo chmod +x vessel
echo "Droits d'accès de l'application à la base de données."
./vessel exec mysql mysql -uroot -psecret -e "CREATE SCHEMA DOCTOCNAM;GRANT ALL PRIVILEGES ON DOCTOCNAM.* TO 'db_user'@'%' IDENTIFIED BY 'secret';"
echo "Génération de la clé de chiffrement de l'application."
docker exec -it doctocnam_app_1 php artisan key:generate
sudo chgrp docker .env
./vessel artisan key:generate
echo "Création et remplissage des tables."
./vessel artisan migrate:fresh --seed
wait $!
echo "Build et minification des sources .css et .js"
./vessel npm run dev
wait $!
echo "Vous pouvez ouvrir votre navigateur à l'adresse http://localhost:8080"
echo "Compte de test"

#TODO Ajout création de compte de test
