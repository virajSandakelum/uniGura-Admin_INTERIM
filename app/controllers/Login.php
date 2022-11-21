<?php

class Login extends Controller
{
    public function index()
    {
        $this->view('auth/login');
    }

    public function userLogin()
    {

        if (isset($_POST['login_btn'])) {

            // Get login form input data

            $email = $_POST['email'];
            $password = $_POST['password'];
            $rememberME = $_POST['remberMe_check'];


            // Input validation

            if (inputsEmptyLogin($email, $password)) {
                header("location:" . ROOT . "/public/Login?error=inputsEmpty");
                die();
            } else if (emailInvalid($email)) {
                header("location:" . ROOT . "/public/Login?error=invalid_email");
                die();
            } else if (passwordInvalid($password)) {
                header("location:" . ROOT . "/public/Login?error=invalid_paassword");
                die();
            } else {
                // if the inputs are valid

                $user = new User;
                $arr['email'] = $email;
                $result = $user->where($arr);
                
                $encrypedPassword = md5($password);
                
                
                $count = 0;
                foreach ($result as $row) {
                    $count++;
                }

                if ($count > 0) {
                    if ($row['password'] == $encrypedPassword) {
                        session_start();
                        $_SESSION['session_username'] = $row['username'];
                        $_SESSION['session_email'] = $row['email'];



                        if (isset($rememberME)) {
                            setcookie('emailcookie', $email, time() + 3600 * 24 * 365, "/");
                            setcookie('passwordcookie', $password, time() + 3600 * 24 * 365, "/");
                        } else {
                            if (isset($_COOKIE['emailcookie'])) {
                                setcookie('emailcookie', "", time() - 3600, "/");
                            }
                            if (isset($_COOKIE['passwordcookie'])) {
                                setcookie('passwordcookie', "", time() - 3600, "/");
                            }
                        }
                        header("location:" . ROOT . "/public/Dashboard");
                        die();
                    } else {
                        header("location:" . ROOT . "/public/Login?error=wrongpassword");
                        die();
                    }
                } else {
                    header("location:" . ROOT . "/public/Login?error=wrongemail");
                    die();
                }

            }
        }

        header("location:" . ROOT . "/public/Login?error=inputsEmpty");
    }
}
