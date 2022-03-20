<?php

namespace Manage\Expenses\Models;

use Manage\Expenses\Models\{Expenses, Gain, AcountBank, CreditCard};
use Doctrine\Common\Collections\{ArrayCollection, Collection};

/**
 * @Entity
 */
class User
{
    /**
     * @Id
     * @GeneratedValue,
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
    private $email;
            /**
     * @Column(type="string")
     */
    private $pass;
    /**
     * @OneToMany(targetEntity="Gain", mappedBy="user")
     */
    private $gain;
    /**
     * @OneToMany(targetEntity="Expenses", mappedBy="user")
     */
    private $expenses;
    /**
     * @OneToMany(targetEntity="Company", mappedBy="user")
     */
    private $company;
    /**
     * OneToMany(targetEntity="CreditCard", mappedBy="user")
     */
    private $credit_card;
    /**
     * @OneToMany(targetEntity="AcountBank", mappedBy="user")
     */
    private $acount_bank;

    public function __construct()
    {
        $this->gain = new ArrayCollection();
        $this->expenses = new ArrayCollection();
        $this->company = new ArrayCollection();
        $this->credit_card = new ArrayCollection();
        $this->acount_bank = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;   
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;
        return $this;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function verifyPass(string $passPure): bool
    {
        return password_verify($passPure, $this->pass);
    }

    /**
     * @return Gain[]
     */
    public function getGains(): Collection
    {
        return $this->gain;
    }

    public function addGain(Gain $gain): self
    {
        $this->gain->add($gain);
        $gain->setUser($this);
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
        $expenses->setUser($this);
        return $this;
    }

    /**
     * @return Company[]
     */
    public function getCompany(): Collection
    {
        return $this->company;
    }

    public function addCompany(Company $company): self
    {
        $this->company->add($company);
        $company->setUser($this);
        return $this;
    }

    /**
     * @return CreditCard[]
     */
    public function getCreditCards(): Collection
    {
        return $this->credit_card;
    }

    public function addCreditCard(CreditCard $credit_card): self
    {
        $this->credit_card->add($credit_card);
        $credit_card->setUser($this);
        return $this;
    }

    /**
     * @return AcountBank[]
     */
    public function getAcountsBank(): Collection
    {
        return $this->acount_bank;
    }

    public function addAcountBank(AcountBank $acount_bank): self
    {
        $this->acount_bank->add($acount_bank);
        $acount_bank->setUser($this);
        return $this;
    }
}