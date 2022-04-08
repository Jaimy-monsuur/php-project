<?php
require __DIR__ . '/../repositories/OrderRepository.php';

class OrderController
{

    public function index()
    {     
        $OrderRepository = new OrderRepository();   
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $json = file_get_contents('php://input');
            $Order = new Order();
            $Order->account = $_SESSION['user'];
            $Order->cart = $json;

            $OrderRepository->Insert($Order);
        }
        elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
            $OrderList = json_encode($OrderRepository->getAll($_SESSION['user']));
            echo $OrderList;// of toch echo???
        }

    }
}
