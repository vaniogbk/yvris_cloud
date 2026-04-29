<?php
$pageTitle = 'Mon espace — Yvris Business Cloud';
ob_start();
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <div class="mb-8">
    <h1 class="text-3xl font-black text-black">Bonjour, <?= htmlspecialchars(Session::get('user_name')) ?> 👋</h1>
    <p class="text-gray-500 mt-1">Voici votre espace Yvris Business Cloud.</p>
  </div>

  <!-- Abonnements actifs -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-sm text-gray-500 font-medium">Abonnements actifs</p>
      <p class="text-3xl font-black text-black mt-1">
        <?= count(array_filter($subscriptions, fn($s) => $s['status'] === 'active')) ?>
      </p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-sm text-gray-500 font-medium">Modules activés</p>
      <p class="text-3xl font-black text-black mt-1"><?= count($modules) ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <p class="text-sm text-gray-500 font-medium">Factures</p>
      <p class="text-3xl font-black text-black mt-1"><?= count($invoices) ?></p>
    </div>
  </div>

  <!-- Souscrire -->
  <?php if (empty($subscriptions)): ?>
  <div class="bg-red-50 border border-red-100 rounded-xl p-6 mb-10">
    <h3 class="font-bold text-black mb-1">Aucun abonnement actif</h3>
    <p class="text-sm text-gray-600 mb-4">Choisissez un plan pour accéder à tous les modules Yvris.</p>
    <div class="flex flex-wrap gap-3">
      <?php foreach (['Free', 'Standard', 'Personnalisé'] as $plan): ?>
        <form method="POST" action="<?= APP_URL ?>/subscribe">
          <?= (new UserController())->csrfField() ?>
          <input type="hidden" name="plan" value="<?= $plan ?>">
          <button type="submit" class="bg-yvris-red text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
            <?= $plan ?>
          </button>
        </form>
      <?php endforeach; ?>
    </div>
  </div>
  <?php endif; ?>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Modules -->
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <h2 class="text-lg font-bold text-black mb-4">Mes modules</h2>
      <?php if (empty($modules)): ?>
        <p class="text-sm text-gray-500">Aucun module activé. Souscrivez à un plan pour commencer.</p>
      <?php else: ?>
        <div class="grid grid-cols-2 gap-3">
          <?php foreach ($modules as $m): ?>
            <div class="border border-gray-100 rounded-lg p-3 text-sm">
              <p class="font-semibold text-black"><?= htmlspecialchars($m['name']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Dernières factures -->
    <div class="bg-white border border-gray-200 rounded-xl p-6">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-lg font-bold text-black">Dernières factures</h2>
        <a href="<?= APP_URL ?>/invoices" class="text-sm text-yvris-red font-semibold hover:underline">Voir tout</a>
      </div>
      <?php if (empty($invoices)): ?>
        <p class="text-sm text-gray-500">Aucune facture disponible.</p>
      <?php else: ?>
        <div class="space-y-3">
          <?php foreach (array_slice($invoices, 0, 5) as $inv): ?>
            <div class="flex items-center justify-between py-2 border-b border-gray-100 last:border-0">
              <div>
                <p class="text-sm font-medium text-black">Plan <?= htmlspecialchars($inv['plan']) ?></p>
                <p class="text-xs text-gray-400"><?= date('d/m/Y', strtotime($inv['issued_at'])) ?></p>
              </div>
              <div class="text-right">
                <p class="text-sm font-bold text-black"><?= number_format($inv['amount'], 0, ',', ' ') ?> FCFA</p>
                <span class="text-xs px-2 py-0.5 rounded-full font-medium
                  <?= $inv['status'] === 'paid' ? 'bg-green-100 text-green-700' : ($inv['status'] === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') ?>">
                  <?= ucfirst($inv['status']) ?>
                </span>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
