<?php 
include ('../include/header.php');
require ('../midellware.php');
require ('../../model/product.php');

isAuthenticate();
 
?>
<section class="home">
    <div class="image">
        <img src="images/home-img.png" alt="">
    </div>
    <div class="content">
        <h3>your course to success</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa cumque neque quam amet perferendis sed rem ut tenetur porro praesentium.</p>
        <a href="#" class="btn">get started</a>
    </div>
</section>
    <?php
   
   $products = fetchProductsAsObjects();
   if($products){
    echo ' <div class="product-grid">';
        foreach ($products as $product) {
        $newPrice = (int) $product->price;
       $discountedPrice = $newPrice - ($newPrice * 0.05);

      echo'  <a class="a" href="show.php?product_id=' . $product->product_id . '"> 
      <div class="product-item">
            <img src="' . $product->imageurl . '">
            <h3>' . $product->description . '</h3>
            <p>Rs' . $product->price . '</p>
            <p>Rs' . $discountedPrice . '</p>
        </div>
        </a>';
        }
        echo '</div>';
    }
   
include('../include/footer.php');
?>