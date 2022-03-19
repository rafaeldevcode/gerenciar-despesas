<?php

namespace Manage\Expenses\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Manage\Expenses\Models\User;

/**
 * @Entity
 */
class CreditCard
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    private $id;
    /**
     * @Column(type="string")
     */
    private $name;
    /**
     * @Column(type="string")
     */
    private $limit;
    /**
     * @ManyToOne(targetEntity="User")
     */
    private $user;
    /**
     * @OneToMany(targetEntity="Expenses", mappedBy="credit_card")
     */
    private $expenses;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getLimit(): string
    {
        return $this->limit;
    }

    public function setLimit(string $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return Expenses[]
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpenses(Expenses $expenses): self
    {
        $this->expenses->add($expenses);
        $expenses->setCreditCard($this);
        return $this;
    }
}