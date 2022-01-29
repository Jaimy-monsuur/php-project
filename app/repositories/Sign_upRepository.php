<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';
require __DIR__ . '/../controllers/Logincontroller.php';

class Sign_upRepository extends Repository {

    function Register($email, $pass) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users Where username = '$email'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            if ($stmt->rowCount() > 0) {
                $_POST = array();
                $_SESSION["error"] = "email is already in use";
                require __DIR__ . '/../views/Sign-up/index.php';
            }
            else {
                $hash = password_hash($pass, PASSWORD_DEFAULT);
                $stmt = $this->connection->prepare(" INSERT INTO Users (username , password)
                VALUES ('$email', '$hash');");
                if ($stmt->execute())
                {
                    header("LOCATION: http://localhost:81/Login");
                    $_POST = array();   
                    $login = new LoginController();
                    $login->index();
                }
            }
        }
        catch (PDOException $e)
        {
            echo $e;
            $_POST = array();
            $this->Wrong();
        }
    }
    function Wrong()
    {
        $_SESSION["error"] = "Something went wrong... try again later.";
        require __DIR__ . '/../views/Sign-up/index.php';
    }
}