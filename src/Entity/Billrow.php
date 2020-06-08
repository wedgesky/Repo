<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billrow
 *
 * @ORM\Table(name="billrow", indexes={@ORM\Index(name="IdBill_Index", columns={"IdBill"})})
 * @ORM\Entity(repositoryClass="App\Repository\BillrowRepository")
 */
class Billrow
{
    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="Quantity", type="integer", nullable=false)
     */
    private $quantity;

    /**
     * @var string
     *
     * @ORM\Column(name="Amount", type="decimal", precision=12, scale=0, nullable=false)
     */
    private $amount;

    /**
     * @var string
     *
     * @ORM\Column(name="VAT", type="decimal", precision=12, scale=0, nullable=false)
     */
    private $vat;

    /**
     * @var string
     *
     * @ORM\Column(name="Total", type="decimal", precision=12, scale=0, nullable=false)
     */
    private $total;

    /**
     * @var \Bill
     *
     * @ORM\ManyToOne(targetEntity="Bill")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="IdBill", referencedColumnName="Id")
     * })
     */
    private $idbill;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getAmount(): ?string
    {
        return $this->amount;
    }

    public function setAmount(string $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getVat(): ?string
    {
        return $this->vat;
    }

    public function setVat(string $vat): self
    {
        $this->vat = $vat;

        return $this;
    }

    public function getTotal(): ?string
    {
        return $this->total;
    }

    public function setTotal(string $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getIdbill(): ?Bill
    {
        return $this->idbill;
    }

    public function setIdbill(?Bill $idbill): self
    {
        $this->idbill = $idbill;

        return $this;
    }


}
