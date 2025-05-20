<?php

 if($_SERVER['REQUEST_METHOD']=='POST')
      {
         if(isset($_FILES['iidee']))
         {

         $lataa=file_get_contents($_FILES['iidee']['tmp_name']);

//echo $file_content;



         }
      }



/**
 * Finds all of the keywords (words that appear most) on param $str 
 * and return them in order of most occurrences to less occurrences.
 * @param string $str The string to search for the keywords.
 * @param int $minWordLen[optional] The minimun length (number of chars) of a word to be considered a keyword.
 * @param int $minWordOccurrences[optional] The minimun number of times a word has to appear 
 * on param $str to be considered a keyword.
 * @param boolean $asArray[optional] Specifies if the function returns a string with the 
 * keywords separated by a comma ($asArray = false) or a keywords array ($asArray = true).
 * @return mixed A string with keywords separated with commas if param $asArray is true, 
 * an array with the keywords otherwise.
 */
function extract_keywords($str, $minWordLen = 3, $minWordOccurrences = 2, $asArray = false)
{
  function keyword_count_sort($first, $sec)
  {
    return $sec[1] - $first[1];
  }
  $str = preg_replace('/[^\p{L}0-9 ]/', ' ', $str);
  $str = trim(preg_replace('/\s+/', ' ', $str));
 
  $words = explode(' ', $str);
  $keywords = array();
  while(($c_word = array_shift($words)) !== null)
  {
    if(strlen($c_word) < $minWordLen) continue;
 
    $c_word = strtolower($c_word);
    if(array_key_exists($c_word, $keywords)) $keywords[$c_word][1]++;
    else $keywords[$c_word] = array($c_word, 1);
  }
  usort($keywords, 'keyword_count_sort');
 
  $final_keywords = array();
  foreach($keywords as $keyword_det)
  {
    if($keyword_det[1] < $minWordOccurrences) break;
    array_push($final_keywords, $keyword_det[0]);
  }
  return $asArray ? $final_keywords : implode(', ', $final_keywords);
}




print "https://www.duckduckgo.com?q=";
echo extract_keywords($lataa);
//$homepage = file_get_contents('https://www.duckduckgo.com/'); //voit myös tulostaa linkin suoraan, joka tulee muodostumaan kyllä
//echo $homepage;
//$tiedosto = file_get_contents('kokeilut.html');

//sanojen keruu alkaa

//$words = extractCommonWords($tiedosto);
//echo implode('+', array_keys($words));
// prints "this,text,some,great,are,vending,machines"

?>

