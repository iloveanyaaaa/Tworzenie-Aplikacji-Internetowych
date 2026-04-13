<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "nieruchomosci";

$conn = new mysqli($host, $user, $pass, $db);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("błąd połączenia: " . $conn->connect_error);
}

$sql = "SELECT id_lokalu, nazwa_ulicy, blok, numer, powierzchnia 
        FROM lokale 
        WHERE powierzchnia > 70 AND nazwa_ulicy LIKE 'P%' 
        ORDER BY powierzchnia DESC";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    echo "<table border='1' bgcolor='lightgrey';>
            <tr>
                <th>ID</th>
                <th>ulica</th>
                <th>blok</th>
                <th>nr lokalu</th>
                <th>powierzchnia (m2)</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id_lokalu"] . "</td>
                <td>" . $row["nazwa_ulicy"] . "</td>
                <td>" . $row["blok"] . "</td>
                <td>" . $row["numer"] . "</td>
                <td>" . $row["powierzchnia"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {

    if ($conn->error) {
        echo "złe zapytanie " . $conn->error;
    } else {
        echo "brak wyników";
    }
}

$conn->close();
?>