<?php
$end=date("Y-m-d");
$end=date_create($end);
date_sub($end,date_interval_create_from_date_string("3 years"));

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
                        <form action="Bio_e_PL_r.php" method="POST">
                                <th><u><b>Player Carrer Details</b></u></th>
                                <br><br>
                                <div class="form-group">
                                    <label>Player_ID</label>
                                    <br>
                                    <input type="text" class="form-control" name="inputId" placeholder="Enter Player ID" required>
                                </div>
                                <div class="form-group">
                                    <label>Player Name</label>
                                    <br>
                                    <input type="text" class="form-control" name="inputName" placeholder="Enter Player Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Team</label>
                                    <br>
                                    <input type="text" class="form-control" name="inputTeam" placeholder="Enter Team Name" required>
                                </div>
                                <div class="form-group">
                                    <label>Position</label>
                                    <br>
                                    <input list="pos" class="form-control" name="inputPos" placeholder="Enter position" required>
                                    <datalist id="pos">
                                        <option value="Batsman">Batsman</option>
                                        <option value="Bowler">Bowler</option>
                                        <option value="WktKpr">Wicket-Keeper</option>
                                        <option value="AllRound">All-Rounder</option>
                                    </datalist>
            
                                    <br>

                                </div>
                                <div class="form-group">
                                    <label>Country of Origin</label>
                                    <br>
                                    <input type="text" class="form-control" name="input_Country" placeholder="Country Name" required>
                                    <br>
                                    <label>No. of Dismissals</label>
                                    <input type="number" class="form-control" name="input_Dismissals" placeholder="Dismissals" required>
                                </div>
                                <div class="form-group">
                                    <label>Debut Date</label>
                                    <br>
                                    <input type="date" class="form-control" name="input_date" placeholder="" required min="1971-01-01" max="<?php echo date_format($end,"Y-m-d"); ?>">
                                    </br>
                                </div>
                                <button type="submit" name="submit1">Sign up</button>
                                 </form>
                                 
                            <form action="Index_menu.php">
                            <button type="submit" class="btn btn-info">Back</button>
                            </form>                      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</html>