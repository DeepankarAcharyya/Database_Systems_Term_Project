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

if(isset($_POST['Add_Team'])){

    //extracting the values
    $team=$_POST['name'];
    $captain=$_POST['captain'];
    $coach=$_POST['coach'];
    $location=$_POST['location'];
    $batsman=$_POST['batsmans'];
    $bowler=$_POST['bowlers'];
    $wicket_keeper=$_POST['wicket_keepers'];
    $all_rounder=$_POST['all_rounders'];

    //forming mysql commands
    $sql1="INSERT INTO Team values ('{$team}','{$captain}','{$coach}','{$location}',{$batsman},{$bowler},{$wicket_keeper},{$all_rounder})";
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