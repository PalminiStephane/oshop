<?php

namespace Oshop\models;

// pour utiliser la classe Database qui est dans un autre namespace,
// on doit ajouter un use !
use Oshop\Utils\Database;

use PDO;

// cette classe hérite de la classe CoreModel
// mais rajoute ses propres spécificités !
class Type extends CoreModel
{
    private $name;

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function find($id) {
        // connexion à la BDD
        $pdo = Database::getPDO();

        // req. SQL
        $sql = "SELECT * FROM type WHERE id = " . $id;

        // on lance la req.
        $pdoStatement = $pdo->query($sql);

        // on récupère le résultat
        $type = $pdoStatement->fetchObject('\Oshop\models\Type');

        return $type;
    }

    public function findAll() {
        // connexion à la BDD
        $pdo = Database::getPDO();

        // req. SQL
        $sql = "SELECT * FROM type";

        // on lance la req.
        $pdoStatement = $pdo->query($sql);

        // on récupère le résultat
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Type');

        return $types;
    }
}