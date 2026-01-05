<?php
class Prescription
{
    protected ?int $id;
    protected string $date; 
    protected string $dosageInstructions;
    protected int $doctorId;
    protected int $patientId;
    protected int $medicationId;

    public function __construct(
        string $date,
        string $dosageInstructions,
        int $doctorId,
        int $patientId,
        int $medicationId,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->date = $date;
        $this->dosageInstructions = $dosageInstructions;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
        $this->medicationId = $medicationId;
    }

    public function getId(): ?int { return $this->id; }
    public function getDate(): string { return $this->date; }
    public function getDosageInstructions(): string { return $this->dosageInstructions; }
    public function getDoctorId(): int { return $this->doctorId; }
    public function getPatientId(): int { return $this->patientId; }
    public function getMedicationId(): int { return $this->medicationId; }
}
