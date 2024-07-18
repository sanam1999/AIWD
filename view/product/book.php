<?php

if (isset($_GET['product_id']) && isset($_GET['quantity'])) {
    $product_id = $_GET['product_id'];
    $quantity = $_GET['quantity'];
} else {
    header('Location: home.php');
    exit;
}

require ('../../model/product.php');
include ('../include/header.php');
$product = fetchSingleProduct($product_id);

$price = (int) $product->price;
$total = $quantity * $price;
$discountedPrice = ($total - ($total * 0.05)) + 150;
$total += 150;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Payment</title>
  
</head>

<body>
    <main class="main-content">
        <div class="payment">
            <div class="invoice-form">
                <h2>Invoice</h2>
                <div class="form-group">
                    <label for="card-number">Card number</label>
                    <input type="text" required id="card-number" placeholder="1234 5678 9012 3456">
                </div>
                <div class="form-group">
                    <label for="card-name">Name on card</label>
                    <input type="text" required id="card-name" placeholder="Ex. John Website">
                </div>
                <div class="form-group">
                    <label for="expiry-date">Expiry date</label>
                    <input type="text" required id="expiry-date" placeholder="01 / 19">
                </div>
                <div class="form-group">
                    <label for="security-code">Security code</label>
                    <input type="text" required id="security-code" placeholder="•••">
                    <span class="info-icon">?</span>
                </div>
                <button class="book paymentnext">Next</button>
            </div>
        </div>

        <div class="otp">
            <div class="invoice-form">
                <h2>Near by Home</h2>
                <p>Don't share this one-time password with anyone. It's for your security. If you didn't request it,
                    contact support immediately.</p>
                <div class="form-group">
                    <label for="otp-code">One time Password</label>
                    <input type="text" required id="otp-code" name="otp" placeholder="* * * *">
                </div>
                <button><a id="buyNowLink" href="../../model/payment.php?product_id=<?= $product_id; ?>&quantity=<?= $quantity ?>&price=<?= $price ?>&discountedPrice=<?= $discountedPrice ?>">Buy
                        Now</a></button>
                </div>
                </div>

        <div class="f">
            <div class="paymentProsess">
                <div class="adreass">+ Add Address</div>
                <p><span>Quantity</span> <span><?php echo $quantity ?></span></p>
                <p><span>Price</span> <span>Rs <?php echo $product->price ?></span></p>
                <p><span>Delivery charge</span> <span>Rs 150</span></p>
                <p><span>Total</span> <span class="line-through"> Rs <?php echo $total ?> </span> &nbsp;&nbsp;Rs
                    <?php echo $discountedPrice ?><span></span>
                </p>
                <br>
                <button class="book getpay">Confirm</button>
            </div>
        </div>
    </main>

    <?php
    include ('../include/footer.php');
    ?>

    <script>
        document.querySelector('.getpay').addEventListener('click', () => {
            document.querySelector('.payment').style.display = 'block';
        });

        document.querySelector('.paymentnext').addEventListener('click', () => {
            document.querySelector('.payment').style.display = 'none';
            document.querySelector('.otp').style.display = 'block';
        });
    </script>
</body>

</html>