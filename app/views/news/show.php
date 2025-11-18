<?php
include VIEWS_PATH . 'partials/news_card.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <article class="lg:col-span-2">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-4">
                <ol class="flex items-center space-x-2 text-gray-500">
                    <li>
                        <a href="<?= APP_URL ?>" class="hover:text-blue-600">Inicio</a>
                    </li>
                    <li>/</li>
                    <li>
                        <a href="<?= APP_URL ?>/categoria/<?= $news['category_slug'] ?>" class="hover:text-blue-600">
                            <?= htmlspecialchars($news['category_name']) ?>
                        </a>
                    </li>
                    <li>/</li>
                    <li class="text-gray-900 truncate max-w-[200px]"><?= htmlspecialchars($news['title']) ?></li>
                </ol>
            </nav>

            <!-- Article Header -->
            <header class="mb-6">
                <span class="inline-block px-3 py-1 bg-blue-600 text-white text-sm font-semibold rounded-full mb-4">
                    <?= htmlspecialchars($news['category_name']) ?>
                </span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-tight">
                    <?= htmlspecialchars($news['title']) ?>
                </h1>
                <p class="text-lg text-gray-600 mb-4">
                    <?= htmlspecialchars($news['excerpt']) ?>
                </p>
                <div class="flex items-center text-sm text-gray-500 pb-4 border-b">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                            <span class="text-gray-600 font-semibold">
                                <?= strtoupper(substr($news['author'], 0, 1)) ?>
                            </span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900"><?= htmlspecialchars($news['author']) ?></p>
                            <p><?= date('d/m/Y', strtotime($news['created_at'])) ?> • <?= $news['read_time'] ?> min de lectura</p>
                        </div>
                    </div>
                    <!-- Share buttons -->
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="p-2 hover:bg-gray-100 rounded-full" title="Compartir en Twitter">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </button>
                        <button class="p-2 hover:bg-gray-100 rounded-full" title="Compartir en Facebook">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            <div class="relative w-full h-[300px] md:h-[400px] rounded-xl overflow-hidden mb-6">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="w-full h-full object-cover">
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-8 text-gray-700 leading-relaxed">
                <?= $news['content'] ?>
            </div>

            <!-- Mid Article Ad -->
            <div class="my-8">
                <?php renderAd('mid-article'); ?>
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-8">
                <span class="text-sm font-medium text-gray-700 mr-2">Etiquetas:</span>
                <a href="<?= APP_URL ?>/categoria/<?= $news['category_slug'] ?>" class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full hover:bg-blue-100 hover:text-blue-600 transition-colors">
                    <?= htmlspecialchars($news['category_name']) ?>
                </a>
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">Chavimochic</span>
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">La Libertad</span>
            </div>

            <!-- Related News -->
            <?php if (!empty($relatedNews)): ?>
            <section class="border-t pt-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">
                    Noticias Relacionadas
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <?php foreach ($relatedNews as $related): ?>
                        <?php renderNewsCard($related); ?>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
        </article>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <?php include VIEWS_PATH . 'partials/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'layouts/main.php';
