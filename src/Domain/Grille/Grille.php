<?php


namespace App\Domain\Grille;


use App\Domain\Grille\DTO\Choix;
use App\Domain\Grille\DTO\Critere;

class Grille
{
    protected array $tab = [];

    public function render($grille)
    {
        $grille = strip_tags($grille);
        $criteres = explode('#', $grille);

        foreach ($criteres as $critere)
        {
            if ($this->isNotEmpty($critere))
            {
                $c = new Critere();
                $choix = $this->decoupeCritere($critere);

                $c->libelle_critere = array_shift($choix);
                foreach ($choix as $choi) {
                    $c->choix[] = $this->convertChoix($choi);
                }
                $this->tab[] = $c;
            }
        }

        return $this->tab;
    }

    private function isNotEmpty(string $critere)
    {
        return trim($critere) !== null || trim($critere) !== '';
    }

    private function decoupeCritere(string $critere)
    {
            return explode('-', $critere);
    }

    private function convertChoix(string $choi)
    {
        $c = explode(']', $choi);
        $obj = new Choix();
        $obj->libelle = $c[1];
        $pt = trim($c[0]);
        $obj->point = (float)substr($pt, 1, strlen($pt));
        dump($c);
        return $obj;
    }
}
