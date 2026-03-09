<?php
echo "<h1>Temat 2</h1>";
$a = 4;
$b = 9;
$c = 6;
echo "<h3>Instrukcja IF</h3>";
if($a < $b){
    echo "Zmienna a jest mniejsza od b <br>";
}
if($b > $a){
    echo "Zmienna b jest większa od a <br>";
}
if($a > $c){
    echo "a jest większe od c <br>";
}else{
    echo "a nie jest większe od c <br>";
}
if($a > $c){
    echo "a jest większe od c <br>";
}elseif($b < $c){
    echo "c jest większe od b <br>";
}
echo "<h3>Instrukcja SWITCH</h3>";
$liczba = 15;
switch($liczba){
    case 5:
        echo "Wartość zmiennej to 5";
        break;
    case 10:
        echo "Wartość zmiennej to 10";
        break;
    case 15:
        echo "Wartość zmiennej to 15";
        break;
    default:
        echo "Brak dopasowania";
        break;
}
echo "<h3>Pętla WHILE</h3>";
$x = 2;
while($x <= 8){
    echo "Numer z pętli while: $x <br>";
    $x++;
}
echo "<h3>Pętla DO WHILE</h3>";
$y = 1;
do{
    echo "Wartość z pętli do while: $y <br>";
    $y++;
}
while($y <= 5);
echo "<h3>Pętla FOR</h3>";
for($i = 1; $i <= 7; $i++){
    echo "Pętla for numer: $i <br>";
}
echo "<h3>Operator warunkowy</h3>";
$sprawdz = 8;
echo ($sprawdz > 10) ? "Liczba większa od 10" : "Liczba mniejsza lub równa 10";
echo "<h3>Tabliczka mnożenia</h3>";
for($i = 1; $i <= 8; $i++){
    for($j = 1; $j <= 8; $j++){
        $wynik = $i * $j;
        if($wynik % 2 == 0){
            echo "<font color='purple'>$i * $j = $wynik</font><br>";
        }else{
            echo "<font color='orange'>$i * $j = $wynik</font><br>";
        }
    }
}
echo "<br><br>";
echo "<h3>Potęgowanie liczby</h3>";
$potega = 3;
switch($potega){

    case 1:
    case 2:
    case 3:
        echo "$potega do potęgi 5 = " . ($potega ** 5);
        break;

    default:
        echo "Nieznana wartość";
        break;
}
echo "<h1>Temat 3</h1>";
$tablicaA = [5,8,2,7,4,6,1,9,3,10];
echo "Element o indeksie 3: ";
echo $tablicaA[3] . "<br><br>";
$tablicaA[5] = 20;
$tablicaB = [];
for($i = 0; $i < count($tablicaA); $i++){
    $tablicaB[$i] = $tablicaA[$i];
}
$tablicaC = [];
for($i = 0; $i < count($tablicaA); $i++){
    $tablicaC[$i] = $tablicaA[$i] + $tablicaB[$i];
}
$tablicaB = [];
for($i = count($tablicaA) - 1; $i >= 0; $i--){
    $tablicaB[] = $tablicaA[$i];
}
echo "Tablica A:<br>";
print_r($tablicaA);
echo "<br><br>Tablica B (odwrócona):<br>";
print_r($tablicaB);
echo "<br><br>Tablica C (suma wartości):<br>";
print_r($tablicaC);
if (isset($_GET['dzien'], $_GET['miesiac'], $_GET['rok'])) {
    $data = [
        'dzien' => $_GET['dzien'],
        'miesiac' => $_GET['miesiac'],
        'rok' => $_GET['rok']
    ];
    function wypisz_dzien_tygodnia($data) {
        $dzienTygodnia = date("w", mktime(0,0,0,$data['miesiac'], $data['dzien'], $data['rok']));
        switch($dzienTygodnia) {
            case 0: echo "Niedziela"; break;
            case 1: echo "Poniedziałek"; break;
            case 2: echo "Wtorek"; break;
            case 3: echo "Środa"; break;
            case 4: echo "Czwartek"; break;
            case 5: echo "Piątek"; break;
            case 6: echo "Sobota"; break;
        }
    }
    function oblicz_dni($data) {
        $czas = (time() - mktime(0,0,0,$data['miesiac'], $data['dzien'],$data['rok'])) / 60 / 60 / 24;
        return floor($czas);
    }
    function sprawdz_pełnoletnosc($dzien, $miesiac, $rok) {
        $dzisiaj = new DateTime();
        $urodziny = new DateTime("$rok-$miesiac-$dzien");
        $wiek = $dzisiaj->diff($urodziny)->y;
        if ($wiek >= 18) {
            echo "Jesteś pełnoletni/a. Twój wiek: $wiek lat.";
        } else {
            echo "Nie jesteś pełnoletni/a. Twój wiek: $wiek lat.";
        }
    }
    wypisz_dzien_tygodnia($data);
    echo "<br>";
    echo "Minęło dni od urodzenia: " . oblicz_dni($data);
    echo "<br>";
    sprawdz_pełnoletnosc($data['dzien'], $data['miesiac'], $data['rok']);
}
?>
