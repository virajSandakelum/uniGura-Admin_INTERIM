<!-- this file is use to load all the other file within the core folder  -->
<!-- every files should added to the init, otherwise it's not part of the project -->


<!-- model is extends from the database class
that's why Model is below the Database class -->


<?php

spl_autoload_register(function($className){

    $fileName = '../app/models/'.ucfirst($className).'.php';
    if(file_exists($fileName)){
        require_once $fileName;
    }
    else{
        echo "File not found";
    }
});

require 'config.php';
require 'validation.php';
require 'Database.php'; // this one is a class, so that should be capatalization
require 'Model.php'; 
require 'Controller.php';
require 'App.php';

