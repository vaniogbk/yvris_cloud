<?php
class Reseller extends Model {
    protected string $table = 'resellers';

    public function findByUserId(int $userId): ?array {
        $stmt = $this->db->prepare('SELECT * FROM resellers WHERE user_id = ?');
        $stmt->execute([$userId]);
        $row = $stmt->fetch();
        return $row ?: null;
    }

    public function clientsFor(int $resellerId): array {
        $stmt = $this->db->prepare('SELECT * FROM reseller_clients WHERE reseller_id = ? ORDER BY id DESC');
        $stmt->execute([$resellerId]);
        return $stmt->fetchAll();
    }

    public function addClient(int $resellerId, string $name, string $email): void {
        $stmt = $this->db->prepare('INSERT INTO reseller_clients (reseller_id, client_name, client_email) VALUES (?, ?, ?)');
        $stmt->execute([$resellerId, $name, $email]);
    }

    public function removeClient(int $clientId, int $resellerId): void {
        $stmt = $this->db->prepare('DELETE FROM reseller_clients WHERE id = ? AND reseller_id = ?');
        $stmt->execute([$clientId, $resellerId]);
    }

    public function countClientsFor(int $resellerId): int {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM reseller_clients WHERE reseller_id = ?');
        $stmt->execute([$resellerId]);
        return (int) $stmt->fetchColumn();
    }
}
