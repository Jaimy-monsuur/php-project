<?php

class Sign_upController
{

    public function index()
    {
        $_SESSION["error"] = "";
        if($_POST == null){
            require __DIR__ . '/../views/Sign-up/index.php';
        }
        else {
            $this->Register();
        }
    }
    public function Register()
    {
        // Validate username 
        if(empty(trim($_POST["email_address"])) || empty(trim($_POST["password"])) || empty(trim($_POST["email_address-2nd"])) || empty(trim($_POST["password-2nd"]))){ $_SESSION["error"] = "Please enter an email_address and password.";}
        elseif($_POST["email_address"] != $_POST["email_address-2nd"]){ $_SESSION["error"] = "The two email address do not match";}    
        elseif($_POST["password"] != $_POST["password-2nd"]){ $_SESSION["error"] = "The two passwords do not match";}

        if(empty($_SESSION["error"])){
            require __DIR__ . '/../services/Sign_upService.php';
            $Service = new Sign_upService();
            $email = trim($_POST["email_address"]);
            $pass = trim($_POST["password"]);
            return $Service->Register($email, $pass);
        }
        else {
            $_POST = array();
            require __DIR__ . '/../views/Sign-up/index.php';
        }

    }

}