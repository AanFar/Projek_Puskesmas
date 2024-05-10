<?php 
session_start();

require_once 'dbkoneksi.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql= "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
$user = $dbh->query($sql);

if ($user->rowCount()) {
    $_SESSION['login'] = true;
    
    $user = $user->fetch();
    $_SESSION['username'] = $user['username'];
    $_SESSION['email_user'] = $user['email'];

    header('location: index.php');
} else {
    header('location: ../login.php');
}
?>