<?php
require __DIR__ . '/../repositories/Sign_upRepository.php';

class Sign_upService {
    public function Register($email, $pass) {
        $repository = new Sign_upRepository();
        return $repository->Register($email, $pass);
    }
}