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

if(isset($_POST['button2'])){
$id = $_POST['inputId'];
$match = $_POST['ip_no_match'];
$run = $_POST['ip_run'];
$ball_faced = $_POST['ip_ballFaced'];
$avg = $_POST['ip_avg'];
$SR = $_POST['ip_SR'];
$s100 = $_POST['ip_100s'];
$s50 = $_POST['ip_50s'];
$s6 = $_POST['ip_6s'];
$s4 = $_POST['ip_4s'];
// insert  player id;
$sql = "INSERT INTO Game_Data_Batting  VALUES ('{$id}',{$match},{$run},{$ball_faced},{$avg},{$SR},{$s100},{$s50},{$s6},{$s4});";
$result =$connection->query($sql);
//echo "done h ";
//header("Loaction: ../PL_r_GDB!_e.php?reg=sucess");
}

?>

<html>
    <head><title>1.Add Player</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </head>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>ENTER PLAYER DETAILS</h4>
                            <hr>
                        </div>
                    </div>
                    <form action="GDB2_r.php" method="POST">
                                        <th><u><b> Game Data:Bowling</b></u></th>
                                        <br><br>
                                        <div class="form-group">
                                            <label>Player_ID</label>
                                            <br>
                                            <input type="hidden" class="form-control" name="inputId" value="<?php echo $id; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>NO. of Matches :  </label>
                                             <input type="number" class="form-control" name="ip_no_matchB">
                                        </div>
                                        <div class="form-label-group">
                                            <label>Balls Bowled :  </label>
                                            <input type="number" class="form-control" name="ip_ballBowled">
                                        </div>
                                            
                                        <div class="form-label-group">
                                            <label>Run Conceled :</label>
                                            <input type="number" class="form-control" name="ip_conceded">
                                            <label>Wicket :</label>
                                            <input type="number" class="form-control" name="ip_wicket">
                                        </div>
                                        <div class="form-label-group">
                                            <label>Economy :</label>
                                            <input type="number" class="form-control" name="ip_Eco">
                                        <label>Average :</label>
                                            <input type="number" class="form-control" name="ip_avgb">
                                        </div>
                                        <div class="form-label-group">
                                            <label>Style :</label>
                                            <input type="text" class="form-control" name="ip_style"  placeholder="bowler's style ">

                                        </div>
                                        <br>
                                        <button type="submit" name="button3">Next</button>                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</html>
<?php
$connection->close();
?>