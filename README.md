# DoctoCNAM
Projet de mise en relation patients/médecins permettant de gérer les rendez-vous et les plannings.
Projet effectué dans le cadre du cours NFE 114 du CNAM.

#Récuperer le projet
`git clone https://github.com/Frenchy31/DoctoCNAM.git`

#Dockerisation
##Prérequis
Avant de lancer le script d'initialisation vous aurez besoin :
- D'une machine sous [Linux](https://www.opensourceforu.com/2020/03/reasons-to-use-linux/)
- Une installation de docker et docker-compose  
- PHP 7.4 (avec les libs php7.4-xml et php7.4-gd pour la génération de PDF)
  `sudo apt install php7.4 php7.4-xml php7.4-gd`
- Composer
  `sudo apt install composer`
- D'un compte SMTP configuré par défaut avec le SMTP Gmail (MAIL_HOST dans le .env)
- Votre compte utilisateur doit appartenir au groupe docker

##Extraction du projet depuis une archive
- `./vessel start`
- `./vessel artisan migrate:fresh --seed`
Ces commandes ont pour effet de démarrer les conteneurs docker et d'initialiser une base de données.

##Création de l'environnement de production en une commande (Script utilisé sur AWS)
Une fois que le projet a été récupéré depuis Git pour un déploiement complet :

`chmod +x start.sh`

`./start.sh`
