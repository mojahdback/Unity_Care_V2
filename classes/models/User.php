<?php

abstract class User
{
    protected ?int $id = null;
    protected string $email;
    protected string $username;
    protected string $passwordHash;

    public function __construct(string $email, string $username, string $password)
    {
        $this->setEmail($email);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    
    abstract public function getRole(): string;

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setEmail(string $email): void
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Email invalide.");
        }
        $this->email = $email;
    }

    public function setUsername(string $username): void
    {
        if (empty($username)) {
            throw new InvalidArgumentException("Username ne peut pas être vide.");
        }
        $this->username = $username;
    }

    public function setPassword(string $password): void
    {
        if (strlen($password) < 6) {
            throw new InvalidArgumentException("Le mot de passe doit contenir au moins 6 caractères.");
        }
        $this->passwordHash = password_hash($password, PASSWORD_DEFAULT);
    }

    
    public function verifyPassword(string $password): bool
    {
        return password_verify($password, $this->passwordHash);
    }
}
