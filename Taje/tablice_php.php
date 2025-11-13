<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Operacje na Tablicach</title>
</head>
<body>

<?php
$tab1 = [7, 3, 1, 6, 9, 5, 4, 10, 2, 2];

echo "Zawartość 5. komórki tablicy: ";
echo $tab1[4] . "<br> <br>";

$tab1[6] = 12;

$tab2 = [];
for ($i = 0; $i < count($tab1); $i++) {
    $tab2[$i] = $tab1[$i];
}

$tab3 = [];
for ($i = 0; $i < count($tab1); $i++) {
    $tab3[$i] = $tab1[$i] + $tab2[$i];
}

$tab2 = [];
for ($i = count($tab1) - 1; $i >= 0; $i--) {
    $tab2[] = $tab1[$i];
}

echo "Tablica 1:<br>";
print_r($tab1);
echo "<br><br>Tablica 2 (odwrócona):<br>";
print_r($tab2);
echo "<br><br>Tablica 3 (suma indeksów):<br>";
print_r($tab3);
?>

</body>
</html>
