<?php
$currentPage = 'news';
ob_start();
?>

<div class="flex items-center justify-between mb-6">
    <div>
        <p class="text-slate-500"><?= count($news ?? []) ?> noticias en total</p>
    </div>
    <a href="<?= APP_URL ?>/admin/news/create" class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nueva Noticia
    </a>
</div>

<?php if (!empty($success)): ?>
<div class="bg-green-50 border border-green-200 text-green-600 px-4 py-3 rounded-xl mb-6 text-sm">
    <?= htmlspecialchars($success) ?>
</div>
<?php endif; ?>

<?php if (!empty($error)): ?>
<div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
    <?= htmlspecialchars($error) ?>
</div>
<?php endif; ?>

<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Título</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Categoría</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Fecha</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Vistas</th>
                <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php if (!empty($news)): ?>
                <?php foreach ($news as $item): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <?php if (!empty($item['image'])): ?>
                            <img src="<?= APP_URL ?>/uploads/<?= $item['image'] ?>" alt="" class="w-12 h-12 rounded-lg object-cover">
                            <?php else: ?>
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <?php endif; ?>
                            <div>
                                <p class="font-medium text-slate-900"><?= htmlspecialchars($item['title']) ?></p>
                                <p class="text-sm text-slate-500"><?= htmlspecialchars($item['slug']) ?></p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">
                        <?= htmlspecialchars($item['category_name'] ?? 'Sin categoría') ?>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-xs rounded-full <?= $item['status'] === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' ?>">
                            <?= $item['status'] === 'published' ? 'Publicado' : 'Borrador' ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">
                        <?= date('d/m/Y', strtotime($item['created_at'])) ?>
                    </td>
                    <td class="px-6 py-4 text-sm text-slate-600">
                        <?= number_format($item['views'] ?? 0) ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="<?= APP_URL ?>/noticia/<?= $item['slug'] ?>" target="_blank" class="p-2 text-slate-400 hover:text-slate-600" title="Ver">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                            </a>
                            <a href="<?= APP_URL ?>/admin/news/edit/<?= $item['id'] ?>" class="p-2 text-blue-600 hover:text-blue-700" title="Editar">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </a>
                            <form method="POST" action="<?= APP_URL ?>/admin/news/delete/<?= $item['id'] ?>" onsubmit="return confirm('¿Estás seguro de eliminar esta noticia?')" class="inline">
                                <button type="submit" class="p-2 text-red-600 hover:text-red-700" title="Eliminar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="px-6 py-8 text-center text-slate-500">
                        No hay noticias aún. <a href="<?= APP_URL ?>/admin/news/create" class="text-blue-600 hover:underline">Crear la primera</a>
                    </td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'admin/layouts/admin.php';
?>
