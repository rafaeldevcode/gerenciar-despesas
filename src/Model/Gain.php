<?php

    namespace Manage\Expenses\Model;

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
         * @ManyToMany(targetEntity="Company")
         */
        private $company;

        public function __construct()
        {
            $this->company = new ArrayCollection();
        }

        public function getId(): int
        {
            return $this->id;
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
        public function getCompany(): Collection
        {
            return $this->company;
        }

        public function addCompany(Company $comapany): self
        {
            if($this->company->contains($comapany)){
                return $this;
            }

            $this->company->add($comapany);
            $comapany->addGain($this);
            return $this;
        }
    }