 <?php
 //credentials
 $servername= "localhost";
 $username="CSB17017@35";
 $password="helloworld";
 $dbname="CRICKET_DBMS";

 //create connection
 $connection = new mysqli($servername, $username,$password,$dbname);

 // Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

//retrieving the match-id
if(isset($_POST)){
    $match_id=$_POST["matchid"];
    //extracting the match info from the mysql tables
    $sql1="SELECT * From Matches where Match_ID={$match_id}";
    //Match_Date,Match_Time,Stadium_ID,Team1,Team2,Toss_Team,Toss_Decision,Leg_Umpire,Straight_Umpire,Third_Umpire
    $result1=$connection->query($sql1);
    $row1 = $result1->fetch_array();
    if($result1->num_rows>0){
        
    }
    else{
        echo "No Results Found!";
    }
}

?>

<!doctype html>
<html>
<head>
  <title>ScoreCard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
   <div > <h1 allign="center">Score Card</h1> </div>
    <br>
    <table class="table">
        <thead>
        <tr><th>Match Info</th></tr>
        </thead>
        <tbody>
        <tr>
            <th>Match</th><td><?php echo $row1["Team1"]," v/s ", $row1["Team2"] ?></td>
        </tr>
        <tr>
            <th>Match ID</th><td><?php echo $row1["Match_ID"] ?></td>
        </tr>
        <tr>
            <th>Toss</th><td><?php echo " Won by ", $row1["Toss_Team"],", Decided to ", $row1["Toss_Decision"]?></td>
        </tr>
        <tr>
            <th>Time</th><td><?php echo $row1["Match_Time"]?></td>
        </tr>
        <tr>
            <th>Venue</th><td><?php echo $row1["Stadium_ID"]?></td>
        </tr>
        <tr>
            <th>Umpires</th><td><?php echo $row1["Third_Umpire"]," , ",$row1["Straight_Umpire"]," , ",$row1["Leg_Umpire"] ?></td>
        </tr>
        <tr>
            <th>Date</th><td><?php echo $row1["Match_Date"]?></td>
       </tr>
    </tbody>
    </table>

    
</html>