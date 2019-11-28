<html>
    <head>
        <title>MENU</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body class="text-center" data-gr-c-s-loaded="true">
        <br><br><br>
        <form action="Index_player.php">
        <button type="submit" class="btn btn-dark">ADD PLAYER</button>
        </form>
        
        <form action="Index_umpire.php">
        <button type="submit" class="btn btn-secondary">UMPIRE</button>
        </form>
        
        <form action="Index_stadium.php">
        <button type="submit" class="btn btn-dark">STADIUM</button>
        </form>
        
        <form action="Index_team.php">
        <button type="submit" class="btn btn-secondary">TEAM</button>
        </form>
        
        <form action="Index_match.php">
        <button type="submit" class="btn btn-dark">MATCH</button>
        </form>
        
        <br><br>
        <form action="Index_login.php"  onclick="return confirm('Are you sure you want to exit?')">
        <button type="submit" class="btn btn-info">Log-Out</button>
        </form>
    </body>
</html>