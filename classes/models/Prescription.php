<?php

class Prescription
{
    private int $id;
    private string $prescriptionDate;
    private string $dosageInstructions;
    private int $doctorId;
    private int $patientId;
    private int $medicationId;

    public function __construct(
        string $prescriptionDate,
        string $dosageInstructions,
        int $doctorId,
        int $patientId,
        int $medicationId
    ) {
        $this->prescriptionDate = $prescriptionDate;
        $this->dosageInstructions = $dosageInstructions;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
        $this->medicationId = $medicationId;
    }

    /* ===== Getters & Setters ===== */

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPrescriptionDate(): string
    {
        return $this->prescriptionDate;
    }

    public function getDosageInstructions(): string
    {
        return $this->dosageInstructions;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function getMedicationId(): int
    {
        return $this->medicationId;
    }
}
