<?php

namespace Manage\Expenses\Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Manage\Expenses\Models\User;

/**
 * @Entity
 */
class AcountBank
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
    private $balance;
    /**
     * @Column(type="string")
     */
    private $logo_bank;
    /**
     * @ManyToOne(targetEntity="User")
     */
    private $user;
    /**
     * @OneToMany(targetEntity="Expenses", mappedBy="acount_bank")
     */
    private $expenses;
    private $company;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
        $this->company = new ArrayCollection();
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

    public function getBalance(): string
    {
        return $this->balance;
    }

    public function setBalance(string $balance): self
    {
        $this->balance = $balance;
        return $this;
    }

    public function getLogoBank(): string
    {
        return $this->logo_bank;
    }

    public function setLogobank(string $logo_bank): self
    {
        $this->logo_bank = $logo_bank;
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
        $expenses->setAcountBank($this);
        return $this;
    }

    /**
     * @return Comapny[]
     */
    public function getCompany(): Collection
    {
        return $this->company;
    }

    public function addComapny(Company $company): self
    {
        if($this->company->contains($company)){
            return $this;
        }

        $this->company->add($company);
        $company->addAcountBank($this);
        return $this;
    }
}