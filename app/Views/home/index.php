<?php
$pageTitle = 'YVRIS — La solution ERP à vos problèmes | Business Cloud';
ob_start();
?>

<!-- Hero -->
<section class="bg-yvris-navy text-white overflow-hidden relative">
  <!-- Décoration géométrique -->
  <div class="absolute top-0 right-0 w-1/3 h-full opacity-10">
    <div class="absolute top-10 right-10 w-64 h-64 border-2 border-white rounded-full"></div>
    <div class="absolute top-20 right-20 w-40 h-40 border border-white rounded-full"></div>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 relative">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div>
        <div class="inline-flex items-center gap-2 bg-yvris-red/20 border border-yvris-red/40 px-4 py-1.5 rounded-full text-sm text-red-200 mb-6">
          <span class="w-2 h-2 bg-yvris-red rounded-full animate-pulse"></span>
          YVRIS EPR — Business Cloud
        </div>
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight">
          <span class="text-yvris-red">LA SOLUTION</span><br>
          À VOS PROBLÈMES
        </h1>
        <p class="mt-6 text-lg text-blue-200 leading-relaxed max-w-lg">
          Créateur d'entreprise, TPE ou PME — gagnez en simplicité, en mobilité et en fiabilité avec YVRIS Business Cloud. Gérez votre comptabilité, vos devis, factures, paie et ressources humaines en ligne.
        </p>
        <div class="mt-8 flex flex-col sm:flex-row gap-4">
          <a href="<?= APP_URL ?>/register"
            class="bg-yvris-red text-white font-bold px-8 py-4 rounded text-center hover:bg-red-700 transition-colors shadow-lg text-sm uppercase tracking-wide">
            Démarrer Maintenant
          </a>
          <a href="#modules"
            class="border-2 border-white text-white font-bold px-8 py-4 rounded text-center hover:bg-white hover:text-yvris-navy transition-colors text-sm uppercase tracking-wide">
            Découvrir les modules
          </a>
        </div>
        <p class="mt-4 text-blue-300 text-sm">Essai gratuit · Sans carte bancaire · Installation immédiate</p>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-2 gap-4">
        <div class="bg-white/10 backdrop-blur rounded-xl p-6 border border-white/20">
          <p class="text-4xl font-black text-yvris-red">6</p>
          <p class="text-blue-200 text-sm mt-1 font-medium">Modules intégrés</p>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-xl p-6 border border-white/20">
          <p class="text-4xl font-black text-yvris-red">500+</p>
          <p class="text-blue-200 text-sm mt-1 font-medium">Entreprises actives</p>
        </div>
        <div class="bg-yvris-red rounded-xl p-6">
          <p class="text-4xl font-black text-white">99.9%</p>
          <p class="text-red-100 text-sm mt-1 font-medium">Disponibilité</p>
        </div>
        <div class="bg-white/10 backdrop-blur rounded-xl p-6 border border-white/20">
          <p class="text-4xl font-black text-yvris-red">24/7</p>
          <p class="text-blue-200 text-sm mt-1 font-medium">Support client</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Vague basse -->
  <div class="relative h-16 overflow-hidden">
    <svg viewBox="0 0 1440 64" class="absolute bottom-0 w-full" fill="white" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,32 C360,64 1080,0 1440,32 L1440,64 L0,64 Z"/>
    </svg>
  </div>
</section>

<!-- Tagline bande -->
<section class="bg-yvris-red py-4">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <p class="text-white font-bold text-sm uppercase tracking-widest">
      PRODUCTION · COMPTABILITÉ · GESTION DE STOCK · CRM · RESSOURCES HUMAINES · FACTURATION
    </p>
  </div>
</section>

