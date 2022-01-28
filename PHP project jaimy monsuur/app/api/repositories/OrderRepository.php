
<?php
require __DIR__ . '/../../repositories/repository.php';
require __DIR__ . '/../../models/Order.php';

class OrderRepository extends Repository
{
    function getAll($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Orders WHERE account = '$name'");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Order');
            $Orders = $stmt->fetchAll();

            return $Orders;
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function Insert($order)
    {
        try {
            $stmt = $this->connection->prepare(" INSERT INTO Orders (account , cart)
            VALUES ('$order->account', '$order->cart');");
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>