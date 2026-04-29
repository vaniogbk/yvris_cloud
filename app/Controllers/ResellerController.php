<?php
class ResellerController extends Controller {
    private Reseller     $resellerModel;
    private Subscription $subModel;
    private Invoice      $invoiceModel;

    public function __construct() {
        $this->resellerModel = new Reseller();
        $this->subModel      = new Subscription();
        $this->invoiceModel  = new Invoice();
    }

    private function getReseller(): array {
        $this->requireRole('revendeur');
        $reseller = $this->resellerModel->findByUserId(Session::get('user_id'));
        if (!$reseller) {
            $this->redirect('/login');
        }
        return $reseller;
    }

    public function dashboard(): void {
        $reseller    = $this->getReseller();
        $clientCount = $this->resellerModel->countClientsFor($reseller['id']);
        $clients     = $this->resellerModel->clientsFor($reseller['id']);
        $this->view('reseller.dashboard', compact('reseller', 'clientCount', 'clients'));
    }

    public function clients(): void {
        $reseller = $this->getReseller();
        $clients  = $this->resellerModel->clientsFor($reseller['id']);
        $error    = Session::getFlash('error');
        $success  = Session::getFlash('success');
        $this->view('reseller.clients', compact('reseller', 'clients', 'error', 'success'));
    }

    public function addClient(): void {
        $reseller = $this->getReseller();
        $this->validateCsrf();
        $name  = htmlspecialchars(trim($_POST['client_name'] ?? ''), ENT_QUOTES);
        $email = filter_input(INPUT_POST, 'client_email', FILTER_SANITIZE_EMAIL);

        if (!$name || !$email) {
            Session::flash('error', 'Nom et email requis.');
            $this->redirect('/reseller/clients');
        }

        $this->resellerModel->addClient($reseller['id'], $name, $email);
        Session::flash('success', 'Client ajouté avec succès.');
        $this->redirect('/reseller/clients');
    }

    public function removeClient(string $clientId): void {
        $reseller = $this->getReseller();
        $this->resellerModel->removeClient((int)$clientId, $reseller['id']);
        $this->redirect('/reseller/clients');
    }

    public function sales(): void {
        $reseller = $this->getReseller();
        $clients  = $this->resellerModel->clientsFor($reseller['id']);
        $this->view('reseller.sales', compact('reseller', 'clients'));
    }
}
