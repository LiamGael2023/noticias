<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <!-- Featured News Section - 1 Principal + 3 Secundarias -->
    <section class="mb-10">
        <?php if (!empty($featuredNews)): ?>
            <!-- Main Featured - Full width -->
            <div class="mb-4">
                <?php renderNewsCard($featuredNews[0], 'featured'); ?>
            </div>

            <!-- 3 Secondary Featured -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <?php if (isset($featuredNews[1])): ?>
                <div>
                    <?php renderNewsCard($featuredNews[1], 'secondary'); ?>
                </div>
                <?php endif; ?>

                <?php if (isset($featuredNews[2])): ?>
                <div>
                    <?php renderNewsCard($featuredNews[2], 'secondary'); ?>
                </div>
                <?php endif; ?>

                <?php if (isset($featuredNews[3])): ?>
                <div>
                    <?php renderNewsCard($featuredNews[3], 'secondary'); ?>
                </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </section>

    <!-- Main Content with Sidebar -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- News List -->
        <div class="lg:col-span-2">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 pb-2 border-b-2 border-blue-600">
                Últimas Noticias
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($regularNews as $news): ?>
                    <?php renderNewsCard($news); ?>
                <?php endforeach; ?>
            </div>
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
