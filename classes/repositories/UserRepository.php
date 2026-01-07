<?php

require_once __DIR__ . '/BaseRepository.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Admin.php';
require_once __DIR__ . '/../models/Doctor.php';
require_once __DIR__ . '/../models/Patient.php';

class UserRepository extends BaseRepository
{
    protected string $table = 'users';

 
    public function findByEmail(string $email): ?User
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = ? LIMIT 1"
        );
        $stmt->execute([$email]);

        $data = $stmt->fetch();
        return $data ? $this->mapToUser($data) : null;
    }

  
    public function findByUsername(string $username): ?User
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE username = ? LIMIT 1"
        );
        $stmt->execute([$username]);

        $data = $stmt->fetch();
        return $data ? $this->mapToUser($data) : null;
    }

  
    public function findByIdentifier(string $identifier): ?User
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE email = ? OR username = ? LIMIT 1"
        );
        $stmt->execute([$identifier, $identifier]);

        $data = $stmt->fetch();
        return $data ? $this->mapToUser($data) : null;
    }


    public function create(User $user): bool
    {
        $sql = "INSERT INTO users (email, username, password_hash, role)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $user->getEmail(),
            $user->getUsername(),
            $user->getPasswordHash(),
            $user->getRole()
        ]);
    }

   
    private function mapToUser(array $data): User
    {
        return match ($data['role']) {
            'admin' => new Admin(
                $data['id'],
                $data['email'],
                $data['username'],
                $data['password_hash']
            ),
            'doctor' => new Doctor(
                $data['id'],
                $data['email'],
                $data['username'],
                $data['password_hash']
            ),
            'patient' => new Patient(
                $data['id'],
                $data['email'],
                $data['username'],
                $data['password_hash']
            ),
            default => throw new Exception('Invalid user role')
        };
    }
}
