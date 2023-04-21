<?php

namespace App\Entity;

use App\Repository\PersonaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonaRepository::class)]
class Persona
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Apellido1 = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $Apellido2 = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $CorreoElectronico = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $FechaNacimiento = null;

    #[ORM\OneToMany(mappedBy: 'Persona', targetEntity: Telefono::class, orphanRemoval: true)]
    private Collection $Telefonos;

    public function __construct()
    {
        $this->Telefonos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getApellido1(): ?string
    {
        return $this->Apellido1;
    }

    public function setApellido1(?string $Apellido1): self
    {
        $this->Apellido1 = $Apellido1;

        return $this;
    }

    public function getApellido2(): ?string
    {
        return $this->Apellido2;
    }

    public function setApellido2(?string $Apellido2): self
    {
        $this->Apellido2 = $Apellido2;

        return $this;
    }

    public function getCorreoElectronico(): ?string
    {
        return $this->CorreoElectronico;
    }

    public function setCorreoElectronico(?string $CorreoElectronico): self
    {
        $this->CorreoElectronico = $CorreoElectronico;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->FechaNacimiento;
    }

    public function setFechaNacimiento(?\DateTimeInterface $FechaNacimiento): self
    {
        $this->FechaNacimiento = $FechaNacimiento;

        return $this;
    }

    /**
     * @return Collection<int, Telefono>
     */
    public function getTelefonos(): Collection
    {
        return $this->Telefonos;
    }

    public function addTelefono(Telefono $telefono): self
    {
        if (!$this->Telefonos->contains($telefono)) {
            $this->Telefonos->add($telefono);
            $telefono->setPersona($this);
        }

        return $this;
    }

    public function removeTelefono(Telefono $telefono): self
    {
        if ($this->Telefonos->removeElement($telefono)) {
            // set the owning side to null (unless already changed)
            if ($telefono->getPersona() === $this) {
                $telefono->setPersona(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->Apellido1." ".$this->Apellido2.", ".$this->Nombre;
    }
}
