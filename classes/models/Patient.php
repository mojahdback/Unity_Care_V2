<?php

require_once __DIR__ . '/User.php';

class Patient extends User
{
    private int $patientId;
    private int $userId;
    private string $firstName;
    private string $lastName;
    private string $gender;
    private string $dateOfBirth;
    private string $phone;
    private string $address;

    public function __construct(
        int $userId,
        string $email,
        string $username,
        string $passwordHash,
        string $firstName,
        string $lastName,
        string $gender,
        string $dateOfBirth,
        string $phone,
        string $address
    ) {
        parent::__construct($email, $username, $passwordHash);

        $this->userId = $userId;
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setGender($gender);
        $this->setDateOfBirth($dateOfBirth);
        $this->setPhone($phone);
        $this->setAddress($address);
    }

    
    public function getRole(): string
    {
        return 'patient';
    }

    

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function setPatientId(int $patientId): void
    {
        $this->patientId = $patientId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = trim($firstName);
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = trim($lastName);
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function setGender(string $gender): void
    {
        $this->gender = strtolower(trim($gender));
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = trim($phone);
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): void
    {
        $this->address = trim($address);
    }



    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getAge(): int
    {
        $birthDate = new DateTime($this->dateOfBirth);
        $today = new DateTime();
        return $today->diff($birthDate)->y;
    }
}
