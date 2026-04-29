<?php
class Module extends Model {
    protected string $table = 'modules';

    public function allActive(): array {
        return $this->db->query('SELECT * FROM modules WHERE is_active = 1')->fetchAll();
    }

    public function forUser(int $userId): array {
        $stmt = $this->db->prepare(
            'SELECT m.* FROM modules m JOIN user_modules um ON m.id = um.module_id WHERE um.user_id = ?'
        );
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function toggle(int $id): void {
        $this->db->prepare('UPDATE modules SET is_active = NOT is_active WHERE id = ?')->execute([$id]);
    }

    public function assign(int $userId, int $moduleId): void {
        $stmt = $this->db->prepare(
            'INSERT IGNORE INTO user_modules (user_id, module_id) VALUES (?, ?)'
        );
        $stmt->execute([$userId, $moduleId]);
    }

    public function unassign(int $userId, int $moduleId): void {
        $stmt = $this->db->prepare('DELETE FROM user_modules WHERE user_id = ? AND module_id = ?');
        $stmt->execute([$userId, $moduleId]);
    }
}
