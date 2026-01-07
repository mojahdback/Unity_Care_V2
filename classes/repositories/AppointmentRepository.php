<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/Appointment.php';

class AppointmentRepository extends BaseRepository
{
    protected string $table = 'appointments';

    public function create(Appointment $appointment): bool
    {
        $sql = "INSERT INTO appointments 
                (appointment_date, appointment_time, reason, status, doctor_id, patient_id)
                VALUES (:date, :time, :reason, :status, :doctor, :patient)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'date'    => $appointment->getAppointmentDate(),
            'time'    => $appointment->getAppointmentTime(),
            'reason'  => $appointment->getReason(),
            'status'  => $appointment->getStatus(),
            'doctor'  => $appointment->getDoctorId(),
            'patient' => $appointment->getPatientId(),
        ]);
    }

    public function getByDoctor(int $doctorId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM appointments WHERE doctor_id = :doctor"
        );
        $stmt->execute(['doctor' => $doctorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByPatient(int $patientId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM appointments WHERE patient_id = :patient"
        );
        $stmt->execute(['patient' => $patientId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
