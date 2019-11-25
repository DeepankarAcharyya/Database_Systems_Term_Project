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

$mode='SET @@global.sql_mode="NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"';
$connection->query(mode);

if(isset($_POST['Next3'])){
    
    $mid=$_POST['match_id'];
    $pid=$_POST['bat1_id'];
    $runs=$_POST['bat1_R'];
    $SR=$_POST['bat1_SR'];
    $s4=$_POST['bat1_4s'];
    $s6=$_POST['bat1_6s'];
    $Es=$_POST['bat1_Es'];
    $S=$_POST['bat1_S'];

    $i=0;
    while($i<count($pid)){
    
        $pid1=$pid[$i];
        $runs1=$runs[$i];
        $SR1=$SR[$i];
        $s41=$s4[$i];
        $s61=$s6[$i];
        $Es1=$Es[$i];
        $S1=$S[$i];

        $s100=$runs1/100;
        $s50=$runs1/50;
    
        $sql1="INSERT INTO Bat_Stats VALUES ('{$pid1}','{$mid}',{$runs1},{$SR1},{$s41},{$s61},{$Es1},{$S1},1)";
        $sql2="Update Game_Data_Batting set No_of_Matches=No_of_Matches+1,Total_Runs=Total_Runs+{$runs1},100s=100s+{$s100},50s=50s+{$s50},4s=4s+{$s41},6s=6s+{$s61} where Player_ID='{$pid1}'";
        if($connection->query($sql1)==TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql1 . "<br>" . $connection->error;
        }
        if($connection->query($sql2)==TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql2 . "<br>" . $connection->error;
        }
       $i=$i+1;
    }

    $pid=$_POST['bat2_id'];
    $runs=$_POST['bat2_R'];
    $SR=$_POST['bat2_SR'];
    $s4=$_POST['bat2_4s'];
    $s6=$_POST['bat2_6s'];
    $Es=$_POST['bat2_Es'];
    $S=$_POST['bat2_S'];

    $i=0;
    while($i<count($pid)){

        $pid1=$pid[$i];
        $runs1=$runs[$i];
        $SR1=$SR[$i];
        $s41=$s4[$i];
        $s61=$s6[$i];
        $Es1=$Es[$i];
        $S1=$S[$i];

        $s100=$runs1/100;
        $s50=$runs1/50;
    
        $sql1="INSERT INTO Bat_Stats VALUES ('{$pid1}','{$mid}',{$runs1},{$SR1},{$s41},{$s61},{$Es1},{$S1},2)";
        $sql2="Update Game_Data_Batting set No_of_Matches=No_of_Matches+1,Total_Runs=Total_Runs+{$runs1},100s=100s+{$s100},50s=50s+{$s50},4s=4s+{$s41},6s=6s+{$s61} where Player_ID='{$pid1}'";
        if($connection->query($sql1)==TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql1 . "<br>" . $connection->error;
        }
        if($connection->query($sql2)==TRUE){
            echo "New record created successfully";
        }
        else{
            echo "Error: " . $sql2 . "<br>" . $connection->error;
        }
        $i=$i+1;
    }

echo "Done Sucessfully!";
$connection->close();
header("Location:Index_menu.php");
}