<?php

use App\Model\ArticleModel;
use App\Model\CategoryModel;
use App\Model\NativeCountryModel;

$errors = [];

$today = date('Y-m-d');

$name = '';
$description = '';
$quantity = '';
$price = '';
$arrivalDate = $today;
$category = 1;
$nativeCountry = 1;
$imageArticle = '';
$spotlight = 0;
$isActive = 0;

if (!empty($_POST)) {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $arrivalDate = $arrivalDate = !$_POST['arrivalDate'] ? null : $_POST['arrivalDate'];
    $category = $_POST['category'];
    $nativeCountry = $_POST['nativeCountry'];
    $imageArticle = trim($_POST['imageArticle']);
    if (isset($_POST['articleSpotlight'])) {
        $spotlight = $_POST['articleSpotlight'];
    }
    if (isset($_POST['articleIsActive'])) {
        $isActive = $_POST['articleIsActive'];
    }


    if (!$name) {
        $errors['name'] = 'Le champs "nom" est obligatoire';
    }
    if (!$quantity) {
        $errors['quantity'] = 'Le champs "quantité" est obligatoire';
    }
    if (!$price) {
        $errors['price'] = 'Le champs "prix" est obligatoire';
    }
    if (!$nativeCountry) {
        $errors['nativeCountry'] = 'Le champs "Pays d\'origine" est obligatoire';
    }
    if (!$category) {
        $errors['category'] = 'Le champs "Catégorie" est obligatoire';
    }
    if (!$arrivalDate) {
        $errors['arrivalDate'] = 'Le champs "Date de réception" est obligatoire';
    }
    if (!$imageArticle) {
        $errors['imageArticle'] = 'Le champs "image de l\'article" est obligatoire';
    }

    if (empty($errors)) {

        $articleModel = new ArticleModel();
        $articleModel->insertArticle($name, $description, $quantity, $price, $arrivalDate, $category, $nativeCountry, $imageArticle, $spotlight, $isActive);

        addFlashMessage('L\'article à été créé avec succès');
        header('Location: /admin-panel/articles');
    }
}

$categoryModel = new CategoryModel();
$nativeCountryModel = new NativeCountryModel();

$categories = $categoryModel->getAllCategories();
$nativeCountries = $nativeCountryModel->getAllNativeCountries();


// Affichage : inclusion du template
$template = 'admin-add-article';
$titlePage = 'Nouvel Article';
include '../templates/base_admin.phtml';
