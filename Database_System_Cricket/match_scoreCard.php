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
 
    //retrieving the name of the stadium
    $sql2="SELECT Name from Stadium where Stadium_ID={$row1["Stadium_ID"]}";
    $result2=$connection->query($sql2);
    $row2=$result2->fetch_array();

    //Batsman Statistics
    $sql31="SELECT * from Bat_Stats where Match_ID={$match_id} and Innings_No=1";
    $result31=$connection->query($sql31);
    $sql32="SELECT * from Bat_Stats where Match_ID={$match_id} and Innings_No=2";
    $result32=$connection->query($sql32);
    

    //Bowling Statistics
    $sql41="SELECT * from Bowl_Stats where Match_ID={$match_id} and Innings_No=1";
    $result41=$connection->query($sql41);
    $sql42="SELECT * from Bowl_Stats where Match_ID={$match_id} and Innings_No=2";
    $result42=$connection->query($sql42);


    //Retrieving the Team members
    $sql5="Select Name from PLAYER where Team='{$row1["Team1"]}'";
    $result5=$connection->query($sql5);
    $sql6="Select Name from PLAYER where Team='{$row1["Team2"]}'";
    $result6=$connection->query($sql6);

    //retrieving total runs
    $sql7="Select Sum(Runs) AS tr  from Bat_Stats where Innings_No=2 and Match_ID={$match_id} ";
    $sql8="Select Sum(Runs) AS tr from Bat_Stats where Innings_No=1 and Match_ID={$match_id} ";
    $result7=$connection->query($sql7);
    $result8=$connection->query($sql8);
    $row7 = $result7->fetch_array();
    $row8 = $result8->fetch_array();
    $totalruns1=$row8['tr'];
    $totalruns2=$row7['tr'];

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
            <th>Venue</th><td><?php echo $row2["Name"]?></td>
        </tr>
        <tr>
            <th>Umpires</th><td><?php echo $row1["Third_Umpire"]," , ",$row1["Straight_Umpire"]," , ",$row1["Leg_Umpire"] ?></td>
        </tr>
        <tr>
            <th>Date</th><td><?php echo $row1["Match_Date"]?></td>
       </tr>
      
       <tr>
       <th><?php echo $row1["Team1"]?></th>
       <td>
       <?php
            if($result5->num_rows>0){
              while ($row = mysqli_fetch_array($result5)) {
                    echo $row["Name"]." ; ";
            }}
            else    echo "No Data Found!";
        ?>   
       </td>
       </tr>

       <tr>
       <th><?php echo $row1["Team2"]?></th>
       <td>
       <?php
            if($result5->num_rows>0){
              while ($row = mysqli_fetch_array($result6)) {
                    echo $row["Name"]." ; ";
            }}
            else    echo "No Data Found!";
        ?>   
       </td>
       </tr>
    </tbody>
    </table>

<!----------------------------------------------------------1st Innings------------------------------------------------------------------------------------->
<br>
<div > <h1 allign="center">1st Innings</h1> </div>
    
    <tr><h2> <?php echo $row1["Team1"] ; ?>'s Innings</h2><td>Total Runs:<?php echo $totalruns1;?></td></tr>
    <br>
    <table class="table">
            <thead class="thead-dark">
                    <tr>
                      <th scope="col">Batsman</th>
                      <th scope="col"></th>
                      <th scope="col">Runs</th>
                      <th scope="col">4s</th>
                      <th scope="col">6s</th>
                      <th scope="col">SR</th>
                    </tr>
            </thead>

    <tbody>
        <?php
            if($result31->num_rows>0){
              while ($row = mysqli_fetch_array($result31)) {
                //retrieving the name of the player
                $sql_temp="SELECT Name from PLAYER where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $name=$row_temp['Name'];

                  echo  '<tr><td>' ;
                  echo $name ; 
                  echo '</td><td>';
                  echo $row['Current_Status'] ;
                  echo '</td><td>';
                  echo $row['Runs'];
                  echo '</td><td>';
                  echo $row['4s'];
                  echo '</td><td>';
                  echo $row['6s'];
                  echo '</td><td>';
                  echo $row['SR'];
                  echo  '</td>></tr>' ;

            }
        }
            else    echo "No Data Found!";
        ?>  
    </tbody>

        <br>
    <thead class="thead-dark">
                    <tr>
                      <th scope="col">Bowler</th>
                      <th scope="col">O</th>
                      <th scope="col">M</th>
                      <th scope="col">W</th>
                      <th scope="col">WD</th>
                      <th scope="col">NB</th>
                      <th scope="col">ECO</th>
                    </tr>
            </thead>
            <tbody>
        <?php
            if($result41->num_rows>0){
              while ($row = mysqli_fetch_array($result41)) {
                //retrieving the name of the player
                $sql_temp="SELECT Name from PLAYER where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $name=$row_temp['Name'];
                //retrieving the economy of the player
                $sql_temp="SELECT Economy from Game_Data_Bowling where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $economy=$row_temp['Economy'];
                

                  echo  '<tr><td>' ;
                  echo $name ; 
                  echo '</td><td>';
                  echo $row['Overs'] ;
                  echo '</td><td>';
                  echo $row['Maiden_Overs'];
                  echo '</td><td>';
                  echo $row['Wickets'];
                  echo '</td><td>';
                  echo $row['Wide_Balls'];
                  echo '</td><td>';
                  echo $row['No_Balls'];
                  echo '</td><td>';
                  echo $economy;
                  echo  '</td>></tr>' ;

            }
        }
            else    echo "No Data Found!";
        ?>  
    </tbody>
