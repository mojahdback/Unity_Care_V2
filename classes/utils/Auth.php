<?php

class Auth
{
    public static function requireLogin(): void
    {
        if (!Session::isLogged()) {
            header('Location: /login.php');
            exit;
        }
    }

    public static function requireRole(string $role): void
    {
        self::requireLogin();

        if (Session::role() !== $role) {
            
            match (Session::role()) {
                'admin' => header('Location: /admin/dashboard.php'),
                'doctor' => header('Location: /doctor/dashboard.php'),
                'patient' => header('Location: /patient/dashboard.php'),
                default => header('Location: /login.php'),
            };
            exit;
        }
    }
}
