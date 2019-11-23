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

if(isset($_POST['Add_Stadium'])){

    //extracting the values

    $id=$_POST['Stadium_ID'];
    $name=$_POST['Name'];
    $location=$_POST['Location'];
    $area=$_POST['Area'];
    $pitch=$_POST['Pitch_Type'];

    //forming mysql commands
    $sql1="INSERT INTO Stadium values ({$id},'{$name}',{$area},'{$pitch}','{$location}')";
    if($connection->query($sql1)==TRUE){
        echo "New record created successfully";
        header("Location:Index.php");
        $connection->close();
        exit;
    }
    else{
        echo "Error: " . $sql1 . "<br>" . $connection->error;
        $connection->close();
    }
}

 ?>