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
            $dim = $f;
        } else {
            $salle[] = str_split($f, 1);
        }
    }

    $i++;
}while($f!==false);

$chemin = "";

//var_dump($salle);


// Ramassage des pièces
for ($i=0; $i<$dim; $i++) {
    for ($j=0; $j<$dim; $j++) {
        switch ($salle[$i][$j]) {
            case "o":
                $chemin .= "x";
            default :
                ///echo $salle[$i][$j];
                if ($j < $dim - 1) {
                    $chemin .= ">";
                } else {
                    if ($i < ($dim - 1)) {
                        $chemin .= "v";
                        // for ($k=0; $k<($dim - 1); $k++) {
                        //     $chemin .= "<";
                        // }
                        $chemin .= str_pad("", $dim - 1, "<");
                    }
                }
                break;
        }
    }
}

$chemin .= str_pad("",  $dim - 1, "^");
$chemin .= str_pad("",  $dim - 1, "<");


// // Ramassage des multiplicateurs
// for ($i=$dim; $i>=0; $i--) {
//     for ($j=$dim; $j>=0; $j--) {
//         switch ($salle[$i][$j]) {
//             case "*":
//                 $chemin .= "x";
//             default :
//                 ///echo $salle[$i][$j];
//                 if ($j > 1) {
//                     $chemin .= "<";
//                 } else {
//                     if ($i > 1) {
//                         $chemin .= "^";
//                         for ($k=0; $k<($dim - 1); $k++) {
//                             $chemin .= ">";
//                         }
//                     }
//                 }
//                 break;
//         }
//     }
// }


for ($i=0; $i<$dim; $i++) {
    for ($j=0; $j<$dim; $j++) {
        switch ($salle[$i][$j]) {
            case "*":
                $chemin .= "x";
            default :
                ///echo $salle[$i][$j];
                if ($j < $dim - 1) {
                    $chemin .= ">";
                } else {
                    if ($i < ($dim - 1)) {
                        $chemin .= "v";
                        // for ($k=0; $k<($dim - 1); $k++) {
                        //     $chemin .= "<";
                        // }
                        $chemin .= str_pad("", $dim - 1, "<");
                    }
                }
                break;
        }
    }
}


echo $chemin . PHP_EOL;



// function getFirst($tab, $car) {

//     for ($i=0; $i<count($tab); $i++) {
//         if ($tab[$i] == $car) {
//             return $i;
//         }
//     }

//     return -1;
// }

// function getLast($tab, $car) {

//     for ($i=count($tab)-1; $i>=0; $i--) {
//         if ($tab[$i] == $car) {
//             return $i;
//         }
//     }

//     return -1;
// }




/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>