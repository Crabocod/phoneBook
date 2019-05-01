<?php
$id = $_GET['id'];
if (isset($_POST['send'])){
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "myFirstBase";

    $conn = new mysqli($servername, $username, $pass, $dbname);
    $new_name = $_POST['new_name'];
    $new_num = $_POST['new_number'];
    $sql = "UPDATE NumBook
            SET name = '$new_name', number = '$new_num'
            WHERE id = '$id'";
    if ($conn->query($sql) === TRUE){
        header("Location:index.php");
    }
    else{
        echo $conn->error;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css.css">
    <title>Edit</title>
</head>
<body>
<form action="" method="POST">
    <input type="text" name = 'new_name' placeholder="Новое имя">
    <input type="text" name="new_number" placeholder="Новый номер">
    <input class = "knopka" type="submit" value="Применить" name="send">
</form>
</body>
</html>
