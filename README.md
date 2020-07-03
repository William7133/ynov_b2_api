# ynov_b2_api

# symfony-rattrapage

 # 1. Qu'est-ce qu'un container de services ? Quel est son rôle ?
 
 Chaque objet est défini en tant que service, et le conteneur de services permet d'instancier, d'organiser et de récupérer les nombreux services de votre application.
 
# 2. Quelle est la différence entre les commandes make:entity et make:user lorsqu'on utilise la console Symfony ?

make:user permet de créer une classe d'utilisateurs tandis que make:entity permet de créer une entité qui a plus de champs que make:user.

# 3. Quelle commande utiliser pour charger les fixtures dans la base de données ?

on utilise "doctrine:fixtures:load".

# 4. Résumez de manière simple le fonctionnement du système de versions "Semver" 

SemVer (voulant dire Semantic Versioning) est une gestion sémantique des versions. En d'autres termes, une façon de numéroter les versions de manière logique, cohérente, parlante, ayant du sens. 

# 5. Qu'est-ce qu'un Repository ? A quoi sert-il ? 

Utiliser le patron de conception repository dans un projet Symfony/Doctrine est une bonne pratique logicielle qui permet de mettre en place une meilleure structure et de faciliter l'exécution de tests.

# 6. Quelle commande utiliser pour voir la liste des routes ?

c'est la commande debug:router.

# 7. Dans un template Twig, quelle variable globale permet d'accéder à la requête courante, l'utilisateur courant, etc...? 

c'est la variable {{ app. }} | exemple : {{ app.request }} | {{ app.user  }}

# 8. Pour mettre à jour la structure de la base de données, quelles sont les 2 possibilités que nous avons abordées en cours ?

les deux commandes sont "doctrine:migrations:migrate" et "doctrine:schema:update --force"

# 9. Quelle commande permet de créer une classe de contrôleur ?

c'est la commande "make:controller"

# 10. Décrivez succintement l'outil Flex de Symfony

Flex est un outil Symfony qui permet d'ajouter des nouvelles briques en déployant le moins d'effort possible. En effet, l'ajout d'une brique dans une application nécessite souvent d'ajouter un minimum de configuration, d'enregistrer des nouvelles routes, etc.
