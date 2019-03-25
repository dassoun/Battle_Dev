<?php
/*******
 * Read input from STDIN
 * Use echo or print to output your result to STDOUT, use the PHP_EOL constant at the end of each result line.
 * Use:
 *     fwrite(STDERR, "hello, world!" . PHP_EOL);
 * or
 *		error_log("hello, world!" . PHP_EOL);
 * to output debugging information to STDERR
 * ***/

$i = 0;

$notes = array();

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;

        if ($i == 0) {
            $mes_notes = explode(" ", $f);
        } else if ($i == 1) {
            $n = $f;
        } else if ($i == 2) {
            $k = $f;
        } else {
            $notes[] = explode(" ", $f);
        }
    }

    $i++;

}while($f!==false);

$distance = array();

foreach ($notes as $key => $note) {
    $dist = 0;

    for ($i=0; $i<5; $i++) {
        $dist += abs($mes_notes[$i] - $note[$i]);
    }
    $distance[$key] = $dist;
}

asort($distance);

$j = 0;
$somme = 0;
foreach ($distance as $key => $note) {
    if ($j < $k) {
        $somme += $notes[$key][5];
    }
    $j++;
}

echo floor($somme / $k) . PHP_EOL;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>