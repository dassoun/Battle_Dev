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
$somme = 0;

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;

        if ($i == 0) {
            $prix = $f;
        } else if ($i > 1) {
            if ($f < 4) {
                $somme += ($prix * $f);
            } else if ($f < 6) {
                $somme += (($prix * $f) * 0.9);
            } else if ($f < 10) {
                $somme += (($prix * $f) * 0.8);
            } else {
                $somme += (($prix * $f) * 0.7);
            }
        }
    }

    $i++;

}while($f!==false);

echo ceil($somme) . PHP_EOL;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>