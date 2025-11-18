<?php
// Get categories for navigation
$categoryModel = new Category();
$navCategories = $categoryModel->all('name ASC');
?>
<header class="w-full">
    <!-- Top Ad Banner -->
    <div class="bg-gray-50 py-3 border-b">
        <?php include VIEWS_PATH . 'partials/ad_banner.php'; ?>
        <?php renderAd('header'); ?>
    </div>

    <!-- Main Header -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4">
            <!-- Logo and Search -->
            <div class="flex items-center justify-between py-4">
                <a href="<?= APP_URL ?>" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">N</span>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900"><?= APP_NAME ?></h1>
                        <p class="text-xs text-gray-500"><?= APP_DESC ?></p>
                    </div>
                </a>

                <!-- Search Bar -->
                <div class="hidden md:flex items-center flex-1 max-w-md mx-8">
                    <form action="<?= APP_URL ?>/buscar" method="GET" class="relative w-full">
                        <input
                            type="text"
                            name="q"
                            placeholder="Buscar noticias..."
                            value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>"
                            class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                        <svg
                            class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-gray-400"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </form>
                </div>

                <!-- Mobile Menu Button -->
                <button onclick="toggleMenu()" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>

                <!-- Social Links -->
                <div class="hidden md:flex items-center space-x-3">
                    <a href="#" class="p-2 text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="p-2 text-gray-600 hover:text-blue-600 transition-colors">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Navigation -->
            <nav id="mobileMenu" class="hidden md:block border-t">
                <ul class="flex flex-col md:flex-row md:items-center md:space-x-1 py-2">
                    <li>
                        <a href="<?= APP_URL ?>" class="block px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                            Inicio
                        </a>
                    </li>
                    <?php foreach ($navCategories as $cat): ?>
                    <li>
                        <a href="<?= APP_URL ?>/categoria/<?= $cat['slug'] ?>" class="block px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-50 rounded-lg font-medium transition-colors">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>

<script>
function toggleMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
}
</script>
