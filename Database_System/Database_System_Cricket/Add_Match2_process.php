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
if(isset($_POST['Next2'])){
    
    $mid=$_POST['match_id'];
    $pid=$_POST['bowl1_id'];
    $overs=$_POST['bowl1_O'];
    $maiden=$_POST['bowl1_M'];
    $wicket=$_POST['bowl1_W'];
    $no_ball=$_POST['bowl1_NB'];
    $wide_ball=$_POST['bowl1_WB'];

    $i=0;
    while($i<count($pid)){

        $pid1=$pid[$i];
        $overs1=$overs[$i];
        $maiden1=$maiden[$i];
        $wicket1=$wicket[$i];
        $no_ball1=$no_ball[$i];
        $wide_ball1=$wide_ball[$i];
    
        $sql1="INSERT INTO Bowl_Stats VALUES ('{$pid1}','{$mid}',{$overs1},{$maiden1},{$wicket1},{$no_ball1},{$wide_ball1},1)";
        $sql2="Update Game_Data_Bowling set No_of_Matches=No_of_Matches+1,Wickets=Wickets+{$wicket1},Balls_Bowled=Balls_Bowled+{$overs1}*6 where Player_ID='{$pid1}'";
        $connection->query($sql1);
        $connection->query($sql2);
        $i=$i+1;
    }

    $pid=$_POST['bowl2_id'];
    $overs=$_POST['bowl2_O'];
    $maiden=$_POST['bowl2_M'];
    $wicket=$_POST['bowl2_W'];
    $no_ball=$_POST['bowl2_NB'];
    $wide_ball=$_POST['bowl2_WB'];

    $i=0;
    while($i<count($pid)){

        $pid1=$pid[$i];
        $overs1=$overs[$i];
        $maiden1=$maiden[$i];
        $wicket1=$wicket[$i];
        $no_ball1=$no_ball[$i];
        $wide_ball1=$wide_ball[$i];
    
        $sql1="INSERT INTO Bowl_Stats VALUES ('{$pid1}','{$mid}',{$overs1},{$maiden1},{$wicket1},{$no_ball1},{$wide_ball1},2)";
        $sql2="Update Game_Data_Bowling set No_of_Matches=No_of_Matches+1,Wickets=Wickets+{$wicket1},Balls_Bowled=Balls_Bowled+{$overs1}*6 where Player_ID='{$pid1}'";
        $connection->query($sql1);
        $connection->query($sql2);
        $i=$i+1;
    }
}

$first=$_POST['first'];
$second=$_POST['second'];


$sql3="SELECT Name,Player_ID FROM PLAYER where Team='{$first}' and Position in ('Batsman','AllRound','WktKpr')";
$sql4="SELECT Name,Player_ID FROM PLAYER where Team='{$second}' and Position in ('Batsman','AllRound','WktKpr')";

$result_bat2=$connection->query($sql3);
$result_bat1=$connection->query($sql4);

$connection->close();

?>


<html>
<head>
  <title>Batting Stats</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body class="text-center" data-gr-c-s-loaded="true">
    <h1 allign="center">Batting Data</h1>
    <h2>Innings: 1</h2>
    <br>

    <form class="form-signin" action="Add_Match3.php" method="POST">
    
    <!--hidden attributes-->
    <input type="hidden" name="match_id" value="<?php echo $mid; ?>">
    <input type="hidden" name="first" value="<?php echo $first; ?>">
    <input type="hidden" name="second" value="<?php echo $second; ?>">
    
    <h2>Team:<?php echo $second ?> </h2>    
    <table class="table">
        <thead>
            <tr><th>Batsman</th></tr>
        <tr>
            <th>ID</th>
            <th>Batsman</th>
            <th>Runs</th>
            <th>Strike Rate</th>
            <th>4s</th>
            <th>6s</th>
            <th>Extra</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>

            <?php
               while($row = $result_bat1->fetch_assoc()) {
            //    $row = $result_bat1->fetch_assoc();
                    echo "<tr>";
                    echo '<td><input type="text" name="bat1_id[]" value='.$row['Player_ID'].' readonly></td>';
                    echo '<td><input type="text" name="bat1_name[]" value='.$row['Name'].' readonly></td>';
                    echo '<td><input type="number" name="bat1_R[]"></td>';
                    echo '<td><input type="number" name="bat1_SR[]"></td>';
                    echo '<td><input type="number" name="bat1_4s[]"></td>';
                    echo '<td><input type="number" name="bat1_6s[]"></td>';
                    echo '<td><input type="number" name="bat1_Es[]"></td>';
                    echo '<td><input type="text" name="bat1_S[]"></td>';
                    echo "</tr>";            
               }
            ?>
        
        </tbody>

    </table>

    <h2>Innings: 2</h2>
    <br>
    <h2>Team:<?php echo $first ?> </h2>    
    <table class="table">
    <thead>
            <tr><th>Batsman</th></tr>
        <tr>
            <th>ID</th>
            <th>Batsman</th>
            <th>Runs</th>
            <th>Strike Rate</th>
            <th>4s</th>
            <th>6s</th>
            <th>Extra</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
                while($row = $result_bat2->fetch_assoc()) {
                    echo "<tr>";
                    echo '<td><input type="text" name="bat2_id[]" value='.$row['Player_ID'].' readonly></td>';
                    echo '<td><input type="text" name="bat2_name[]" value='.$row['Name'].' readonly></td>';
                    echo '<td><input type="number" name="bat2_R[]"></td>';
                    echo '<td><input type="number" name="bat2_SR[]"></td>';
                    echo '<td><input type="number" name="bat2_4s[]"></td>';
                    echo '<td><input type="number" name="bat2_6s[]"></td>';
                    echo '<td><input type="number" name="bat2_Es[]"></td>';
                    echo '<td><input type="text" name="bat2_S[]"></td>';
                    echo "</tr>";            
                  }
            ?>  
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary" name="Next3">Next</button>
</form>
</body>
</html>