<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Category Header -->
    <div class="mb-10">
        <!-- Breadcrumb -->
        <nav class="text-sm mb-6">
            <ol class="flex items-center space-x-2 text-slate-500">
                <li>
                    <a href="<?= APP_URL ?>" class="hover:text-blue-600 transition-colors">Inicio</a>
                </li>
                <li>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </li>
                <li class="text-slate-900 font-medium"><?= htmlspecialchars($category['name']) ?></li>
            </ol>
        </nav>

        <div class="flex items-center gap-4 mb-4">
            <span class="w-5 h-5 rounded-full <?= $category['color'] ?> shadow-md"></span>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900">
                <?= htmlspecialchars($category['name']) ?>
            </h1>
        </div>
        <p class="text-slate-600 text-lg">
            <?= count($news) ?> <?= count($news) === 1 ? 'noticia encontrada' : 'noticias encontradas' ?>
        </p>
    </div>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- News List -->
        <div class="lg:col-span-2">
            <?php if (!empty($news)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($news as $item): ?>
                        <?php renderNewsCard($item); ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-16 bg-white rounded-2xl border border-slate-100">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <p class="text-slate-500 text-lg font-medium">
                        No hay noticias en esta categoría
                    </p>
                    <p class="text-slate-400 text-sm mt-2">
                        Vuelve pronto para ver nuevo contenido
                    </p>
                    <a href="<?= APP_URL ?>" class="inline-flex items-center mt-6 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver al inicio
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <?php include VIEWS_PATH . 'partials/sidebar.php'; ?>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'layouts/main.php';
