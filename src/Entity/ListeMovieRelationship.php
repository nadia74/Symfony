<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListeMovieRelationshipRepository")
 */
class ListeMovieRelationship
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Liste", inversedBy="listemovierelationshipobject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LISTE_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Movie", inversedBy="listemovierelationshipobject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $MOVIE_ID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLISTEID(): ?Liste
    {
        return $this->LISTE_ID;
    }

    public function setLISTEID(?Liste $LISTE_ID): self
    {
        $this->LISTE_ID = $LISTE_ID;

        return $this;
    }

    public function getMOVIEID(): ?Movie
    {
        return $this->MOVIE_ID;
    }

    public function setMOVIEID(?Movie $MOVIE_ID): self
    {
        $this->MOVIE_ID = $MOVIE_ID;

        return $this;
    }
}
