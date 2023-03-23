<?php

namespace Oshop\models;

use Oshop\Utils\Database;
use PDO;

// cette classe hérite de la classe CoreModel
// mais rajoute ses propres spécificités !
class Category extends CoreModel
{
    private $name;
    private $subtitle;
    private $picture;
    private $home_order;

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

    /**
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of home_order
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set the value of home_order
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }

    public function find($id) 
    {
        // connexion à la BDD
        $pdo = Database::getPDO();

        // req. SQL
        $sql = "SELECT * FROM category WHERE id = " . $id;

        // on lance la req.
        $pdoStatement = $pdo->query($sql);

        // on récupère le résultat
        $category = $pdoStatement->fetchObject('\Oshop\models\Category');

        return $category;
    }

    public function findAll() 
    {
        // connexion à la BDD
        $pdo = Database::getPDO();

        // req. SQL
        $sql = "SELECT * FROM category";

        // on lance la req.
        $pdoStatement = $pdo->query($sql);

        // on récupère le résultat
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Category');

        return $categories;
    }

    public function findHomeOrder()
    {
        // connexion à la BDD
        $pdo = Database::getPDO();

        // req. SQL
        $sql = "SELECT *
        FROM category
        WHERE home_order > 0
        ORDER BY home_order
        LIMIT 5;";

        // on lance la req.
        $pdoStatement = $pdo->query($sql);

        // on récupère les résultats
        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Category');

        return $categories;
    }
}