<?php
// Połączenie z bazą danych
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'firmakomputerowa';
$db_port = 3308; //mysql

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
// Sprawdzenie połączenia
if (mysqli_connect_errno()) {
    echo 'Błąd połączenia z bazą danych: ' . mysqli_connect_error();
    exit();
}
$conn->set_charset("utf8");

// Pobranie danych pracowników
$query = 'SELECT * FROM Pracownicy';
$result = mysqli_query($conn, $query);

$i = 0;
// Wygenerowanie wierszy tabeli HTML
while ($row = mysqli_fetch_assoc($result)) {
    $i++;
    echo '<option value="opcja' . $i . '">'. $row['Imie'] .'</option>';
}

// Zwolnienie zasobów i zamknięcie połączenia
mysqli_free_result($result);
mysqli_close($conn);
?>