
<div class="f">
<?php


if ($_SESSION['error']) {

    echo '<div class="alert alert-danger alert-dismissible fade show col-6 offset-3" role="alert">
      <strong class="offset-5" style="font-size: 1.3rem;" >';
    echo $_SESSION['error'];
    unset($_SESSION['error']); 
    echo '</strong> 
      <a href="'.$_SERVER['PHP_SELF'].'"> <i class="flashclose fa-solid fa-xmark"></i></a>
    </div>';
}
if ($_SESSION['success']) {
    echo '<div class="alert alert-success alert-dismissible fade show col-6 offset-3" role="alert">
     <strong class="offset-5" >';
    echo $_SESSION['success'];
    unset($_SESSION['success']); 
    echo '</strong > 
     <a href="' . $_SERVER['PHP_SELF'] . '"> <i class="flashclose fa-solid fa-xmark">h</i></a>
    </div>';
}
?>
</div>