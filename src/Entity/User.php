<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $admin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $banned;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserListeRelationship", mappedBy="User_ID", orphanRemoval=true)
     */
    private $userlisterelationshipobject;

    public function __construct()
    {
        $this->userlisterelationshipobject = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getAdmin(): ?bool
    {
        return $this->admin;
    }

    public function setAdmin(bool $admin): self
    {
        $this->admin = $admin;

        return $this;
    }

    public function getBanned(): ?bool
    {
        return $this->banned;
    }

    public function setBanned(bool $banned): self
    {
        $this->banned = $banned;

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
            $userlisterelationshipobject->setUserID($this);
        }

        return $this;
    }

    public function removeUserlisterelationshipobject(UserListeRelationship $userlisterelationshipobject): self
    {
        if ($this->userlisterelationshipobject->contains($userlisterelationshipobject)) {
            $this->userlisterelationshipobject->removeElement($userlisterelationshipobject);
            // set the owning side to null (unless already changed)
            if ($userlisterelationshipobject->getUserID() === $this) {
                $userlisterelationshipobject->setUserID(null);
            }
        }

        return $this;
    }
}
