<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity=Grille::class, mappedBy="matiere")
     */
    private $grilles;

    public function __construct()
    {
        $this->grilles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection|Grille[]
     */
    public function getGrilles(): Collection
    {
        return $this->grilles;
    }

    public function addGrille(Grille $grille): self
    {
        if (!$this->grilles->contains($grille)) {
            $this->grilles[] = $grille;
            $grille->setMatiere($this);
        }

        return $this;
    }

    public function removeGrille(Grille $grille): self
    {
        if ($this->grilles->removeElement($grille)) {
            // set the owning side to null (unless already changed)
            if ($grille->getMatiere() === $this) {
                $grille->setMatiere(null);
            }
        }

        return $this;
    }
}
