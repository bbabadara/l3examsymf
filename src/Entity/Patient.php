<?php

namespace App\Entity;

use App\Repository\PatientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientRepository::class)]
class Patient
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $antecedent = null;

    #[ORM\ManyToOne(inversedBy: 'patients')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $patient = null;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: RendezVous::class)]
    private Collection $rendezVous;

    #[ORM\OneToMany(mappedBy: 'patient', targetEntity: DemandeRv::class)]
    private Collection $demandeRvs;

    public function __construct()
    {
        $this->rendezVous = new ArrayCollection();
        $this->demandeRvs = new ArrayCollection();
    }

    public function demandeRv(): bool
    {
        // À implémenter
        return true;
    }

    public function annulerRv(): bool
    {
        // À implémenter
        return true;
    }

    public function consulterRv(): bool
    {
        // À implémenter
        return true;
    }

    public function operation(): bool
    {
        // À implémenter
        return true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;
        return $this;
    }

    public function getAntecedent(): ?string
    {
        return $this->antecedent;
    }

    public function setAntecedent(?string $antecedent): static
    {
        $this->antecedent = $antecedent;
        return $this;
    }

    public function getPatient(): ?User
    {
        return $this->patient;
    }

    public function setPatient(?User $patient): static
    {
        $this->patient = $patient;
        return $this;
    }

    /**
     * @return Collection<int, RendezVous>
     */
    public function getRendezVous(): Collection
    {
        return $this->rendezVous;
    }

    public function addRendezVou(RendezVous $rendezVou): static
    {
        if (!$this->rendezVous->contains($rendezVou)) {
            $this->rendezVous->add($rendezVou);
            $rendezVou->setPatient($this);
        }
        return $this;
    }

    public function removeRendezVou(RendezVous $rendezVou): static
    {
        if ($this->rendezVous->removeElement($rendezVou)) {
            if ($rendezVou->getPatient() === $this) {
                $rendezVou->setPatient(null);
            }
        }
        return $this;
    }

    /**
     * @return Collection<int, DemandeRv>
     */
    public function getDemandeRvs(): Collection
    {
        return $this->demandeRvs;
    }

    public function addDemandeRv(DemandeRv $demandeRv): static
    {
        if (!$this->demandeRvs->contains($demandeRv)) {
            $this->demandeRvs->add($demandeRv);
            $demandeRv->setPatient($this);
        }
        return $this;
    }

    public function removeDemandeRv(DemandeRv $demandeRv): static
    {
        if ($this->demandeRvs->removeElement($demandeRv)) {
            if ($demandeRv->getPatient() === $this) {
                $demandeRv->setPatient(null);
            }
        }
        return $this;
    }
} 