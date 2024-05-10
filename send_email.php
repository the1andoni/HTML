<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formulardaten abrufen
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];
    $kontaktgrund = $_POST["kontaktgrund"];
    $zustimmung = isset($_POST["zustimmung_kontaktaufnahme"]) ? "Ja" : "Nein";

    // Empfängeradresse und Betreff festlegen
    $to = "deine@email.de"; // Hier deine E-Mail-Adresse eintragen
    $subject = "Neue Kontaktanfrage von $vorname $nachname";

    // E-Mail-Nachricht erstellen
    $message = "Vorname: $vorname\n";
    $message .= "Nachname: $nachname\n";
    $message .= "E-Mail: $email\n";
    $message .= "Kontaktgrund: $kontaktgrund\n";
    $message .= "Rückfragen erlaubt: $zustimmung\n";

    // Absenderadresse festlegen
    $from = $email; // Verwende die E-Mail-Adresse aus dem Formular

    // E-Mail-Headers festlegen
    $headers = "From: $from";

    // E-Mail senden
    if (mail($to, $subject, $message, $headers)) {
        echo "Die E-Mail wurde erfolgreich gesendet.";
    } else {
        echo "Beim Senden der E-Mail ist ein Fehler aufgetreten.";
    }
}
?>