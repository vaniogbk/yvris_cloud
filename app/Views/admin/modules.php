<?php
$pageTitle = 'Admin — Modules';
ob_start();
?>
<div>
  <h1 class="text-2xl font-black text-black mb-8">Modules</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <?php foreach ($modules as $module): ?>
      <div class="bg-white border border-gray-200 rounded-xl p-6 flex items-start justify-between">
        <div class="flex-1 mr-4">
          <h3 class="font-bold text-black"><?= htmlspecialchars($module['name']) ?></h3>
          <p class="text-sm text-gray-500 mt-1"><?= htmlspecialchars($module['description']) ?></p>
        </div>
        <div class="flex flex-col items-end gap-2">
          <span class="text-xs px-2 py-1 rounded-full font-semibold <?= $module['is_active'] ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' ?>">
            <?= $module['is_active'] ? 'Actif' : 'Inactif' ?>
          </span>
          <a href="<?= APP_URL ?>/admin/modules/toggle/<?= $module['id'] ?>"
            class="text-xs text-yvris-red hover:underline font-semibold">
            <?= $module['is_active'] ? 'Désactiver' : 'Activer' ?>
          </a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/admin.php';
