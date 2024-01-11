<?php

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use App\Model\NativeCountryModel;

// Récupération et validation de l'id de l'url (chaine de requête)
if (!array_key_exists('id', $_GET) || !ctype_digit($_GET['id'])) {
    echo 'ID de la tâche incorrecte';
    exit;
}

$articleId = $_GET['id'];
$error = [];

$articleModel = new ArticleModel();
$article = $articleModel->getOneArticleById($articleId);

$categoryModel = new CategoryModel();
$nativeCountryModel = new NativeCountryModel();

$categories = $categoryModel->getAllCategories();
$nativeCountries = $nativeCountryModel->getAllNativeCountries();

if (!$article) {
    $error['introuvable'] = 'L\'article recherché est introuvable dans la Base de donnée';
    exit;
}

$articleName = $article['article_name'];
$articleDescription = $article['article_description'];
$articleQuantity = $article['article_quantity'];
$articlePrice = $article['article_price'];
$articleArrivalDate = $article['article_arrival_date'];
$categoryId = $article['category_id'];
$categoryName = $article['category_name'];
$nativeCountryId = $article['native_country_id'];
$nativeCountryName = $article['native_country_name'];
$articleImage = $article['article_image'];
$articleSpotlight = $article['article_spotlight'];
$articleIsActive = $article['article_isActive'];

// dump($_POST);
if (!empty($_POST)) {
    $articleName = trim($_POST['name']);
    $articleDescription = trim($_POST['description']);
    $articleQuantity = $_POST['quantity'];
    $articlePrice = $_POST['price'];
    $articleNativeCountryId = $_POST['nativeCountry'];
    $articleCategoryId = $_POST['category'];
    $articleArrivalDate = $articleArrivalDate = !$_POST['arrivalDate'] ? null : $_POST['arrivalDate'];
    $articleImage = trim($_POST['articleImage']);
    if (isset($_POST['articleIsActive'])) {
        $articleIsActive = $_POST['articleIsActive'];
    } else {
        $articleIsActive = 0;
    }
    if (isset($_POST['articleSpotlight'])) {
        $articleSpotlight = $_POST['articleSpotlight'];
    } else {
        $articleSpotlight = 0;
    }

    if (!$articleName) {
        $errors['name'] = 'Le champs "nom" est obligatoire';
    }
    if (!$articlePrice) {
        $errors['price'] = 'Le champs "prix" est obligatoire';
    }
    if (!$articleNativeCountryId) {
        $errors['nativeCountry'] = 'Le champs "Pays d\'origine" est obligatoire';
    }
    if (!$articleCategoryId) {
        $errors['category'] = 'Le champs "Catégorie" est obligatoire';
    }
    if (!$articleArrivalDate) {
        $errors['arrivalDate'] = 'Le champs "Date de réception" est obligatoire';
    }
    if (!$articleImage) {
        $errors['imageArticle'] = 'Le champs "image de l\'article" est obligatoire';
    }

    if (empty($errors)) {
        $articleModel = new ArticleModel();
        $articleModel->updateArticle($articleName, $articleDescription, $articleQuantity, $articlePrice, $articleArrivalDate, $articleCategoryId, $articleNativeCountryId, $articleImage, $articleSpotlight, $articleIsActive, $articleId);

        addFlashMessage('L\'article à été modifié avec succès');
        header('Location: /admin-panel/articles');
    }
}


// Affichage : inclusion du template
$template = 'admin-edit-article';
$titlePage = 'Edition d\'article';
include '../templates/base_admin.phtml';
