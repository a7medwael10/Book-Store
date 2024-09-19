<?php

namespace classes;
use PDO;

define("CONNECT", require_once 'Database.php');

class Book
{

    public $pdo = CONNECT;
    public function allBooks()
    {
        $sql = 'SELECT * FROM book';
        $statement =$this->pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
   }
    public function getBookById($id) {
        $statement = $this->pdo->prepare("SELECT * FROM book WHERE id = :id");
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

}
