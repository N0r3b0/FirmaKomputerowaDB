<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baza danych pracowników</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Nowy serwer</h2>
    <form action="script.php" method="POST">
        <div class="form-row">
            <label for="wybor">Wybierz pracownika:</label>
            <select id="wybor" name="wybor">
                <?php include 'przypisz/showTables.php'; ?>
            </select>
        </div>

        <div class="form-row">
            <label for="wybor2">Wybierz komputer:</label>
            <select id="wybor2" name="wybor2">
                
            </select>  
        </div>

        <input type="submit" value="Przypisz">
        <a href="../index.php"><button id="cofnij" type="button">Cofnij</button></a>
    </form>

</body>

</html>