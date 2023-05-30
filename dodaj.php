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
    <h2>Nowy pracownik</h2>
    <form action="script.php" method="POST">
        <label for="imie">Imię:</label>
        <input type="text" name="imie" id="imie" required><br>
        
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" required><br>
        
        <label for="sprzet">Sprzęt:</label>
        <input type="text" name="sprzet" id="sprzet" required><br>
        
        <input type="submit" value="Dodaj pracownika">
        <a href="index.php"><button id="cofnij" type="button">Cofnij</button></a>
    </form>

</body>

</html>