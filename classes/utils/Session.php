<?php

class Session
{
    public static function start(): void {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
    }

    public static function login(User $user): void {
        self::start();
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'role' => $user->getRole(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername()
        ];
    }

    public static function logout(): void {
        self::start();
        session_unset();
        session_destroy();
    }

    public static function isLogged(): bool {
        self::start();
        return isset($_SESSION['user']);
    }

    public static function user(): ?array
    {
        self::start();
        return $_SESSION['user'] ?? null;
    }

    public static function role(): ?string{
        return $_SESSION['user']['role'] ?? null;
    }
}





?>