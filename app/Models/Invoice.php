<?php
class Invoice extends Model {
    protected string $table = 'invoices';

    public function forUser(int $userId): array {
        $stmt = $this->db->prepare(
            'SELECT i.*, s.plan FROM invoices i
             JOIN subscriptions s ON i.subscription_id = s.id
             WHERE s.user_id = ? ORDER BY i.issued_at DESC'
        );
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }

    public function allWithDetails(): array {
        return $this->db->query(
            'SELECT i.*, s.plan, u.name AS user_name, u.email AS user_email
             FROM invoices i
             JOIN subscriptions s ON i.subscription_id = s.id
             JOIN users u ON s.user_id = u.id
             ORDER BY i.issued_at DESC'
        )->fetchAll();
    }

    public function totalRevenue(): float {
        return (float) $this->db->query("SELECT COALESCE(SUM(amount),0) FROM invoices WHERE status = 'paid'")->fetchColumn();
    }

    public function create(int $subscriptionId, float $amount): int {
        $stmt = $this->db->prepare('INSERT INTO invoices (subscription_id, amount) VALUES (?, ?)');
        $stmt->execute([$subscriptionId, $amount]);
        return (int) $this->db->lastInsertId();
    }

    public function updateStatus(int $id, string $status): void {
        $this->db->prepare('UPDATE invoices SET status = ? WHERE id = ?')->execute([$status, $id]);
    }
}
