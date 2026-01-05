<?php
class Appointment
{
    protected ?int $id;
    protected string $appointmentDate;
    protected string $appointmentTime;
    protected string $reason;
    protected string $status; 
    protected int $doctorId;
    protected int $patientId;

    public function __construct(
        string $appointmentDate,
        string $appointmentTime,
        string $reason,
        string $status,
        int $doctorId,
        int $patientId,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->appointmentDate = $appointmentDate;
        $this->appointmentTime = $appointmentTime;
        $this->reason = $reason;
        $this->status = $status;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
    }


    public function getId(): ?int { return $this->id; }
    public function getDate(): string { return $this->appointmentDate; }
    public function setDate(string $d): void { $this->appointmentDate = $d; }

    public function getTime(): string { return $this->appointmentTime; }
    public function setTime(string $t): void { $this->appointmentTime = $t; }

    public function getReason(): string { return $this->reason; }
    public function setReason(string $r): void { $this->reason = $r; }

    public function getStatus(): string { return $this->status; }
    public function setStatus(string $s): void { $this->status = $s; }

    public function getDoctorId(): int { return $this->doctorId; }
    public function getPatientId(): int { return $this->patientId; }

    
    public function markAsDone(): void { $this->status = 'done'; }
    public function cancel(): void { $this->status = 'cancelled'; }
}
