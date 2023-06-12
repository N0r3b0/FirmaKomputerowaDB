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
$showSerweryQuery = 'SELECT * FROM serwery';
$showSerweryResult = mysqli_query($conn, $showSerweryQuery);



function showAdminstrator($id_serwera)
{
  global $conn;
  $admin = "SELECT p.Imie, p.Nazwisko
          FROM serwery AS s
          JOIN pracownicy AS p ON p.ID_pracownika = s.Administrator
          WHERE s.ID_serwera = $id_serwera";
  $adminResult = mysqli_query($conn, $admin);
  $row = mysqli_fetch_assoc($adminResult);
  if($row != null)
    echo $row['Imie'] . ' ' . $row['Nazwisko'];
  else
    echo "Brak administratora";
}

// Wygenerowanie wierszy tabeli HTML
while ($row = mysqli_fetch_assoc($showSerweryResult)) {
    echo '<tr>';
    echo '<td>' . $row['ID_serwera'] . '</td>';
    echo '<td>' . $row['Procesor'] . '</td>';
    echo '<td>' . $row['RAM'] . '</td>';
    echo '<td>' . $row['Karta'] . '</td>';
    echo '<td>' . $row['HDD'] . '</td>';
    echo '<td>';
      echo showAdminstrator($row['ID_serwera']);
    echo '</td>';
    echo '<td>';
    echo '<button id="edytuj" onclick="submitSerweryEdytuj(this)">edytuj</button>';
    echo '<button id="usun" onclick="submitSerweryUsun(this)">usuń</button>' .
    //skrypt JS dodający metodę post z atrybutem id kopmutera do przycisku
    '<script src = "serwery/script.js"></script>';
    echo '</td>';
}

// Zwolnienie zasobów i zamknięcie połączenia
mysqli_free_result($showSerweryResult);
mysqli_close($conn);
?>