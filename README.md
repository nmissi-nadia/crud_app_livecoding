# crud_app_livecoding
Application CRUD en utilisant PHP avec MVC et Ajax pour les interactions sans rechargement de page.
# application CRUD avec PHP, MVC, et Ajax

## Description
Il s'agit d'une simple application CRUD construite en PHP, suivant l'architecture MVC. Il utilise Ajax pour des interactions transparentes sans recharger la page.

## Features
- Ajouter, éditer, supprimer et récupérer des éléments en temps réel avec Ajax.
- Architecture MVC pour un code propre et scalable.

## Setup
1. Créer une base de données et une table :
   ```sql
   CREATE DATABASE crud_app;
   USE crud_app;
   CREATE TABLE items (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL
   );
