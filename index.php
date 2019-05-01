<?php
$servername = "localhost";
$username = "root";
$pass = "";
$dbname = "myFirstBase";
$conn = new mysqli($servername, $username, $pass, $dbname);
if (isset($_POST['del_user'])) {
    $sql = "DELETE FROM NumBook WHERE name='" . $_POST['del_user'] . "'";
    $result = $conn->query($sql);
    if ($result) {
        header("Location:index.php");
    } else {
        echo "error";
    }
}
?>
<?php
if (isset($_POST['send'])){
    $name = $_POST['name'];
    $num = $_POST['number'];
    $servername = "localhost";
    $username = "root";
    $pass = "";
    $dbname = "myFirstBase";

    $conn = new mysqli($servername, $username, $pass, $dbname);
    $sql = "INSERT INTO NumBook(name, number)
            VALUES('$name', '$num')";
    if ($conn->query($sql) === TRUE){
        header("Location:index.php");
    }
    else{
        ?><p style="color: red">Такое имя уже есть!</p><?php
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
    <title>phoneBook</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <p id="title">Телефоннный справочник</p>
    <hr>
    <div id="allContact">

        <?php
        $servername = "localhost";
        $username = "root";
        $pass = "";
        $dbname = "myFirstBase";

        $conn = new mysqli($servername, $username, $pass, $dbname);
        $test = "SELECT * FROM NumBook";
        $result = $conn->query($test);
        while ($row = $result->fetch_assoc()) {
            echo "<div class=\"contact\"><p class=\"name\">".$row["name"]."</p><p class=\"number\">".$row["number"]."</p><form action=\"\" method=\"POST\"><input type=\"hidden\" name=\"del_user\" value=\"{$row["name"]}\">
                <input class='knopka' type=\"submit\" value=\"Удалить\"><br></form><form action='edit.php' method='GET'><input type='hidden' name='id' value='{$row["id"]}'><input class='knopka' type='submit' value='Редактировать'>
                </form></div>";
        }
        ?>
    </div>
    <div class="ka"><input class="knopka" type="button" value="Добавить" onclick="add()"></div>
    <div class="addContact">
        <form action="" method="post">
            <input type="text" name="name" placeholder="Введите имя">
            <input type="text" name="number" placeholder="Введите телефон">
            <input class="knopka" type="submit" value="Добавить" name="send">
        </form>
    </div>
    <script src="script.js" defer></script>
</body>
</html>