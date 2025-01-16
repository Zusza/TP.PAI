<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>17.01.25r</title>
</head>
<body>
    <form method="post">
        Podaj nazwę bazy danych:
        <input type="text" id="base" name="base">
        <br>
        <br>
        Podaj nazwę tabeli:
        <input type="text" id="table" name="table">
        <br>
        <br>
        Podaj nazwę 1 kolumny:
        <input type="text" id="kol1" name="kol1">
        <br>
        <br>
        Podaj nazwę 2 kolumny:
        <input type="text" id="kol2" name="kol2">
        <br>
        <br>
        <input type="submit" value="Utwórz baze">
    </form>
    <?php
        $base = $_POST['base'];
        $table = $_POST['table'];
        $kol1 = $_POST['kol1'];
        $kol2 = $_POST['kol2'];
        $conn = new mysqli('localhost', 'root', '');
        $sql = "CREATE DATABASE IF NOT EXISTS $base";
        if ($conn->query($sql) === TRUE) {
            $conn->select_db($base);
            $sql = "CREATE TABLE IF NOT EXISTS $table (
                        id INT(6) AUTO_INCREMENT PRIMARY KEY,
                        $kol1 VARCHAR(100),
                        $kol2 VARCHAR(100)
                    )";
            if ($conn->query($sql) === TRUE) {
                echo "Baza utworzona";
            } else {
                echo "";
            }
        }else{
            echo"Błąd";
        }
        $conn->close();
    ?>
</body>
</html>
