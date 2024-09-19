<?php

use classes\Cart;
include_once '../classes/Cart.php';
include_once '../layouts/header.php';
include_once '../functions.php';

$cart = new Cart();
$books = $cart->getCart();

?>


<div class="container my-3 me-5 pb-5">
    <h2 style="padding : 20px">My Cart</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Pic</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($books)) {
                echo '
                <tr style="text-align: center" >
                    <td colspan="4" style="text-align: center">your Cart is empty</td>
                </tr>
                ';
            }

            ?>
            <?php foreach ($books as $key => $book): ?>
                <tr>
                    <td class="cart-item"> <img src="<?= $book['img_path'] ?>" class="card-img-top" alt="..."></td>
                    <td><?= $book['title'] ?></td>
                    <td><?= $book['author'] ?></td>
                    <td><?= $book['price'] ?></td>
                    <td>
                        <form method="post">
                            <input type='hidden' name='removeIndex' value='<?= $key ?>'>
                            <button type='submit' name="remove" class="btn btn-primary">Remove</button>
                        </form>
                    </td>
                </tr>
        </tbody>
    <?php endforeach;
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST['remove'])) {
                    $removeIndex = $_POST['removeIndex'];
                    $cart->removeBook($removeIndex);
                }
            }
    ?>
    </table>
    <?php
    if (!empty($_SESSION['cart'])) {
        $total =$cart->getTotalPrice();
        $totalPrice = currencyValue($total,$_COOKIE['currency']);

        echo "<h3>Total: ".$_COOKIE['currency']." "."$totalPrice</h3>";
        echo '<a href="bookDetails.php" class="btn btn-primary">purchase</a>';
    }
    ?>
</div>





<?php include_once '../layouts/footer.php' ?>