</table>
<!----------------------------------------------------------2nd Innings------------------------------------------------------------------------------------->
<br>
<div > <h1 allign="center">2nd Innings</h1> </div>
    
    <tr><h2> <?php echo $row1["Team2"] ; ?>'s Innings</h2><td>Total Runs:<?php echo $totalruns1;?></td></tr>
    <br>
    <table class="table">
            <thead class="thead-dark">
                    <tr>
                      <th scope="col">Batsman</th>
                      <th scope="col"></th>
                      <th scope="col">Runs</th>
                      <th scope="col">4s</th>
                      <th scope="col">6s</th>
                      <th scope="col">SR</th>
                    </tr>
            </thead>

    <tbody>
        <?php
            if($result32->num_rows>0){
              while ($row = mysqli_fetch_array($result32)) {
                //retrieving the name of the player
                $sql_temp="SELECT Name from PLAYER where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $name=$row_temp['Name'];

                  echo  '<tr><td>' ;
                  echo $name ; 
                  echo '</td><td>';
                  echo $row['Current_Status'] ;
                  echo '</td><td>';
                  echo $row['Runs'];
                  echo '</td><td>';
                  echo $row['4s'];
                  echo '</td><td>';
                  echo $row['6s'];
                  echo '</td><td>';
                  echo $row['SR'];
                  echo  '</td>></tr>' ;

            }
        }
            else    echo "No Data Found!";
        ?>   
    </tbody>

    <br>
    <thead class="thead-dark">
                    <tr>
                      <th scope="col">Bowler</th>
                      <th scope="col">O</th>
                      <th scope="col">M</th>
                      <th scope="col">W</th>
                      <th scope="col">WD</th>
                      <th scope="col">NB</th>
                      <th scope="col">ECO</th>
                    </tr>
            </thead>
            <tbody>
        <?php
            if($result42->num_rows>0){
              while ($row = mysqli_fetch_array($result42)) {
                //retrieving the name of the player
                $sql_temp="SELECT Name from PLAYER where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $name=$row_temp['Name'];
                //retrieving the economy of the player
                $sql_temp="SELECT Economy from Game_Data_Bowling where Player_ID='{$row['Player_ID']}'";
                $result_temp=$connection->query($sql_temp);
                $row_temp=$result_temp->fetch_array();
                $economy=$row_temp['Economy'];
                

                  echo  '<tr><td>' ;
                  echo $name ; 
                  echo '</td><td>';
                  echo $row['Overs'] ;
                  echo '</td><td>';
                  echo $row['Maiden_Overs'];
                  echo '</td><td>';
                  echo $row['Wickets'];
                  echo '</td><td>';
                  echo $row['Wide_Balls'];
                  echo '</td><td>';
                  echo $row['No_Balls'];
                  echo '</td><td>';
                  echo $economy;
                  echo  '</td>></tr>' ;

            }
        }
            else    echo "No Data Found!";
        ?>  
    </tbody>

    </table>


    <form action="Index_menu.php">
        <button type="submit">BACK</button>
        </form>

</html>

<?php
$connection->close();
?>