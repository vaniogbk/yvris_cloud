<?php
$pageTitle = 'Admin — Utilisateurs';
ob_start();
?>
<div>
  <div class="flex items-center justify-between mb-8">
    <h1 class="text-2xl font-black text-black">Utilisateurs</h1>
    <button onclick="document.getElementById('modal-create').classList.remove('hidden')"
      class="bg-yvris-red text-white text-sm font-semibold px-4 py-2 rounded-lg hover:bg-red-700 transition-colors">
      + Ajouter un utilisateur
    </button>
  </div>

  <?php if ($error): ?>
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if ($success): ?>
    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <div class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
    <table class="w-full text-sm">
      <thead class="bg-gray-50 border-b border-gray-200">
        <tr>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Nom</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Email</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Rôle</th>
          <th class="px-6 py-3 text-left font-semibold text-gray-600">Inscrit le</th>
          <th class="px-6 py-3 text-center font-semibold text-gray-600">Actif</th>
          <th class="px-6 py-3 text-center font-semibold text-gray-600">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        <?php foreach ($users as $user): ?>
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
              <a href="<?= APP_URL ?>/admin/users/toggle/<?= $user['id'] ?>"
                class="inline-block w-5 h-5 rounded-full <?= $user['is_active'] ? 'bg-green-500' : 'bg-red-400' ?>" title="Basculer"></a>
            </td>
            <td class="px-6 py-4 text-center">
              <?php if ($user['id'] !== Session::get('user_id')): ?>
                <form method="POST" action="<?= APP_URL ?>/admin/users/delete/<?= $user['id'] ?>"
                  onsubmit="return confirm('Supprimer cet utilisateur ?')">
                  <?= (new AdminController())->csrfField() ?>
                  <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-semibold">Supprimer</button>
                </form>
              <?php else: ?>
                <span class="text-gray-300 text-xs">—</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal création -->
<div id="modal-create" class="hidden fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 p-4">
  <div class="bg-white rounded-2xl p-8 w-full max-w-md shadow-xl">
    <div class="flex items-center justify-between mb-6">
      <h2 class="text-lg font-bold text-black">Nouvel utilisateur</h2>
      <button onclick="document.getElementById('modal-create').classList.add('hidden')" class="text-gray-400 hover:text-black text-2xl leading-none">&times;</button>
    </div>
    <form method="POST" action="<?= APP_URL ?>/admin/users/create">
      <?= (new AdminController())->csrfField() ?>
      <div class="space-y-4">
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Nom</label>
          <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Email</label>
          <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Mot de passe</label>
          <input type="password" name="password" required minlength="8" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1">Rôle</label>
          <select name="role_id" class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red">
            <option value="3">Client</option>
            <option value="2">Revendeur</option>
            <option value="1">Admin</option>
          </select>
        </div>
        <button type="submit" class="w-full bg-yvris-red text-white font-bold py-3 rounded-lg hover:bg-red-700 transition-colors text-sm">
          Créer l'utilisateur
        </button>
      </div>
    </form>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
