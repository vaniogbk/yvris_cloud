<?php
class User extends Model {
    protected string $table = 'users';

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare(
            'SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.email = ?'
        );
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function create(int $roleId, string $name, string $email, string $password): int {
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
        $stmt = $this->db->prepare(
            'INSERT INTO users (role_id, name, email, password_hash) VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$roleId, $name, $email, $hash]);
        return (int) $this->db->lastInsertId();
    }

    public function update(int $id, array $fields): bool {
        $sets = implode(', ', array_map(fn($k) => "$k = ?", array_keys($fields)));
        $stmt = $this->db->prepare("UPDATE {$this->table} SET {$sets} WHERE id = ?");
        return $stmt->execute([...array_values($fields), $id]);
    }

    public function toggleActive(int $id): void {
        $this->db->prepare('UPDATE users SET is_active = NOT is_active WHERE id = ?')->execute([$id]);
    }

    public function allWithRole(): array {
        return $this->db->query(
            'SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id ORDER BY u.created_at DESC'
        )->fetchAll();
    }

    public function countByRole(string $role): int {
        $stmt = $this->db->prepare(
            'SELECT COUNT(*) FROM users u JOIN roles r ON u.role_id = r.id WHERE r.name = ?'
        );
        $stmt->execute([$role]);
        return (int) $stmt->fetchColumn();
    }
}
