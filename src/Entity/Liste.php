<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListeRepository")
 */
class Liste
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
    private $listename;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $liste_favorite;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserListeRelationship", mappedBy="LISTE_ID", orphanRemoval=true)
     */
    private $userlisterelationshipobject;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ListeMovieRelationship", mappedBy="LISTE_ID")
     */
    private $listemovierelationshipobject;

    public function __construct()
    {
        $this->userlisterelationshipobject = new ArrayCollection();
        $this->listemovierelationshipobject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getListename(): ?string
    {
        return $this->listename;
    }

    public function setListename(string $listename): self
    {
        $this->listename = $listename;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getListeFavorite(): ?bool
    {
        return $this->liste_favorite;
    }

    public function setListeFavorite(bool $liste_favorite): self
    {
        $this->liste_favorite = $liste_favorite;

        return $this;
    }

    /**
     * @return Collection|UserListeRelationship[]
     */
    public function getUserlisterelationshipobject(): Collection
    {
        return $this->userlisterelationshipobject;
    }

    public function addUserlisterelationshipobject(UserListeRelationship $userlisterelationshipobject): self
    {
        if (!$this->userlisterelationshipobject->contains($userlisterelationshipobject)) {
            $this->userlisterelationshipobject[] = $userlisterelationshipobject;
            $userlisterelationshipobject->setLISTEID($this);
        }

        return $this;
    }

    public function removeUserlisterelationshipobject(UserListeRelationship $userlisterelationshipobject): self
    {
        if ($this->userlisterelationshipobject->contains($userlisterelationshipobject)) {
            $this->userlisterelationshipobject->removeElement($userlisterelationshipobject);
            // set the owning side to null (unless already changed)
            if ($userlisterelationshipobject->getLISTEID() === $this) {
                $userlisterelationshipobject->setLISTEID(null);
            }
        }

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
            $listemovierelationshipobject->setLISTEID($this);
        }

        return $this;
    }

    public function removeListemovierelationshipobject(ListeMovieRelationship $listemovierelationshipobject): self
    {
        if ($this->listemovierelationshipobject->contains($listemovierelationshipobject)) {
            $this->listemovierelationshipobject->removeElement($listemovierelationshipobject);
            // set the owning side to null (unless already changed)
            if ($listemovierelationshipobject->getLISTEID() === $this) {
                $listemovierelationshipobject->setLISTEID(null);
            }
        }

        return $this;
    }
}
