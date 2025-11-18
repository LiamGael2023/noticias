<aside class="space-y-6">
    <!-- First Medium Ad (300x600) - Scrolls away -->
    <div class="hidden lg:block">
        <?php renderAd('sidebar-middle'); ?>
    </div>

    <!-- Sticky Container -->
    <div class="lg:sticky lg:top-24 space-y-6">
        <!-- Recent News -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-5">
            <h3 class="text-lg font-bold text-slate-900 mb-4 pb-3 border-b border-slate-100 flex items-center">
                <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Tendencias
            </h3>
            <ul class="space-y-4">
                <?php foreach ($recentNews as $index => $news): ?>
                <li class="group">
                    <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>" class="flex gap-3 p-2 -mx-2 rounded-xl hover:bg-slate-50 transition-colors">
                        <span class="flex-shrink-0 w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 text-white rounded-lg flex items-center justify-center font-bold text-sm shadow-sm">
                            <?= $index + 1 ?>
                        </span>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-slate-800 group-hover:text-blue-600 transition-colors line-clamp-2 leading-snug">
                                <?= htmlspecialchars($news['title']) ?>
                            </p>
                            <p class="text-xs text-slate-500 mt-1.5 flex items-center">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <?= date('d M, Y', strtotime($news['created_at'])) ?>
                            </p>
                        </div>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

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

        <!-- Newsletter Signup -->
        <div id="newsletter" class="bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-700 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full -ml-12 -mb-12"></div>
            <div class="relative">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Newsletter</h3>
                <p class="text-sm text-blue-100 mb-5 leading-relaxed">
                    Recibe las últimas noticias de investigación directamente en tu correo
                </p>
                <form class="space-y-3">
                    <input
                        type="email"
                        placeholder="tu@email.com"
                        class="w-full px-4 py-3 rounded-xl text-slate-900 text-sm focus:outline-none focus:ring-2 focus:ring-white/50 bg-white/95 placeholder-slate-400"
                    >
                    <button type="submit" class="w-full px-4 py-3 bg-white text-blue-600 rounded-xl text-sm font-bold hover:bg-blue-50 transition-colors shadow-lg">
                        Suscribirme Gratis
                    </button>
                </form>
                <p class="text-xs text-blue-200 mt-3 text-center">
                    Sin spam. Cancela cuando quieras.
                </p>
            </div>
        </div>

        <!-- Second Medium Ad (300x600) -->
        <div class="hidden lg:block">
            <?php renderAd('sidebar-middle'); ?>
        </div>
    </div>
</aside>
