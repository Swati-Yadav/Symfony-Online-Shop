<?php
// src/Entity/Order.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $customerName;

    // Getter method for customerName
    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    // Optional: Setter method for customerName
    public function setCustomerName(string $customerName): self
    {
        $this->customerName = $customerName;
        return $this;
    }

    // Other methods...
    #[ORM\Column(type: 'string', length: 255)]
    private $customerAddress;

    // Getter method for customerName
    public function getcustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    // Optional: Setter method for customerName
    public function setcustomerAddress(string $customerAddress): self
    {
        $this->customerAddress = $customerAddress;
        return $this;
    }

    // Other methods...
    #[ORM\Column(type: 'decimal', precision: 10, scale: 2)]
    private $totalAmount;
    public function getTotalAmount(): ?float // Return type can be float
    {
        return $this->totalAmount;
    }

    public function setTotalAmount(float $totalAmount): self // Argument type should be float
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    // Getters and setters for all properties...
}
