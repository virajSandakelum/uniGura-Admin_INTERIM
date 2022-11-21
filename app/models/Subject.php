<?php

class Subject extends Model{

    // use Model;

    protected $table = 'subject';

    // all the colums that should be editable 
    protected $allowedColums = [
        'subject_id',
        'subject_name',
    ];

}

