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

$n = 0;

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;

        if ($n == 1) {
            for ($taille=1; $taille<=strlen($f); $taille++) {
                $debut = 0;
                while (($debut + $taille) <= strlen($f)) {
                    $tab[$taille][] = substr($f, $debut, $taille);
                    $debut++;
                }
            }
        }
    }

    $n++;
}while($f!==false);





var_dump($tab);

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>