<!-- Modules -->
<section id="modules" class="py-20 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14">
      <span class="text-yvris-red font-bold text-sm uppercase tracking-widest">Nos modules</span>
      <h2 class="text-4xl font-black text-yvris-navy mt-2">Modules disponibles</h2>
      <p class="text-gray-500 mt-3 max-w-2xl mx-auto">
        Six modules puissants interconnectés pour piloter l'ensemble de votre activité depuis une seule plateforme.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      <!-- CRM -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">CRM</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Gestion relation clients</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Suivi processus acquisition</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Suivi du pipe commercial</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          Pilotez votre prospection : gestion de la relation client, acquisition de nouveaux clients, suivi des opportunités commerciales.
        </p>
      </div>

      <!-- Facturation / Ventes -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">Facturation & Ventes</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Devis & Bons de commande</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Factures normalisées & Avoirs</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Suivi des paiements clients</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          De la proposition commerciale au paiement : gérez vos devis, factures, avoirs et encaissements clients.
        </p>
      </div>

      <!-- RH -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">Ressources Humaines</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Gestion des recrutements</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Entrée et sortie des salariés</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Fiches de paie</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          Gérez efficacement vos ressources humaines : recrutement, administration du personnel, établissement des fiches de paie.
        </p>
      </div>

      <!-- Comptabilité -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">Comptabilité</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Journaux (achats, ventes, grand livre)</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Bilan & Compte de résultat</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> TFT & Notes annexes</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          Pilotez votre comptabilité : saisie des écritures dans les journaux, génération des états financiers obligatoires.
        </p>
      </div>

      <!-- Gestion de Stock -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">Gestion de Stock</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Tableau de bord stock</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Réapprovisionnement automatique</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Inventaire & rapports</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          Gérez vos entrepôts de A à Z : emplacements, réapprovisionnement automatique, inventaires physiques.
        </p>
      </div>

      <!-- Production -->
      <div class="group border border-gray-200 rounded-2xl p-7 hover:border-yvris-red hover:shadow-xl transition-all duration-300">
        <div class="w-14 h-14 bg-yvris-navy rounded-xl flex items-center justify-center mb-5 group-hover:bg-yvris-red transition-colors">
          <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
          </svg>
        </div>
        <h3 class="text-lg font-black text-yvris-navy mb-3">Production</h3>
        <ul class="space-y-1.5 text-sm text-gray-600 mb-4">
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Gestion de la production</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Nomenclatures produits</li>
          <li class="flex items-center gap-2"><span class="text-yvris-red font-bold">—</span> Calcul des coûts de revient</li>
        </ul>
        <p class="text-xs text-gray-500 leading-relaxed">
          Définissez précisément les nomenclatures, planifiez et suivez vos fabrications en temps réel.
        </p>
      </div>

    </div>
  </div>
</section>

