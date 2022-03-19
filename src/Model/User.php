<?php

namespace Manage\Expenses\Model;

use Manage\Expenses\Model\{Expenses, Gain, AcountBank, CreditCard};
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
    private $comapny;
    /**
     * OneToMany(targetEntity="CreditCard", mappedBy="user")
     */
    private $card;
    /**
     * @OneToMany(targetEntity="AcountBank", mappedBy="user")
     */
    private $bank;

    public function __construct()
    {
        $this->gain = new ArrayCollection();
        $this->expenses = new ArrayCollection();
        $this->comapny = new ArrayCollection();
        $this->card = new ArrayCollection();
        $this->bank = new ArrayCollection();
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
     * @return Comapny[]
     */
    public function getCompany(): Collection
    {
        return $this->comapny;
    }

    public function addCompany(Company $comapny): self
    {
        $this->comapny->add($comapny);
        $comapny->setUser($this);
        return $this;
    }

    public function getCreditCards(): Collection
    {
        return $this->card;
    }

    /**
     * @return Card[]
     */
    public function addCreditCard(CreditCard $card): self
    {
        $this->card->add($card);
        $card->setUser($this);
        return $this;
    }

    public function getAcountsBank(): Collection
    {
        return $this->bank;
    }

    /**
     * @return Bank[]
     */
    public function addAcountBank(AcountBank $bank): self
    {
        $this->bank->add($bank);
        $bank->setUser($this);
        return $this;
    }
}