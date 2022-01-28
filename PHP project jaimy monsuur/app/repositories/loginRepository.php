<?php
require __DIR__ . '/repository.php';
require __DIR__ . '/../models/user.php';

class LoginRepository extends Repository {

    function Login($email, $pass) {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Users Where username = '$email'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();

            if ($stmt->rowCount() > 0) {
                $verify = password_verify($pass, $user->password);
                if($email == $user->username && $verify)
                {
                    $_SESSION['Logged_in'] = true;
                    $_SESSION['user'] = $user->username;
                    $_POST = array();
                    $login = new LoginController();
                    $login->index();
                }
                else {
                    $this->Wrong();
                }
            }
            else {
                $this->Wrong();
            }
        }
        catch (PDOException $e)
        {
            $this->Wrong();
        }
    }
    function Wrong()
    {
        $_SESSION["error"] = "Wrong credentials";
        require __DIR__ . '/../views/login/index.php';
    }
}