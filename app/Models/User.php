<?php

namespace App\Models ;

use App\Utils\Database;
use PDO;

class User {

    protected $id ;
    protected $login;
    protected $email;
    protected $password;




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
    public function getLogin()
    {
        return $this->login;
    }


    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->getEmail;
    }

    public static function find($id)
    {
        $user = new User();
        $user->login = 'test';
        $user->password = 'pwd';
        return $user;
    }

    public static function findByEmail($email)
    {
        /*
        $sql ="
            SELECT * FROM `user` WHERE `email` = :email
        ";

        //récupération de l'objet pdo pour communiquer avec la BDD
        $pdo = Database::getPDO();

        //$preparedStatement est une "requête SQL que l'on va customiser"
        $preparedStatement = $pdo->prepare($sql);

        //la requête va remplacer ":name" par $this->getName();
        $preparedStatement->bindValue(':email', $this->getEmail());
        
        //execution de a requête
        $preparedStatement->execute();
        $user = $preparedStatement->fetchObject(static::class);
        return $user;
        */

        $user = new User();
        $user->id = 1;
        $user->login = 'test';
        $user->password = 'pwd';
        return $user;
    }


}