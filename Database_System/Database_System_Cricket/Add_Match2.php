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
if(isset($_POST['Next1'])){

    $match_ID=$_POST['match_ID'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $stadium=$_POST['location'];
    $team1=$_POST['team1'];
    $team2=$_POST['team2'];
    $toss_team=$_POST['toss_team'];
    $toss_decision=$_POST['toss_decision'];
    $leg_umpire=$_POST['umpire2'];
    $st_umpire=$_POST['umpire1'];
    $third_umpire=$_POST['umpire3'];

    if($toss_team!=$team1){
        $team2=$team1;
        $team1=$toss_team;
    }

    if($toss_decision=='BOWL'){
        $first=$team1;
        $second=$team2;
    }
    else{
        $first=$team2;
        $second=$team1;
    }
    

    //forming mysql commands
    $sql1="INSERT INTO Matches values ('{$match_ID}','{$date}','{$time}','{$stadium}','{$team1}','{$team2}','{$toss_team}','{$toss_decision}','{$leg_umpire}','{$st_umpire}','$third_umpire')";
    $sql_bowl1="SELECT Name,Player_ID FROM PLAYER where Team='{$first}' and Position in ('Bowler','AllRound')";
    $sql_bowl2="SELECT Name,Player_ID FROM PLAYER where Team='{$second}' and Position in ('Bowler','AllRound')";
    
    if($connection->query($sql1)==TRUE){
        //echo "New record created successfully";
    }
    else{
        echo "Error: " . $sql1 . "<br>" . $connection->error;
    }

    $result_bowl1=$connection->query($sql_bowl1);
    $result_bowl2=$connection->query($sql_bowl2);

}
else{
    header("Location:Add_match.php");
}
$connection->close();

?>

<html>
<head>
  <title>Bowling Stats</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <h1 allign="center">Bowling Data</h1>
    <h2>Innings: 1</h2>
    <br>

    <form class="form-signin" action="Add_Match2_process.php" method="POST">
    
    <!--hidden attributes-->
    <input type="hidden" name="match_id" value="<?php echo $match_ID; ?>">
    <input type="hidden" name="first" value="<?php echo $first; ?>">
    <input type="hidden" name="second" value="<?php echo $second; ?>">
    
    <h2>Team:<?php echo $first ?> </h2>    
    <table class="table">
        <thead>
            <tr><th>Bowler</th></tr>
        <tr>
            <th>ID</th>
            <th>Bowler</th>
            <th>Overs</th>
            <th>Maidens</th>
            <th>Wickets</th>
            <th>N0-Balls</th>
            <th>Wide-Balls</th>
        </tr>
        </thead>

        <tbody>

            <?php
                while($row1 = $result_bowl1->fetch_assoc()) {        
                    echo "<tr>";
                    echo '<td><input type="text" name="bowl1_id[]" value='.$row1['Player_ID'].' readonly></td>';
                    echo '<td><input type="text" name="bowl1_name[]" value='.$row1['Name'].' readonly></td>';
                    echo '<td><input type="number" name="bowl1_O[]"></td>';
                    echo '<td><input type="number" name="bowl1_M[]"></td>';
                    echo '<td><input type="number" name="bowl1_W[]"></td>';
                    echo '<td><input type="number" name="bowl1_NB[]"></td>';
                    echo '<td><input type="number" name="bowl1_WB[]"></td>';
                    echo "</tr>";            
                    }
            ?>
        
        </tbody>

    </table>

    <h2>Innings: 2</h2>
    <br>
    <h2>Team:<?php echo $second ?> </h2>    
    <table class="table">
        <thead>
            <tr><th>Bowler</th></tr>
        <tr>
        <th>ID</th>
            <th>Bowler</th>
            <th>Overs</th>
            <th>Maidens</th>
            <th>Wickets</th>
            <th>N0-Balls</th>
            <th>Wide-Balls</th>
        </tr>
        </thead>

        <tbody>
            <?php
                while($row2 = $result_bowl2->fetch_assoc()) {                    
                    echo "<tr>";
                    echo '<td><input type="text" name="bowl2_id[]" value='.$row2['Player_ID'].' readonly></td>';
                    echo '<td><input type="text" name="bowl2_name[]" value='.$row2['Name'].' readonly></td>';
                    echo '<td><input type="number" name="bowl2_O[]"></td>';
                    echo '<td><input type="number" name="bowl2_M[]"></td>';
                    echo '<td><input type="number" name="bowl2_W[]"></td>';
                    echo '<td><input type="number" name="bowl2_NB[]"></td>';
                    echo '<td><input type="number" name="bowl2_WB[]"></td>';                }
                    echo '</tr>';  
            ?>  
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary" name="Next2">Next</button>
</form>
</body>
</html>