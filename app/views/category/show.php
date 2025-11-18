<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Category Header -->
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-4">
            <span class="w-4 h-4 rounded-full <?= $category['color'] ?>"></span>
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                <?= htmlspecialchars($category['name']) ?>
            </h1>
        </div>
        <p class="text-gray-600">
            <?= count($news) ?> <?= count($news) === 1 ? 'noticia' : 'noticias' ?> encontradas
        </p>
    </div>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- News List -->
        <div class="lg:col-span-2">
            <?php if (!empty($news)): ?>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php foreach ($news as $index => $item): ?>
                        <?php renderNewsCard($item); ?>

                        <?php if (($index + 1) % 4 === 0 && $index < count($news) - 1): ?>
                            <div class="md:col-span-2 my-4">
                                <?php renderAd('in-feed'); ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

                <?php if (count($news) > 0 && count($news) % 4 !== 0): ?>
                    <div class="mt-6">
                        <?php renderAd('in-feed'); ?>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">
                        No hay noticias en esta categoría por el momento.
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
