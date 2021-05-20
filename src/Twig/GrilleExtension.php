<?php

namespace App\Twig;

use App\Domain\Grille\GrilleView;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class GrilleExtension extends AbstractExtension
{
   protected GrilleView $grilleView;

    public function __construct(GrilleView $grilleView)
    {
        $this->grilleView = $grilleView;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('affiche_grille', [$this, 'afficheGrille'], ['is_safe' => ['html']]),
        ];
    }

    public function afficheGrille($value)
    {
        return $this->grilleView->render($value);
    }
}
