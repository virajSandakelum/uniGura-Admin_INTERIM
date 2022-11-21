<?php

class Register extends Controller
{
    public function index()
    {
        $this->view('auth/signup');
    }

    public function register()
    {

        // if user click the register button
        if (isset($_POST["register_btn"])) {

            // Get form input date
            $username = $_POST["username"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

            // Input validation
            if (inputsEmptyRegister($username, $email, $password, $confirm_password)) {

                header("location:" . ROOT . "/public/Register?error=inputsEmpty");
                die();
            } else if (usernameInvalid($username)) {
                // if fname & lname is defined by using the numbers not letters
                header("location:" . ROOT . "/public/Register?error=invalid_username");
                die();
            } else if (emailAvaiable($email)) {
                header("location:" . ROOT . "/public/Register?error=emailisalreadyexist");
                die();
            } else if (emailInvalid($email)) {
                header("location:" . ROOT . "/public/Register?error=invalid_email");
                die();
            } else if (passwordInvalid($password)) {
                header("location:" . ROOT . "/public/Register?error=invalid_password");
                die();
            } else if (passwordNotMatch($password, $confirm_password)) {
                header("location:" . ROOT . "/public/Register?error=different_password");
                die();
            } else {

                // if all validation are error free

                $user = new User;

                $arr['username'] = $username;
                $arr['email'] = $email;
                $hashedPasswd = md5($password);
                $arr['password'] = $hashedPasswd;

                $user->insert($arr);
                
                header("location:" . ROOT . "/public/Login?error=reigster_success");
                die();
            }
        } else {
            header("location:" . ROOT . "/public/Register");
            exit();
        }
    }
}




