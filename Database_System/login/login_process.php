<?php
require_once('database_Connectivity.php');

if(isset($_POST['login'])){
        $pass=$_POST['password'];

        if(empty($pass)){
            echo "Please fill in the Blanks";
            die("Login-Failed!");

        }
        else{
            echo "You are logged in!";            
            }
}
?>



