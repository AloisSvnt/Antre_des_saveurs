<?php

use App\Model\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

$date = new DateTime();
$today = $date->format('l');

// Flash messages
$flashMessage = fetchFlash();
$shoppingCart = createShoppingCart();

// Affichage : inclusion du template
$template = 'home';
$titlePage = 'L\'Antre des Saveurs';
include '../templates/base.phtml';
