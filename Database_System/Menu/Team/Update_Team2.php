<?php

//problem with the update
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

if(isset($_POST['Update_Team'])){

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
    $sql1="UPDATE Team set Team_Captain='{$captain}',Team_Coach='{$coach}',Location='{$location}',No_of_Batsman={$batsman},No_of_Bowlers={$bowler},No_of_WicketKeepers={$wicket_keeper},No_of_AllRounders={$all_rounder}  where Team_Name='{$team}' ";
    if($connection->query($sql1)==FALSE){
        echo "Record Updation Error!".$connection->error;
    }
    else{
        echo "Record Updated Successfully!";
        }
}
$connection->close();

header("Location:Index.php");
exit;
?>