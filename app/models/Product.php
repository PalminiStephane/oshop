<?php

namespace Oshop\models;

use Oshop\Utils\Database;
use PDO;

// cette classe hérite de la classe CoreModel
// mais rajoute ses propres spécificités !
class Product extends CoreModel
{
    private $name;
    private $description;
    private $picture;
    private $price;
    private $rate;
    private $status;

    private $brand_id;
    private $category_id;
    private $type_id;

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

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

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
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of rate
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    // findAll nous permet de récupérer toutes les lignes de la table brand
    // (donc, toutes les marques)
    public function findAll() {
        // pour récupérer notre connexion à la BDD, on a juste à utiliser Database::getPDO()
        $db = Database::getPDO();

        // on va faire une requête SQL
        $sql = "SELECT * FROM product";

        // on lance la requête sur la BDD
        // et on récupère le "statement"
        $pdoStatement = $db->query($sql);

        // on récupère nos résultats avec fetchAll()
        // PDO::FETCH_CLASS indique à PDO qu'on récupère un nouvel objet de la classe Brand
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Product');

        // on retourne les résultats
        return $results;
    }

    // find nous permet de récupérer une ligne spécifique de la table brand
    // grâce à son ID !
    public function find($id) {
        $db = Database::getPDO();
        $sql = "SELECT * FROM product WHERE id = " . $id;
        $pdoStatement = $db->query($sql);

        // pour récupérer automatiquement un objet Brand, on utilise fetchObject()
        $result = $pdoStatement->fetchObject('\Oshop\models\Product');
        return $result;
    }

    public function findAllByCategoryId($id)
    {
        $db = Database::getPDO();

        $sql = "SELECT * FROM product WHERE category_id = {$id}";
        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Product');
        return $results;
    }

    public function findAllByBrandId($id)
    {
        $db = Database::getPDO();

        $sql = "SELECT * FROM product WHERE brand_id = {$id}";
        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Product');
        return $results;
    }

    public function findAllByTypeId($id)
    {
        $db = Database::getPDO();

        $sql = "SELECT * FROM product WHERE type_id = {$id}";
        $pdoStatement = $db->query($sql);

        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, '\Oshop\models\Product');
        return $results;
    }

    /**
     * Get the value of brand_id
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}