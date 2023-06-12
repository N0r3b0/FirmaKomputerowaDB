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
    <h2>Edytuj pracownika</h2>
    <form action="script.php" method="POST">
        <input type="hidden" name="id_edit" value="<?php echo $_POST['id_edit']; ?>">

        <label for="imie">Imię:</label>
        <input type="text" name="imie" id="imie" value="<?php echo $_POST['imie']; ?>" required><br>
        
        <label for="nazwisko">Nazwisko:</label>
        <input type="text" name="nazwisko" id="nazwisko" value="<?php echo $_POST['nazwisko']; ?>" required><br>
        
        <input type="submit" value="Dodaj pracownika">
        <a href="../index.php"><button id="cofnij" type="button">Cofnij</button></a>
    </form>

</body>

</html>