 <?php
 //credentials
 $servername= "localhost";
 $username="CSB17017@35";
 $password="helloworld";
 
 //create connection
 $connection = new mysqli($servername, $username,$password);

 // Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
//echo "Connected successfully";
//echo "Closing the connection!";
//$connection->close();
 ?>