<?php

use classes\Book;
use classes\Cart;
include_once '../layouts/header.php';
include_once '../classes/Book.php';
include_once '../classes/`Cart.php';

$bookData = new Book();
$books = $bookData->allBooks()
?>
<h2 style="padding : 20px">Book List</h2>

<div class="container my-3 me-5 pb-5">
    <div class="row  m-auto grid gap-3">
        <?php foreach ($books as $book): ?>

            <div class="card g-col-4" style="width: 18rem;">
                <div class="card-img" style="height: 60%">
                    <img src="<?= $book['img_path'] ?>" class="card-img-top h-100" alt="...">
                </div>
                <div class="card-body" style="height: 20%">
                    <h5 class="card-title"><?= $book['title'] ?></h5>
                    <p class="card-text"><?= $book['author'] ?></p>
                </div>
                <div style="height: 20%" class="mt-3">
                    <h4 class="card-text">$<?= $book['price'] ?></h4>
                    <form method="post">
                        <input type='hidden' name='bookId' value='<?= $book['id'] ?>'>
                        <button type='submit' name="addCart" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>

        <?php
        endforeach;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cart = new Cart();
            $selectedBook = $bookData->getBookById($_POST['bookId']);
            $cart->addBook($selectedBook);
        }

        ?>
    </div>
</div>






<?php include_once '../layouts/footer.php' ?>
