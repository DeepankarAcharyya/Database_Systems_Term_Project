<html>
    <head>
        <title>New Umpire</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
        <form class="form-signin" action="add_Umpire_process.php" method="POST">
            <th>Umpire ID: </th><input type="text" name="Umpire_ID" required>
            <br><br>
            <th>Name: </th><input type="text" name="Name" required>
            <br><br>
            <th>Country: </th><input type="text" name="Location" required>
            <br><br>
            <th>Experience: </th><input type="text" name="Experience" required>
            <br><br>
            <button type="submit" class="btn btn-primary" name="Add_Umpire">Add Umpire</button>
        </form>

        <form action="Index_umpire.php">
        <button type="submit">BACK</button>
        </form>
    </body>
</html>