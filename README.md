# crud_app_livecoding
Application CRUD en utilisant PHP avec MVC et Ajax pour les interactions sans rechargement de page.
# CRUD Application with PHP, MVC, and Ajax

## Description
This is a simple CRUD application built using PHP, following the MVC architecture. It uses Ajax for seamless interactions without reloading the page.

## Features
- Add, edit, delete, and fetch items in real-time using Ajax.
- MVC architecture for clean and scalable code.

## Setup
1. Create a database and table:
   ```sql
   CREATE DATABASE crud_app;
   USE crud_app;
   CREATE TABLE items (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL
   );
