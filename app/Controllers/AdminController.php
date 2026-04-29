<?php
class AdminController extends Controller {
    private User         $userModel;
    private Subscription $subModel;
    private Invoice      $invoiceModel;
    private Module       $moduleModel;

    public function __construct() {
        $this->userModel    = new User();
        $this->subModel     = new Subscription();
        $this->invoiceModel = new Invoice();
        $this->moduleModel  = new Module();
    }

    public function dashboard(): void {
        $this->requireRole('admin');
        $stats = [
            'total_users'    => $this->userModel->count(),
            'clients'        => $this->userModel->countByRole('client'),
            'revendeurs'     => $this->userModel->countByRole('revendeur'),
            'active_subs'    => $this->subModel->countActive(),
            'revenue'        => $this->invoiceModel->totalRevenue(),
        ];
        $recentUsers = $this->userModel->allWithRole();
        $recentUsers = array_slice($recentUsers, 0, 5);
        $this->view('admin.dashboard', compact('stats', 'recentUsers'));
    }

    public function users(): void {
        $this->requireRole('admin');
        $users  = $this->userModel->allWithRole();
        $error  = Session::getFlash('error');
        $success = Session::getFlash('success');
        $this->view('admin.users', compact('users', 'error', 'success'));
    }

    public function createUser(): void {
        $this->requireRole('admin');
        $this->validateCsrf();
        $name    = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES);
        $email   = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $roleId  = (int)($_POST['role_id'] ?? 3);

        if (!$name || !$email || !$password) {
            Session::flash('error', 'Tous les champs sont requis.');
            $this->redirect('/admin/users');
        }

        if ($this->userModel->findByEmail($email)) {
            Session::flash('error', 'Email déjà utilisé.');
            $this->redirect('/admin/users');
        }

        $this->userModel->create($roleId, $name, $email, $password);
        Session::flash('success', 'Utilisateur créé avec succès.');
        $this->redirect('/admin/users');
    }

    public function toggleUser(string $id): void {
        $this->requireRole('admin');
        $this->userModel->toggleActive((int)$id);
        $this->redirect('/admin/users');
    }

    public function deleteUser(string $id): void {
        $this->requireRole('admin');
        $this->validateCsrf();
        $userId = (int)$id;
        if ($userId === Session::get('user_id')) {
            Session::flash('error', 'Impossible de supprimer votre propre compte.');
            $this->redirect('/admin/users');
        }
        $this->userModel->delete($userId);
        Session::flash('success', 'Utilisateur supprimé.');
        $this->redirect('/admin/users');
    }

    public function subscriptions(): void {
        $this->requireRole('admin');
        $subscriptions = $this->subModel->allWithUser();
        $this->view('admin.subscriptions', compact('subscriptions'));
    }

    public function updateSubscriptionStatus(string $id): void {
        $this->requireRole('admin');
        $this->validateCsrf();
        $status = in_array($_POST['status'] ?? '', ['active', 'expired', 'cancelled'])
                  ? $_POST['status'] : 'active';
        $this->subModel->updateStatus((int)$id, $status);
        $this->redirect('/admin/subscriptions');
    }

    public function modules(): void {
        $this->requireRole('admin');
        $modules = $this->moduleModel->findAll();
        $this->view('admin.modules', compact('modules'));
    }

    public function toggleModule(string $id): void {
        $this->requireRole('admin');
        $this->moduleModel->toggle((int)$id);
        $this->redirect('/admin/modules');
    }

    public function invoices(): void {
        $this->requireRole('admin');
        $invoices = $this->invoiceModel->allWithDetails();
        $this->view('admin.invoices', compact('invoices'));
    }

    public function updateInvoiceStatus(string $id): void {
        $this->requireRole('admin');
        $this->validateCsrf();
        $status = in_array($_POST['status'] ?? '', ['paid', 'pending', 'cancelled'])
                  ? $_POST['status'] : 'pending';
        $this->invoiceModel->updateStatus((int)$id, $status);
        $this->redirect('/admin/invoices');
    }
}
