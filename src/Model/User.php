<?php

    namespace Manage\Expenses\Model;

    use Manage\Expenses\Model\{Expenses, Gain};
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

        public function __construct()
        {
            $this->gain = new ArrayCollection();
            $this->expenses = new ArrayCollection();
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
    }