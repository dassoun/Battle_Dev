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

abstract class Compte 
{
    protected $solde;
    protected $nb_jour_deb;
    protected $interets;

    public function __construct($solde) {
        $this->solde = $solde;
        $this->interets = 0;
        
        if ($solde < 0) {
            $this->nb_jour_deb = 1;
        } else {
            $this->nb_jour_deb = 0;
        }
        
        $this->calculer_interets();
    }

    abstract public function calculer_interets();

    public function setSolde($solde) {
        $this->solde = $solde;
    }
    public function getSolde() {
        return $this->solde;
    }
    
    public function getInterets() {
        return $this->interets;
    }

    public function mouvement($montant) {
        $this->solde += $montant;

        if ($this->solde < 0) {
            $this->nb_jour_deb += 1;
        } else {
            $this->nb_jour_deb = 0;
        }
    }
}

class Compte_old extends Compte {
    public function calculer_interets() {
        if ($this->solde > 0) {
            return;
        }

        if ($this->nb_jour_deb > 2) {
            $this->interets += $this->solde * 0.1;
        }
    }
}

class Compte_new extends Compte {
    public function calculer_interets() {
        if ($this->solde > 0) {
            return;
        }

        if ($this->nb_jour_deb < 4) {
            $this->interets += $this->solde * 0.2;
        } else {
            $this->interets += $this->solde * 0.3;
        }
    }
}

$i = 0;

do{
    $f = stream_get_line(STDIN, 10000, PHP_EOL);

    if($f!==false){
        $input[] = $f;
        
        if ($i == 1) {
            $mon_compte_old = new Compte_old($f);
            $mon_compte_new = new Compte_new($f);
        } else if ($i > 1) {
            $mon_compte_old->mouvement($f);
            $mon_compte_old->calculer_interets();

            $mon_compte_new->mouvement($f);
            $mon_compte_new->calculer_interets();
        }
        
        $i++;
    }
}while($f!==false);

echo ceil($mon_compte_old->getInterets() - $mon_compte_new->getInterets()) . PHP_EOL;

/* Vous pouvez aussi effectuer votre traitement ici après avoir lu toutes les données */
?>