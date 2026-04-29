<?php
class Session {
    public static function start(): void {
        if (session_status() === PHP_SESSION_NONE) {
            ini_set('session.cookie_httponly', 1);
            ini_set('session.cookie_samesite', 'Strict');
            if (APP_ENV === 'production') {
                ini_set('session.cookie_secure', 1);
            }
            session_start();
        }
    }

    public static function set(string $key, mixed $value): void {
        $_SESSION[$key] = $value;
    }

    public static function get(string $key, mixed $default = null): mixed {
        return $_SESSION[$key] ?? $default;
    }

    public static function has(string $key): bool {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void {
        unset($_SESSION[$key]);
    }

    public static function destroy(): void {
        session_unset();
        session_destroy();
    }

    public static function flash(string $key, string $message): void {
        $_SESSION['_flash'][$key] = $message;
    }

    public static function getFlash(string $key): ?string {
        $msg = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $msg;
    }

    public static function csrfToken(): string {
        if (!isset($_SESSION[CSRF_TOKEN_NAME])) {
            $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
        }
        return $_SESSION[CSRF_TOKEN_NAME];
    }

    public static function verifyCsrf(string $token): bool {
        return hash_equals($_SESSION[CSRF_TOKEN_NAME] ?? '', $token);
    }
}
