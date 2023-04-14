<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
     #[ORM\GeneratedValue]
     #[ORM\Column]
     
    private ?int $idCommande = null ;

    #[ORM\Column]
    private ?int $nbrProduit;

    #[ORM\Column(type: "date")]
     private ?\DateTimeInterface $dateCommande;

    
    #[ORM\Column]
    private ?float $total = null ;

    #[ORM\ManyToOne(targetEntity: Pointderelais::class, inversedBy: 'Commande')]
    #[ORM\JoinColumn(name: 'fk_id_pointderelais', referencedColumnName: 'id_pointderelais')]
    private ?Pointderelais $fkIdPointderelais=null ;

    #[ORM\ManyToOne(targetEntity: Livraison::class, inversedBy: 'Commande')]
    #[ORM\JoinColumn(name: 'fk_id_livraison', referencedColumnName: 'id_livraison')]
    private ?Livraison $fkIdLivraison=null ;

    

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getNbrProduit(): ?int
    {
        return $this->nbrProduit;
    }

    public function setNbrProduit(int $nbrProduit): self
    {
        $this->nbrProduit = $nbrProduit;

        return $this;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getFkIdPointderelais(): ?Pointderelais
    {
        return $this->fkIdPointderelais;
    }

    public function setFkIdPointderelais(?Pointderelais $fkIdPointderelais): self
    {
        $this->fkIdPointderelais = $fkIdPointderelais;

        return $this;
    }

    public function getFkIdLivraison(): ?Livraison
    {
        return $this->fkIdLivraison;
    }

    public function setFkIdLivraison(?Livraison $fkIdLivraison): self
    {
        $this->fkIdLivraison = $fkIdLivraison;

        return $this;
    }

    

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }


}
