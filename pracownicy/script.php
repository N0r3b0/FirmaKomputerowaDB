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
    if (isset($_POST['imie'], $_POST['dodaj'])) {
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];

        // Wstawianie danych pracownika do bazy danych
        $sql = "INSERT INTO pracownicy (Imie, Nazwisko) VALUES ('$imie', '$nazwisko')";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd dodawania pracownika: ' . $conn->error;
        }
    }
    // Sprawdzenie, czy przesłano pole 'id' - jeśli tak, to wykonujemy odejmowanie pracownika
    elseif (isset($_POST['id_remove'])) {
        $id_remove = $_POST['id_remove'];
        // Sprawdzenie istnienia pracownika o podanym ID
        $sql_check = "SELECT * FROM pracownicy WHERE ID_pracownika = '$id_remove'";
        $result = $conn->query($sql_check);
        // Usuwanie pracownika z bazy danych
        $sql = "DELETE FROM pracownicy WHERE ID_pracownika = '$id_remove'";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd usuwania pracownika: ' . $conn->error;
        }
    }
    elseif (isset($_POST['id_edit'])) {
        $id_edit = $_POST['id_edit'];
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];

        // Edytownie danych komputera do bazy danych
        $sql = "UPDATE pracownicy SET Imie = '$imie', Nazwisko = '$nazwisko' WHERE ID_pracownika = '$id_edit'";
        if ($conn->query($sql) === true) {
            header("Location: ../index.php");
        } else {
            echo 'Błąd edytowania komputera: ' . $conn->error;
        }
    }
}

$conn->close();
?>