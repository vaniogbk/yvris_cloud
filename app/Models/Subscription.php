<?php
class Subscription extends Model {
    protected string $table = 'subscriptions';

    public function forUser(int $userId): array {
        $stmt = $this->db->prepare('SELECT * FROM subscriptions WHERE user_id = ? ORDER BY start_date DESC');
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function create(int $userId, string $plan, string $startDate, ?string $endDate): int {
        $stmt = $this->db->prepare(
            'INSERT INTO subscriptions (user_id, plan, start_date, end_date) VALUES (?, ?, ?, ?)'
        );
        $stmt->execute([$userId, $plan, $startDate, $endDate]);
        return (int) $this->db->lastInsertId();
    }

    public function updateStatus(int $id, string $status): void {
        $this->db->prepare('UPDATE subscriptions SET status = ? WHERE id = ?')->execute([$status, $id]);
    }

    public function allWithUser(): array {
        return $this->db->query(
            'SELECT s.*, u.name AS user_name, u.email AS user_email
             FROM subscriptions s JOIN users u ON s.user_id = u.id
             ORDER BY s.start_date DESC'
        )->fetchAll();
    }

    public function countActive(): int {
        return (int) $this->db->query("SELECT COUNT(*) FROM subscriptions WHERE status = 'active'")->fetchColumn();
    }
}
