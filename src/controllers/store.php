<?php

use App\Model\ArticleModel;

$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// dump($articles);
// dump($_SESSION);

$template = 'store';
$titlePage = 'Boutique - L\'Antre des Saveurs';
include '../templates/base.phtml';
