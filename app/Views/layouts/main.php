<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle ?? APP_NAME) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            yvris: {
              red:   '#E3000F',
              navy:  '#1B2764',
              dark:  '#131D4A',
            }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', 'sans-serif']
          }
        }
      }
    }
  </script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
    .ribbon-badge::before, .ribbon-badge::after {
      content: '';
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      width: 0;
      height: 0;
    }
    .ribbon-badge::before {
      left: -10px;
      border-top: 14px solid transparent;
      border-bottom: 14px solid transparent;
      border-right: 12px solid #E3000F;
    }
    .ribbon-badge::after {
      right: -10px;
      border-top: 14px solid transparent;
      border-bottom: 14px solid transparent;
      border-left: 12px solid #E3000F;
    }
  </style>
</head>
<body class="bg-white text-gray-900 antialiased">

<!-- Navigation -->
<nav class="bg-yvris-navy sticky top-0 z-50 shadow-lg">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <a href="<?= APP_URL ?>/" class="flex items-center gap-2">
        <div class="flex items-center gap-1">
          <span class="text-yvris-red font-black text-3xl leading-none">Y</span>
          <span class="text-white font-black text-xl tracking-widest">VRIS</span>
        </div>
        <span class="hidden sm:block text-xs text-blue-200 font-medium border-l border-blue-400 pl-2 ml-1">Business Cloud</span>
      </a>

      <!-- Desktop nav -->
      <div class="hidden md:flex items-center gap-6 text-sm font-medium">
        <a href="<?= APP_URL ?>/#modules" class="text-blue-200 hover:text-white transition-colors">Modules</a>
        <a href="<?= APP_URL ?>/#pricing" class="text-blue-200 hover:text-white transition-colors">Tarifs</a>
        <a href="tel:+22940969498" class="text-blue-200 hover:text-white transition-colors">+229 40 96 94 98</a>
        <?php if (Session::has('user_id')): ?>
          <a href="<?= APP_URL ?>/dashboard" class="text-blue-200 hover:text-white transition-colors">Mon espace</a>
          <a href="<?= APP_URL ?>/logout" class="bg-yvris-red text-white px-4 py-2 rounded font-semibold hover:bg-red-700 transition-colors">Déconnexion</a>
        <?php else: ?>
          <a href="<?= APP_URL ?>/login" class="text-blue-200 hover:text-white transition-colors">Connexion</a>
          <a href="<?= APP_URL ?>/register" class="bg-yvris-red text-white px-5 py-2 rounded font-bold hover:bg-red-700 transition-colors shadow">Démarrer</a>
        <?php endif; ?>
      </div>

      <!-- Mobile toggle -->
      <button id="mobile-btn" class="md:hidden text-white p-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile menu -->
  <div id="mobile-menu" class="hidden md:hidden border-t border-blue-700 bg-yvris-navy px-4 py-3 space-y-2">
    <a href="<?= APP_URL ?>/#modules" class="block py-2 text-sm text-blue-200">Modules</a>
    <a href="<?= APP_URL ?>/#pricing" class="block py-2 text-sm text-blue-200">Tarifs</a>
    <a href="tel:+22940969498" class="block py-2 text-sm text-blue-200">+229 40 96 94 98</a>
    <?php if (Session::has('user_id')): ?>
      <a href="<?= APP_URL ?>/dashboard" class="block py-2 text-sm text-blue-200">Mon espace</a>
      <a href="<?= APP_URL ?>/logout" class="block py-2 text-sm text-yvris-red font-semibold">Déconnexion</a>
    <?php else: ?>
      <a href="<?= APP_URL ?>/login" class="block py-2 text-sm text-blue-200">Connexion</a>
      <a href="<?= APP_URL ?>/register" class="block py-2 text-sm text-yvris-red font-bold">Démarrer maintenant →</a>
    <?php endif; ?>
  </div>
</nav>

<?= $content ?? '' ?>

<!-- Footer -->
<footer class="bg-yvris-navy text-white mt-20">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-10">
      <!-- Brand -->
      <div class="md:col-span-1">
        <div class="flex items-center gap-1 mb-4">
          <span class="text-yvris-red font-black text-3xl leading-none">Y</span>
          <span class="text-white font-black text-xl tracking-widest">VRIS</span>
        </div>
        <p class="text-blue-300 text-sm leading-relaxed">
          La solution ERP cloud pour TPE, PME et créateurs d'entreprise. Gérez tout depuis un seul endroit.
        </p>
        <div class="flex gap-3 mt-4">
          <span class="w-8 h-8 bg-yvris-red rounded flex items-center justify-center text-xs font-bold">f</span>
          <span class="w-8 h-8 bg-yvris-red rounded flex items-center justify-center text-xs font-bold">in</span>
        </div>
      </div>

      <!-- Modules -->
      <div>
        <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wide">Modules</h4>
        <ul class="space-y-2 text-sm text-blue-300">
          <li><a href="#" class="hover:text-white transition-colors">CRM</a></li>
          <li><a href="#" class="hover:text-white transition-colors">Facturation & Ventes</a></li>
          <li><a href="#" class="hover:text-white transition-colors">Ressources Humaines</a></li>
          <li><a href="#" class="hover:text-white transition-colors">Comptabilité</a></li>
          <li><a href="#" class="hover:text-white transition-colors">Gestion de Stock</a></li>
          <li><a href="#" class="hover:text-white transition-colors">Production</a></li>
        </ul>
      </div>

      <!-- Compte -->
      <div>
        <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wide">Compte</h4>
        <ul class="space-y-2 text-sm text-blue-300">
          <li><a href="<?= APP_URL ?>/register" class="hover:text-white transition-colors">Créer un compte</a></li>
          <li><a href="<?= APP_URL ?>/login" class="hover:text-white transition-colors">Se connecter</a></li>
          <li><a href="<?= APP_URL ?>/#pricing" class="hover:text-white transition-colors">Nos tarifs</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h4 class="font-bold text-white mb-4 text-sm uppercase tracking-wide">Contact</h4>
        <ul class="space-y-3 text-sm text-blue-300">
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-yvris-red flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <a href="mailto:contact@yvris.net" class="hover:text-white">contact@yvris.net</a>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-yvris-red flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
            <a href="tel:+22940969498" class="hover:text-white">+229 40 96 94 98</a>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-4 h-4 text-yvris-red flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9"/>
            </svg>
            <a href="https://www.yvris.net" target="_blank" class="hover:text-white">www.yvris.net</a>
          </li>
        </ul>
        <!-- Paiement sécurisé -->
        <div class="mt-5 flex items-center gap-2">
          <span class="text-xs text-blue-400">Paiement sécurisé via</span>
          <span class="bg-white text-yvris-navy font-black text-xs px-2 py-0.5 rounded">KKIAPAY</span>
        </div>
      </div>
    </div>

    <div class="border-t border-blue-700 mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-xs text-blue-400">
      <p>© <?= date('Y') ?> YVRIS Business Cloud. Tous droits réservés.</p>
      <p>TPE · PME · Créateurs d'entreprise</p>
    </div>
  </div>
</footer>

<script>
  document.getElementById('mobile-btn').addEventListener('click', () => {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
<!-- KKIAPAY SDK -->
<script src="https://cdn.kkiapay.me/k.js"></script>
</body>
</html>
