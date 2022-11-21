<?php

class User extends Model{

    // use Model;

    protected $table = 'users';

    // all the colums that should be editable 
    protected $allowedColums = [
        
        'username',
        'email',
        'password',
    ];

}