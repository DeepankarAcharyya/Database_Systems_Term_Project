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

if(isset($_POST['button1'])){
$id = $_POST['inputId'];
$DOB = $_POST['inputDOB'];
$Ht = $_POST['input_Ht'];
$Wt = $_POST['input_Wt'];

$today=date("Y-m-d");
$diff=date_diff(date_create($DOB),date_create($today));
$Age = $diff->format('%y');

$sql = "INSERT INTO Bio_Details VALUES ('{$id}','{$DOB}',{$Ht},{$Wt},{$Age});";
$result =$connection->query($sql);
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
                    <form  action="GDB1_r_GDB2_e.php" method="POST">
                        
                                    
                                        <th><u><b> Game Data:Batting</b></u></th>
                                        <br><br>
                                        <div class="form-group">
                                            <label>Player_ID</label>
                                            <br>
                                            <input type="text" class="form-control" name="inputId" value="<?php echo $id; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>NO. of Matches:  </label>
                                             <input type="number" class="form-control" name="ip_no_match" required>
                                        </div>
                                        <div class="form-label-group">
                                            <label>Total Run:  </label>
                                            <input type="number" class="form-control" name="ip_run" required>
                                            <label>Balls Faced:  </label>
                                            <input type="number" class="form-control" name="ip_ballFaced" required>
                                        </div>
                                            
                                        <div class="form-label-group">
                                            <label>Average:  </label>
                                            <input type="number" class="form-control" name="ip_avg" required>
                                            <label>SR:  </label>
                                            <input type="number" class="form-control" step="0.01" name="ip_SR" required>
                                        </div>
                                        <div class="form-label-group">
                                            <label>100S:  </label>
                                            <input type="number" class="form-control" name="ip_100s"  placeholder="no. centuries" required>
                                            <label>50S:  </label>
                                            <input type="number" class="form-control" name="ip_50s" placeholder="no. half_centuries" required>
                                        </div>
                                        <div class="form-label-group">
                                            <label>6S:  </label>
                                            <input type="number" class="form-control" name="ip_6s"  placeholder="no. centuries" required>
                                            <label>4S:  </label>
                                            <input type="number" class="form-control" name="ip_4s" placeholder="no. half_centuries" required>
                                        </div>
                                        <button type="submit" name="button2">Next</button>
                                <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$connection->close();
?>