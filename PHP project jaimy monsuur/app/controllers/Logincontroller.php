<?php

class LoginController
{

    public function index()
    {
        $_SESSION["error"] = "";
        if($_SESSION['Logged_in'] == true)
        {
            header("LOCATION: http://localhost:81/");
            require __DIR__ . '/../views/home/index.php';
            
        }
        elseif($_POST == null){
            require __DIR__ . '/../views/login/index.php';
        }
        else {
            $this->Login();
        }
    }

    public function Login()
    {
        // Validate username 
        if(empty(trim($_POST["email_address"])) || empty(trim($_POST["password"]))){ $_SESSION["error"] = "Please enter an email_address and password.";}

        if(empty($_SESSION["error"])){
            require __DIR__ . '/../services/LoginService.php';
            $Service = new LoginService();
            $email = trim($_POST["email_address"]);
            $pass = trim($_POST["password"]);
            return $Service->Login($email, $pass);
        }
        else {
            $_POST = array();
            require __DIR__ . '/../views/login/index.php';
        }
    }
    public function Logout()
    {
        header("LOCATION: http://localhost:81/");
        $_POST = array();
        $_SESSION['Logged_in'] = false;
        require __DIR__ . '/../views/home/index.php';

    }

}