<?php
// Get categories for navigation
$categoryModel = new Category();
$navCategories = $categoryModel->all('name ASC');
?>
<header class="w-full">
    <!-- Top Bar -->
    <div class="bg-gradient-to-r from-slate-900 to-slate-800 text-white py-2 hidden md:block">
        <div class="container mx-auto px-4 flex justify-between items-center text-xs">
            <div class="flex items-center space-x-4">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <?= date('d M, Y') ?>
                </span>
                <span class="text-slate-400">|</span>
                <span>Trujillo, La Libertad</span>
            </div>
            <div class="flex items-center space-x-4">
                <a href="#" class="hover:text-blue-400 transition-colors">Contacto</a>
                <a href="#" class="hover:text-blue-400 transition-colors">Publicidad</a>
                <div class="flex items-center space-x-2 ml-4">
                    <a href="#" class="hover:text-blue-400 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                    <a href="#" class="hover:text-blue-400 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                    <a href="#" class="hover:text-red-400 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Ad Banner - Se oculta al hacer scroll -->
    <div class="bg-slate-50 py-4 border-b border-slate-200">
        <?php include VIEWS_PATH . 'partials/ad_banner.php'; ?>
        <?php renderAd('header'); ?>
    </div>

    <!-- Sticky Header (Logo + Nav) -->
    <div class="sticky top-0 z-50 bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <!-- Logo and Search -->
            <div class="flex items-center justify-between py-4">
                <a href="<?= APP_URL ?>" class="flex items-center space-x-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl flex items-center justify-center shadow-lg group-hover:shadow-blue-200 transition-shadow">
                        <span class="text-white font-black text-2xl">N</span>
                    </div>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-black text-slate-900 tracking-tight"><?= APP_NAME ?></h1>
                        <p class="text-xs text-slate-500 font-medium tracking-wider uppercase"><?= APP_DESC ?></p>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="hidden lg:flex items-center flex-1 max-w-lg mx-8">
                    <form action="<?= APP_URL ?>/buscar" method="GET" class="relative w-full">
                        <input
                            type="text"
                            name="q"
                            placeholder="Buscar noticias..."
                            value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
                            class="w-full px-5 py-3 pl-12 bg-slate-100 border-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all text-sm"
                        >
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMenu()" class="lg:hidden p-2 rounded-xl hover:bg-slate-100 transition-colors">
                    <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- CTA Button -->
                <div class="hidden lg:block">
                    <a href="#newsletter" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white text-sm font-semibold rounded-xl hover:bg-blue-700 transition-colors shadow-lg shadow-blue-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                        Suscribirse
                    </a>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="border-t border-slate-100">
            <div class="container mx-auto px-4">
                <div id="mobileMenu" class="hidden lg:block">
                    <ul class="flex flex-col lg:flex-row lg:items-center lg:space-x-1 py-3">
                        <li>
                            <a href="<?= APP_URL ?>" class="flex items-center px-4 py-2.5 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg font-semibold transition-all text-sm">
                                <svg class="w-4 h-4 mr-2 lg:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <?php foreach ($navCategories as $cat): ?>
                        <li>
                            <a href="<?= APP_URL ?>/categoria/<?= $cat['slug'] ?>" class="flex items-center px-4 py-2.5 text-slate-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg font-semibold transition-all text-sm">
                                <span class="w-2 h-2 rounded-full <?= $cat['color'] ?> mr-2 lg:hidden"></span>
                                <?= htmlspecialchars($cat['name']) ?>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<script>
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}
</script>
