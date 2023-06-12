<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza danych pracowników</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h2>Nowy serwer</h2>
    <form action="script.php" method="POST">
        <input type="hidden" name="dodaj" value="">

        <label for="procesor">Procesor:</label>
        <input type="text" name="procesor" id="procesor" required><br>
        
        <label for="ram">RAM:</label>
        <input type="text" name="ram" id="ram" required><br>
        
        <label for="karta">Karta:</label>
        <input type="text" name="karta" id="karta" required><br>

        <label for="hdd">HDD:</label>
        <input type="text" name="hdd" id="hdd" required><br>

        <label for="admin">Administrator ID:</label>
        <input type="text" name="admin" id="admin" required><br>
        
        <input type="submit" value="Dodaj serwer">
        <a href="../index.php"><button id="cofnij" type="button">Cofnij</button></a>
    </form>

</body>

</html>