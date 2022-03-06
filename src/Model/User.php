<?php

    namespace Controle\Contas\Model;

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
    }