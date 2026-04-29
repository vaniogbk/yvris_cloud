<?php
$pageTitle = 'Admin — Tableau de bord';
ob_start();
?>
<div>
  <h1 class="text-2xl font-black text-black mb-8">Tableau de bord</h1>

  <!-- Stats cards -->
  <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-10">
    <div class="bg-white border border-gray-200 rounded-xl p-5 col-span-1">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Utilisateurs</p>
      <p class="text-3xl font-black text-black mt-1"><?= $stats['total_users'] ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-5">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Clients</p>
      <p class="text-3xl font-black text-black mt-1"><?= $stats['clients'] ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-5">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Revendeurs</p>
      <p class="text-3xl font-black text-black mt-1"><?= $stats['revendeurs'] ?></p>
    </div>
    <div class="bg-white border border-gray-200 rounded-xl p-5">
      <p class="text-xs text-gray-500 font-medium uppercase tracking-wide">Abonnements actifs</p>
      <p class="text-3xl font-black text-black mt-1"><?= $stats['active_subs'] ?></p>
    </div>
    <div class="bg-yvris-red rounded-xl p-5">
      <p class="text-xs text-red-100 font-medium uppercase tracking-wide">Revenus</p>
      <p class="text-2xl font-black text-white mt-1"><?= number_format($stats['revenue'], 0, ',', ' ') ?> F</p>
    </div>
  </div>

  <!-- Derniers utilisateurs -->
  <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
      <h2 class="font-bold text-black">Derniers utilisateurs</h2>
      <a href="<?= APP_URL ?>/admin/users" class="text-sm text-yvris-red font-semibold hover:underline">Voir tout</a>
    </div>
    <table class="w-full text-sm">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Nom</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Rôle</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Date</th>
          <th class="px-6 py-3 text-center font-semibold text-gray-600">Statut</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php foreach ($recentUsers as $user): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 font-medium text-black"><?= htmlspecialchars($user['name']) ?></td>
            <td class="px-6 py-4 text-gray-500"><?= htmlspecialchars($user['email']) ?></td>
            <td class="px-6 py-4">
              <span class="px-2 py-1 text-xs font-semibold rounded-full <?= $user['role_name'] === 'admin' ? 'bg-red-100 text-red-700' : ($user['role_name'] === 'revendeur' ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-700') ?>">
                <?= ucfirst($user['role_name']) ?>
              </span>
            </td>
            <td class="px-6 py-4 text-gray-500"><?= date('d/m/Y', strtotime($user['created_at'])) ?></td>
            <td class="px-6 py-4 text-center">
              <span class="w-2 h-2 rounded-full inline-block <?= $user['is_active'] ? 'bg-green-500' : 'bg-red-400' ?>"></span>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
