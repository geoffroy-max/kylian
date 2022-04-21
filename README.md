 # Kylian

kylian est un site internet présentant des peintures

## environnement du developpemnt
### pre-requis


*php7.4
*composer
*docker
*docker-composer
* nodejs et npm
# pour verifier les pré-requis sauf (docker et docker-composer) il faut utiliser la commande suivante:

 symfony check:requirements
# lancer l'environnement du developpemnt:
 *composer install
 *docker-compose up -d
 *symfony serve -d
 *npm install
 * npm run build
  

# lancer les test
* php bin/phpunit --testdox
### en production
les mails de prise de contact sont stockés en BD. pr les envoyer au peintre par mail ,il faut mettre en place un cron sur
...bash
symfony console app:send-contact
