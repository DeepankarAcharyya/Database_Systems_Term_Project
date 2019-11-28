<html>
    <head>
        <title>Delete Stadium Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
    <br><br><br>
        <form class="form-signin" action="delete_Stadium_process.php" method="POST" onsubmit="return confirm('Are you sure you want to delete?');">
            <th>Stadium ID: </th><input type="text" name="Stadium_ID">
            <br><br>
            <button type="submit" class="btn btn-primary" name="Delete_Stadium">DELETE STADIUM</button>
        </form>

        <form action="Index_menu.php">
            <button type="submit" class="btn btn-danger">BACK</button>
        </form>
    </body>
</html>