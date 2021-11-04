# Application Hangar Local

<< Lilian Wilt / Jules François / Alex Mangenot / Kévin Unser >>

  
- Trello : https://trello.com/b/ZcEg8bNr/hangar-local


- Permet de lancer un serveur local avec le fichier index.php dans le répertoire public
à partir du répertoire Hangar_App :

php -S localhost:8080 -t public

- Permet de mettre à jour les dépendences / frameworks / versions avec composer :

composer update

- Permet de lancer la construction du containers docker depuis le répertoire racine ou ce trouve docker-compose.yml

docker compose up OU docker compose up --build