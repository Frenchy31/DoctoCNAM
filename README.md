# DoctoCNAM
Projet de mise en relation patients/médecins permettant de gérer les rendez-vous et les plannings.
Projet effectué dans le cadre du cours NFE 114 du CNAM.

#Récuperer le projet
`git clone https://github.com/Frenchy31/DoctoCNAM.git`

#Dockerisation
##Prérequis
Avant de lancer le script d'initialisation vous aurez besoin :
- D'une machine sous [Linux](https://www.opensourceforu.com/2020/03/reasons-to-use-linux/)
- D'un compte SMTP configuré par défaut avec le SMTP Gmail (MAIL_HOST dans le .env)
- Votre compte utilisateur doit appartenir au groupe docker
##Création de l'environnement de développement en une commande 
Une fois que le projet à été récupéré

`chmod +x start.sh`

`./start.sh`