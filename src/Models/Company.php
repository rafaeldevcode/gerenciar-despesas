<?php

    namespace Manage\Expenses\Models;

    use Doctrine\Common\Collections\{ArrayCollection, Collection};

    /**
     * @Entity
     */
    class Company
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
        private $cnpj;
        /**
         * @Column(type="string")
         */
        private $logo_comapany;
        /**
         * @ManyToOne(targetEntity="User")
         */
        private $user;
        /**
         * @ManyToMany(targetEntity="Gain", inversedBy="company")
         */
        private $gain;
        /**
         * @ManyToMany(targetEntity="Expenses", inversedBy="company")
         */
        private $expenses;
        /**
         * ManyToMany(targetEntity="AcountBank", inversedBy="company")
         */
        private $acount_bank;

        public function __construct()
        {
            $this->gain = new ArrayCollection();
            $this->expenses = new ArrayCollection();
            $this->acount_bank = new ArrayCollection();
        }

        public function getId(): int
        {
            return $this->id;
        }

        public function getName(): string
        {
            return $this->name;
        }

        public function setname(string $name): self
        {
            $this->name = $name;
            return $this;
        }

        public function getCNPJ(): string
        {
            return $this->cnpj;
        }

        public function setCNPJ(string $cnpj): self
        {
            $this->cnpj = $cnpj;
            return $this;
        }

        public function getLogoComapany(): string
        {
            return $this->logo_comapany;
        }

        public function setLogoComapany(string $logo_comapany): self
        {
            $this->logo_comapany = $logo_comapany;
            return $this;
        }

        /**
         * @return Gain[]
         */
        public function getGain(): Collection
        {
            return $this->gain;
        }

        public function addGain(Gain $gain): self
        {
            if($this->gain->contains($gain)){
                return $this;
            }

            $this->gain->add($gain);
            $gain->addCompany($this);
            return $this;
        }

        public function getExpenses(): Collection
        {
            return $this->expenses;
        }

        public function addExpenses(Expenses $expenses): self
        {
            if($this->expenses->contains($expenses)){
                return $this;
            }

            $this->expenses->add($expenses);
            $expenses->addCompany($this);
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
         * @return AcountBank[]
         */
        public function getAcountsBank(): Collection
        {
            return $this->acount_bank;
        }

        public function addAcountBank(AcountBank $acountBank): self
        {
            if($this->acount_bank->contains($acountBank)){
                return $this;
            }

            $this->acount_bank->add($acountBank);
            $acountBank->addComapny($this);
            return $this;
        }
    }