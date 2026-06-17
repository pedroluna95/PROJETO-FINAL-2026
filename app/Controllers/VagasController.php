<?php

namespace App\Controllers;

class VagasController extends BaseController {

    public function open (){
        
        if (!isset($_SESSION['user_id'])){

            header("Location: index.php?url=home/login");
            exit();

        }
        else {

        }      
        

    } 
    
}