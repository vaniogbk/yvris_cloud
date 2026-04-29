<?php
class UserController extends Controller {
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
        $this->requireRole('client');
        $userId        = Session::get('user_id');
        $subscriptions = $this->subModel->forUser($userId);
        $invoices      = $this->invoiceModel->forUser($userId);
        $modules       = $this->moduleModel->forUser($userId);
        $this->view('user.dashboard', compact('subscriptions', 'invoices', 'modules'));
    }

    public function profile(): void {
        $this->requireRole('client');
        $userId = Session::get('user_id');
        $user   = $this->userModel->findById($userId);
        $error  = Session::getFlash('error');
        $success = Session::getFlash('success');
        $this->view('user.profile', compact('user', 'error', 'success'));
    }

    public function updateProfile(): void {
        $this->requireRole('client');
        $this->validateCsrf();
        $userId = Session::get('user_id');
        $name   = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES);

        if (!$name) {
            Session::flash('error', 'Le nom est requis.');
            $this->redirect('/profile');
        }

        $fields = ['name' => $name];
        if (!empty($_POST['password'])) {
            if (strlen($_POST['password']) < 8) {
                Session::flash('error', 'Mot de passe trop court (min 8 caractères).');
                $this->redirect('/profile');
            }
            $fields['password_hash'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
        }

        $this->userModel->update($userId, $fields);
        Session::set('user_name', $name);
        Session::flash('success', 'Profil mis à jour avec succès.');
        $this->redirect('/profile');
    }

    public function invoices(): void {
        $this->requireRole('client');
        $invoices = $this->invoiceModel->forUser(Session::get('user_id'));
        $this->view('user.invoices', compact('invoices'));
    }

    public function subscribe(): void {
        $this->requireRole('client');
        $this->validateCsrf();
        $userId = Session::get('user_id');
        $plan   = in_array($_POST['plan'] ?? '', ['Free', 'Standard', 'Personnalisé'])
                  ? $_POST['plan'] : 'Free';
        $subId  = $this->subModel->create($userId, $plan, date('Y-m-d'), null);

        $amount = match($plan) { 'Standard' => 10020, 'Personnalisé' => 19680, default => 0 };
        if ($amount > 0) {
            $this->invoiceModel->create($subId, $amount);
        }

        Session::flash('success', "Abonnement {$plan} activé !");
        $this->redirect('/dashboard');
    }

    public function subscribeKkiapay(): void {
        $this->requireRole('client');
        $this->validateCsrf();

        $transactionId = htmlspecialchars($_POST['transaction_id'] ?? '', ENT_QUOTES);
        $plan          = $_POST['plan'] ?? '';

        $planMap = ['standard' => 'Standard', 'personnalise' => 'Personnalisé'];
        if (!isset($planMap[$plan]) || !$transactionId) {
            $this->json(['success' => false, 'error' => 'Données invalides'], 400);
        }

        // Vérification transaction KKIAPAY (sandbox ou prod)
        $verified = $this->verifyKkiapay($transactionId);
        if (!$verified) {
            $this->json(['success' => false, 'error' => 'Transaction non vérifiée'], 402);
        }

        $userId  = Session::get('user_id');
        $planNom = $planMap[$plan];
        $subId   = $this->subModel->create($userId, $planNom, date('Y-m-d'), null);
        $amount  = match($planNom) { 'Standard' => 10020, default => 19680 };
        $invId   = $this->invoiceModel->create($subId, $amount);
        $this->invoiceModel->updateStatus($invId, 'paid');

        $this->json(['success' => true]);
    }

    private function verifyKkiapay(string $transactionId): bool {
        // En sandbox, on accepte toutes les transactions
        // En production, remplacer par appel API KKIAPAY :
        // POST https://api.kkiapay.me/api/v1/transactions/{id}/status
        // Header: x-private-key: VOTRE_CLE_PRIVEE_KKIAPAY
        if (APP_ENV !== 'production') {
            return !empty($transactionId);
        }

        $ch = curl_init("https://api.kkiapay.me/api/v1/transactions/{$transactionId}/status");
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => ['x-private-key: VOTRE_CLE_PRIVEE_KKIAPAY'],
        ]);
        $resp = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return ($resp['status'] ?? '') === 'SUCCESS';
    }
}
