<?php include_once '../layouts/header.php' ?>



<?php

// Set and get preferred currency
if (isset($_POST['currency'])) {
    setcookie('currency', $_POST['currency'], time() + (86400 * 30), "/"); // 30 days
    $currency = $_POST['currency'];
} elseif (isset($_COOKIE['currency'])) {
    $currency = $_COOKIE['currency'];
} else {
    $currency = 'USD'; 
}
?>
<div class="container my-3">
<h2 style="padding : 20px">Your preferred currency is: <?=$currency?></h2>
    <form method="POST">
        <div class="mb-3">
            <label for="disabledSelect" class="form-label">Select your preferred currency:</label>
            <select id="disabledSelect" class="form-select" name="currency">
                <option value="USD" <?= $currency == 'USD' ? 'selected' : '' ?>>USD</option>
                <option value="EUR" <?= $currency == 'EUR' ? 'selected' : '' ?>>EUR</option>
                <option value="GBP" <?= $currency == 'GBP' ? 'selected' : '' ?>>GBP</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

</div>







<?php include_once '../layouts/footer.php' ?>