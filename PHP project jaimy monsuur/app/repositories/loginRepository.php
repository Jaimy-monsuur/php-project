<?php
require __DIR__ . '/repository.php';
//require __DIR__ . '/../models/article.php';

class LoginRepository extends Repository {

    function Login() {
        try {


        } catch (PDOException $e)
        {
            echo $e;
        }
    }

}