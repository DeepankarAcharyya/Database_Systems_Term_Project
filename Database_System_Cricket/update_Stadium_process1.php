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

if(isset($_POST['Search_Stadium'])){

    //extracting the values
    $id=$_POST['Stadium_ID'];
    
    //forming mysql commands
    $sql1="SELECT * FROM Stadium where Stadium_ID={$id}";
    $result1=$connection->query($sql1);
    if(!$result1){
        echo "Error: " . $sql1 . "<br>" . $connection->error;
        header("Location:Update_Stadium1.php");
        $connection->close();
        exit;
    }
    $row1 = $result1->fetch_array();
    if($result1->num_rows<=0){
        echo "No Results Found!";
        header("Location:Update_Stadium1.php");
        $connection->close();
        exit;
    }
}
 ?>

<html>
    <head>
        <title>Update Stadium Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">

      <h2>  Update Stadium Details </h2><br>
        <form class="form-signin" action="Update_Stadium2.php" method="POST">
            <th>Stadium ID: </th><input type="text" name="ID" value=<?php echo $row1['Stadium_ID'] ?> readonly="readonly">
            <br><br>
            <th>Name: </th><input type="text" name="Name" value=<?php echo $row1['Name'] ?> required>
            <br><br>
            <th>Country: </th><input type="text" name="Location" value=<?php echo $row1['Location'] ?> required>
            <br><br>
            <br><br>
            <th>Area: </th><input type="text" name="Area" value=<?php echo $row1['Area'] ?> required>
            <br><br>
            <th>Pitch Type: </th><input type="text" name="Pitch" value=<?php echo $row1['Pitch_type'] ?> required>
            <br><br>
            <button type="submit" class="btn btn-primary" name="Update_Stadium">Update Info</button>
        </form>
    </body>
</html>

<?php
$connection->close();
?>