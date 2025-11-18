<aside class="space-y-6">
    <!-- Medium Ad (300x600) - Scrolls away -->
    <div class="hidden lg:block">
        <?php renderAd('sidebar-middle'); ?>
    </div>

    <!-- Sticky Container -->
    <div class="lg:sticky lg:top-24 space-y-6">
        <!-- Categories Widget -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <h3 class="text-lg font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Categorías
            </h3>
            <ul class="space-y-1">
                <?php foreach ($categories as $cat): ?>
                <li>
                    <a href="<?= APP_URL ?>/categoria/<?= $cat['slug'] ?>" class="flex items-center justify-between p-3 rounded-xl hover:bg-slate-50 transition-all group">
                        <span class="flex items-center gap-3">
                            <span class="w-3 h-3 rounded-full <?= $cat['color'] ?> shadow-sm"></span>
                            <span class="text-sm font-medium text-slate-700 group-hover:text-blue-600 transition-colors">
                                <?= htmlspecialchars($cat['name']) ?>
                            </span>
                        </span>
                        <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</aside>
