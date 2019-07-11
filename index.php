<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Add New House</h1>

    <form enctype="multipart/form-data" action="" method="POST">
        <input type="text" name="title" placeholder="The Title">
        <input type="text" name="address" placeholder="The Address"> <br>
        <input type="text" name="city" placeholder="The City">
        <input type="number" name="pc" placeholder="The Postal Code"><br>
        <input type="number" name="area" placeholder="The Area">
        <input type="number" name="price" placeholder="The price"><br>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="description"></textarea>
        <select name="type">
            <option value="-----">-----</option>
            <option value="letting">letting</option>
            <option value="sale">sale</option>
        </select>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        select the picture : <input name="my-file" type="file" />
        <br>
        <input type="submit" name="submit" value="SEND">
    </form>


    <?php


    $title = '';
    $address = '';
    $city = '';
    $pc = '';
    $area = '';
    $price = '';
    $type = '';
    $image = '';
    $description = '';


    if (isset($_POST['submit'])) {
        // to work with database , we will use a function call :mysqli
        require_once 'database.php';
        $imgFolder = 'img/';
        

        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
        //  choose which database that i want to work with
        $db_name = DB_NAME;
        $db_found = mysqli_select_db($conn, $db_name);
        $title = $_POST['title'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $pc = (int) $_POST['pc'];
        $area = (int) $_POST['area'];
        $price = (int)$_POST['price'];
        $photo = $imgFolder;
        $type = $_POST['type'];
        $description = $_POST['description'];
        if (!empty($title) && !empty($address) && !empty($city) && !empty($type) && strlen($pc) == 4 && is_int($area) && is_int($price) ) {
            echo  "<p style='color: green'><strong>Your House Has Been Add.</strong></p>";
            $query = "INSERT INTO housing (id_housing, title, address, city, pc , area, price, photo , type, description)
            VALUES
            (NULL, ' $title', '$address', ' $city', '$pc', '$area', '$price', '$photo', ' $type', '$description')";
            $results = mysqli_query($conn, $query);
    
    
            if ($results) {
                echo 'Registration is a success! <br>';
                $querryID = "SELECT id_housing FROM housing
                WHERE title ='$title'";
                $resultID = mysqli_query($conn, $querryID);
                $idForPath = '';
                while ($db_record = mysqli_fetch_assoc($resultID)) {
                    $idForPath = $db_record['id_housing'];
                     }
                $registeredPhotoPath = $imgFolder . $idForPath . basename($_FILES['my-file']['name']);;
                $querryPhoto = "UPDATE housing
                SET photo = '$registeredPhotoPath'
                 WHERE id_housing = '$idForPath'";
                $resultsPhoto = mysqli_query($conn, $querryPhoto);
                move_uploaded_file($_FILES['my-file']['tmp_name'], $registeredPhotoPath);
                if ($resultsPhoto) {
                        echo 'Photo registration success';
                    } else {
                        echo 'Photo could not be uploaded';
                    }
            } else {
                echo 'Something went wrong please try again';
            }
        } else {
            echo  "<p style='color: red'><strong>Please Check Your Data.</strong></p>";
        }
        }







    ?>
    <hr>
    <a href="displaying.php">All Houses</a>

</body>

</html>