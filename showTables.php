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
// Wygenerowanie wierszy tabeli HTML
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>' . $row['ID_pracownika'] . '</td>';
    echo '<td>' . $row['Imie'] . '</td>';
    echo '<td>' . $row['Nazwisko'] . '</td>';
    echo '<td>' . $row['Stanowisko'] . '</td>';
    echo '<td>' . '<button id="edytuj">edytuj</button>' 
    . '<button id="usun" onclick="submitForm()">usuń</button>' . 
    //skrypt JS dodający metodę post z atrybutem id pracownika do przycisku
    '<script>
    function submitForm() {
    var form = document.createElement("form");
    form.method = "POST";
    form.action = "script.php";
    
    var input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = "' . $row['ID_pracownika'] . '";
    
    form.appendChild(input);
    
    document.body.appendChild(form);
    form.submit();
  }
    </script>' . '</td>';
}

// Zwolnienie zasobów i zamknięcie połączenia
mysqli_free_result($result);
mysqli_close($conn);
?>