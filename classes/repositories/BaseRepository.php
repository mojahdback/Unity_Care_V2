<?php 

require_once  __DIR__ . '/../Database.php';

abstract class BaseRepository
{
    protected PDO $db;
    protected string $table;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function findAll():array
    {
        $stmt = $this->db->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} where id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    public function delete(int $id): bool
    {

        $stmt = $this->db->prepare(
            "DELETE FROM {$this->table} WHERE id = ?"
        );

        return $stmt->execute([$id]);

        

    }
}