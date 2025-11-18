<?php
/**
 * News Card Component - Modern Design
 */

if (!function_exists('renderNewsCard')) {
function renderNewsCard($news, $variant = 'default') {
    if ($variant === 'featured') {
        ?>
        <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>" class="block">
            <article class="group relative overflow-hidden rounded-3xl bg-slate-900 h-[450px] md:h-[520px] shadow-2xl cursor-pointer">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-110 group-hover:opacity-60 transition-all duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-full uppercase tracking-wider">
                            <?= htmlspecialchars($news['category_name']) ?>
                        </span>
                        <span class="text-slate-300 text-sm"><?= $news['read_time'] ?> min lectura</span>
                    </div>
                    <h2 class="text-2xl md:text-4xl font-black text-white mb-4 group-hover:text-blue-300 transition-colors leading-tight">
                        <?= htmlspecialchars($news['title']) ?>
                    </h2>
                    <p class="text-slate-300 text-sm md:text-base mb-6 line-clamp-2 leading-relaxed">
                        <?= htmlspecialchars($news['excerpt']) ?>
                    </p>
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-slate-700 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm"><?= strtoupper(substr($news['author'], 0, 1)) ?></span>
                        </div>
                        <div>
                            <p class="text-white font-semibold text-sm"><?= htmlspecialchars($news['author']) ?></p>
                            <p class="text-slate-400 text-xs"><?= date('d M, Y', strtotime($news['created_at'])) ?></p>
                        </div>
                    </div>
                </div>
            </article>
        </a>
        <?php
        return;
    }

    if ($variant === 'secondary') {
        ?>
        <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>" class="block h-full">
            <div class="group relative overflow-hidden rounded-2xl bg-slate-900 h-[220px] md:h-[248px] shadow-xl cursor-pointer">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="absolute inset-0 w-full h-full object-cover opacity-50 group-hover:scale-110 group-hover:opacity-60 transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/50 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5">
                    <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full mb-3 uppercase tracking-wider">
                        <?= htmlspecialchars($news['category_name']) ?>
                    </span>
                    <h3 class="text-lg font-bold text-white group-hover:text-blue-300 transition-colors line-clamp-2 leading-snug">
                        <?= htmlspecialchars($news['title']) ?>
                    </h3>
                    <div class="flex items-center text-xs text-slate-400 mt-3">
                        <span><?= date('d M, Y', strtotime($news['created_at'])) ?></span>
                        <span class="mx-2">•</span>
                        <span><?= $news['read_time'] ?> min</span>
                    </div>
                </div>
            </div>
        </a>
        <?php
        return;
    }

    // Default card - Modern style
    ?>
    <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>" class="block">
        <article class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-slate-100 cursor-pointer h-full">
            <div class="relative h-52 overflow-hidden">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                <span class="absolute top-4 left-4 px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-full uppercase tracking-wider">
                    <?= htmlspecialchars($news['category_name']) ?>
                </span>
            </div>
            <div class="p-5">
                <h3 class="text-lg font-bold text-slate-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-3 leading-snug">
                    <?= htmlspecialchars($news['title']) ?>
                </h3>
                <p class="text-sm text-slate-600 line-clamp-2 mb-4 leading-relaxed">
                    <?= htmlspecialchars($news['excerpt']) ?>
                </p>
                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <div class="flex items-center">
                        <div class="w-8 h-8 bg-slate-200 rounded-full flex items-center justify-center mr-2">
                            <span class="text-slate-600 font-semibold text-xs"><?= strtoupper(substr($news['author'], 0, 1)) ?></span>
                        </div>
                        <span class="text-xs text-slate-600 font-medium"><?= htmlspecialchars($news['author']) ?></span>
                    </div>
                    <div class="flex items-center text-xs text-slate-500">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <?= $news['read_time'] ?> min
                    </div>
                </div>
            </div>
        </article>
    </a>
    <?php
}
}
