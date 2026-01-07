<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/Doctor.php';

class DoctorRepository extends BaseRepository
{
    protected string $table = 'doctors';

    public function create(Doctor $doctor): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO doctors
            (user_id, first_name, last_name, specialization, phone, department_id)
            VALUES (:user, :first, :last, :spec, :phone, :dept)"
        );

        return $stmt->execute([
            'user'  => $doctor->getUserId(),
            'first' => $doctor->getFirstName(),
            'last'  => $doctor->getLastName(),
            'spec'  => $doctor->getSpecialization(),
            'phone' => $doctor->getPhone(),
            'dept'  => $doctor->getDepartmentId()
        ]);
    }

    public function getByDepartment(int $departmentId): array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM doctors WHERE department_id = :dept"
        );
        $stmt->execute(['dept' => $departmentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByUserId(int $userId): ?array
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM doctors WHERE user_id = :user"
        );
        $stmt->execute(['user' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function update(Doctor $doctor): bool
    {
    $stmt = $this->db->prepare(
        "UPDATE doctors SET
            first_name = :first,
            last_name = :last,
            specialization = :spec,
            phone = :phone,
            department_id = :dept
         WHERE id = :id"
    );

    return $stmt->execute([
        'first' => $doctor->getFirstName(),
        'last'  => $doctor->getLastName(),
        'spec'  => $doctor->getSpecialization(),
        'phone' => $doctor->getPhone(),
        'dept'  => $doctor->getDepartmentId(),
        'id'    => $doctor->getDoctorId()
    ]);
    }

}
