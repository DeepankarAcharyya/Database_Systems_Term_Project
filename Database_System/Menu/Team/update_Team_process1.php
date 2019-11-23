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

if(isset($_POST['Search_Team'])){

    //extracting the values
    $id=$_POST['team_name'];
    
    //forming mysql commands
    $sql1="SELECT * FROM Team where Team_Name={$id}";
    $result1=$connection->query($sql1);
    if(!$result1){
        echo "Error: " . $sql1 . "<br>" . $connection->error;
        header("Location:Update_team1.php");
        $connection->close();
        exit;
    }
    $row1 = $result1->fetch_array();
    if($result1->num_rows<=0){
        echo "No Results Found!";
        header("Location:Update_Team1.php");
        $connection->close();
        exit;
    }
}
 ?>

<html>
    <head>
        <title>Update Team's Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        Update Stadium Details
        <form class="form-signin" action="Update_Stadium2.php" method="POST">
            <th>Team: </th><input type="text" name="Name" value=<?php echo $row1['Team_Name'] ?> readonly="readonly">
            <br><br>
            <th>Captain : </th><input type="text" name="captain" value=<?php echo $row1['Team_Captain'] ?> required>
            <br><br>
            <th>Coach: </th><input type="text" name="coach" value=<?php echo $row1['Team_Coach'] ?> required>
            <br><br>
            <th>Country: </th><input type="text" name="location" value=<?php echo $row1['Location'] ?> required>
            <br><br>
            <th>Number of Batsman: </th><input type="text" name="batsmans" value=<?php echo $row1['No_of_Batsman'] ?> required>
            <br><br>
            <th>Number of Bowlers: </th><input type="text" name="bowlers" value=<?php echo $row1['No_of_Bowlers'] ?> required>
            <br><br>
            <th>Number of Wicket Keepers: </th><input type="text" name="wicket_keepers" value=<?php echo $row1['No_of_WicketKeepers'] ?> required>
            <br><br>
            <th>Number of All Rounders: </th><input type="text" name="all_rounders" value=<?php echo $row1['No_of_AllRounders'] ?> required>
            <br><br>

            <button type="submit" class="btn btn-primary" name="Update_Team">Update Info</button>
        </form>
    </body>
</html>

<?php
$connection->close();
?>