# AssociationChalonn

AssociationChalonn est site internet pour présenté les chats et nouvelles de l'association.

## Environnement de développement

### Pré-requis

    * PHP 7.4
    * Composer
    * Symfony 5
    * nodejs et npm

### Lancer l'environnement de développement
``````bash
composer install
npm install
npm run build

``````
### Ajouter des données de tests
``````bash
php bin/console doctrine:fixture:load


``````

## Production
###Envoie des mails de Contacts

Les mails de prise de contact sont stockés en BDD, pour les envoyer à la présidente de l'association par mail,
il faut mettre en place en cron sur:

````````bash
symfony console app:send-contact
````````
