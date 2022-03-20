<?php

    namespace Manage\Expenses\Models;

    use Doctrine\Common\Collections\{ArrayCollection, Collection};

    /**
     * @Entity
     */
    class Gain{
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
        private $value_gain;
        /**
         * @Column(type="string")
         */
        private $type_gain;
        /**
         * @Column(type="string")
         */
        private $receipt_gain;
        /**
         * @ManyToOne(targetEntity="User")
         */
        private $user;
        /**
         * @ManyToOne(targetEntity="Company")
         */
        private $company;
        /**
         * @ManyToOne(targetEntity="AcountBank")
         */
        private $acount_bank;

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

        public function getValueGain(): string
        {
            return $this->value_gain;
        }

        public function setValueGain(string $value_gain): self
        {
            $this->value_gain = $value_gain;
            return $this;
        }

        public function getTypeGain(): string
        {
            return $this->type_gain;
        }

        public function setTypeGain(string $type_gain): self
        {
            $this->type_gain = $type_gain;
            return $this;
        }

        public function getReceiptGain(): string
        {
            return $this->receipt_gain;
        }

        public function setReceiptGain(string $receipt_gain): self
        {
            $this->receipt_gain = $receipt_gain;
            return $this;
        }

        public function getDepositBank(): string
        {
            return $this->deposit_bank;
        }

        public function setDepositBank(string $deposit_bank): self
        {
            $this->deposit_bank = $deposit_bank;
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
         * @return Company[]
         */
        public function getCompany(): object
        {
            return $this->company;
        }

        public function setCompany(Company $comapany): self
        {
            $this->company = $comapany;
            return $this;
        }

        public function getAcountBank(): array
        {
            return $this->acount_bank;
        }

        public function setAcountBank(AcountBank $acountBank): self
        {
            $this->acount_bank = $acountBank;
            return $this;
        }
    }