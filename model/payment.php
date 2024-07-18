<?php

require 'UUIDGenerator.php';

if (isset($_GET['product_id'], $_GET['quantity'], $_GET['price'], $_GET['discountedPrice'])) {
    $product_id = $_GET['product_id'];
    $quantity = (int) $_GET['quantity'];
    $price = $_GET['price'];
    $discountedPrice = $_GET['discountedPrice'];
    $order_id = generateUUID();
    $user_id = $_SESSION['userid'];

    try {
        include 'conn.php';

        $sql = "INSERT INTO Orders (order_id, user_id, product_id, total, price) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssii", $order_id, $user_id, $product_id, $discountedPrice, $price);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success'] = "Your order will be delivered within 10 working days successfully.";
                header('Location: ../product/show.php?product_id=' . $product_id);
            } else {
                $_SESSION['error'] = "There was an error processing your order. Please try again.";
                header('Location: ../product/show.php?product_id=' . $product_id);
            }

            mysqli_stmt_close($stmt);
        } else {
            $_SESSION['error'] = "Error occurred while preparing the statement: " . mysqli_error($conn);
            header('Location: ../product/show.php?product_id=' . $product_id);
        }

        mysqli_close($conn);
    } catch (Exception $e) {
        $_SESSION['error'] = "Error occurred during execution: " . $e->getMessage();
        header('Location: ../product/show.php?product_id=' . $product_id);
    }
} else {
    $_SESSION['error'] = "Required parameters are missing.";
    header('Location: ../product/show.php');
}
?>