# 🚗 MaBagnole - Système de Gestion de Location de Véhicules

## 📋 Présentation
MaBagnole est une application web modulaire permettant la location de véhicules en ligne. Ce projet a été conçu pour démontrer l'implémentation d'une architecture **MVC (Modèle-Vue-Contrôleur)** robuste, l'utilisation de **Design Patterns** avancés et une gestion de données performante.

## 🚀 Fonctionnalités principales

### 👤 Espace Client
- **Auth :** Inscription et connexion sécurisée.
- **Catalogue :** Recherche, filtrage dynamique par catégorie et détails des véhicules.
- **Expérience Utilisateur :** Pagination (Manuelle & DataTables).
- **Réservation :** Système de réservation avec sélection de dates.
- **Avis :** Publication d'avis avec gestion du **Soft Delete**.

### 🛠️ Administration
- **Dashboard :** Statistiques clés (véhicules dispo, réservations en cours).
- **Gestion CRUD :** Contrôle total sur les véhicules, catégories et réservations.
- **Productivité :** Insertion en masse de données (véhicules/catégories).

## 🛠️ Stack Technique & Concepts
- **Langage :** PHP 8.x (POO)
- **Base de données :** MySQL (via PDO)
- **Architecture :** MVC
- **Design Patterns utilisés :**
  - **Singleton :** Pour l'instance unique de connexion à la base de données.
  - **Repository Pattern :** Pour découpler la logique métier de l'accès aux données.
- **Frontend :** HTML5, CSS3, JavaScript (DataTables pour les listes admin).

## ⚙️ Installation

1. **Cloner le projet :**
   ```bash
   git clone [https://github.com/votre-compte/mabagnole.git](https://github.com/votre-compte/mabagnole.git)