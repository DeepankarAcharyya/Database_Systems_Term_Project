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

    if($result1->num_rows>0){
        while($row=$result1->fetch_assoc()){
            echo "";
        }
    }
    else{
        echo "No Results Found!";
    }
}

?>