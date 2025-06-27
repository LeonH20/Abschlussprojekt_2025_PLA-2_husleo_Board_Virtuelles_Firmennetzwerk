<?php
session_start();

$fehler = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $benutzer = $_POST['username'];
    $pw = $_POST['password'];

    $liste = [
        'admin' => 'pass123',
        'worker' => 'work123',
        'ceo' => 'ceo123'
    ];

    if (isset($liste[$benutzer]) && $liste[$benutzer] == $pw) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $benutzer;

        $host = "192.168.2.11";
        $nutzer = "webuser";
        $dbpw = "superpass";
        $db = "intranet_logins_db";

        $verbindung = new mysqli($host, $nutzer, $dbpw, $db);
        if ($verbindung->connect_error) {
            echo "Verbindung zur Datenbank fehlgeschlagen.";
        } else {
            $loeschen = $verbindung->prepare("DELETE FROM logins WHERE username = ?");
            $loeschen->bind_param("s", $benutzer);
            $loeschen->execute();
            $loeschen->close();

            $erfolg = 1;
            $eintragen = $verbindung->prepare("INSERT INTO logins (username, password, success) VALUES (?, ?, ?)");
            $eintragen->bind_param("ssi", $benutzer, $pw, $erfolg);
            $eintragen->execute();
            $eintragen->close();

            $verbindung->close();
        }

        header("Location: home.php");
        exit;
    } else {
        $fehler = "Login fehlgeschlagen.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Intranet Login</h2>

<form method="post">
    <input type="text" name="username" placeholder="Benutzername" required><br>
    <input type="password" name="password" placeholder="Passwort" required><br>
    <button type="submit">Login</button>
</form>

<p style="color:red;"><?php echo $error; ?></p>
</body>
</html>
