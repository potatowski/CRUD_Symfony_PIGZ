<?php

namespace App\Entity;

use App\Repository\TelefoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TelefoneRepository::class)
 */
class Telefone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $ddd;

    /**
     * @ORM\Column(type="string", length=9)
     */
    private $numero;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="telefones")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Operadora::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $operadora;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    public function setDdd(string $ddd): self
    {
        $this->ddd = $ddd;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getOperadora(): ?Operadora
    {
        return $this->operadora;
    }
}
