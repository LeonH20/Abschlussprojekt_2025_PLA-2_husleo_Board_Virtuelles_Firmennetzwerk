<?php
$host = "192.168.2.11";
$nutzer = "webuser";
$dbpw = "superpass";
$db = "Huskaj_Solutions_DB";

// Verbindung aufbauen
$verbindung = new mysqli($host, $nutzer, $dbpw, $db);
if ($verbindung->connect_error) {
    die("Verbindung fehlgeschlagen: " . $verbindung->connect_error);
}

// Eingaben holen
$vorname = $_POST["firstname"];
$nachname = $_POST["surname"];
$email = $_POST["email"];
$anzahl = (int) $_POST["anzahl"];
$kommentar = $_POST["nachricht"] ?? '';
$script_id = (int) $_POST["produkt"];  // <-- ID aus dem HTML

$fullName = $vorname . " " . $nachname;

// 1. Kunde speichern
$stmt = $verbindung->prepare("INSERT INTO kunden (name, email) VALUES (?, ?)");
$stmt->bind_param("ss", $fullName, $email);
$stmt->execute();
$kunde_id = $verbindung->insert_id;
$stmt->close();

// 2. Bestellung speichern
$stmt = $verbindung->prepare("INSERT INTO bestellungen (kunde_id, script_id, kommentar) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $kunde_id, $script_id, $kommentar);
if (!$stmt->execute()) {
    die("Fehler bei Bestellung: " . $stmt->error);
}
$stmt->close();

// Verbindung beenden
$verbindung->close();

// Rückmeldung anzeigen
echo "<h2>Bestellung erfolgreich versendet</h2>
<p>Vielen Dank, $fullName. Du hast $anzahl × Skript $script_id bestellt.</p>";

// Dateinamen passend zur script_id definieren
$scriptMap = [
  1 => "mydel.sh",
  2 => "sysstatus.sh",
  3 => "ordnercheck.sh"
];

// Nur wenn gültige ID
if (isset($scriptMap[$script_id])) {
  $file = $scriptMap[$script_id];
  echo "<a href='/downloads/$file' download class='btn'>📥 Skript herunterladen</a>";
} else {
  echo "<p><b>Download nicht verfügbar.</b></p>";
}
?>
