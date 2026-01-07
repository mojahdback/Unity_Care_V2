<?php

class Appointment
{
    private int $id;
    private string $appointmentDate;
    private string $appointmentTime;
    private string $reason;
    private string $status;
    private int $doctorId;
    private int $patientId;

    public function __construct(
        string $appointmentDate,
        string $appointmentTime,
        string $reason,
        int $doctorId,
        int $patientId,
        string $status = 'scheduled'
    ) {
        $this->appointmentDate = $appointmentDate;
        $this->appointmentTime = $appointmentTime;
        $this->reason = $reason;
        $this->status = $status;
        $this->doctorId = $doctorId;
        $this->patientId = $patientId;
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

    public function getAppointmentDate(): string
    {
        return $this->appointmentDate;
    }

    public function getAppointmentTime(): string
    {
        return $this->appointmentTime;
    }

    public function getReason(): string
    {
        return $this->reason;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    /* ===== Business Logic ===== */

    public function cancel(): void
    {
        $this->status = 'cancelled';
    }

    public function markAsDone(): void
    {
        $this->status = 'done';
    }
}
