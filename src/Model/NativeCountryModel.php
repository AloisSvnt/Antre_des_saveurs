<?php

namespace App\Model;

use App\Core\AbstractModel;

class NativeCountryModel extends AbstractModel
{
    function getAllNativeCountries(): array
    {

        // Préparation de la requête
        $sql = 'SELECT * FROM native_country';
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

    function getOneNativeCountryById()
    {
        $sql = 'SELECT id FROM native_country';
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
