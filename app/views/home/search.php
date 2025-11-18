<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Search Header -->
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
            Resultados de búsqueda
        </h1>
        <?php if (!empty($term)): ?>
            <p class="text-gray-600">
                <?= count($results) ?> <?= count($results) === 1 ? 'resultado' : 'resultados' ?> para "<?= htmlspecialchars($term) ?>"
            </p>
        <?php endif; ?>
    </div>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Results -->
        <div class="lg:col-span-2">
            <?php if (!empty($results)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($results as $index => $item): ?>
                        <?php renderNewsCard($item); ?>

                        <?php if (($index + 1) % 4 === 0 && $index < count($results) - 1): ?>
                            <div class="md:col-span-2 my-4">
                                <?php renderAd('in-feed'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php elseif (!empty($term)): ?>
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">
                        No se encontraron resultados para "<?= htmlspecialchars($term) ?>"
                    </p>
                    <p class="text-gray-400 text-sm mt-2">
                        Intenta con otros términos de búsqueda
                    </p>
                </div>
            <?php else: ?>
                <div class="text-center py-12">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <p class="text-gray-500 text-lg">
                        Ingresa un término de búsqueda
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