<!-- Pricing -->
<section id="pricing" class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14">
      <span class="text-yvris-red font-bold text-sm uppercase tracking-widest">Nos offres</span>
      <h2 class="text-4xl font-black text-yvris-navy mt-2">Choisir le meilleur plan</h2>
      <p class="text-gray-500 mt-3">Commencez gratuitement. Évoluez selon vos besoins.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">

      <!-- FREE -->
      <div class="bg-white rounded-2xl shadow-md overflow-visible relative flex flex-col">
        <!-- Badge ribbon -->
        <div class="flex justify-center -mt-4 relative z-10">
          <div class="ribbon-badge relative bg-yvris-navy text-white font-black text-sm px-8 py-2 rounded">FREE</div>
        </div>
        <div class="p-7 flex flex-col flex-1 mt-2">
          <div class="text-center mb-6">
            <div class="flex items-start justify-center gap-1">
              <span class="text-sm text-gray-500 mt-2">€</span>
              <span class="text-6xl font-black text-yvris-navy">0</span>
            </div>
            <p class="text-gray-500 text-sm">Par Mois</p>
          </div>
          <ul class="space-y-3 text-sm text-gray-700 mb-6 flex-1">
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Devis
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Facture
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Utilisateur : 1
            </li>
          </ul>
          <p class="text-center text-xs font-bold text-gray-500 italic mb-5">Pour un seul utilisateur</p>
          <a href="<?= APP_URL ?>/register"
            class="block text-center bg-yvris-navy text-white font-bold py-3.5 rounded hover:bg-yvris-dark transition-colors text-sm uppercase tracking-wide">
            Démarrer Maintenant
          </a>
        </div>
      </div>

      <!-- STANDARD -->
      <div class="bg-white rounded-2xl shadow-xl overflow-visible relative flex flex-col scale-105 z-10">
        <div class="flex justify-center -mt-4 relative z-10">
          <div class="ribbon-badge relative bg-yvris-navy text-white font-black text-sm px-8 py-2 rounded">STANDARD</div>
        </div>
        <div class="p-7 flex flex-col flex-1 mt-2">
          <div class="text-center mb-6">
            <div class="flex items-start justify-center gap-2">
              <span class="text-lg text-gray-400 line-through mt-2">€22,88</span>
              <div class="flex items-start">
                <span class="text-sm text-gray-600 mt-2">€</span>
                <span class="text-6xl font-black text-yvris-navy">15</span>
                <span class="text-2xl font-black text-yvris-navy mt-3">,26</span>
              </div>
            </div>
            <p class="text-gray-500 text-sm">Par Mois</p>
          </div>
          <ul class="space-y-3 text-sm text-gray-700 mb-6 flex-1">
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Toutes les fonctionnalités
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Utilisateurs : 5
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Support prioritaire
            </li>
          </ul>
          <p class="text-center text-xs font-bold text-gray-500 italic mb-5">Toutes les apps pour 5 utilisateurs</p>
          <button onclick="payerKkiapay('standard', 10020)"
            class="w-full bg-yvris-red text-white font-bold py-3.5 rounded hover:bg-red-700 transition-colors text-sm uppercase tracking-wide">
            Démarrer Maintenant
          </button>
        </div>
      </div>

      <!-- PERSONNALISÉ -->
      <div class="bg-white rounded-2xl shadow-md overflow-visible relative flex flex-col">
        <div class="flex justify-center -mt-4 relative z-10">
          <div class="ribbon-badge relative bg-yvris-navy text-white font-black text-sm px-6 py-2 rounded">PERSONNALISÉ</div>
        </div>
        <div class="p-7 flex flex-col flex-1 mt-2">
          <div class="text-center mb-6">
            <div class="flex items-start justify-center gap-1">
              <span class="text-sm text-gray-500 mt-2">€</span>
              <span class="text-6xl font-black text-yvris-navy">30</span>
            </div>
            <p class="text-gray-500 text-sm">Par Mois</p>
          </div>
          <ul class="space-y-3 text-sm text-gray-700 mb-6 flex-1">
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Personnalisations
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Toutes les fonctionnalités
            </li>
            <li class="flex items-center gap-3">
              <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
              Utilisateurs illimités
            </li>
          </ul>
          <p class="text-center text-xs font-bold text-gray-500 italic mb-5">Toutes les apps et utilisateurs illimités</p>
          <button onclick="payerKkiapay('personnalise', 19680)"
            class="w-full bg-yvris-red text-white font-bold py-3.5 rounded hover:bg-red-700 transition-colors text-sm uppercase tracking-wide">
            Démarrer Maintenant
          </button>
        </div>
      </div>

    </div>

    <!-- Badge paiement -->
    <div class="text-center mt-10 flex flex-col items-center gap-2">
      <p class="text-gray-500 text-sm">Paiement sécurisé via</p>
      <div class="flex items-center gap-3">
        <span class="bg-yvris-navy text-white font-black text-sm px-4 py-1.5 rounded">KKIAPAY</span>
        <span class="text-xs text-gray-400">MTN · Moov · Visa · Mastercard</span>
      </div>
    </div>
  </div>
</section>

