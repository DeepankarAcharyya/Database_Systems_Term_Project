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

//queries
$sql1="SELECT Name,Stadium_ID FROM Stadium";
$sql2="SELECT Team_Name FROM Team";
$sql3="SELECT Name FROM Umpires";

//execute queries
$result1=$connection->query($sql1);
$result2=$connection->query($sql2);
$result3=$connection->query($sql3);

?>

<html>
    <head>
        <title>New Match</title>
    </head>
    <body>
    <form class="form-signin" action="Add_Match2.php" method="POST">
        <br>
            Match ID : <input type="text" name="match_ID" size="8" required>
        <br>
            Date : <input type="date" name="date" required>
        <br>
            Start Time : <input type="time" name="time" required>
        <br>
        
            Venue : <input list="venues" name="location" required>
            <datalist id="venues">
                <?php
                while($row = $result1->fetch_assoc()) {
                   echo "<option value=".$row['Stadium_ID'].">".$row['Name']."</option>" ;       
                }?>
            </datalist>
        <br>

            Teams :
            <input list="teams" name="team1" required>
            <datalist id="teams">
                <?php
                    while($row = $result2->fetch_assoc()) {
                        echo "<option value=".$row['Team_Name'].">".$row['Team_Name']."</option>" ;       
                }?>
            </datalist>
            v/s
            <input list="teams" name="team2" required>
            <br>

            <th>Toss:</th>
            Won by:
            <input list="teams" name="toss_team" required>

            Decided to: 
            <input list="tossd" name="toss_decision" required>
            <datalist id="tossd">
                <option value="BAT">Batting</option>
                <option value="BOWL">Bowling</option>
            </datalist>
            <br>

            Umpires:
            <br>
            Straight Umpire:
            <input list="Umpires" name="umpire1" required>
            <datalist id="Umpires">
                <?php
                while($row = $result3->fetch_assoc()) {
                   echo "<option value=".$row['Name'].">".$row['Name']."</option>" ;       
                }?>
            </datalist>
            <br>

            Leg Umpire:
            <input list="Umpires" name="umpire2" required>
            <br>

            Third Umpire:
            <input list="Umpires" name="umpire3" required>

            <button type="submit" class="btn btn-primary" name="Next1">Next</button>
            
    </form>
    </body>
</html>

<?php 
    $connection->close();
?>