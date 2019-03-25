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
$max = 0;

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;

        if ($i > 0) {
            $tmp = explode(" ", $f);
            $somme = 0;
            for ($j=0; $j<3; $j++) {
                $somme += $tmp[$j];
            }
            $max = max($max, $somme);
        }
    }

    $i++;
}while($f!==false);

echo ceil($max / 3) . PHP_EOL;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>