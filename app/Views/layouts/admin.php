<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($pageTitle ?? 'Admin — ' . APP_NAME) ?></title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: { extend: { colors: { yvris: { red: '#E3000F', navy: '#1B2764', dark: '#131D4A' } } } }
    }
  </script>
</head>
<body class="bg-gray-50 text-black font-sans antialiased">

<div class="flex h-screen overflow-hidden">
  <!-- Sidebar -->
  <aside class="w-64 bg-white border-r border-gray-200 flex flex-col">
    <div class="h-16 flex items-center px-6 border-b border-gray-200">
      <a href="<?= APP_URL ?>/" class="text-xl font-black">YVRIS</a>
      <span class="ml-2 text-xs bg-yvris-red text-white px-2 py-0.5 rounded font-semibold">
        <?= ucfirst(Session::get('user_role', 'admin')) ?>
      </span>
    </div>
    <nav class="flex-1 px-4 py-6 space-y-1 text-sm font-medium overflow-y-auto">
      <?php if (Session::get('user_role') === 'admin'): ?>
        <a href="<?= APP_URL ?>/admin/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false ? 'bg-red-50 text-yvris-red' : 'text-gray-700' ?>">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          Tableau de bord
        </a>
        <a href="<?= APP_URL ?>/admin/users" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= strpos($_SERVER['REQUEST_URI'], 'users') !== false ? 'bg-red-50 text-yvris-red' : 'text-gray-700' ?>">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
          Utilisateurs
        </a>
        <a href="<?= APP_URL ?>/admin/subscriptions" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= strpos($_SERVER['REQUEST_URI'], 'subscriptions') !== false ? 'bg-red-50 text-yvris-red' : 'text-gray-700' ?>">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
          Abonnements
        </a>
        <a href="<?= APP_URL ?>/admin/invoices" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= strpos($_SERVER['REQUEST_URI'], 'invoices') !== false ? 'bg-red-50 text-yvris-red' : 'text-gray-700' ?>">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          Factures
        </a>
        <a href="<?= APP_URL ?>/admin/modules" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 transition-colors <?= strpos($_SERVER['REQUEST_URI'], 'modules') !== false ? 'bg-red-50 text-yvris-red' : 'text-gray-700' ?>">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
          Modules
        </a>
      <?php else: ?>
        <a href="<?= APP_URL ?>/reseller/dashboard" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          Tableau de bord
        </a>
        <a href="<?= APP_URL ?>/reseller/clients" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          Mes clients
        </a>
        <a href="<?= APP_URL ?>/reseller/sales" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-700">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
          Ventes
        </a>
      <?php endif; ?>
    </nav>
    <div class="px-4 py-4 border-t border-gray-200">
      <div class="flex items-center gap-3 mb-3">
        <div class="w-8 h-8 bg-yvris-navy rounded-full flex items-center justify-center text-white text-xs font-bold">
          <?= strtoupper(substr(Session::get('user_name', 'U'), 0, 1)) ?>
        </div>
        <div class="min-w-0">
          <p class="text-sm font-medium truncate"><?= htmlspecialchars(Session::get('user_name', '')) ?></p>
          <p class="text-xs text-gray-500 truncate"><?= htmlspecialchars(Session::get('user_email', '')) ?></p>
        </div>
      </div>
      <a href="<?= APP_URL ?>/logout" class="block text-sm text-red-600 hover:text-red-800 font-medium">Déconnexion</a>
    </div>
  </aside>

  <!-- Main content -->
  <main class="flex-1 overflow-y-auto">
    <div class="p-8">
      <?= $content ?? '' ?>
    </div>
  </main>
</div>

</body>
</html>
