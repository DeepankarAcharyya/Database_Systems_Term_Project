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

if(isset($_POST['submit1'])){
    $id = $_POST['inputId'];
    $name = $_POST['inputName'];
    $team = $_POST['inputTeam'];
    $position = $_POST['inputPos'];
    $country = $_POST['input_Country'];
    $Dismis = $_POST['input_Dismissals'];
    $ip_date = $_POST['input_date'];

    $end=date_create($ip_date);
    date_sub($end,date_interval_create_from_date_string("16 years"));
    

    $sql = "INSERT INTO PLAYER  VALUES ('{$name}','{$id}','{$country}',{$Dismis},'{$team}','{$position}','{$ip_date}')";
    $connection->query($sql);
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
                    <div class="row">
                        <div class="col-md-12">
                           

                            <form action="Bio_r_GDB1_e.php" method="POST">    
                                <th><u><b>Player Bio Details</b></u></th>
                                <br><br>
                                <div class="form-group">
                                 <!----  <label>Player_ID</label> -->
                                    <br>
                                    <input type="hidden" class="form-control" name="inputId" value="<?php echo $id; ?>"  >
                                </div>
                                <div class="form-group">
                                <br>
                                    <label>Date Of Birth : </label>
                                    <br>
                                    <input type="date" class="form-control" name="inputDOB" placeholder="Enter DOB" min="1955-01-01" max="<?php echo date_format($end,"Y-m-d"); ?>" required>
                                    <br>

                                </div>
                                <div class="form-group">
                                    <label>Height :</label>
                                    <input type="number" class="form-control" name="input_Ht" placeholder="in cm" required>
                                    <label>Weight :</label>
                                    <input type="number" class="form-control" name="input_Wt" placeholder="in kg" required>
                                </div>
                                <button type="submit" name="button1">Next</button>
                                <br>
                            </form>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>

<?php
$connection->close();
?>