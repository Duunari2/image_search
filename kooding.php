<?php

 if($_SERVER['REQUEST_METHOD']=='POST')
      {
         if(isset($_FILES['iidee']))
         {

         $tiedosto=file_get_contents($_FILES['iidee']['tmp_name']);

//echo $file_content;

         }
      }


$homepage = file_get_contents('https://www.duckduckgo.com/'); //voit myös tulostaa linkin suoraan, joka tulee muodostumaan kyllä
echo $homepage;
//$tiedosto = file_get_contents('kokeilut.html');

//sanojen keruu alkaa

function extractKeyWords($string) {
  mb_internal_encoding('UTF-8');
  $stopwords = array();
  $string = preg_replace('/[\pP]/u', '', trim(preg_replace('/\s\s+/iu', '', mb_strtolower($string))));
  $matchWords = array_filter(explode(' ',$string) , function ($item) use ($stopwords) { return !($item == '' || in_array($item, $stopwords) || mb_strlen($item) <= 2 || is_numeric($item));});
  $wordCountArr = array_count_values($matchWords);
  arsort($wordCountArr);
  return array_keys(array_slice($wordCountArr, 0, 10));
}

print "https://www.duckduckgo.com?q=";
print implode('+', extractKeyWords($tiedosto));
// prints "this,text,some,great,are,vending,machines"

?>

