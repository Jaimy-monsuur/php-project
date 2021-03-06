<?php

class LoginController
{

    public function index()
    {
        $_SESSION["error"] = "";
        if($_SESSION['Logged_in'] == true)
        {
            header("LOCATION: https://the-cheese-shop.herokuapp.com/");
            require __DIR__ . '/../views/home/index.php';
        }
        elseif($_POST == null){
            require __DIR__ . '/../views/Login/index.php';
        }
        else {
            $this->Login();
        }
    }

    public function Login()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $uppercase = preg_match('@[A-Z]@', $_POST["password"]);
        $lowercase = preg_match('@[a-z]@', $_POST["password"]);
        $number    = preg_match('@[0-9]@', $_POST["password"]);
        // Validate username 
        if(empty(trim($_POST["email_address"])) || empty(trim($_POST["password"]))){ $_SESSION["error"] = "Please enter an email_address and password.";}
        elseif (!filter_var($_POST["email_address"], FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error"] = "Invalid email format";
        }
        elseif(!$uppercase || !$lowercase || !$number ) {
            $_SESSION["error"] = "Password must contain: uppercase, lowercase and a number";
        }
        if(empty($_SESSION["error"])){
            require __DIR__ . '/../services/LoginService.php';
            $Service = new LoginService();
            $email = trim($_POST["email_address"]);
            $pass = trim($_POST["password"]);
            return $Service->Login($email, $pass);
        }
        else {
            $_POST = array();
            require __DIR__ . '/../views/Login/index.php';
        }
    }
    public function Logout()
    {
        header("LOCATION: https://the-cheese-shop.herokuapp.com/");
        $_POST = array();
        $_SESSION['Logged_in'] = false;
        require __DIR__ . '/../views/home/index.php';

    }

}