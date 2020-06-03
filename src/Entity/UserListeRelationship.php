<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserListeRelationshipRepository")
 */
class UserListeRelationship
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="userlisterelationshipobject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User_ID;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Liste", inversedBy="userlisterelationshipobject")
     * @ORM\JoinColumn(nullable=false)
     */
    private $LISTE_ID;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserID(): ?User
    {
        return $this->User_ID;
    }

    public function setUserID(?User $User_ID): self
    {
        $this->User_ID = $User_ID;

        return $this;
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
}
