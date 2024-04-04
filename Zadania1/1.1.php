<?php

$fruits = array("pomarancza ", " mango ", " kokos ", " liczi ");

foreach($fruits as $fruit){
    $reverse = "";

    for ($i = strlen($fruit) - 1; $i >= 0; $i--){
        $reverse .= $fruit[$i];
    }

    echo $reverse;

    if (strtolower($fruit[0]=== "p")){
        echo " zaczyna sie litera p";
    }


}
?>