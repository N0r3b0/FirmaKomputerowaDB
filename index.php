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
    <a href="pracownicy/dodaj.php"><button id="dodaj">Dodaj pracownika</button></a>
    <table id="pracownicyTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Przypisany komputer</th>
                <th>Operacje</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'pracownicy/showTables.php'; ?>
        </tbody>
    </table>

    <h2>Lista komputerów</h2>
    <a href="komputery/dodaj.php"><button id="dodaj">Dodaj sprzęt</button></a>
    <table id="komputeryTable">
        <thead>
            <tr>
                <th>ID komputera</th>
                <th>Procesor</th>
                <th>RAM</th>
                <th>Karta</th>
                <th>HDD</th>
                <th>Przypisany pracownik</th>
                <th>Operacje</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'komputery/showTables.php'; ?>
        </tbody>
    </table>

    <h2>Lista Serwerów</h2>
    <a href="serwery/dodaj.php"><button id="dodaj">Dodaj serwer</button></a>
    <table id="serweryTable">
        <thead>
            <tr>
                <th>ID serwera</th>
                <th>Procesor</th>
                <th>RAM</th>
                <th>Karta</th>
                <th>HDD</th>
                <th>Administrator</th>
                <th>Operacje</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'serwery/showTables.php'; ?>
        </tbody>
    </table>

    <h2>Przypisz komputer</h2>
    <a href="przypisz/dodaj.php"><button id="dodaj">Przypisz komputer</button></a>
    
</body>

</html>