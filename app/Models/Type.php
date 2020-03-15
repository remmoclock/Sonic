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
}