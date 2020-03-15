<?php

namespace App\Controllers;

use App\Models\Characters;

class MainController extends CoreController {


    public function home() {

        $this->show('main/home') ;


    } 




    public function author() {

        $this->show('main/author') ;

    } 





}

