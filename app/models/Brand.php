<?php

namespace Oshop\models;

use Oshop\Utils\Database;
use PDO;

// cette classe hérite de la classe CoreModel
// mais rajoute ses propres spécificités !
class Brand extends CoreModel
{
    // On créé nos modèles en suivant le Design Pattern ACTIVE RECORD
    // étape 1 : on créé une classe PHP par table dans notre BDD

    // étape 2 : on ajoute autant de propriétés que notre table a de colonnes

    private $name;


    // étape 2 : on ajoute des getters & setters pour ces propriétés

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    // étape 2 : on ajoute des méthodes "utilitaires"

    // findAll nous permet de récupérer toutes les lignes de la table brand
    // (donc, toutes les marques)
    public function findAll() {

        // pour récupérer notre connexion à la BDD, on a juste à utiliser Database::getPDO()
        $db = Database::getPDO();

        // on va faire une requête SQL
        $sql = "SELECT * FROM brand";

        // on lance la requête sur la BDD
        // et on récupère le "statement"
        $pdoStatement = $db->query($sql);

        // on récupère nos résultats avec fetchAll()
        // PDO::FETCH_CLASS indique à PDO qu'on récupère un nouvel objet de la classe Brand
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Brand');

        // on retourne les résultats
        return $results;
    }

    // find nous permet de récupérer une ligne spécifique de la table brand
    // grâce à son ID !
    public function find($id) {
        $db = Database::getPDO();
        $sql = "SELECT * FROM brand WHERE id = " . $id;
        $pdoStatement = $db->query($sql);

        // pour récupérer automatiquement un objet Brand, on utilise fetchObject()
        $result = $pdoStatement->fetchObject('\Oshop\models\Brand');
        return $result;
    }
}