-- ================================================
-- Yvris Business Cloud - Schéma MySQL
-- ================================================

CREATE DATABASE IF NOT EXISTS yvris_cloud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE yvris_cloud;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT NOT NULL,
    name VARCHAR(100),
    email VARCHAR(150) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE subscriptions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    plan VARCHAR(50) NOT NULL,
    start_date DATE NOT NULL,
    end_date DATE,
    status ENUM('active','expired','cancelled') DEFAULT 'active',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    is_active TINYINT(1) DEFAULT 1
);

CREATE TABLE user_modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    module_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (module_id) REFERENCES modules(id)
);

CREATE TABLE invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subscription_id INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('paid','pending','cancelled') DEFAULT 'pending',
    FOREIGN KEY (subscription_id) REFERENCES subscriptions(id)
);

CREATE TABLE resellers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    company_name VARCHAR(150),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE reseller_clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reseller_id INT NOT NULL,
    client_name VARCHAR(150),
    client_email VARCHAR(150),
    FOREIGN KEY (reseller_id) REFERENCES resellers(id)
);
