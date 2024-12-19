<?php
#fichier pour tester la gestion des produits (ajout, suppression, récupération) dans le stock et afficher les produits
require_once __DIR__ . '/vendor/autoload.php'; // Charge Composer et les dépendances
require __DIR__ . '/connexion.php'; // Charge la classe Connexion
require __DIR__ . '/gestion_stock.php'; // Charge la classe GestionStock

// Connexion à la base de données
$connexion = new Connexion();
$conn = $connexion->getConnection();

// Création d'une instance de la classe GestionStock
$gestion_stock = new GestionStock($conn);

// Ajout de produits
$gestion_stock->ajouter_produit('Pomme', 10, 'Fruit');
$gestion_stock->ajouter_produit('Banane', 20, 'Fruit');
$gestion_stock->ajouter_produit('Orange', 15, 'Fruit');

// Récupération des produits
$produits = $gestion_stock->recuperer_produits();

// Suppression d'un produit
$gestion_stock->supprimer_produit(2);

// Récupération des produits après suppression
$produits = $gestion_stock->recuperer_produits();

#url : http://localhost:8000/testgestion.php
