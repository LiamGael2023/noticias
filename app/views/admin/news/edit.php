<?php
$currentPage = 'news';
ob_start();
?>

<div class="mb-6">
    <a href="<?= APP_URL ?>/admin/news" class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-700">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Volver a Noticias
    </a>
</div>

<?php if (!empty($error)): ?>
<div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
    <?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<?php if (!empty($success)): ?>
<div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl mb-6 text-sm">
    <?= htmlspecialchars($success) ?>
</div>
<?php endif; ?>

<form method="POST" action="<?= APP_URL ?>/admin/news/update/<?= $news['id'] ?>" enctype="multipart/form-data" class="space-y-6">
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-lg font-bold text-slate-900 mb-4">Información de la Noticia</h2>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Título *</label>
                <input type="text" name="title" required value="<?= htmlspecialchars($news['title']) ?>"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Título de la noticia">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Resumen</label>
                <textarea name="excerpt" rows="3"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Breve resumen de la noticia"><?= htmlspecialchars($news['excerpt'] ?? '') ?></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Contenido *</label>
                <textarea name="content" rows="15" required
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    placeholder="Contenido completo de la noticia"><?= htmlspecialchars($news['content']) ?></textarea>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-slate-900 mb-4">Categoría y Estado</h2>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Categoría *</label>
                    <select name="category_id" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">Seleccionar categoría</option>
                        <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= $news['category_id'] == $category['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Estado</label>
                    <?php $status = $news['status'] ?? 'published'; ?>
                    <select name="status"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="draft" <?= $status === 'draft' ? 'selected' : '' ?>>Borrador</option>
                        <option value="published" <?= $status === 'published' ? 'selected' : '' ?>>Publicado</option>
                    </select>
                </div>

                <div>
                    <label class="flex items-center gap-3">
                        <input type="checkbox" name="featured" value="1" <?= $news['featured'] ? 'checked' : '' ?> class="w-5 h-5 rounded border-slate-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm font-medium text-slate-700">Noticia Destacada</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-slate-900 mb-4">Imagen Principal</h2>

            <?php if (!empty($news['image'])): ?>
            <div class="mb-4">
                <?php
                $imgSrc = (strpos($news['image'], 'http') === 0) ? $news['image'] : APP_URL . '/uploads/' . $news['image'];
                ?>
                <img src="<?= $imgSrc ?>" alt="" class="w-full h-48 object-cover rounded-xl">
                <p class="text-xs text-slate-500 mt-2">Imagen actual</p>
            </div>
            <?php endif; ?>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Cambiar Imagen</label>
                <input type="file" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <p class="text-xs text-slate-500 mt-2">Formatos: JPG, PNG, GIF. Máximo 5MB.</p>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end gap-4">
        <a href="<?= APP_URL ?>/admin/news" class="px-6 py-3 bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition-colors">
            Cancelar
        </a>
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
            Guardar Cambios
        </button>
    </div>
</form>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'admin/layouts/admin.php';
?>
