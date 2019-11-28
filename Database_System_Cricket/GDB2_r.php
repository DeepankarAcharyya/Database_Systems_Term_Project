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
if(isset($_POST['button3'])){
$id = $_POST['inputId'];
$match = $_POST['ip_no_matchB'];
$balls_bowled = $_POST['ip_ballBowled'];
$conceded = $_POST['ip_conceded'];
$wickets = $_POST['ip_wicket'];
$Eco = $_POST['ip_Eco'];
$Avgb = $_POST['ip_avgb'];
$style = $_POST['ip_style'];
// insert  player id;
if($match!='0'){
$sql = "INSERT INTO Game_Data_Bowling  VALUES ('{$id}',{$match},{$balls_bowled},{$conceded},{$wickets},{$Eco},{$Avgb},'{$style}');";
$result =$connection->query($sql);
}
}
$connection->close();
header("Location:Index_menu.php");
?>