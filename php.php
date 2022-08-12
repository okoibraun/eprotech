<?php

$str = "This is a string value 3.6";
$myInt = 2;
$floatVar = 10.2;
$nullVar = NULL;
$boolVar = true; //or false
$arrayVar = array("1", "Braun", "Okoi", "Boniface");
$array2 = ["Okon", "Chukwudi", "Mary", "Agness"];
$car = ["Honda", "Mercedes", "Toyota", "Lexuz", "Ford"];

$assocArray = ['name'=>'Braun Okoi Boniface', 'school'=>'GDLI', 'course'=>'BIT'];
//echo $str;
//echo $car[0];
//echo $array2[3];

//echo $assocArray['name'];

$twoDimensionalAray = [
    ["name"=>"Braun Boniface", 'course'=>"BIT", "school"=>"Global Distant Learning Institute"],
    [1,2,3,4,5,6,7]
];

//echo $twoDimensionalAray[0]['name'], $twoDimensionalAray[1][1];

$str = "This is the new string value";
echo "<br>{$str}";

define("MYNAME", "Okoi Ofem");

echo MYNAME;

$myInt += 10;

echo $myInt;
$myInt2 = $myInt+1;
echo $myInt2;
echo $myInt++;
echo $myInt2++;

