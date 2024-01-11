<?php

namespace App\Model;

use App\Core\AbstractModel;

class CategoryModel extends AbstractModel
{
    function getAllCategories(): array
    {

        // Préparation de la requête
        $sql = 'SELECT * FROM category';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution de la requête
        $pdoStatement->execute();

        // On retourne tous les résultats de la requête
        $results = $pdoStatement->fetchAll();

        if (!$results) {
            return [];
        }

        return $results;
    }

    function getOneCategoryById()
    {
        $sql = 'SELECT id FROM category';
        $pdoStatement = self::$pdo->prepare($sql);

        // Exécution de la requête
        $pdoStatement->execute();

        // On retourne tous les résultats de la requête
        $results = $pdoStatement->fetch();

        if (!$results) {
            return [];
        }

        return $results;
    }
}
