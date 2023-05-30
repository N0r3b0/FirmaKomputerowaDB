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
    // Sprawdzenie, czy przesłano pole 'imie' - jeśli tak, to wykonujemy dodawanie pracownika
    if (isset($_POST['imie'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $sprzet = $_POST['sprzet'];

        // Wstawianie danych pracownika do bazy danych
        $sql = "INSERT INTO pracownicy (Imie, Nazwisko, Stanowisko) VALUES ('$imie', '$nazwisko', '$sprzet')";
        if ($conn->query($sql) === true) {
            header("Location: index.php");
        } else {
            echo 'Błąd dodawania pracownika: ' . $conn->error;
        }
    }
    // Sprawdzenie, czy przesłano pole 'id' - jeśli tak, to wykonujemy odejmowanie pracownika
    elseif (isset($_POST['id'])) {
        $id = $_POST['id'];
        // Sprawdzenie istnienia pracownika o podanym ID
        $sql_check = "SELECT * FROM pracownicy WHERE ID_pracownika = '$id'";
        $result = $conn->query($sql_check);
        // Usuwanie pracownika z bazy danych
        $sql = "DELETE FROM pracownicy WHERE ID_pracownika = '$id'";
        if ($conn->query($sql) === true) {
            header("Location: index.php");
        } else {
            echo 'Błąd usuwania pracownika: ' . $conn->error;
        }
    }
}

$conn->close();
?>