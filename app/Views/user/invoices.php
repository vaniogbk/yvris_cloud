<?php
$pageTitle = 'Mes factures — Yvris Business Cloud';
ob_start();
?>
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-3xl font-black text-black">Mes factures</h1>
  </div>

  <?php if (empty($invoices)): ?>
    <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-12 text-center">
      <p class="text-gray-500">Aucune facture disponible.</p>
      <a href="<?= APP_URL ?>/dashboard" class="inline-block mt-4 text-sm text-yvris-red font-semibold hover:underline">Souscrire à un plan</a>
    </div>
  <?php else: ?>
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">#</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Plan</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Date</th>
            <th class="px-6 py-3 text-right font-semibold text-gray-600">Montant</th>
            <th class="px-6 py-3 text-center font-semibold text-gray-600">Statut</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach ($invoices as $inv): ?>
            <tr class="hover:bg-gray-50 transition-colors">
              <td class="px-6 py-4 text-gray-400">#<?= $inv['id'] ?></td>
              <td class="px-6 py-4 font-medium text-black"><?= htmlspecialchars($inv['plan']) ?></td>
              <td class="px-6 py-4 text-gray-500"><?= date('d/m/Y H:i', strtotime($inv['issued_at'])) ?></td>
              <td class="px-6 py-4 text-right font-bold text-black"><?= number_format($inv['amount'], 0, ',', ' ') ?> FCFA</td>
              <td class="px-6 py-4 text-center">
                <span class="px-3 py-1 rounded-full text-xs font-semibold
                  <?= $inv['status'] === 'paid' ? 'bg-green-100 text-green-700' : ($inv['status'] === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') ?>">
                  <?= ucfirst($inv['status']) ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>

  <div class="mt-6">
    <a href="<?= APP_URL ?>/dashboard" class="text-sm text-gray-500 hover:text-black">← Retour</a>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
