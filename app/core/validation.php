<?php

// ------------------------------------ Functions to check the REGISTER FORM inputs validations -----------------------------------------


// check the register inputs are empty
function  inputsEmptyRegister($username, $email, $password, $confirm_password)
{
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        return true;
    } else {
        return false;
    }
}


// check the name is valid
function usernameInvalid($username)
{
    if (!preg_match("/^[a-zA-Z]+$/", $username)) {
        return true;
    } else {
        return false;
    }
}


// check email is valid 
function emailInvalid($email)
{
    if (!preg_match("/^[a-zA-Z\d\.-_]+[@][a-zA-Z\d\.-_]+[\.][a-zA-Z\d]{2,}$/", $email)) {
        return true;
    } else {
        return false;
    }
}



// check the password is valid
function passwordInvalid($passwd)
{
    if (!preg_match("/^.{5,}$/", $passwd)) {
        return true;
    } else {
        return false;
    }
}


// check the password is match
function passwordNotMatch($passwd, $confirm_password)
{
    if ($passwd != $confirm_password) {
        return true;
    } else {
        return false;
    }
}


// check the mobile number & email is already availble in th{e DB
function emailAvaiable($email)
{
    $user = new User;

    $arr['email'] = $email;
    $result = $user->where($arr);

    if ($result) {
        return true;
    } else {
        return false;
    }
}






// ------------------------------------ Functions to check the LOGIN FORM inputs validations -----------------------------------------


// check the login inputs are empty
function inputsEmptyLogin($email, $password)
{
    if (empty($email || $password))
        return true;
    else
        return false;
}





// ------------------------------------ Functions to check the ADD NEW SUBJECT inputs validations -----------------------------------------

// check the add new subject inputs are empty

function inputsEmpty($subjectName){
    if(empty($subjectName)){
        return true;
    }
    else{
        return false;
    }
}