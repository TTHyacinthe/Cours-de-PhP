<?php 
$age = mt_rand(1, 85);

if ($age < 10){
    echo 'vous êtes tout petit !!!' . "\n";
} elseif ($age < 20){
    echo 'vous êtes jeune !!!' . "\n";
} elseif ($age < 30){
    echo 'vous êtes moins jeune !!! ' . "\n";
} elseif ($age < 40){
    echo 'vous êtes presque vieux !!! ' . "\n";
} else{
    echo 'holala !' . "\n";
}