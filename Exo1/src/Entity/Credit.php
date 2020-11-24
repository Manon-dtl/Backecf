<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditRepository::class)
 */
class Credit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Organisme;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Montant;

    /**
     * @ORM\Column(type="integer")
     */
    private $Ref_client;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="Credit")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrganisme(): ?string
    {
        return $this->Organisme;
    }

    public function setOrganisme(string $Organisme): self
    {
        $this->Organisme = $Organisme;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->Montant;
    }

    public function setMontant(string $Montant): self
    {
        $this->Montant = $Montant;

        return $this;
    }

    public function getRefClient(): ?int
    {
        return $this->Ref_client;
    }

    public function setRefClient(int $Ref_client): self
    {
        $this->Ref_client = $Ref_client;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }
}
