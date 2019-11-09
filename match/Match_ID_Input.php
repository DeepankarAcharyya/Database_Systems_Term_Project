<html>
    <head>
        <title>ScoreCard-Generator</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
            <BR><BR><BR><BR>
        <div class="container position-relative"> 
        <form class="form-signin" action="match_scoreCard.php" method="POST">
            <label>Enter the Match-ID : </label>
            <Input type="text" class="form-control" placeholder="Match-ID"  name="matchid"/>
            <br>
            <div>
            <button type="submit" class="btn btn-primary" name="generate">Get ScoreCard !</button>
            </div>
        </form>
        </div>
    </body>
</html>