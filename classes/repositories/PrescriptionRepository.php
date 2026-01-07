<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/Prescription.php';

class PrescriptionRepository extends BaseRepository
{
    protected string $table = 'prescriptions';

    public function create(Prescription $p): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO prescriptions
            (prescription_date, dosage_instructions, doctor_id, patient_id, medication_id)
            VALUES (:date, :dosage, :doctor, :patient, :medication)"
        );

        return $stmt->execute([
            'date'       => $p->getPrescriptionDate(),
            'dosage'     => $p->getDosageInstructions(),
            'doctor'     => $p->getDoctorId(),
            'patient'    => $p->getPatientId(),
            'medication' => $p->getMedicationId()
        ]);
    }
}
