<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/Medication.php';

class MedicationRepository extends BaseRepository
{
    protected string $table = 'medications';

    public function create(Medication $medication): bool
    {
        $stmt = $this->db->prepare(
            "INSERT INTO medications (name, instructions)
             VALUES (:name, :instructions)"
        );

        return $stmt->execute([
            'name' => $medication->getName(),
            'instructions' => $medication->getInstructions()
        ]);
    }
}
