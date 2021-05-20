<?php


namespace App\Domain\Grille\DTO;


class Critere
{
    public string $libelle_critere;
    public array $choix = [];
    public string $type = 'unique';
}
