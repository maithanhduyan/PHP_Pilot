<?php 
$jsonString = '["Bus 66","Bus 79","Str 3","Str 8","Bus N8","Bus 70","Str 4","Bus 108","Bus N9","Str 14","Bus N1","Bus 130","Bus 131","Bus N2","Bus N3","Bus 91","Bus N6","Bus 172","Bus 75","Str 10","Str 11","Bus N7","Str 16","Bus 72","Bus 73","Bus 86","Bus 143","Str N10","Bus 89","Bus 60","Bus SEV7","Bus 77","Bus 90","Bus N5","Bus 80","Bus N4","BusSEV11","Bus 67","Bus 173","Bus 175","Bus 176","Bus 81","Bus 83"]';

$list = json_encode($jsonString);

$list = json_decode($jsonString);

//echo $jsonString;

echo'</br></br>';

echo json_encode($list);

echo'</br></br>';

echo 'number of element: ' . count($list);

echo'</br></br>';

$tram      = [];
$bus       = [];
$night     = []; 

foreach($list as $item){
    if(preg_match('/\bStr [0-9]\b/',$item)){
        array_push($tram, $item);
    }elseif (preg_match('{Bus [0-9]}',$item)){
        array_push($bus,$item);
    }elseif (preg_match('{Bus[ ]?[A-Z]}',$item)){
        array_push($night,$item);
    }
}

echo json_encode($tram);
//sort tram
sort($tram);
echo ' sort ==> ' . json_encode($tram);

echo'</br></br>';
echo json_encode($bus);
echo'</br></br>';

$tmpList    = [];
foreach($bus as $item){
    $tmp = str_replace('Bus ', '', $item);
    array_push($tmpList, $tmp);
}
sort($tmpList);
echo json_encode($tmpList);
echo'</br></br>';

$tmpList2 = [];
foreach ($tmpList as $item){
    $tmp = 'Bus ' . $item;
    array_push($tmpList2, $tmp);
}

echo json_encode($tmpList2);

echo'</br></br>';
sort($night);
echo json_encode($night);



?>