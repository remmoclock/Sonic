<?php

namespace App\Models ;

use App\Utils\Database;
use PDO;


class Type {

    protected $id ;
    protected $name;
    protected $created_at ;
    protected $updated_at ;

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


    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = '
            SELECT *
            FROM `type`
        ';
        $pdoStatement = $pdo->query($sql);
        $allType = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);
        
        return $allType;
    }


}