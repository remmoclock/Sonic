<?php

namespace App\Models ;

use App\Utils\Database;
use PDO;

class Characters {

    protected $id ;
    protected $name;
    protected $description;
    protected $picture;
    protected $created_at;
    protected $updated_at;
    protected $type_id ;



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }
    
    /**
     * Get the value of type_id
     */ 
    public function getTypeId()
    {
        return $this->type_id;
    }


        /**App\Controllers\
     */
    static public function find($charactersId)
    {
        // se connecter à la BDD
        $pdo = Database::getPDO();

        // écrire notre requête
        $sql = '
            SELECT *
            FROM `character`
            WHERE `id` =' . $charactersId;

        // exécuter notre requête
        $pdoStatement = $pdo->query($sql);

        // un seul résultat => fetchObject
        $character = $pdoStatement->fetchObject(Characters::class);
        
        return $character;
    }

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table character
     * 
     * @return Characters[]
     */
    // On peut, si on le souhaite, convertir cette méthode en méthode statique
    // car la méthode n'utilise pas l'objet courant ($this)
    // Il suffit alors d'ajouter le mot-clé "static"
    // Dans ce cas là, on dira que la méthode est liée/attachée à la classe (et non plus à l'objet de la classe)
    // Ainsi, on pourra appler la méthode directement depuis sa classe
    //      Category::findAll()
    // règle :
    //    1- si il y a $this dans le corps de la méthode, alors static impossible
    //    2- sinon, static possible, au choix
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM `character`
        ';
        $pdoStatement = $pdo->query($sql);
        $allCharacters = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Characters::class);
        
        return $allCharacters;
    }



    public function setName($name)
    {
        $this->name = $name;
    }





    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
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
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }



    public function insert()
    {
        //https://sql.sh/cours/insert-into
        $sql = "
            INSERT INTO `character` (
                `name`,
                `description`,
                `picture`,
                `type_id`
            ) VALUES (
                :name,
                :description,
                :picture,
                :type_id
            )
        ";

        //récupération de l'objet pdo pour communiquer avec la BDD
        $pdo = Database::getPDO();

        //$preparedStatement est une "requête SQL que l'on va customiser"
        $preparedStatement = $pdo->prepare($sql);

        //la requête va remplacer ":name" par $this->getName();
        $preparedStatement->bindValue(':name', $this->getName());
        
        //idem pour les autres colonnes...
        $preparedStatement->bindValue(':description', $this->getDescription());
        $preparedStatement->bindValue(':picture', $this->getPicture());
        $preparedStatement->bindValue(':type_id', $this->getTypeId());

        //execution de a requête
        $preparedStatement->execute();
    }

    public function update()
    {
        //https://sql.sh/cours/update
        $sql = "
            UPDATE `character`
            SET
                `name` = :name,
                `description` = :description,
                `picture` = :picture,
                `type_id` = :type_id
            WHERE
                id = :id

        ";

        //récupération de l'objet pdo pour communiquer avec la BDD
        $pdo = Database::getPDO();

        //$preparedStatement est une "requête SQL que l'on va customiser"
        $preparedStatement = $pdo->prepare($sql);

        //la requête va remplacer ":name" par $this->getName();
        $preparedStatement->bindValue(':name', $this->getName());
        
        //idem pour les autres colonnes...
        $preparedStatement->bindValue(':description', $this->getDescription());
        $preparedStatement->bindValue(':picture', $this->getPicture());
        $preparedStatement->bindValue(':type_id', $this->getTypeId());
        $preparedStatement->bindValue(':id', $this->getId());

        //execution de a requête
        $preparedStatement->execute();

    }



    public function delete()
    {
        $sql = "
            DELETE FROM `character` WHERE id = :id
        ";

        $pdo = Database::getPDO();

        $preparedStatement = $pdo->prepare($sql);
        $preparedStatement->bindValue(':id', $this->getId());
        $preparedStatement->execute();



    }

    public function edit()
    {
        $sql = "
            UPDATE FROM `character` WHERE id = :id
        ";

        $pdo = Database::getPDO();

        $preparedStatement = $pdo->prepare($sql);
        $preparedStatement->bindValue(':id', $this->getId());
        $preparedStatement->execute();



    }


}