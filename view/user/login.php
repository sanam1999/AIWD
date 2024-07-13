<?php
include ('../include/header.php');
require ('../../model/user.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $passworD = $_POST['password'];
   
   LogdinUser($email,$passworD);
  
}

?>
<div class="row mt-3">
    <div class="col-6 offset-3">
        <h1>Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" required name="email" class="form-control" id="exampleInputEmail1">
                <div class="invalid-feedback"> Give a valid Email</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-success mb-5">Login</button>
        </form>
    </div>
</div>

<?php
include ('../include/footer.php');
 
 ?> 
