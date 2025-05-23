<?php echo 'Hello world'; 

echo '<br>';

$language = 'PHP';
echo $language;

echo '<br>';

$isVisible = true;
var_dump($isVisible); 
echo '<br>';

$age = 18;
var_dump($age); 

echo '<br>';

$price = 19.99;
var_dump($price); 

echo '<br>';

$title = 'PHPDevs';
var_dump($title); 

echo '<br>';

$user = null;
var_dump($user); 

echo '<br>';

echo 1 + 2; 

echo '<br>';

$motherAge = 42;
$dadAge = 39;
$familyAge = $motherAge + $dadAge;
echo $familyAge; 

echo '<br>';

$money = 10;
echo $money - 2.99; 

echo '<br>';

$sideA = 6;
$sideB = 3;
$rectangleArea = $sideA * $sideB;
echo $rectangleArea; 

echo '<br>';

$number = 10 % 3;
echo $number; 

echo '<br>';

echo 4 ** 2; 

echo '<br>';

$price = 2.99;
echo $price -= 0.39; 

echo '<br>';

$logo1 = 'PHP';
$logo2 = 'Devs';
echo $logo1 . $logo2; 

echo '<br>';

$version = 8;
echo 'PHP $version!'; 
echo "PHP $version!"; 

echo '<br>';

$version = 8;
echo 'PHP ' . $version . '!'; 

echo '<br>';

$version = 8;
echo "PHP {$version}!"; 

echo '<br>';

$person1 = 'Jan';
$person2 = 'Piotr';
$person3 = 'Adrian';
$person4 = 'Marek';
$person5 = 'Adam';

echo '<br>';

$people = ['Jan', 'Piotr', 'Adrian', 'Marek', 'Adam'];
var_dump($people);

echo '<br>';

$people = ['Jan', 'Piotr', 'Adrian', 'Marek', 'Adam'];
$people[7] = 'Arkadiusz';

echo '<br>';

$person = [
    'name' => 'Jan',
    4 => 26,
    null => 'Kwiatowa 1',
    2.8 => 'jan@example.com'
];
var_dump($person);

echo '<br>';

$people = [
    'Jan' => [
        'age' => 26,
        'address' => 'Kwiatowa 1',
        'email' => 'jan@example.com'
    ],
    'Piotr' => [
        'age' => 32,
        'address' => 'Ogrodowa 8',
        'email' => 'piotr@example.com'
    ]
];
echo $people['Piotr']['age']; 

?>