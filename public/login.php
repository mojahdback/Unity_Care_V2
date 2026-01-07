<?php

require_once __DIR__ . '/../classes/Database.php';
require_once __DIR__ . '/../classes/repositories/UserRepository.php';
require_once __DIR__ . '/../classes/utils/Session.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $identifier = $_POST['identifier'] ?? '';
    $password = $_POST['password'] ?? '';

    $userRepo = new UserRepository();
    $user = $userRepo->findByIdentifier($identifier);

    if ($user && $user->verifyPassword($password)) {

        Session::login($user);

        switch ($user->getRole()) {
            case 'admin':
                header('Location: /admin/dashboard.php');
                break;
            case 'doctor':
                header('Location: /doctor/dashboard.php');
                break;
            case 'patient':
                header('Location: /patient/dashboard.php');
                break;
        }
        exit;

    } else {
        $error = 'Invalid credentials';
    }
}
