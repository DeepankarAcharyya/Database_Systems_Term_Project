<?php

//purpose of this script is to store the batting data collected in the previous form--done
//enter data into Bat_Stats---done
//update Players' profile--done
//back to main menu

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

        $pid1=$pid[i];
        $runs1=$runs[i];
        $SR1=$SR[i];
        $s41=$s4[i];
        $s61=$s6[i];
        $Es1=$Es[i];
        $S1=$S[i];

        $s100=$runs1/100;
        $s50=$runs1/50;
    
        $sql1="INSERT INTO Bat_Stats VALUES ('{$pid1}','{mid}',{$runs1},{$SR1},{$s41},{$s61},{$E1},{$S1},1)";
        $sql2="Update Game_Data_Batting set No_of_Matches=No_of_Matches+1,Total_Runs=Total_Runs+{$runs1},100s=100s+{$s100},50s=50s+{$s50},4s=4s+{$s41},6s=6s+{$s61} where Player_ID='{$pid}'";
        $connection->query($sql1);
        $connection->query($sql2);
        $i=$i+1;
    }

    $pid=$_POST['bat1_id'];
    $runs=$_POST['bat1_R'];
    $SR=$_POST['bat1_SR'];
    $s4=$_POST['bat1_4s'];
    $s6=$_POST['bat1_6s'];
    $Es=$_POST['bat1_Es'];
    $S=$_POST['bat1_S'];

    $i=0;
    while($i<count($pid)){

        $pid1=$pid[i];
        $runs1=$runs[i];
        $SR1=$SR[i];
        $s41=$s4[i];
        $s61=$s6[i];
        $Es1=$Es[i];
        $S1=$S[i];

        $s100=$runs1/100;
        $s50=$runs1/50;
    
        $sql1="INSERT INTO Bat_Stats VALUES ('{$pid1}','{mid}',{$runs1},{$SR1},{$s41},{$s61},{$E1},{$S1},1)";
        $sql2="Update Game_Data_Batting set No_of_Matches=No_of_Matches+1,Total_Runs=Total_Runs+{$runs1},100s=100s+{$s100},50s=50s+{$s50},4s=4s+{$s41},6s=6s+{$s61} where Player_ID='{$pid}'";
        $connection->query($sql1);
        $connection->query($sql2);
        $i=$i+1;
    }

echo "Done Sucessfully!";
$connection->close();
}