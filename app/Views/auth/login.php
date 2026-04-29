<?php
$pageTitle = 'Connexion — Yvris Business Cloud';
ob_start();
?>
<div class="min-h-screen flex items-center justify-center py-12 px-4 bg-gray-50">
  <div class="w-full max-w-md">
    <div class="text-center mb-8">
      <a href="<?= APP_URL ?>/" class="text-3xl font-black text-black">YVRIS</a>
      <p class="text-gray-500 mt-2">Connectez-vous à votre espace</p>
    </div>

    <?php if ($error): ?>
      <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <div class="bg-white border border-gray-200 rounded-2xl p-8 shadow-sm">
      <form method="POST" action="<?= APP_URL ?>/login">
        <?= (new AuthController())->csrfField() ?>
        <div class="space-y-5">
          <div>
            <label class="block text-sm font-semibold text-black mb-1.5">Adresse email</label>
            <input type="email" name="email" required autocomplete="email"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="vous@exemple.com">
          </div>
          <div>
            <div class="flex items-center justify-between mb-1.5">
              <label class="block text-sm font-semibold text-black">Mot de passe</label>
            </div>
            <input type="password" name="password" required autocomplete="current-password"
              class="w-full border border-gray-300 rounded-lg px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-yvris-red focus:border-transparent transition"
              placeholder="••••••••">
          </div>
          <button type="submit" class="w-full bg-yvris-red text-white font-bold py-3 rounded-lg hover:bg-red-700 transition-colors text-sm">
            Se connecter
          </button>
        </div>
      </form>
    </div>

    <p class="text-center text-sm text-gray-500 mt-6">
      Pas encore de compte ?
      <a href="<?= APP_URL ?>/register" class="text-yvris-red font-semibold hover:underline">Créer un compte</a>
    </p>

    <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4 text-xs text-blue-700">
      <p class="font-semibold mb-1">Comptes de démonstration :</p>
      <p>Admin : admin@yvris.bj</p>
      <p>Revendeur : revendeur1@yvris.bj</p>
      <p>Client : client@yvris.bj</p>
      <p class="mt-1 text-blue-500">Mot de passe : password (tous les comptes)</p>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
