<?php
abstract class Controller {
    protected function view(string $view, array $data = []): void {
        extract($data);
        $viewPath = __DIR__ . '/../app/Views/' . str_replace('.', '/', $view) . '.php';
        if (!file_exists($viewPath)) {
            throw new RuntimeException("Vue introuvable : {$view}");
        }
        require $viewPath;
    }

    protected function redirect(string $path): void {
        $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/');
        header('Location: ' . $base . $path);
        exit;
    }

    protected function requireAuth(): void {
        if (!Session::has('user_id')) {
            $this->redirect('/login');
        }
    }

    protected function requireRole(string ...$roles): void {
        $this->requireAuth();
        if (!in_array(Session::get('user_role'), $roles, true)) {
            $this->redirect('/dashboard');
        }
    }

    protected function json(mixed $data, int $code = 200): void {
        http_response_code($code);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function csrfField(): string {
        $token = Session::csrfToken();
        return '<input type="hidden" name="' . CSRF_TOKEN_NAME . '" value="' . htmlspecialchars($token) . '">';
    }

    protected function validateCsrf(): void {
        $token = $_POST[CSRF_TOKEN_NAME] ?? '';
        if (!Session::verifyCsrf($token)) {
            http_response_code(403);
            die('Token CSRF invalide.');
        }
    }
}
