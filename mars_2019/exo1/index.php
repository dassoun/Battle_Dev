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

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);
    if($f!==false){
        $input[] = $f;

        if ($i == 0) {
            $position = $f;
        } else {
            $tmp = explode(" ", $f);
            $position = $position + $tmp[0] - $tmp[1];
        }

    }

    $i++;

}while($f!==false);
    
if ($position <= 100) {
    echo 1000 . PHP_EOL;
} else if ($position <= 10000) {
    echo 100 . PHP_EOL;
} else {
    echo "KO" . PHP_EOL;
}

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>