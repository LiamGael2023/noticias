<?php
include VIEWS_PATH . 'partials/news_card.php';
include VIEWS_PATH . 'partials/ad_banner.php';

ob_start();
?>

<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <article class="lg:col-span-2">
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
                    <li>
                        <a href="<?= APP_URL ?>/categoria/<?= $news['category_slug'] ?>" class="hover:text-blue-600 transition-colors">
                            <?= htmlspecialchars($news['category_name']) ?>
                        </a>
                    </li>
                    <li>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </li>
                    <li class="text-slate-900 truncate max-w-[200px] font-medium"><?= htmlspecialchars($news['title']) ?></li>
                </ol>
            </nav>

            <!-- Article Header -->
            <header class="mb-8">
                <span class="inline-block px-4 py-1.5 bg-blue-600 text-white text-xs font-bold rounded-full mb-4 uppercase tracking-wider">
                    <?= htmlspecialchars($news['category_name']) ?>
                </span>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-black text-slate-900 mb-6 leading-tight">
                    <?= htmlspecialchars($news['title']) ?>
                </h1>
                <p class="text-xl text-slate-600 mb-6 leading-relaxed">
                    <?= htmlspecialchars($news['excerpt']) ?>
                </p>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between pb-6 border-b border-slate-200">
                    <div class="flex items-center mb-4 sm:mb-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mr-4 shadow-lg">
                            <span class="text-white font-bold text-lg">
                                <?= strtoupper(substr($news['author'], 0, 1)) ?>
                            </span>
                        </div>
                        <div>
                            <p class="font-semibold text-slate-900"><?= htmlspecialchars($news['author']) ?></p>
                            <p class="text-sm text-slate-500"><?= date('d M, Y', strtotime($news['created_at'])) ?> • <?= $news['read_time'] ?> min de lectura</p>
                        </div>
                    </div>
                    <!-- Share buttons -->
                    <div class="flex items-center space-x-2">
                        <span class="text-sm text-slate-500 mr-2">Compartir:</span>
                        <a href="https://twitter.com/intent/tweet?url=<?= urlencode(APP_URL . '/noticia/' . $news['slug']) ?>&text=<?= urlencode($news['title']) ?>" target="_blank" class="p-2.5 bg-slate-100 hover:bg-blue-500 hover:text-white text-slate-600 rounded-xl transition-all" title="Compartir en Twitter">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(APP_URL . '/noticia/' . $news['slug']) ?>" target="_blank" class="p-2.5 bg-slate-100 hover:bg-blue-700 hover:text-white text-slate-600 rounded-xl transition-all" title="Compartir en Facebook">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/?text=<?= urlencode($news['title'] . ' ' . APP_URL . '/noticia/' . $news['slug']) ?>" target="_blank" class="p-2.5 bg-slate-100 hover:bg-green-500 hover:text-white text-slate-600 rounded-xl transition-all" title="Compartir en WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Featured Image -->
            <div class="relative w-full h-[300px] md:h-[450px] rounded-2xl overflow-hidden mb-8 shadow-xl">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>" class="w-full h-full object-cover">
            </div>

            <!-- Article Content -->
            <div class="prose prose-lg max-w-none mb-10 text-slate-700 leading-relaxed">
                <?= $news['content'] ?>
            </div>

            <!-- Mid Article Ad -->
            <div class="my-10">
                <?php renderAd('mid-article'); ?>
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap items-center gap-2 mb-10 pb-8 border-b border-slate-200">
                <span class="text-sm font-semibold text-slate-700 mr-2">Etiquetas:</span>
                <a href="<?= APP_URL ?>/categoria/<?= $news['category_slug'] ?>" class="px-4 py-2 bg-blue-50 text-blue-600 text-sm font-medium rounded-xl hover:bg-blue-100 transition-colors">
                    <?= htmlspecialchars($news['category_name']) ?>
                </a>
                <span class="px-4 py-2 bg-slate-100 text-slate-600 text-sm font-medium rounded-xl">Chavimochic</span>
                <span class="px-4 py-2 bg-slate-100 text-slate-600 text-sm font-medium rounded-xl">La Libertad</span>
            </div>

            <!-- Related News -->
            <?php if (!empty($relatedNews)): ?>
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
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
