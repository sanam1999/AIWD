<?php

function fetchOdersAsObjects()
{
    $user_id = $_SESSION['userid'];
    include ('conn.php');
    $sql = "SELECT * FROM Orders where user_id = '$user_id'  ORDER BY oder_date DESC ";
    $result = mysqli_query($conn, $sql);

    $ordes = array();

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $orde = new stdClass();
            $orde->order_id = $row['order_id'];
            $orde->product_id = $row['product_id'];
            $orde->total = $row['total'];
            $orde->price = $row['price'];
            $orde->status = $row['status'];
            $orde->oder_date = $row['oder_date'];
            $orde->quntity = $row['quntity'];
            $ordes[] = $orde;

        }
    }

    mysqli_free_result($result);

    return $ordes;
}



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];
    include ('conn.php');
    $sql = "UPDATE Orders SET status = 'Cancelled' WHERE order_id='$order_id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "your order was canced";
    } else {
        $_SESSION['error'] = "Welcome ";
    }
    header('Location: ../view/product/oders.php');
}
?>