<?php
class AuthController extends Controller {
    private User $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function showLogin(): void {
        if (Session::has('user_id')) {
            $this->redirectByRole(Session::get('user_role'));
        }
        $error = Session::getFlash('error');
        $this->view('auth.login', compact('error'));
    }

    public function login(): void {
        $this->validateCsrf();
        $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';

        if (!$email || !$password) {
            Session::flash('error', 'Veuillez remplir tous les champs.');
            $this->redirect('/login');
        }

        $user = $this->userModel->findByEmail($email);
        if (!$user || !password_verify($password, $user['password_hash'])) {
            Session::flash('error', 'Identifiants incorrects.');
            $this->redirect('/login');
        }

        if (!$user['is_active']) {
            Session::flash('error', 'Compte désactivé. Contactez l\'administrateur.');
            $this->redirect('/login');
        }

        Session::set('user_id', $user['id']);
        Session::set('user_name', $user['name']);
        Session::set('user_email', $user['email']);
        Session::set('user_role', $user['role_name']);

        $this->redirectByRole($user['role_name']);
    }

    public function showRegister(): void {
        if (Session::has('user_id')) {
            $this->redirectByRole(Session::get('user_role'));
        }
        $error = Session::getFlash('error');
        $this->view('auth.register', compact('error'));
    }

    public function register(): void {
        $this->validateCsrf();
        $name     = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES);
        $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $confirm  = $_POST['confirm_password'] ?? '';

        if (!$name || !$email || !$password) {
            Session::flash('error', 'Tous les champs sont obligatoires.');
            $this->redirect('/register');
        }

        if (strlen($password) < 8) {
            Session::flash('error', 'Le mot de passe doit contenir au moins 8 caractères.');
            $this->redirect('/register');
        }

        if ($password !== $confirm) {
            Session::flash('error', 'Les mots de passe ne correspondent pas.');
            $this->redirect('/register');
        }

        if ($this->userModel->findByEmail($email)) {
            Session::flash('error', 'Cet email est déjà utilisé.');
            $this->redirect('/register');
        }

        $userId = $this->userModel->create(3, $name, $email, $password);
        Session::flash('error', 'Inscription réussie. Connectez-vous.');
        $this->redirect('/login');
    }

    public function logout(): void {
        Session::destroy();
        $this->redirect('/');
    }

    private function redirectByRole(string $role): void {
        match ($role) {
            'admin'     => $this->redirect('/admin/dashboard'),
            'revendeur' => $this->redirect('/reseller/dashboard'),
            default     => $this->redirect('/dashboard'),
        };
    }
}
