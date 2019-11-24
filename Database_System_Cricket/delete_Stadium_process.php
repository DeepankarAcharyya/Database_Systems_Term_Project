<?php
 //credentials
 $servername= "localhost";
 $username="CSB17017@35";
 $password="helloworld";
 $dbname = "CRICKET_DBMS";
 
 //create connection
 $connection = new mysqli($servername, $username,$password,$dbname);

 // Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

if(isset($_POST['Delete_Stadium'])){

    //extracting the values
    $id=$_POST['Stadium_ID'];
    
    //forming mysql commands
    $sql1="DELETE FROM Stadium where Stadium_ID={$id}";
    if($connection->query($sql1)==TRUE){
        echo "record removed successfully";
        header("Location:Index_menu.php");
        $connection->close();
    }
    else{
        echo "Error: " . $sql1 . "<br>" . $connection->error;
        $connection->close();
    }
    header("Location:Index_menu.php");
    exit;
}
 ?>