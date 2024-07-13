<?php
session_start();
require('UUIDGenerator.php');
function SignUpUser($name, $email, $password){
    $uuid = generateUUID();
    echo $password;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Users (user_id, email, password_hash, name) VALUES (?, ?, ?, ?)";
     include('conn.php');
    try {
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssss", $uuid, $email, $hashedPassword, $name);

            if (mysqli_stmt_execute($stmt)) {
                $_SESSION['success'] = "Welcome " . $name;
                $_SESSION['login'] = true;
                $_SESSION['user'] = $name;
                $_SESSION['userid'] = $uuid;
                header('location: ../product/home.php');
              
            } else {    
                $_SESSION['error'] = "This user already exists.";     
            }

            mysqli_stmt_close($stmt);
        } 
        mysqli_close($conn);
    } catch (Exception $e) {
         $_SESSION['error'] =  $e->getMessage();
    }
    return;
}

function LogdinUser($email, $passworD) {
     include('conn.php');
   
   $sql = "SELECT * FROM USERS WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $stored_password = $user['password_hash'];
        $name = $user['name'];
        $usserid = $user['user_id'];

        echo $password;
        if (password_verify($passworD, $stored_password)) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $name;
            $_SESSION['userid'] = $usserid;
            $_SESSION['email'] = $email;
            $_SESSION['success'] = "welcome back " . $name;
            
           header('location: ../product/home.php');
            exit();
        } else {
            $_SESSION['error'] = "Invalid credentials";
            header('location: ../user/login.php');
            exit();
        }
    }else{
        echo "wrong";
    }

   exit();
}



?>
