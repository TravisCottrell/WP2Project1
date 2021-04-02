<?php

//get photos info
$fileContents = file_get_contents("photos.txt");
$photosInfo = explode("\n",$fileContents);

$images = array();
foreach($photosInfo as $p){
    $elements = explode(";",$p);
    $images[$elements[0]] = array(
    "id"=>$elements[0], 
    "path"=>$elements[1], 
    "title"=>$elements[2], 
    "description"=>$elements[3], 
    "latitude"=>$elements[4], 
    "longitude"=>$elements[5], 
    "cityCode"=>$elements[6], 
    "countryCode"=>$elements[7], 
    "userName"=>$elements[8]);
   
}

// get countries info
$fileContents = file_get_contents("countries.txt");
$countriesInfo = explode("\n",$fileContents);

$countries = array();
foreach($countriesInfo as $c){
    $elements = explode(";",$c);
    $countries[$elements[0]] = array( 
    "countryName"=>$elements[1],
    "countryCode"=>$elements[0], 
    "capitalCity"=>$elements[2], 
    "capitalCode"=>$elements[3], 
    "area"=>$elements[4], 
    "population"=>$elements[5], 
    "continent"=>$elements[6], 
    "currency"=>$elements[7]);  
}


// get cities info
$fileContents = file_get_contents("cities.txt");
$citiesInfo = explode("\n",$fileContents);
$cities = array();
foreach($citiesInfo as $c){
    $elements = explode(";",$c);
    $cities[$elements[0]] = array(
    "cityCode"=>$elements[0], 
    "cityName"=>$elements[1], 
    "countryCode"=>$elements[2], 
    "latitude"=>$elements[3], 
    "longitude"=>$elements[4]);  
}

    
?>