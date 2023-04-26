<?php
include('../connect.php');
$tbl_name="user"; // Table name 
session_start();
{
    $user=$_POST['username'];
    $pass=$_POST['password'];
    // $fetch=mysqli_query($conn, "SELECT userid FROM `$tbl_name` WHERE 
    //                      username='$user' and password='$pass'");
    // $count=mysqli_num_rows($fetch, MYSQLI_ASSOC);
    // if($count!="")
    // {
    $_SESSION['login_username']=$user;
    header("Location:../home.php"); 
    // }
    // else
    // {
    //    header('Location:../wrong_password.php');
    // }
}
?>