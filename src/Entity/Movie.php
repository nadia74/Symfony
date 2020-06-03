<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $year;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rated;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $released;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $runtime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $genre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $director;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $writer;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $actors;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $plot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $language;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $awards;

    /**
     * @ORM\Column(type="boolean")
     */
    private $movie_favorite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ListeMovieRelationship", mappedBy="MOVIE_ID", orphanRemoval=true)
     */
    private $listemovierelationshipobject;

    public function __construct()
    {
        $this->listemovierelationshipobject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getYear(): ?string
    {
        return $this->year;
    }

    public function setYear(?string $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getRated(): ?string
    {
        return $this->rated;
    }

    public function setRated(?string $rated): self
    {
        $this->rated = $rated;

        return $this;
    }

    public function getReleased(): ?string
    {
        return $this->released;
    }

    public function setReleased(?string $released): self
    {
        $this->released = $released;

        return $this;
    }

    public function getRuntime(): ?string
    {
        return $this->runtime;
    }

    public function setRuntime(?string $runtime): self
    {
        $this->runtime = $runtime;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(?string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDirector(): ?string
    {
        return $this->director;
    }

    public function setDirector(?string $director): self
    {
        $this->director = $director;

        return $this;
    }

    public function getWriter(): ?string
    {
        return $this->writer;
    }

    public function setWriter(?string $writer): self
    {
        $this->writer = $writer;

        return $this;
    }

    public function getActors(): ?string
    {
        return $this->actors;
    }

    public function setActors(?string $actors): self
    {
        $this->actors = $actors;

        return $this;
    }

    public function getPlot(): ?string
    {
        return $this->plot;
    }

    public function setPlot(?string $plot): self
    {
        $this->plot = $plot;

        return $this;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): self
    {
        $this->language = $language;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getAwards(): ?string
    {
        return $this->awards;
    }

    public function setAwards(?string $awards): self
    {
        $this->awards = $awards;

        return $this;
    }

    public function getMovieFavorite(): ?bool
    {
        return $this->movie_favorite;
    }

    public function setMovieFavorite(bool $movie_favorite): self
    {
        $this->movie_favorite = $movie_favorite;

        return $this;
    }

    /**
     * @return Collection|ListeMovieRelationship[]
     */
    public function getListemovierelationshipobject(): Collection
    {
        return $this->listemovierelationshipobject;
    }

    public function addListemovierelationshipobject(ListeMovieRelationship $listemovierelationshipobject): self
    {
        if (!$this->listemovierelationshipobject->contains($listemovierelationshipobject)) {
            $this->listemovierelationshipobject[] = $listemovierelationshipobject;
            $listemovierelationshipobject->setMOVIEID($this);
        }

        return $this;
    }

    public function removeListemovierelationshipobject(ListeMovieRelationship $listemovierelationshipobject): self
    {
        if ($this->listemovierelationshipobject->contains($listemovierelationshipobject)) {
            $this->listemovierelationshipobject->removeElement($listemovierelationshipobject);
            // set the owning side to null (unless already changed)
            if ($listemovierelationshipobject->getMOVIEID() === $this) {
                $listemovierelationshipobject->setMOVIEID(null);
            }
        }

        return $this;
    }
}
