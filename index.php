<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza danych pracowników</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Baza danych pracowników</h1>

    <!-- Wyświetlanie pracowników -->
    <h2>Lista pracowników</h2>
    <a href="dodaj.php"><button id="dodaj">Dodaj pracownika</button></a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Stanowisko</th>
                <th>Operacje</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'showTables.php'; ?>
        </tbody>
    </table>

</body>

</html>