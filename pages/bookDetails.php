<?php include_once '../layouts/header.php' ?>


<div class="container my-3">
    <h2 style="padding : 20px">Fill your data</h2>

    <form method="post">
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1" require>

            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
        </div>
        <button type="submit" name="data" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['data'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        echo "<h4 class='text-success'>Thank you for your purchase, $name! A confirmation has been sent to $email.</h4>";
    }
}
    ?>
</div>








<?php include_once '../layouts/footer.php' ?>