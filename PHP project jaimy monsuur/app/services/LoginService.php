<?php
require __DIR__ . '/../repositories/LoginController.php';

class LoginService {
    public function getAll() {
        $repository = new LoginRepository();
        return $repository->getAll();
    }
}