<?php
namespace App\Controllers;

use App\Models\Type;

class TypeController extends CoreController{

    public function type() {

        $allType = Type::findAll();

        $this->show('type/type',
        [
         'listType' => $allType    
        ]
        ) ;

        dump($allType);
    } 

}