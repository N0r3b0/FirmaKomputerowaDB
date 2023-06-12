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

function checkIfPrzypisanyKomputer($id_pracownika)
{
  global $conn;
  $isTakenQuery = "SELECT `ID_pracownika` FROM `przypisanie` WHERE ID_pracownika = $id_pracownika AND ID_komputera IS NOT null";
  $isTakenResult = mysqli_query($conn, $isTakenQuery);
  if ($isTakenResult->num_rows > 0)
    return 1;
  else
    return 0;
}

function przypisanyKomputer($id_pracownika)
{
  global $conn;
  $ktoryPrzypisanyQuery = "SELECT k.ID_komputera
          FROM przypisanie AS prz
          JOIN komputery AS k ON k.ID_komputera = prz.ID_komputera
          WHERE prz.ID_pracownika = $id_pracownika";
  $ktoryPrzypisanyResult = mysqli_query($conn, $ktoryPrzypisanyQuery);
  //wypisywanie przypisanych komputerów
  while ($row = mysqli_fetch_assoc($ktoryPrzypisanyResult)) {
    echo "nr: " . $row['ID_komputera'] . ' ';
  }
}

// Wygenerowanie wierszy tabeli HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['ID_pracownika'] . '</td>';
    echo '<td>' . $row['Imie'] . '</td>';
    echo '<td>' . $row['Nazwisko'] . '</td>';
    echo '<td>';
    if (checkIfPrzypisanyKomputer($row['ID_pracownika']) == 1)
      echo przypisanyKomputer($row['ID_pracownika']);
    else
      echo "Brak";
    echo '</td>';
    echo '<td>';
    echo '<button id="edytuj" onclick="submitPracownicyEdytuj(this)">edytuj</button>';
    echo '<button id="usun" onclick="submitPracownicyUsun(this)">usuń</button>' .
    //skrypt JS dodający metodę post z atrybutem id pracownika do przycisku
    '<script src = "pracownicy/script.js"></script>';
    echo '</td>';
}

// Zwolnienie zasobów i zamknięcie połączenia
mysqli_free_result($result);
mysqli_close($conn);
?>