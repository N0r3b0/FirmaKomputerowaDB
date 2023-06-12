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
$showKomputeryQuery = 'SELECT * FROM komputery';
$showKomputeryResult = mysqli_query($conn, $showKomputeryQuery);

function checkIfKomputerTaken($id_komputera)
{
  global $conn;
  $isTakenQuery = "SELECT `ID_komputera` FROM `przypisanie` WHERE ID_komputera = $id_komputera AND ID_pracownika IS NOT null";
  $isTakenResult = mysqli_query($conn, $isTakenQuery);
  if ($isTakenResult->num_rows > 0)
    return 1;
  else
    return 0;
}

function przypisanyPracownik($id_komputera)
{
  global $conn;
  $ktoPrzypisanyQuery = "SELECT p.Imie, p.Nazwisko
          FROM przypisanie AS prz
          JOIN pracownicy AS p ON p.ID_pracownika = prz.ID_pracownika
          WHERE prz.ID_komputera = $id_komputera";
  $ktoPrzypisanyResult = mysqli_query($conn, $ktoPrzypisanyQuery);
  $row = mysqli_fetch_assoc($ktoPrzypisanyResult);
  echo $row['Imie'] . " " . $row['Nazwisko'];
}

// Wygenerowanie wierszy tabeli HTML
while ($row = mysqli_fetch_assoc($showKomputeryResult)) {
    echo '<tr>';
    echo '<td>' . $row['ID_komputera'] . '</td>';
    echo '<td>' . $row['Procesor'] . '</td>';
    echo '<td>' . $row['RAM'] . '</td>';
    echo '<td>' . $row['Karta'] . '</td>';
    echo '<td>' . $row['HDD'] . '</td>';
    echo '<td>';
    if(checkIfKomputerTaken($row['ID_komputera']) == 1) 
      echo przypisanyPracownik($row['ID_komputera']);
    else
      echo "Brak";
    echo '</td>';
    echo '<td>';
    echo '<button id="edytuj" onclick="submitKomputeryEdytuj(this)">edytuj</button>';
    echo '<button id="usun" onclick="submitKomputeryUsun(this)">usuń</button>' .
    //skrypt JS dodający metodę post z atrybutem id kopmutera do przycisku
    '<script src = "komputery/script.js"></script>';
    echo '</td>';
}

// Zwolnienie zasobów i zamknięcie połączenia
mysqli_free_result($showKomputeryResult);
mysqli_close($conn);
?>