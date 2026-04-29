USE yvris_cloud;

INSERT INTO roles (name) VALUES ('admin'), ('revendeur'), ('client');

-- Admin: admin@yvris.bj / Admin@2026
INSERT INTO users (role_id, name, email, password_hash) VALUES
(1, 'Administrateur Yvris', 'admin@yvris.bj', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Revendeurs: revendeur1@yvris.bj / Revendeur@2026
INSERT INTO users (role_id, name, email, password_hash) VALUES
(2, 'Revendeur Alpha', 'revendeur1@yvris.bj', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(2, 'Revendeur Beta', 'revendeur2@yvris.bj', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'),
(2, 'Revendeur Gamma', 'revendeur3@yvris.bj', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO resellers (user_id, company_name) VALUES
(2, 'Alpha Solutions'), (3, 'Beta Commerce'), (4, 'Gamma Tech');

INSERT INTO modules (name, description) VALUES
('CRM', 'Gestion de la relation client : contacts, opportunités, pipeline commercial.'),
('Facturation', 'Création de devis, factures, avoirs et suivi des paiements.'),
('RH', 'Gestion des ressources humaines : congés, paie, contrats.'),
('Comptabilité', 'Comptabilité générale, balance, bilan et compte de résultat.'),
('Stock', 'Gestion des stocks, entrepôts, mouvements et inventaires.'),
('Production', 'Planification de la production, ordres de fabrication et suivi qualité.');

-- Client demo: client@yvris.bj / Client@2026
INSERT INTO users (role_id, name, email, password_hash) VALUES
(3, 'Jean Dupont', 'client@yvris.bj', '$2y$12$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

INSERT INTO subscriptions (user_id, plan, start_date, end_date, status) VALUES
(5, 'Standard', '2026-01-01', '2026-12-31', 'active');

INSERT INTO invoices (subscription_id, amount, status) VALUES
(1, 29.99, 'paid');
