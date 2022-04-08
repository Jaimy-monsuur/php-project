
<?php
require __DIR__ . '/../../repositories/repository.php';
require __DIR__ . '/../../models/Order.php';

class OrderRepository extends Repository
{
    function getAll($name)
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Orders WHERE account = :name");
            $stmt->bindValue(':name', $name, \PDO::PARAM_STR);
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
            VALUES (:account, :cart);");
            $stmt->bindValue(':account', $order->account, \PDO::PARAM_STR);
            $stmt->bindValue(':cart', $order->cart, \PDO::PARAM_STR);
            $stmt->execute();

        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>