<?php include_once '../layouts/header.php';
include_once '../functions.php';

?>

<?php
session_start();

// echo '<pre>';
// var_dump($books);
// echo '</pre>';
// exit
?>
<?php if (empty($_SESSION['cart'])) 

echo '<h2 style="padding : 20px">your Cart is empty</h2>';

?>


<div class="container my-3 me-5 pb-5">
<?php if (!empty($_SESSION['cart'])) :
    $books = $_SESSION['cart'];
    ?>

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
            <?php foreach ($books as $key => $book): ?>
                <tr>
                    <td class="cart-item"> <img src="<?= $book['imgPath'] ?>" class="card-img-top" alt="..."></td>
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
                    if (isset($_SESSION['cart'][$removeIndex])) {
                        unset($_SESSION['cart'][$removeIndex]);
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                    }
                }
            }
    ?>
    </table>
    <?php
    endif;
    if (!empty($_SESSION['cart'])) {
        $total = 0;
        foreach ($books as $book) {
            $total += $book['price'];
        }
        $totalPrice = currencyValue($total,$_COOKIE['currency']);

        echo "<h3>Total: ".$_COOKIE['currency']." $totalPrice</h3>";
        echo '<a href="bookDetails.php" class="btn btn-primary">purchase</a>';
    }
    ?>
</div>





<?php include_once '../layouts/footer.php' ?>