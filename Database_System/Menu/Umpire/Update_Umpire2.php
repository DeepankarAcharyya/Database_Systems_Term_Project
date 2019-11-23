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

if(isset($_POST['Update_Umpire'])){

    //extracting the values
    $id=$_POST['ID'];
    $name=$_POST['Name'];
    $location=$_POST['Location'];
    $experience=$_POST['Experience'];
    
    //forming mysql commands
    $sql1="UPDATE Umpires set Name='{$name}',Location_of_Origin='{$location}',Experience={$experience}  where Umpire_ID={$id} ";
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