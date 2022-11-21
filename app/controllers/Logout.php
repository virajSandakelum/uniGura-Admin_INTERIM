<?php

class Logout extends Controller
{
    public function index()
    {
        // logout

        session_start(); // without starting the session, we can't destroy session

        session_unset(); // unset all the session variables

        session_destroy(); // destroy the session

        header("location:" . ROOT . "/public/Login"); // redirect to login page

    }
}
