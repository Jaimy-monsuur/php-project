
<?php
require __DIR__ . '/../../repositories/repository.php';
require __DIR__ . '/../../models/cheese.php';

class CheeseRepository extends Repository
{
    function getAll()
    {
        try {
            $stmt = $this->connection->prepare("SELECT * FROM Cheese");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Cheese');
            $cheeselist = $stmt->fetchAll();

            return $cheeselist;
        } catch (PDOException $e) {
            echo $e;
        }
    }
}
?>