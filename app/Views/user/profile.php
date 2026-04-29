<?php
$pageTitle = 'Mon profil — Yvris Business Cloud';
ob_start();
?>
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
  <h1 class="text-3xl font-black text-black mb-8">Mon profil</h1>

  <?php if ($error): ?>
    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>
  <?php if ($success): ?>
    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm"><?= htmlspecialchars($success) ?></div>
  <?php endif; ?>

  <div class="bg-white border border-gray-200 rounded-xl p-8 shadow-sm">
    <form method="POST" action="<?= APP_URL ?>/profile/update">
      <?= (new UserController())->csrfField() ?>
      <div class="space-y-6">
        <div>
          <label class="block text-sm font-semibold text-black mb-1.5">Nom complet</label>
          <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red transition">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1.5">Email</label>
          <input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled
            class="w-full border border-gray-200 rounded-lg px-4 py-3 text-sm bg-gray-50 text-gray-500 cursor-not-allowed">
        </div>
        <div>
          <label class="block text-sm font-semibold text-black mb-1.5">Nouveau mot de passe <span class="text-gray-400 font-normal">(laisser vide pour ne pas changer)</span></label>
          <input type="password" name="password" minlength="8"
            class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red transition"
            placeholder="••••••••">
        </div>
        <button type="submit" class="bg-yvris-red text-white font-bold px-6 py-3 rounded-lg hover:bg-red-700 transition-colors text-sm">
          Enregistrer les modifications
        </button>
      </div>
    </form>
  </div>

  <div class="mt-6">
    <a href="<?= APP_URL ?>/dashboard" class="text-sm text-gray-500 hover:text-black">← Retour au tableau de bord</a>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
