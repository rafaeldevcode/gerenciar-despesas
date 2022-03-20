<?php

    namespace Manage\Expenses\Models;

    use Doctrine\Common\Collections\{ArrayCollection, Collection};
use Manage\Expenses\Controllers\Card;

    /**
     * @Entity
     */
    class Expenses
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
        private $value_expenses;
        /**
         * @Column(type="string")
         */
        private $month;
        /**
         * @Column(type="integer")
         */
        private $year;
        /**
         * @Column(type="string")
         */
        private $type_expenses;
        /**
         * @Column(type="string")
         */
        private $taxCoupon;

        /**
         * @ManyToOne(targetEntity="User")
         */
        private $user;
        /**
         * @OneToOne(targetEntity="Company")
         */
        private $comapany;
        /**
         * @Column(type="string")
         */
        private $payment;
        /**
         * @Column(type="string")
         */
        private $credit_card;
        /**
         * @OneToOne(targetEntity="AcountBank")
         */
        private $acount_bank;

        public function getId(): int{
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

        public function getValueExpenses(): string
        {
            return $this->value_expenses;
        }

        public function setValueExpenses(string $value_expenses): self
        {
            $this->value_expenses = $value_expenses;
            return $this;
        }

        public function getMonth(): string
        {
            return $this->month;
        }

        public function setMonth(string $month): self
        {
            $this->month = $month;
            return $this;
        }

        public function getYear(): int
        {
            return $this->year;
        }

        public function setYear(string $year): self
        {
            $this->year = $year;
            return $this;
        }

        public function getTypeExpenses(): string
        {
            return $this->type_expenses;
        }

        public function setTypeExpenses(string $type_expenses): self
        {
            $this->type_expenses = $type_expenses;
            return $this;
        }

        public function getTaxCupon(): string
        {
            return $this->taxCoupon;
        }

        public function setTaxCupon(string $taxCoupon): self
        {
            $this->taxCoupon = $taxCoupon;
            return $this;
        }

        public function getPayment(): string
        {
            return $this->payment;
        }

        public function setPayment(string $payment): self
        {
            $this->payment = $payment;
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

        public function getCompany(): array
        {
            return $this->comapany;
        }

        public function setCompany(Company $comapany): self
        {
            $this->comapany = $comapany;
            return $this;
        }

        public function getCreditCard(): CreditCard
        {
            return $this->credit_card;
        }

        public function setCreditCard(CreditCard $creditCard): self
        {
            $this->credit_card = $creditCard;
            return $this;
        }

        public function getAcountBank(): AcountBank
        {
            return $this->acount_bank;
        }

        public function setAcountBank(AcountBank $acountBank): self
        {
            $this->acount_bank = $acountBank;
            return $this;
        }
    }