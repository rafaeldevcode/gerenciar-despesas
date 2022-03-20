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
         * @OneToMany(targetEntity="Gain", mappedBy="company")
         */
        private $deposit;
        /**
         * @OneToMany(targetEntity="Expenses", mappedBy="company")
         */
        private $expenses;

        public function __construct()
        {
            $this->deposit = new ArrayCollection();
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
        public function getDeposit(): Collection
        {
            return $this->gain;
        }

        public function addDeposit(Gain $deposit): self
        {
            $this->deposit->add($deposit);
            $deposit->setCompany($this);
            return $this;
        }

        public function getExpenses(): Collection
        {
            return $this->expenses;
        }

        public function addExpenses(Expenses $expenses): self
        {
            $this->expenses->add($expenses);
            $expenses->setCompany($this);
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
    }