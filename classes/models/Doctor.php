<?php

require_once __DIR__ . '/User.php';

class Doctor extends User
{
    private int $doctorId;
    private int $userId;
    private string $firstName;
    private string $lastName;
    private string $specialization;
    private string $phone;
    private int $departmentId;

    public function __construct(
        int $userId,
        string $email,
        string $username,
        string $passwordHash,
        string $firstName,
        string $lastName,
        string $specialization,
        string $phone,
        int $departmentId
    ) {
        parent::__construct($email, $username, $passwordHash);

        $this->userId = $userId;
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setSpecialization($specialization);
        $this->setPhone($phone);
        $this->departmentId = $departmentId;
    }

    /* ===== Role ===== */
    public function getRole(): string
    {
        return 'doctor';
    }

    /* ===== Getters & Setters ===== */

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function setDoctorId(int $doctorId): void
    {
        $this->doctorId = $doctorId;
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

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = trim($specialization);
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = trim($phone);
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}
