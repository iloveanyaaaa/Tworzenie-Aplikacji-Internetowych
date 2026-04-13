<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "nieruchomosci";

$dsn = "mysql:host=$host;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);

    $sql = "SELECT id_lokalu, nazwa_ulicy, blok, numer, powierzchnia
            FROM lokale
            WHERE powierzchnia > 70 AND nazwa_ulicy LIKE 'P%'
            ORDER BY powierzchnia DESC";

    $stmt = $pdo->query($sql);
    $rows = $stmt->fetchAll();

    if ($rows) {
        echo "<table border='1' bgcolor='lightgrey'>
                <tr>
                    <th>ID</th>
                    <th>ulica</th>
                    <th>blok</th>
                    <th>nr lokalu</th>
                    <th>powierzchnia (m2)</th>
                </tr>";

        foreach ($rows as $row) {
            echo "<tr>
                    <td>" . htmlspecialchars($row["id_lokalu"]) . "</td>
                    <td>" . htmlspecialchars($row["nazwa_ulicy"]) . "</td>
                    <td>" . htmlspecialchars($row["blok"]) . "</td>
                    <td>" . htmlspecialchars($row["numer"]) . "</td>
                    <td>" . htmlspecialchars($row["powierzchnia"]) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "brak wyników";
    }

} catch (PDOException $e) {
    echo "błąd połączenia lub zapytania: " . $e->getMessage();
}

$pdo = null;
?>