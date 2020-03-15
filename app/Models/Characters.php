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
    


        /**App\Controllers\
     */
    public function find($charactersId)
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







}