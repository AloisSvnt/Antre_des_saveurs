<?php

/**
 * On définit dans le tableau associatif $routes la liste de nos routes.
 * Pour chaque route, on définit : 
 * - son nom 
 * - path (qui apparaît dans l'URL)
 * - controller : fichier à appeler 
 */

$routes = [

    // Page d'accueil
    'home' => [
        'path' => '/',
        'controller' => 'home.php'
    ],

    // Création de compte
    'signup' => [
        'path' => '/signup',
        'controller' => 'signup.php'
    ],

    // Connexion utilisateur
    'login' => [
        'path' => '/login',
        'controller' => 'login.php'
    ],

    // Déconnexion
    'logout' => [
        'path' => '/logout',
        'controller' => 'logout.php'
    ],

    // Page boutique
    'store' => [
        'path' => '/boutique',
        'controller' => 'store.php'
    ],

    // Page article
    'article' => [
        'path' => '/article',
        'controller' => 'article.php'
    ],

    // Page contact
    'contact' => [
        'path' => '/contact',
        'controller' => 'contact.php'
    ],

    // Page CGVU
    'general-conditions' => [
        'path' => '/conditions-generales-de-vente-et-dutilisation',
        'controller' => 'general-conditions.php'
    ],

    // Page politique de confidentialité
    'privacy-policy' => [
        'path' => '/politique-de-confidentialite',
        'controller' => 'privacy-policy.php'
    ],

    // Page mentions légales
    'legal-notice' => [
        'path' => '/mentions-legales',
        'controller' => 'legal-notice.php'
    ],

    // Page compte client
    'customer-account' => [
        'path' => '/mon-compte',
        'controller' => 'customer-account.php'
    ],

    // Page panier client
    'shopping-cart' => [
        'path' => '/panier',
        'controller' => 'shopping-cart.php'
    ],

    // Page commande client
    'commands' => [
        'path' => '/commandes',
        'controller' => 'commands.php'
    ],

    // Page connexion et sécurité client
    'connect-secure' => [
        'path' => '/connexion-securite',
        'controller' => 'connect-secure.php'
    ],

    // Page admin connect
    'admin-connect' => [
        'path' => '/admin-connect-fg52csll3',
        'controller' => 'admin-connect.php'
    ],

    // Page admin
    'admin-panel' => [
        'path' => '/admin-panel',
        'controller' => 'admin-panel.php'
    ],

    // Page admin article
    'admin-article' => [
        'path' => '/admin-panel/articles',
        'controller' => 'admin-articles.php'
    ],

    // Page admin création d'un article
    'admin-creation-article' => [
        'path' => '/admin-panel/articles/nouvel-article',
        'controller' => 'admin-add-article.php'
    ],

    'admin-edit-article' => [
        'path' => '/admin-panel/articles/edit',
        'controller' => 'admin-edit-article.php'
    ]

];

return $routes;
