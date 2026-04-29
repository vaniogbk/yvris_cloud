<?php
$pageTitle = 'Revendeur — Tableau de bord';
ob_start();
?>
<div>
  <h1 class="text-2xl font-black text-black mb-2">
    Bonjour, <?= htmlspecialchars(Session::get('user_name')) ?>
  </h1>
  <p class="text-gray-500 mb-8"><?= htmlspecialchars($reseller['company_name']) ?></p>

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-yvris-red rounded-xl p-6">
      <p class="text-xs text-red-100 font-medium uppercase tracking-wide">Mes clients</p>
      <p class="text-4xl font-black text-white mt-1"><?= $clientCount ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Commissions du mois</p>
      <p class="text-4xl font-black text-black mt-1">—</p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Clients actifs</p>
      <p class="text-4xl font-black text-black mt-1"><?= count($clients) ?></p>
    </div>
  </div>

  <!-- Liste rapide -->
  <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
      <h2 class="font-bold text-black">Mes derniers clients</h2>
      <a href="<?= APP_URL ?>/reseller/clients" class="text-sm text-yvris-red font-semibold hover:underline">Voir tout</a>
    </div>
    <?php if (empty($clients)): ?>
      <div class="px-6 py-8 text-center text-sm text-gray-500">
        Aucun client pour le moment.
        <a href="<?= APP_URL ?>/reseller/clients" class="text-yvris-red font-semibold hover:underline ml-1">Ajouter un client</a>
      </div>
    <?php else: ?>
      <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Nom</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach (array_slice($clients, 0, 5) as $client): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 font-medium text-black"><?= htmlspecialchars($client['client_name']) ?></td>
              <td class="px-6 py-4 text-gray-500"><?= htmlspecialchars($client['client_email']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    <?php endif; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
