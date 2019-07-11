<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>All Houses</h1>
    <a href="index.php"> Add House</a>
<?php
 
 // to work with database , we will use a function call :mysqli
 require_once 'database.php';
 $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
 //  choose which database that i want to work with
 $db_name = DB_NAME;
 $db_found = mysqli_select_db($conn, $db_name);




 $query= 'SELECT * FROM housing   ';
    $result = mysqli_query($conn, $query);
    while ($db_record = mysqli_fetch_assoc($result)) {
        $out = strlen($db_record['description']) > 50 ? substr($db_record['description'],0,50)."..." : $db_record['description'];
        echo '<hr>'; 
        echo '<h3>'.'Title : '.$db_record['title'] .'</h3>';
        echo '<img height= "300" width="300" src="' . $db_record['photo'] . '" alt=""><br>';
        echo '<p>'.'<strong>'.'Address: '.'</strong>'. $db_record['address'] .'</h3>';
        echo '<p>'.'<strong>'.'City: '.'</strong>'. $db_record['city'] .'</h3>';
        echo '<p>'.'<strong>'.'Post Code: '.'</strong>'. 'L'.$db_record['pc'] .'</h3>';
        echo '<p>'.'<strong>'.'Area: '.'</strong>'. $db_record['area'].''. ' M2' .'</h3>';
        echo '<p>'.'<strong>'.'price: '.'</strong>'. $db_record['price'] .'$'.'</h3>';
        echo '<p>'.'<strong>'.'Sale or Letting: '.'</strong>'. $db_record['type'] .'</h3>';
        echo '<p>'.'<strong>'.'description: '.'</strong>'.$out .'</h3>';
    }




?>

</body>
</html>