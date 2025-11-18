<?php
/**
 * News Card Component
 */

function renderNewsCard($news, $variant = 'default') {
    if ($variant === 'featured') {
        ?>
        <article class="group relative overflow-hidden rounded-2xl bg-gray-900 h-[400px] md:h-[500px]">
            <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-8">
                <span class="inline-block px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mb-3">
                    <?= htmlspecialchars($news['category_name']) ?>
                </span>
                <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>">
                    <h2 class="text-xl md:text-3xl font-bold text-white mb-3 group-hover:text-blue-300 transition-colors line-clamp-3">
                        <?= htmlspecialchars($news['title']) ?>
                    </h2>
                </a>
                <p class="text-gray-300 text-sm md:text-base mb-4 line-clamp-2">
                    <?= htmlspecialchars($news['excerpt']) ?>
                </p>
                <div class="flex items-center text-sm text-gray-400">
                    <span><?= htmlspecialchars($news['author']) ?></span>
                    <span class="mx-2">•</span>
                    <span><?= date('d/m/Y', strtotime($news['created_at'])) ?></span>
                    <span class="mx-2">•</span>
                    <span><?= $news['read_time'] ?> min lectura</span>
                </div>
            </div>
        </article>
        <?php
        return;
    }

    if ($variant === 'secondary') {
        ?>
        <div class="relative overflow-hidden rounded-xl bg-gray-900 h-[200px] md:h-[242px] group">
            <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent"></div>
            <div class="absolute bottom-0 left-0 right-0 p-4">
                <span class="inline-block px-2 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full mb-2">
                    <?= htmlspecialchars($news['category_name']) ?>
                </span>
                <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>">
                    <h3 class="text-lg font-bold text-white group-hover:text-blue-300 transition-colors line-clamp-2">
                        <?= htmlspecialchars($news['title']) ?>
                    </h3>
                </a>
                <div class="flex items-center text-xs text-gray-400 mt-2">
                    <span><?= date('d/m/Y', strtotime($news['created_at'])) ?></span>
                    <span class="mx-2">•</span>
                    <span><?= $news['read_time'] ?> min</span>
                </div>
            </div>
        </div>
        <?php
        return;
    }

    // Default card
    ?>
    <article class="group bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
        <div class="relative h-48 overflow-hidden">
            <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-3 py-1 bg-blue-600 text-white text-xs font-semibold rounded-full">
                <?= htmlspecialchars($news['category_name']) ?>
            </span>
        </div>
        <div class="p-4">
            <a href="<?= APP_URL ?>/noticia/<?= $news['slug'] ?>">
                <h3 class="text-lg font-bold text-gray-900 group-hover:text-blue-600 transition-colors line-clamp-2 mb-2">
                    <?= htmlspecialchars($news['title']) ?>
                </h3>
            </a>
            <p class="text-sm text-gray-600 line-clamp-2 mb-3">
                <?= htmlspecialchars($news['excerpt']) ?>
            </p>
            <div class="flex items-center justify-between text-xs text-gray-500">
                <span><?= htmlspecialchars($news['author']) ?></span>
                <span><?= $news['read_time'] ?> min</span>
            </div>
        </div>
    </article>
    <?php
}
