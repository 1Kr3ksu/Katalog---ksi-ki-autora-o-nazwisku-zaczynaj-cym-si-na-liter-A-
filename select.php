<?php
$conn = new mysqli("localhost", "root", "", "biblioteka");
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
    echo "Error ".$conn->connect_error;
}
$sql = "SELECT id, CONCAT(imie, ' ', nazwisko) AS autor, tytul FROM ksiazki WHERE nazwisko LIKE 'A%' ORDER BY id ASC;";
$wynik = $conn->query($sql);

// Generowanie tabeli
if ($wynik->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 30%;'>";
    echo "<tr>
            <th>ID</th>
            <th>Autor</th>
            <th>Tytuł</th>
          </tr>";
    while ($wiersz = $wynik->fetch_assoc()) {
        echo "<tr>
                <td>" . $wiersz['id'] . "</td>
                <td>" . $wiersz['autor'] . "</td>
                <td>" . $wiersz['tytul'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Brak wyników.";
}

// Zamknięcie połączenia
$conn->close();
?>
