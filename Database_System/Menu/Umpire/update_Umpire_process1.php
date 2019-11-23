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

if(isset($_POST['Search_Umpire'])){

    //extracting the values
    $id=$_POST['Umpire_ID'];
    
    //forming mysql commands
    $sql1="SELECT * FROM Umpires where Umpire_ID={$id}";
    $result1=$connection->query($sql1);
    if(!$result1){
        echo "Error: " . $sql1 . "<br>" . $connection->error;
        header("Location:Update_Umpire1.php");
        $connection->close();
        exit;
    }
    $row1 = $result1->fetch_array();
    if($result1->num_rows<=0){
        echo "No Results Found!";
        header("Location:Update_Umpire1.php");
        $connection->close();
        exit;
    }
}
 ?>

<html>
    <head>
        <title>Update Umpire Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        Update Umpire Details
        <form class="form-signin" action="Update_Umpire2.php" method="POST">
            <th>Umpire ID: </th><input type="text" name="ID" value=<?php echo $row1['Umpire_ID'] ?> readonly="readonly">
            <br><br>
            <th>Name: </th><input type="text" name="Name" value=<?php echo $row1['Name'] ?> required>
            <br><br>
            <th>Country: </th><input type="text" name="Location" value=<?php echo $row1['Location_of_Origin'] ?> required>
            <br><br>
            <th>Experience: </th><input type="text" name="Experience" value=<?php echo $row1['Experience'] ?> required>
            <br><br>
            <button type="submit" class="btn btn-primary" name="Update_Umpire">Update Info</button>
        </form>
    </body>
</html>

<?php
$connection->close();
?>