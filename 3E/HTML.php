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
        <input type="text" id="baza" name="baza"><br><br>
        Podaj nazwę tabeli:
        <input type="text" id="tab" name="tab"><br><br>
        Podaj nazwę 1 kolumny:
        <input type="text" id="kol1" name="kol1"><br><br>
        Podaj nazwę 2 kolumny:
        <input type="text" id="kol2" name="kol2"><br><br>
        <input type="submit" value="Utwórz bazę danych">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $baza = $_POST['baza'];
        $tabela = $_POST['tab'];
        $kol1 = $_POST['kol1'];
        $kol2 = $_POST['kol2'];
        $conn = new mysqli('localhost', 'root', '');
        $sql = "CREATE DATABASE IF NOT EXISTS $baza";
        if ($conn->query($sql) === TRUE) {
            $conn->select_db($baza);
            $sql = "CREATE TABLE IF NOT EXISTS $tabela (
                        id INT(6) AUTO_INCREMENT PRIMARY KEY,
                        $kol1 VARCHAR(50),
                        $kol2 VARCHAR(50)
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
    }
    ?>
</body>
</html>