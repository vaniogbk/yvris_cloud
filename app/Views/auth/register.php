<?php
$pageTitle = 'Inscription — Yvris Business Cloud';
ob_start();
?>
<div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gray-50">
  <div class="w-full max-w-md">
    <div class="text-center mb-8">
      <a href="<?= APP_URL ?>/" class="text-3xl font-black text-black">YVRIS</a>
      <p class="text-gray-500 mt-2">Créez votre compte gratuitement</p>
    </div>

    <?php if ($error): ?>
      <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
      <form method="POST" action="<?= APP_URL ?>/register">
        <?= (new AuthController())->csrfField() ?>
        <div class="space-y-5">
          <div>
            <label class="block text-sm font-semibold text-black mb-1.5">Nom complet</label>
            <input type="text" name="name" required autocomplete="name"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="Jean Dupont">
          </div>
          <div>
            <label class="block text-sm font-semibold text-black mb-1.5">Adresse email</label>
            <input type="email" name="email" required autocomplete="email"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="vous@exemple.com">
          </div>
          <div>
            <label class="block text-sm font-semibold text-black mb-1.5">Mot de passe <span class="text-gray-400 font-normal">(min. 8 caractères)</span></label>
            <input type="password" name="password" required minlength="8" autocomplete="new-password"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="••••••••">
          </div>
          <div>
            <label class="block text-sm font-semibold text-black mb-1.5">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" required minlength="8" autocomplete="new-password"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="••••••••">
          </div>
          <button type="submit" class="w-full bg-yvris-red text-white font-bold py-3 rounded-lg hover:bg-red-700 transition-colors text-sm">
            Créer mon compte
          </button>
        </div>
      </form>
    </div>

    <p class="text-center text-sm text-gray-500 mt-6">
      Déjà inscrit ?
      <a href="<?= APP_URL ?>/login" class="text-yvris-red font-semibold hover:underline">Se connecter</a>
    </p>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
