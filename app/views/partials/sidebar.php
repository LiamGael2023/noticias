<aside class="space-y-6">
    <!-- Top Sidebar Ad -->
    <div class="hidden lg:block">
        <?php renderAd('sidebar-top'); ?>
    </div>

    <!-- Recent News -->
    <div class="bg-white rounded-xl shadow-sm p-4">
        <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b">
            Noticias Recientes
        </h3>
        <ul class="space-y-4">
            <?php foreach ($recentNews as $index => $news): ?>
            <li class="flex gap-3">
                <span class="flex-shrink-0 w-8 h-8 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center font-bold text-sm">
                    <?= $index + 1 ?>
                </span>
                <div class="flex-1 min-w-0">
                    <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>" class="text-sm font-medium text-gray-800 hover:text-blue-600 transition-colors line-clamp-2">
                        <?= htmlspecialchars($news['title']) ?>
                    </a>
                    <p class="text-xs text-gray-500 mt-1"><?= date('d/m/Y', strtotime($news['created_at'])) ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Middle Sidebar Ad - Sticky -->
    <div class="sticky top-4 hidden lg:block">
        <?php renderAd('sidebar-middle'); ?>
    </div>

    <!-- Categories Widget -->
    <div class="bg-white rounded-xl shadow-sm p-4">
        <h3 class="text-lg font-bold text-gray-900 mb-4 pb-2 border-b">
            Categorías
        </h3>
        <ul class="space-y-2">
            <?php foreach ($categories as $cat): ?>
            <li>
                <a href="<?= APP_URL ?>/categoria/<?= $cat['slug'] ?>" class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition-colors group">
                    <span class="flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full <?= $cat['color'] ?>"></span>
                        <span class="text-sm text-gray-700 group-hover:text-blue-600">
                            <?= htmlspecialchars($cat['name']) ?>
                        </span>
                    </span>
                    <svg class="w-4 h-4 text-gray-400 group-hover:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Newsletter Signup -->
    <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-xl shadow-sm p-4 text-white">
        <h3 class="text-lg font-bold mb-2">Suscríbete</h3>
        <p class="text-sm text-blue-100 mb-4">
            Recibe las últimas noticias en tu correo
        </p>
        <form class="space-y-2">
            <input
                type="email"
                placeholder="tu@email.com"
                class="w-full px-3 py-2 rounded-lg text-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-white"
            >
            <button type="submit" class="w-full px-3 py-2 bg-white text-blue-600 rounded-lg text-sm font-semibold hover:bg-blue-50 transition-colors">
                Suscribirse
            </button>
        </form>
    </div>

    <!-- Bottom Sidebar Ad -->
    <div class="hidden lg:block">
        <?php renderAd('sidebar-bottom'); ?>
    </div>
</aside>
