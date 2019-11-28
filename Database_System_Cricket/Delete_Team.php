<html>
    <head>
        <title>Delete Stadium Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
    <br><br><br>
        <form class="form-signin" action="delete_Team_process.php" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
            <th>Team : </th><input type="text" name="team">
            <br><br>
            <button type="submit" class="btn btn-primary" name="Delete_Team">DELETE TEAM</button>
        </form>

        <form action="Index_team.php">
        <button type="submit">BACK</button>
        </form>
    </body>
</html>