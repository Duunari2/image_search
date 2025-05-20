<?php

 if($_SERVER['REQUEST_METHOD']=='POST')
      {
         if(isset($_FILES['iidee']))
         {

         $lataa=file_get_contents($_FILES['iidee']['tmp_name']);

//echo $file_content;



         }
      }



function commonWords($string){
$stopWords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in','is','it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www');

$string = preg_replace('/ss+/i', '', $string);
$string = trim($string); // trim the string
$string = preg_replace('/[^a-zA-Z0-9 -]/', '', $string); // only take alphanumerical characters, but keep the spaces and dashes too…
$string = strtolower($string); // make it lowercase

preg_match_all('/([a-z]*?)(?=s)/i', $string, $matchWords);
$matchWords = $matchWords[0];
foreach ( $matchWords as $key=>$item ) {
if ( $item == '' || in_array(strtolower($item), $stopWords) || strlen($item) <= 3 ) {
unset($matchWords[$key]);
}
}
$wordCountArr = array();
if ( is_array($matchWords) ) {
foreach ( $matchWords as $key => $val ) {
$val = strtolower($val);
if ( isset($wordCountArr[$val]) ) {
$wordCountArr[$val]++;
} else {
$wordCountArr[$val] = 1;
}
}
}
arsort($wordCountArr);
$wordCountArr = array_slice($wordCountArr, 0, 10);
return $wordCountArr;
}



//$text = "This is some text. This is some text. Vending Machines are great.";
$words = commonWords($lataa);




print "https://www.duckduckgo.com?q=";
echo implode(',', array_keys($words));
//$homepage = file_get_contents('https://www.duckduckgo.com/'); //voit myös tulostaa linkin suoraan, joka tulee muodostumaan kyllä
//echo $homepage;
//$tiedosto = file_get_contents('kokeilut.html');

//sanojen keruu alkaa

//$words = extractCommonWords($tiedosto);
//echo implode('+', array_keys($words));
// prints "this,text,some,great,are,vending,machines"

?>

