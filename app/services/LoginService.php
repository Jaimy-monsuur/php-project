<?php
require __DIR__ . '/../repositories/loginRepository.php';

class LoginService {
    public function Login($email, $pass) {
        $repository = new LoginRepository();
        return $repository->Login($email, $pass);
    }
}