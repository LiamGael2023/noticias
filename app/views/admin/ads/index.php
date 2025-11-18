<?php
$currentPage = 'ads';
ob_start();
?>

<div class="mb-6">
    <p class="text-slate-500">Gestiona los espacios publicitarios de tu sitio</p>
</div>

<?php if (!empty($success)): ?>
<div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl mb-6 text-sm">
    <?= htmlspecialchars($success) ?>
</div>
<?php endif; ?>

<div class="grid gap-6">
    <?php if (!empty($ads)): ?>
        <?php foreach ($ads as $ad): ?>
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form method="POST" action="<?= APP_URL ?>/admin/ads/update/<?= $ad['id'] ?>">
                <div class="flex items-start justify-between mb-4">
                    <div>
                        <h3 class="font-bold text-slate-900"><?= htmlspecialchars($ad['position']) ?></h3>
                        <p class="text-sm text-slate-500">Tamaño: <?= htmlspecialchars($ad['size']) ?></p>
                    </div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="active" value="1" <?= $ad['active'] ? 'checked' : '' ?>
                            class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-slate-700">Activo</span>
                    </label>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Título</label>
                        <input type="text" name="title" value="<?= htmlspecialchars($ad['title'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="Título del anuncio">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">URL de Imagen</label>
                        <input type="url" name="image_url" value="<?= htmlspecialchars($ad['image_url'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="https://ejemplo.com/imagen.jpg">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">URL de Enlace</label>
                        <input type="url" name="link_url" value="<?= htmlspecialchars($ad['link_url'] ?? '') ?>"
                            class="w-full px-4 py-2 border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm"
                            placeholder="https://ejemplo.com/destino">
                    </div>
                </div>

                <?php if (!empty($ad['image_url'])): ?>
                <div class="mb-4">
                    <p class="text-sm text-slate-500 mb-2">Vista previa:</p>
                    <img src="<?= htmlspecialchars($ad['image_url']) ?>" alt="<?= htmlspecialchars($ad['title'] ?? 'Anuncio') ?>"
                        class="max-h-32 rounded-lg border border-slate-200">
                </div>
                <?php endif; ?>

                <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                    <div class="text-sm text-slate-500">
                        <span>Clicks: <?= number_format($ad['clicks'] ?? 0) ?></span>
                        <span class="mx-2">|</span>
                        <span>Impresiones: <?= number_format($ad['impressions'] ?? 0) ?></span>
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition-colors">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="bg-white rounded-xl shadow-sm p-8 text-center text-slate-500">
            No hay espacios publicitarios configurados.
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'admin/layouts/admin.php';
?>
