<?php


namespace App\Domain\Grille;


use Twig\Environment;

class GrilleView
{
    protected Environment $twig;
    protected Grille $grille;

    public function __construct(Environment $twig, Grille $grille)
    {
        $this->twig = $twig;
        $this->grille = $grille;
    }


    public function render($value)
    {
        return $this->twig->render('domain/grille/grille.html.twig', [
            'grille' => $this->grille->render($value)
        ]);
    }
}
