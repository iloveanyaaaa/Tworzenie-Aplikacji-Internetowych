<?php
$owoce = ["winogron", "borowa", "truskawa"];
foreach ($owoce as $owoc) {
    echo "Owoc: $owoc<br>";
}
$tekst = "a dajcie spokoj z tym php..";
echo "Długość tekstu: " . strlen($tekst) . "<br>";
$plik = "dane.txt";
file_put_contents($plik, $tekst);
$zawartosc = file_get_contents($plik);
echo "Zawartość pliku: $zawartosc<br>";
?>