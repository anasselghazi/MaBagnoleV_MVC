# Architecture MVC - Projet MaBagnole

## 1. Le Flux de Requête (Le chemin suivi)
Lorsqu'un utilisateur visite le site, le trajet est toujours le même :
1. **URL** : L'utilisateur tape une adresse.
2. **index.php** : C'est la porte d'entrée unique. Il charge les classes (Autoload) et appelle le bon Contrôleur.
3. **Controller** : Il reçoit la demande. Il demande les données au Modèle.
4. **Model** : Il va chercher les informations dans la base de données.
5. **View** : Le Contrôleur donne les données à la Vue, qui génère le HTML pour l'afficher à l'utilisateur.

## 2. Structure des Classes (OOP)

### L'Héritage
* **BaseModel (Abstrait)** : C'est le "parent". Il contient la connexion à la base de données. On ne peut pas le créer directement (abstrait).
* **Vehicule & Categorie** : Ce sont les "enfants". Ils héritent de BaseModel pour pouvoir utiliser la base de données sans réécrire le code de connexion.

### Le Contrôleur de Base
* **BaseController (Abstrait)** : Contient les fonctions partagées par tous les contrôleurs (ex: afficher une vue).

## 3. Concepts Clés utilisés
* **Encapsulation** : On protège les données des classes (usage de `private` ou `protected`).
* **Héritage** : Réutilisation du code du parent par les enfants.
* **Abstraction** : Utilisation de classes "modèles" qui ne servent que de base.
* **Polymorphisme** : Capacité d'un objet à prendre plusieurs formes (ex: une méthode de recherche qui s'adapte si c'est une voiture ou une catégorie).