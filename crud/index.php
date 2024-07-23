<?php 

require "./db.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./insert.php" method="$_POST">
        
    </form> 
</body>
</html>



<?php

$sql = $conn->prepare("SELECT * FROM users");
$sql->execute();
while ($row = $sql->fetch()){
        echo "<h1>" . $row['fname'] ."&nbsp;". $row['lname'] ."". $row['phone']. "</h1>";
}

?>