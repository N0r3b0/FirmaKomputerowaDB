<?php
// Połączenie z bazą danych
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'firmakomputerowa';
$db_port = 3308; //mysql

$conn = new mysqli($db_host, $db_user, $db_password, $db_name, $db_port);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $conn->connect_error);
}

// Sprawdzenie, czy dane zostały przesłane
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sprawdzenie, czy przesłano pole 'procesor' - jeśli tak, to wykonujemy dodawanie procesora
    if (isset($_POST['procesor'], $_POST['dodaj'])) {
        $procesor = $_POST['procesor'];
        $ram = $_POST['ram'];
        $karta = $_POST['karta'];
        $hdd = $_POST['hdd'];
        $admin = $_POST['admin'];

        // Wstawianie danych komputera do bazy danych
        $sql = "INSERT INTO serwery (Procesor, RAM, Karta, HDD, Administrator) VALUES ('$procesor', '$ram', '$karta', '$hdd', '$admin')";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd dodawania serwera: ' . $conn->error;
        }
    }
    // Sprawdzenie, czy przesłano pole 'id_remove' - jeśli tak, to wykonujemy odejmowanie procesora
    elseif (isset($_POST['id_remove'])) {
        $id_remove = $_POST['id_remove'];
        // Sprawdzenie istnienia procesora o podanym ID
        $sql_check = "SELECT * FROM serwery WHERE ID_serwera = '$id_remove'";
        $result = $conn->query($sql_check);
        // Usuwanie procesora z bazy danych
        $sql = "DELETE FROM serwery WHERE ID_serwera = '$id_remove'";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd usuwania serwera: ' . $conn->error;
        }
    }
    // Sprawdzenie, czy przesłano pole 'edit' - jeśli tak, to wykonujemy edytowanie procesora
    elseif (isset($_POST['id_edit'])) {
        $id_edit = $_POST['id_edit'];
        $procesor = $_POST['procesor'];
        $ram = $_POST['ram'];
        $karta = $_POST['karta'];
        $hdd = $_POST['hdd'];
        $admin = $_POST['admin'];

        // Edytownie danych komputera do bazy danych
        $sql = "UPDATE serwery SET Procesor = '$procesor', RAM = '$ram', Karta = '$karta', HDD = '$hdd', Administrator = '$admin' 
        WHERE ID_serwera = '$id_edit'";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd edytowania serwera: ' . $conn->error;
        }
    }
}

$conn->close();
?>