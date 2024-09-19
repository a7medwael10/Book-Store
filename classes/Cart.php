<?php
namespace classes;
session_start();

class Cart
{
    public function __construct() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addBook($book) {
        $_SESSION['cart'][] = $book;
    }

    public function removeBook($bookId) {
        unset($_SESSION['cart'][$bookId]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($_SESSION['cart'] as $book) {
            $total += $book['price'];
        }
        return $total;
    }

    public function getCart() {
        return $_SESSION['cart'];
    }
}
