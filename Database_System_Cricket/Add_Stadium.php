<html>
    <head>
        <title>Add Stadium </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
        <h1>Enter Stadium Details </h1>
        <form class="form-signin" action="add_Stadium_process.php" method="POST">
            
            <th>Stadium ID: </th><input type="text" name="Stadium_ID">
            <br><br>
            <th>Name: </th><input type="text" name="Name">
            <br><br>
            <th>Area: </th><input type="text" name="Area">
            <br><br>
            <th>Country: </th><input type="text" name="Location">
            <br><br>
            <th>Pitch Type: </th><input type="text" name="Pitch_Type">
            <br><br>
            <button type="submit" class="btn btn-primary" name="Add_Stadium">Add Stadium</button>
        
        </form>

        <form action="Index_stadium.php">
            <button type="submit" class="btn btn-danger">BACK</button>
        </form>
    </body>
</html>