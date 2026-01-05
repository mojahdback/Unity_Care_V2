<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/Patient.php';

class PatientRepository extends BaseRepository
{
    protected string $table = 'patients';

    public function create(Patient $patient): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO patients
            (user_id, first_name, last_name, gender, date_of_birth, phone, address)
            VALUES (:user, :first, :last, :gender, :dob, :phone, :address)"
        );

        return $stmt->execute([
            'user'    => $patient->getUserId(),
            'first'   => $patient->getFirstName(),
            'last'    => $patient->getLastName(),
            'gender'  => $patient->getGender(),
            'dob'     => $patient->getDateOfBirth(),
            'phone'   => $patient->getPhone(),
            'address' => $patient->getAddress()
        ]);
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM patients WHERE user_id = :user"
        );
        $stmt->execute(['user' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function update(Patient $patient): bool
{
    $stmt = $this->db->prepare(
        "UPDATE patients SET
            first_name = :first,
            last_name = :last,
            gender = :gender,
            date_of_birth = :dob,
            phone = :phone,
            address = :address
         WHERE id = :id"
    );

    return $stmt->execute([
        'first'   => $patient->getFirstName(),
        'last'    => $patient->getLastName(),
        'gender'  => $patient->getGender(),
        'dob'     => $patient->getDateOfBirth(),
        'phone'   => $patient->getPhone(),
        'address' => $patient->getAddress(),
        'id'      => $patient->getPatientId()
    ]);
}

}
