## ✨ Système de Gestion des Stocks

Système de Gestion des Stocks avec Laravel 10 et MySql.

![Tableau de bord](https://user-images.githubusercontent.com/71541409/236858603-89e4be74-0a8b-4b4b-98b0-24e66ec5602d.png)

## 💀 Conception de la Base de Données
![Diagramme de Classe](https://github.com/fajarghifar/inventory-management-system/assets/71541409/0c7d4163-96f5-4724-8741-4615e52ecf98)

## 😎 Fonctionnalités
- POS (Point de Vente)
- Commandes
  - Commandes en Attente
  - Commandes Terminées
  - Dû en Attente
- Achats
  - Tous les Achats
  - Achats en Attente d'Approbation
  - Rapport d'Achat
- Produits
- Clients
- Fournisseurs


## 🚀 Comment Utiliser

1.  **Cloner le Répertoire ou Télécharger**

    ```bash
    $ git clone 
    ```
1. **Configuration**
    ```bash
    # Aller dans le répertoire
    $ cd gestion de stock

    # Installer les dépendances
    $ composer install

    # Ouvrir avec votre éditeur de texte
    $ code .
    ```
1. **.ENV**

    Renommer ou copier le fichier `.env.example` en `.env`
    ```bash
    # Générer la clé de l'application
    $ php artisan key:generate
    ```
1. **Locale Faker Personnalisée**

    Pour définir la Locale Faker, ajoutez cette ligne de code à la fin du fichier `.env`.
    ```bash
    # Dans ce cas, la locale est définie sur l'indonésien

    FAKER_LOCALE="id_ID"
    ```

1. **Configuration de la Base de Données**

    Configurez vos identifiants de base de données dans votre fichier `.env`.

1. **Alimenter la Base de Données**
    ```bash
    $ php artisan:migrate:fresh --seed

    # Note : En cas d'erreur, veuillez essayer de relancer cette commande.
    ```
1. **Créer le Lien de Stockage**

    ```bash
    $ php artisan storage:link
    ```
1. **Lancer le Serveur**

    ```bash
    $ php artisan serve
    ```
1. **Connexion**

    Essayez de vous connecter avec le nom d'utilisateur : `admin` et le mot de passe : `boubacar`

## 🚀 Configuration
1. **Configuration du Graphique**

    Ouvrez le fichier `./config/cart.php`. Vous pouvez définir une taxe, un format de numéro, etc.
    > Pour plus de détails, visitez ce lien [hardevine/shoppingcart](https://packagist.org/packages/hardevine/shoppingcart).

## 📝 Contribution

Si vous avez des idées pour le rendre plus intéressant, veuillez envoyer une PR ou créer un problème pour une demande de fonctionnalité.

# 🤝 Licence

### [MIT](LICENSE)

> Github [@bouba](https://github.com/Bouba8307/projet_de_fin_d_etude.git) 