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

if(isset($_POST['Update_Stadium'])){

    //extracting the values
    $id=$_POST['ID'];
    $name=$_POST['Name'];
    $location=$_POST['Location'];
    $pitch=$_POST['Pitch'];
    $area=$_POST['Area'];
    
    //forming mysql commands
    $sql1="UPDATE Stadium set Name='{$name}',Location='{$location}',Pitch_type={$pitch},Area={$area}  where Stadium_ID={$id} ";
    if($connection->query($sql1)==FALSE){
        echo "Record Updation Error!".$connection->error;
    }
    else{
        echo "Record Updated Successfully!";
        }
}
$connection->close();

header("Location:Index_menu.php");
exit;
?>