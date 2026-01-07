<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/models/Doctor.php';
require_once __DIR__ . '/../classes/repositories/BaseRepository.php';
require_once __DIR__ . '/../classes/repositories/DoctorRepository.php';

$repo = new DoctorRepository();

// CREATE
$doctor = new Doctor(
    null,
    'Ahmed',
    'Bennani',
    'Cardiology',
    '0612345678',
    'ahmed@test.com',
    1
);

$repo->create($doctor);
echo "Doctor created ✅<br>";

// READ ALL
$doctors = $repo->findAll();
echo "<pre>";
print_r($doctors);
echo "</pre>";

// UPDATE
$updatedDoctor = new Doctor(
    null,
    'Ahmed',
    'Bennani',
    'Neurology',
    '0611111111',
    'ahmed_updated@test.com',
    1
);

$repo->update(1, $updatedDoctor);
echo "Doctor updated ✅<br>";

// DELETE
// $repo->delete(1);
// echo "Doctor deleted ❌<br>";

