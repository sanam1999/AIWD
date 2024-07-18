<?php
include ('../include/header.php');
require ('../midellware.php');
require ('../../model/odersandcard.php');
require ('../../model/product.php');

isAuthenticate();

$orders = fetchOdersAsObjects();
?>
<style>

</style>
<div class="f">
    <?php if ($orders): ?>
        <?php foreach ($orders as $order):

            $product = fetchSingleProduct($order->product_id);
            ?>
            <div class="odercard margintop-0-5">
                <img src="https://images.rawpixel.com/image_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTEyL3JtNjA3LTNkYmQtc2NlbmUwNC1hLW1vY2t1cF8zLmpwZw.jpg"
                    alt="Card Image">
                <div class="odercard-content">
                    <span>
                        <h3 class="titale"> <?php echo $product->title ?></h3>
                        <p><?php echo $product->description ?></p>
                    </span>
                    <?php if ($order->status == "Pending"): ?>
                        <form action="../../model/odersandcard.php?order_id=<?= urlencode($order->order_id) ?>" method="post">
                            <button type="submit" class="cancelbtn">Cancel</button>
                        </form>
                    <?php elseif ($order->status == "Cancelled" || $order->status == "Delivered"): ?>
                        <button class="btn">
                            <a class="a" href="show.php?product_id=<?= $product->product_id; ?>">buy again</a>
                        </button>
                    <?php else: ?>
                        <p>processing</p>
                    <?php endif; ?>




                </div>

                <div class="status">
                    <p class="pending"><?php echo $order->status ?></p>
                    <p><?php echo timeDifference($order->oder_date); ?> ago</p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>




<?php
include ('../include/footer.php');
?>
<?php
function timeDifference($targetDateTime)
{
    $targetDate = new DateTime($targetDateTime);
    $now = new DateTime();
    $diff = $targetDate->diff($now);
    if ($diff->days > 0) {
        return $diff->days . " days";
    } elseif ($diff->h > 0) {
        return $diff->h . " hours";
    } elseif ($diff->i > 0) {
        return $diff->i . " minutes";
    } else {
        return $diff->s . " seconds";
    }
}
?>


<script>
    const cancelBtns = document.querySelectorAll('.cancelbtn');
    cancelBtns.forEach(button => {
        button.addEventListener("click", () => {


        });
    });

</script>