<?php
require __DIR__ . '/../repositories/CheeseRepository.php';

class CheeseController
{

    public function index()
    {
        $CheeseRepository = new CheeseRepository();
        $CheeseList = json_encode($CheeseRepository->getAll());
        return $CheeseList;
    }
}