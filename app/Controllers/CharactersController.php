<?php
namespace App\Controllers;

use App\Models\Characters;

class CharactersController extends CoreController{

    public function characters() {

        $AllSonic = Characters::findAll();

        $this->show('characters/characters',
        [
         'mainCharacters' => $AllSonic    
        ]
        ) ;

    } 

    public function characterAdd() {

        $this->show('characters/characterAdd');


    } 

    public function characterCreate() {

        dump($_POST);


    } 


}