<?php

namespace App\Entity;

use App\Repository\ClienteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use PhpParser\Node\Expr\FuncCall;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=ClienteRepository::class)
 */
class Cliente implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cpf;

    /**
     * @ORM\Column(type="date")
     */
    private $nascimento;

    /**
     * @ORM\OneToMany(targetEntity=Telefone::class, mappedBy="cliente", orphanRemoval=true)
     */
    private $telefones;

    public function __construct()
    {
        $this->telefones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getNascimento(): ?\DateTimeInterface
    {
        return $this->nascimento;
    }

    public function setNascimento(\DateTimeInterface $nascimento): self
    {
        $this->nascimento = $nascimento;

        return $this;
    }

    /**
     * @return Collection|Telefone[]
     */
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addTelefone(Telefone $telefone): self
    {
        if (!$this->telefones->contains($telefone)) {
            $this->telefones[] = $telefone;
            $telefone->setCliente($this);
        }

        return $this;
    }

    public function removeTelefone(Telefone $telefone): self
    {
        if ($this->telefones->removeElement($telefone)) {
            // set the owning side to null (unless already changed)
            if ($telefone->getCliente() === $this) {
                $telefone->setCliente(null);
            }
        }

        return $this;
    }

    public function getRoles()
    {
        return ['ROLE_CLIENTE'];   
    }
    
    public function getSalt()
    {
        
    }

    public function eraseCredentials()
    {
        
    }

    public function getUsername()
    {
        return $this->cpf;
    }

    public function getPassword()
    {
        
    }

    public function getUserIdentifier()
    {
        return $this->id;
    }
}
