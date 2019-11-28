<?php
require_once('database_Connectivity.php');

if(isset($_POST['login'])){
        $pass=$_POST['password'];

        if(empty($pass) || $pass!="1234"){
            $message= "Incorrect Password!";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Location:Index_login.php");
        }
        else{
            header("Location:Index_menu.php");
            }
}
?>



