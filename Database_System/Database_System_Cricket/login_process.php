<?php
require_once('database_Connectivity.php');

if(isset($_POST['login'])){
        $pass=$_POST['password'];

        if(empty($pass)){
            echo "Please fill in the Blanks";
            die("Login-Failed!");
            header("Location:Index_login.php");
        }
        else{
            echo "You are logged in!";
            header("Location:Index_menu.php");
            }
}
?>