<!-- Nos solutions (de la plaquette) -->
<section class="py-20 bg-white">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-14">
      <span class="text-yvris-red font-bold text-sm uppercase tracking-widest">Pourquoi nous choisir</span>
      <h2 class="text-4xl font-black text-yvris-navy mt-2">Nos solutions</h2>
    </div>
    <div class="space-y-8">
      <?php
      $solutions = [
        ['titre'=>'PRODUCTION','texte'=>'Optimisez vos cycles et votre gestion de production et, par conséquent, augmentez vos performances industrielles.'],
        ['titre'=>'COMPTABILITÉ','texte'=>'Gagnez du temps avec les documents financiers disponibles simplement. Fini les calculs compliqués et les tableurs, tout se génère automatiquement.'],
        ['titre'=>'GESTION DE STOCK','texte'=>'Savoir quand passer une nouvelle commande, combien commander et où entreposer le stock.'],
        ['titre'=>'CRM','texte'=>'Editez vos devis et bons de commande, faites des factures, gérez les relances clients, gérez vos stocks de produits, etc.'],
        ['titre'=>'RESSOURCES HUMAINES','texte'=>'Ensemble des systèmes mis en place pour organiser, utiliser à bon escient et développer les ressources humaines de votre entreprise.'],
        ['titre'=>'FACTURATION','texte'=>'Ne perdez plus de temps avec votre facturation. Créez vos devis et factures en quelques secondes avec YVRIS.'],
      ];
      foreach ($solutions as $i => $s):
      ?>
        <div class="flex gap-6 items-start group">
          <div class="flex-shrink-0 w-12 h-12 bg-yvris-navy group-hover:bg-yvris-red rounded-xl flex items-center justify-center transition-colors">
            <span class="text-white font-black text-lg"><?= str_pad($i+1, 2, '0', STR_PAD_LEFT) ?></span>
          </div>
          <div class="border-b border-gray-100 pb-6 flex-1">
            <h3 class="font-black text-yvris-navy text-lg mb-1"><?= $s['titre'] ?></h3>
            <p class="text-gray-600 font-medium"><?= $s['texte'] ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- CTA final -->
<section class="bg-yvris-navy py-16">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <h2 class="text-4xl font-black text-white mb-4">Prêt à transformer votre gestion ?</h2>
    <p class="text-blue-200 text-lg mb-8">Rejoignez des centaines d'entreprises qui font confiance à YVRIS Business Cloud.</p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?= APP_URL ?>/register"
        class="bg-yvris-red text-white font-bold px-10 py-4 rounded text-sm uppercase tracking-wide hover:bg-red-700 transition-colors shadow-lg">
        Démarrer Maintenant
      </a>
      <a href="mailto:contact@yvris.net"
        class="border-2 border-white text-white font-bold px-10 py-4 rounded text-sm uppercase tracking-wide hover:bg-white hover:text-yvris-navy transition-colors">
        Nous contacter
      </a>
    </div>
    <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-6 text-sm text-blue-300">
      <span>📧 contact@yvris.net</span>
      <span>📞 +229 40 96 94 98</span>
      <span>🌐 www.yvris.net</span>
    </div>
  </div>
</section>

<!-- KKIAPAY Modal et logique -->
<script>
function payerKkiapay(plan, montant) {
  <?php if (!Session::has('user_id')): ?>
    window.location.href = '<?= APP_URL ?>/register?plan=' + plan;
    return;
  <?php endif; ?>

  openKkiapayWidget({
    amount:   montant,
    api_key:  'VOTRE_CLE_PUBLIQUE_KKIAPAY', // Remplacer par votre clé KKIAPAY
    sandbox:  true,
    email:    '<?= htmlspecialchars(Session::get('user_email', '')) ?>',
    name:     '<?= htmlspecialchars(Session::get('user_name', '')) ?>',
    phone:    '',
    data:     plan,
  });
}

addSuccessListener(function(response) {
  fetch('<?= APP_URL ?>/subscribe/kkiapay', {
    method: 'POST',
    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
    body: new URLSearchParams({
      transaction_id: response.transactionId,
      plan: response.data,
      _csrf_token: '<?= htmlspecialchars(Session::csrfToken()) ?>'
    })
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      window.location.href = '<?= APP_URL ?>/dashboard?paiement=ok';
    } else {
      alert('Erreur lors de la validation du paiement. Contactez le support : contact@yvris.net');
    }
  });
});
</script>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layouts/main.php';
