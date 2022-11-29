<?php
function crypt_char($letter, $cle_char){
    $diff = ord($cle_char) - ord('A');
    $result = chr(ord($letter) + $diff);
    if (ord($letter) > ord('Z') or ord($letter) < ord('A')){
        $result = $letter;
    }elseif (ord($letter) > (ord('Z')) - $diff){
        $result = (string) chr(ord($letter) - 26 + $diff);
    }return $result;
}
function crypt_string($chaine, $cle_string){
    $chaine_crypte = ""; $j=0;
    for ($i=0; $i < strlen($chaine); $i++) { 
        $c =crypt_char( strtoupper($chaine[$i]),  strtoupper($cle_string[$j]));
        $chaine_crypte = "$chaine_crypte"."$c";
        $j += 1;
        if ($j == strlen($cle_string)) $j=0;
    }
    return $chaine_crypte;
}
//readline une fonction qui lire les saisi au clavier

$phrase = readline("votre phrase: ");
$key = readline("la cle: ");
echo(crypt_string($phrase, $key));
