<?php 
include ('../include/header.php');
require ('../midellware.php');
require ('../../model/product.php');
require ('../../model/RF.php');
session_start();
if(!isAuthenticate()){
    $_SESSION['error'] = "You must be logged In";
  header('Location: login.php ');
   return;
}

?>
<style>
 .oder{
    display: flex;
    width: 40rem;
    

    justify-content: space-evenly;
    align-items: center;
    height: 3rem;
    border-radius: 10px;
    border: solid black 1px;
} 
 
.oder a{
    border: solid black 1px;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    cursor: pointer;
    background-color: black;
    color: white;
}
.oder a{
    border: solid black 1px;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    cursor: pointer;
    background-color: black;
    color: white;
}
.addcard {
    background-color: black;
    color: white;

}
.buynow{
    background-color: black;
     color: white;

}
.qnt{
    width: 80px;
     display: flex;
    justify-content: space-between;
    align-items: center;
   background-color: black;
    color: white;
} 

</style>

<div class="card-deck">


<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];
    
    if (empty($rating) || empty($comment)) {
        $_SESSION['error'] = "Rating and comment are required";
        header('Location: show.php?product_id=' .$product_id);
        return;
    }
   
    saveReview($product_id, $rating, $comment);
}

if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $product = fetchSingleProduct($product_id); 
?>



  <?php  if ($product) {
       
        $newPrice = (int) $product->price;
        $discountedPrice = $newPrice - ($newPrice * 0.05);
        echo '<div class="card  offset-3" style="width: 70rem;">
        <img class="card-img-top" src="' . $product->imageurl . '" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">' . $product->title . '</h5>
            <p class="card-text">' . $product->description . '</p>
              <p class="card-text">' . $product->stock . '</p>
                <p class="card-text">' . $product->condition . '</p>
                  <p class="card-text">' . $product->created_at . '</p>
            <p><span style="font-size:2rem;">&#8360; </span><span style="text-decoration: line-through;">' . htmlspecialchars($product->price) . '</span></p>
            <p><span style="font-size:2rem;">&#8360; </span>' . $discountedPrice . '</p>

            
</form>

        </div>
    </div>';

    
 

    } else {
       $_SESSION['error'] = "Product not found";
    }
}else{
     $_SESSION['error'] = "selct item";
     header('Location: home.php ');
}

?>
<div class="col-4 offset-3">
            <form action="show.php?product_id=<?= $product->product_id ?>" novalidate class="needs-validation" method="post">
                <div class="mt-5">
                    <fieldset class="starability-slot">
                        <legend>First rating:</legend>
                        <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="1" checked aria-label="No rating." />
                        <input type="radio" id="second-rate1" class="input-no-rate" name="rating" value="1" />
                        <label for="second-rate1" title="Terrible">1 star</label>
                        <input type="radio" id="second-rate2" name="rating" value="2" />
                        <label for="second-rate2" title="Not good">2 stars</label>
                        <input type="radio" id="second-rate3" name="rating" value="3" />
                        <label for="second-rate3" title="Average">3 stars</label>
                        <input type="radio" id="second-rate4" name="rating" value="4" />
                        <label for="second-rate4" title="Very good">4 stars</label>
                        <input type="radio" id="second-rate5" name="rating" value="5" />
                        <label for="second-rate5" title="Amazing">5 stars</label>
                    </fieldset>
                </div>
                <div class="mt-3">
                    <label for="review" class="form-label">Comments</label>
                    <textarea name="comment" class="form-control" id="comment" cols="30" rows="5"></textarea>
                    <div class="invalid-feedback">Please add some comments for review</div>
                </div>
                <br>
                <button class="btn btn-outline-dark mb-3">Submit</button>
            </form>
        </div>


</div>

<?php
$pid = $product->product_id;
$Reviews = GetReview($pid);
$curuserid=$_SESSION['userid'];
if ($Reviews) {
    echo '<div class="card offset-3 col-6">
            <h1 class="card-header" style="text-align: center;">Reviews</h1>
            <div class="p-2">';

    foreach ($Reviews as $Review) {
        echo '<div class="card-body card mt-3">
        <span class = "str">
                <h4 class="card-title">@' . $Review->uname . '
                 <p class="starability-result" data-rating=' . $Review->rating . '></p>
                 <span>
                <p class="card-text">' . $Review->comment . '</p>';
        if ($curuserid == $Review->user_id) {
            echo '<a href="#" class="btn btn-primary" style="width: 160px;">Delete</a>';
        }
        
        echo '</div>';
         
    }

    echo '</div></div>'; 
}

echo '<h1 class="card-header" style="text-align: center;">Reletad Items</h1>';

echo '<section class="course-2">';

$Category = "category";
   $RProducts = fetchRelatedProducts($product->category, $Category);
 

   if($RProducts){
        foreach ($RProducts as $RProduct) {
           if($product->product_id ===$RProduct->product_id){
            continue;
           }
            $newPrice = (int) $RProduct->price;
            $discountedPrice = $newPrice - ($newPrice * 0.05);
           
            echo '<div class="card" style="width: 25rem;">
        <a class="a" href="show.php?product_id=' . $RProduct->product_id . '">
  <img class="card-img-top" src="' . $RProduct->imageurl . '" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">' . $RProduct->title . '</h5>
    <p class="card-text">' . $RProduct->description . '</p>
    <p > <span style="font-size:2rem;">&#8360; </span> <span style="text-decoration: line-through;">' . $product->price . '</span></p>
    <p > <span style="font-size:2rem;">&#8360; </span>' . $discountedPrice . '</p>
  </div>
  </a>
</div>';

}
   
}else{

    echo '
       <h3>Items Not available</h3>';
}
 echo '</section>';
 ?>
 



<div class="oder">
    <div class="addcard">Add Card</div>
    <a id="buyNowLink" href="book.php?product_id=<?php echo $product_id; ?>&qnt=1">Buy Now</a>
    <div class="qnt">
        <button class="m">-</button>
        <p class="countdisplay">1</p>
        <button class="p">+</button>
    </div>
</div>

<script>
let p = document.querySelector('.p');
let m = document.querySelector('.m');
let countdisplay = document.querySelector('.countdisplay');
let buyNowLink = document.getElementById('buyNowLink');

let count = 1;

function updateDisplay() {
    countdisplay.innerText = count;
    buyNowLink.href = `book.php?product_id=<?php echo $product_id; ?>&qnt=${count}`;
}

p.addEventListener('click', () => {
    if (count < 10) {
        count++;
        updateDisplay();
    }
});

m.addEventListener('click', () => {
    if (count > 1) {
        count--;
        updateDisplay();
    }
});

// Initial display update
updateDisplay();
</script>

<?php include('../include/footer.php'); ?>