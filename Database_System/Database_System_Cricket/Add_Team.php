<html>
    <head>
        <title>Add new Team </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
        <h2>Enter Team Details</h2>
        <form class="form-signin" action="add_Team_process.php" method="POST">
            
            <th>Team Name: </th><input type="text" name="name">
            <br><br>
            <th>Captain : </th><input type="text" name="captain">
            <br><br>
            <th>Coach: </th><input type="text" name="coach">
            <br><br>
            <th>Country: </th><input type="text" name="location">
            <br><br>
            <th>Number of Batsman: </th><input type="text" name="batsmans">
            <br><br>
            <th>Number of Bowlers: </th><input type="text" name="bowlers">
            <br><br>
            <th>Number of Wicket Keepers: </th><input type="text" name="wicket_keepers">
            <br><br>
            <th>Number of All Rounders: </th><input type="text" name="all_rounders">
            <br><br>

            <button type="submit" class="btn btn-primary" name="Add_Team">Add Team</button>
        
        </form>

        <form action="Index_team.php">
        <button type="submit">BACK</button>
        </form>
    </body>
</html>