<?php
$pageTitle = 'Admin — Abonnements';
ob_start();
?>
<div>
  <h1 class="text-2xl font-black text-black mb-8">Abonnements</h1>

  <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Utilisateur</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Plan</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Début</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Fin</th>
          <th class="px-6 py-3 text-center font-semibold text-gray-600">Statut</th>
          <th class="px-6 py-3 text-center font-semibold text-gray-600">Modifier</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php foreach ($subscriptions as $sub): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4">
              <p class="font-medium text-black"><?= htmlspecialchars($sub['user_name']) ?></p>
              <p class="text-xs text-gray-400"><?= htmlspecialchars($sub['user_email']) ?></p>
            </td>
            <td class="px-6 py-4 font-semibold text-black"><?= htmlspecialchars($sub['plan']) ?></td>
            <td class="px-6 py-4 text-gray-500"><?= date('d/m/Y', strtotime($sub['start_date'])) ?></td>
            <td class="px-6 py-4 text-gray-500"><?= $sub['end_date'] ? date('d/m/Y', strtotime($sub['end_date'])) : '∞' ?></td>
            <td class="px-6 py-4 text-center">
              <span class="px-3 py-1 rounded-full text-xs font-semibold
                <?= $sub['status'] === 'active' ? 'bg-green-100 text-green-700' : ($sub['status'] === 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-600') ?>">
                <?= ucfirst($sub['status']) ?>
              </span>
            </td>
            <td class="px-6 py-4 text-center">
              <form method="POST" action="<?= APP_URL ?>/admin/subscriptions/status/<?= $sub['id'] ?>" class="inline-flex gap-2 items-center">
                <?= (new AdminController())->csrfField() ?>
                <select name="status" class="border border-gray-300 rounded text-xs px-2 py-1 focus:outline-none">
                  <?php foreach (['active', 'expired', 'cancelled'] as $s): ?>
                    <option value="<?= $s ?>" <?= $sub['status'] === $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                  <?php endforeach; ?>
                </select>
                <button type="submit" class="bg-yvris-red text-white text-xs px-3 py-1 rounded hover:bg-red-700 transition-colors">OK</button>
              </form>
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
