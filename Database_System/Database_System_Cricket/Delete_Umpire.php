<html>
    <head>
        <title>Delete Umpire Record</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
        <form class="form-signin" action="delete_Umpire_process.php" method="POST">
            <th>Umpire ID: </th><input type="text" name="Umpire_ID">
            <br><br>
            <button type="submit" class="btn btn-primary" name="Delete_Umpire">DELETE UMPIRE </button>
        </form>

        <form action="Index_umpire.php">
        <button type="submit">BACK</button>
        </form>
    </body>
</html>