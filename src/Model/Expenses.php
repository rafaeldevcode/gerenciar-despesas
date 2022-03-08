<?php

    namespace Manage\Expenses\Model;

    use Doctrine\Common\Collections\{ArrayCollection, Collection};

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
         * @ManyToMany(targetEntity="Company")
         */
        private $comapany;

        public function __construct()
        {
            $this->comapany =  new ArrayCollection();
        }

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

        public function getser(): User
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
        public function getCompany(): Collection
        {
            return $this->comapany;
        }

        public function addCompany(Company $comapany): self
        {
            if($this->comapany->contains($comapany)){
                return $this;
            }

            $this->comapany->add($comapany);
            $comapany->addExpenses($this);
            return $this;
        }
    }