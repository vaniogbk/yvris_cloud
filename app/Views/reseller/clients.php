<?php
$pageTitle = 'Revendeur — Mes clients';
ob_start();
?>
<div>
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-black text-black">Mes clients</h1>
    <button onclick="document.getElementById('modal-add').classList.remove('hidden')"
      class="bg-yvris-red text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
      + Ajouter un client
    </button>
  </div>

  <?php if ($error): ?>
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if ($success): ?>
    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <?php if (empty($clients)): ?>
    <div class="bg-gray-50 border border-dashed border-gray-300 rounded-xl p-12 text-center">
      <p class="text-gray-500 mb-2">Aucun client enregistré.</p>
      <button onclick="document.getElementById('modal-add').classList.remove('hidden')"
        class="text-sm text-yvris-red font-semibold hover:underline">Ajouter votre premier client</button>
    </div>
  <?php else: ?>
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">#</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Nom</th>
            <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
            <th class="px-6 py-3 text-center font-semibold text-gray-600">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          <?php foreach ($clients as $client): ?>
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 text-gray-400"><?= $client['id'] ?></td>
              <td class="px-6 py-4 font-medium text-black"><?= htmlspecialchars($client['client_name']) ?></td>
              <td class="px-6 py-4 text-gray-500"><?= htmlspecialchars($client['client_email']) ?></td>
              <td class="px-6 py-4 text-center">
                <a href="<?= APP_URL ?>/reseller/clients/remove/<?= $client['id'] ?>"
                  onclick="return confirm('Supprimer ce client ?')"
                  class="text-red-500 hover:text-red-700 text-xs font-semibold">Retirer</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<!-- Modal ajout client -->
<div id="modal-add" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 p-4">
  <div class="bg-white rounded-2xl p-8 w-full max-w-md shadow-xl">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-lg font-bold text-black">Ajouter un client</h2>
      <button onclick="document.getElementById('modal-add').classList.add('hidden')" class="text-gray-400 hover:text-black text-2xl leading-none">&times;</button>
    </div>
    <form method="POST" action="<?= APP_URL ?>/reseller/clients/add">
      <?= (new ResellerController())->csrfField() ?>
      <div class="space-y-4">
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Nom du client</label>
          <input type="text" name="client_name" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Email</label>
          <input type="email" name="client_email" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
        </div>
        <button type="submit" class="w-full bg-yvris-red text-white font-bold py-3 rounded-lg hover:bg-red-700 transition-colors text-sm">
          Ajouter
        </button>
      </div>
    </form>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
