<?php
$pageTitle = 'Revendeur — Historique des ventes';
ob_start();
?>
<div>
  <h1 class="text-2xl font-black text-black mb-8">Historique des ventes</h1>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Clients total</p>
      <p class="text-4xl font-black text-black mt-1"><?= count($clients) ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Ventes ce mois</p>
      <p class="text-4xl font-black text-black mt-1">—</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Commission</p>
      <p class="text-4xl font-black text-black mt-1">—</p>
    </div>
  </div>

  <div class="bg-white border border-gray-200 rounded-xl p-8 text-center text-gray-400">
    <svg class="w-12 h-12 mx-auto mb-3 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
    </svg>
    <p class="text-sm">L'historique des ventes sera disponible dès la première souscription d'un client.</p>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
