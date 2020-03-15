<?php
namespace App\Controllers;

use App\Models\Characters;
use App\Models\Type;


class CharactersController extends CoreController{

    public function characters() {

        $allSonic = Characters::findAll();

        $this->show('characters/characters',
        [
            'mainCharacters' => $allSonic    
        ]
        ) ;

    } 

    public function characterAdd() {

        // recuperer les données du table Type
        $allTypes = Type::findAll();


        //afficher la page
        $this->show('characters/characterAdd',
        [
            'listType' => $allTypes
        ]   
        ) 
    ;


    } 


    //methode permettant de creer/ajouter un nouveau personnage dans la base de données
    public function characterCreate() {
        // verifie que le tableau $_POST contient bien les données envoyées par le formulaire
        //dump($_POST);

        //https://www.php.net/isset
        /*
        if(isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        */

        //fait la même chose que tout le bloc précédent
        //https://www.php.net/filter_input
        //on récupère la valeur stockée à l'index 'name' de la variable $POST
        $name = filter_input(INPUT_POST, 'name');
        //dump($name);

        $description = filter_input(INPUT_POST,'description');
        //dump($description);

        $picture = filter_input(INPUT_POST,'picture');
        //dump($picture);

        $category = filter_input(INPUT_POST,'category');
        //dump($category);

        // on souhaite faire des traitement dans la bdd , donc on instencie un Model (pour travailer sur la base de donnée)
        // a chaque creation on instancie la class Characters

        //Nous instancions un nouvel objet Character (En français "crée un nouveau personnage")
        $newCharacter = new Characters();
        //dump($newCharacter);

        // creation de l'objet avec les propriétés vides qu'on va devoir renseigner

        // je veux renseigner les propriétés de l'objet grace aux données envoyées par le formulaire  
        
        //https://www.php.net/filter_input


        //on utilise les setter 
        $newCharacter->setName($name);
        $newCharacter->setDescription($description);
        $newCharacter->setPicture($picture);
        $newCharacter->setTypeId($category);

        //dump($newCharacter);

        //nous veut sauvegarder ce nouveau personnage en base de donnée
        $newCharacter->insert();

        header('Location: ' . $this->router->generate('characters-characters'));
        

    } 


    public function charactersDelete($id) {
        
        $characterToDelete = Characters::find($id);
        $characterToDelete->delete();
        header('Location: ' . $this->router->generate('characters-characters'));
        //dump($characterToDelete);

    }


    public function charactersEdit($id) {
        
        $characterToEdit = Characters::find($id);
        //dump($characterToEdit);
        // recuperer les données du table Type
        $allTypes = Type::findAll();

        $this->show('characters/edit', [
            'character' => $characterToEdit,
            'listType' => $allTypes,
        ]);
    }


    public function charactersUpdate($id)
    {
        $characterToSave = Characters::find($id);

        //fait la même chose que tout le bloc précédent
        //https://www.php.net/filter_input
        //on récupère la valeur stockée à l'index 'name' de la variable $POST
        $name = filter_input(INPUT_POST, 'name');
        //dump($name);

        $description = filter_input(INPUT_POST,'description');
        //dump($description);

        $picture = filter_input(INPUT_POST,'picture');
        //dump($picture);

        $category = filter_input(INPUT_POST,'category');

        //on utilise les setter 
        $characterToSave->setName($name);
        $characterToSave->setDescription($description);
        $characterToSave->setPicture($picture);
        $characterToSave->setTypeId($category);
        
        $characterToSave->update();


        header('Location: ' . $this->router->generate('characters-characters'));
        //dump($characterToSave);

    }


}