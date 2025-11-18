<?php
include VIEWS_PATH . 'partials/news_card.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Featured News Section -->
    <section class="mb-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <?php if (!empty($featuredNews)): ?>
                <!-- Main Featured -->
                <div class="lg:row-span-2">
                    <?php renderNewsCard($featuredNews[0], 'featured'); ?>
                </div>

                <!-- Secondary Featured -->
                <div class="grid grid-cols-1 gap-4">
                    <?php for ($i = 1; $i < count($featuredNews); $i++): ?>
                        <?php renderNewsCard($featuredNews[$i], 'secondary'); ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- News List -->
        <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-blue-600">
                Últimas Noticias
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($regularNews as $index => $news): ?>
                    <?php renderNewsCard($news); ?>

                    <?php if (($index + 1) % 4 === 0 && $index < count($regularNews) - 1): ?>
                        <div class="md:col-span-2 my-4">
                            <?php renderAd('in-feed'); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <?php if (count($regularNews) > 0 && count($regularNews) % 4 !== 0): ?>
                <div class="mt-6">
                    <?php renderAd('in-feed'); ?>
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
