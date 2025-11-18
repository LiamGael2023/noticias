<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Search Header -->
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
                <li class="text-slate-900 font-medium">Búsqueda</li>
            </ol>
        </nav>

        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-4">
            Resultados de búsqueda
        </h1>
        <?php if (!empty($term)): ?>
            <p class="text-slate-600 text-lg">
                <?= count($results) ?> <?= count($results) === 1 ? 'resultado' : 'resultados' ?> para "<span class="font-semibold text-slate-900"><?= htmlspecialchars($term) ?></span>"
            </p>
        <?php endif; ?>
    </div>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Results -->
        <div class="lg:col-span-2">
            <?php if (!empty($results)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($results as $item): ?>
                        <?php renderNewsCard($item); ?>
                    <?php endforeach; ?>
                </div>
            <?php elseif (!empty($term)): ?>
                <div class="text-center py-16 bg-white rounded-2xl border border-slate-100">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-slate-500 text-lg font-medium">
                        No se encontraron resultados
                    </p>
                    <p class="text-slate-400 text-sm mt-2">
                        Intenta con otros términos de búsqueda
                    </p>
                    <a href="<?= APP_URL ?>" class="inline-flex items-center mt-6 px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver al inicio
                    </a>
                </div>
            <?php else: ?>
                <div class="text-center py-16 bg-white rounded-2xl border border-slate-100">
                    <svg class="w-16 h-16 mx-auto text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-slate-500 text-lg font-medium">
                        Ingresa un término de búsqueda
                    </p>
                    <p class="text-slate-400 text-sm mt-2">
                        Usa la barra de búsqueda para encontrar noticias
                    </p>
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
