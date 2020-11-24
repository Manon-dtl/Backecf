<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $Date_de_naissance;

    /**
     * @ORM\Column(type="text")
     */
    private $Adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $Code_postal;

    /**
     * @ORM\Column(type="integer")
     */
    private $Numero_de_telephone;

    /**
     * @ORM\Column(type="integer")
     */
    private $statut_marital;

    /**
     * @ORM\OneToMany(targetEntity=Credit::class, mappedBy="client")
     */
    private $Credit;

    public function __construct()
    {
        $this->Credit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->Date_de_naissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $Date_de_naissance): self
    {
        $this->Date_de_naissance = $Date_de_naissance;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->Code_postal;
    }

    public function setCodePostal(int $Code_postal): self
    {
        $this->Code_postal = $Code_postal;

        return $this;
    }

    public function getNumeroDeTelephone(): ?int
    {
        return $this->Numero_de_telephone;
    }

    public function setNumeroDeTelephone(int $Numero_de_telephone): self
    {
        $this->Numero_de_telephone = $Numero_de_telephone;

        return $this;
    }

    public function getStatutMarital(): ?int
    {
        return $this->statut_marital;
    }

    public function setStatutMarital(int $statut_marital): self
    {
        $this->statut_marital = $statut_marital;

        return $this;
    }

    /**
     * @return Collection|Credit[]
     */
    public function getCredit(): Collection
    {
        return $this->Credit;
    }

    public function addCredit(Credit $credit): self
    {
        if (!$this->Credit->contains($credit)) {
            $this->Credit[] = $credit;
            $credit->setClient($this);
        }

        return $this;
    }

    public function removeCredit(Credit $credit): self
    {
        if ($this->Credit->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getClient() === $this) {
                $credit->setClient(null);
            }
        }

        return $this;
    }
}
