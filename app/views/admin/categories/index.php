<?php
$currentPage = 'categories';
ob_start();
?>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Create Category Form -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-lg font-bold text-slate-900 mb-4">Nueva Categoría</h2>

            <form method="POST" action="<?= APP_URL ?>/admin/categories/store" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nombre *</label>
                    <input type="text" name="name" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Nombre de la categoría">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Descripción</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Descripción breve"></textarea>
                </div>

                <button type="submit" class="w-full px-4 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    Crear Categoría
                </button>
            </form>
        </div>
    </div>

    <!-- Categories List -->
    <div class="lg:col-span-2">
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
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase tracking-wider">Noticias</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-slate-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                        <tr class="hover:bg-gray-50" id="category-<?= $category['id'] ?>">
                            <td class="px-6 py-4">
                                <div>
                                    <p class="font-medium text-slate-900"><?= htmlspecialchars($category['name']) ?></p>
                                    <p class="text-sm text-slate-500"><?= htmlspecialchars($category['slug']) ?></p>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-600">
                                <?= $category['news_count'] ?? 0 ?>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button onclick="editCategory(<?= $category['id'] ?>, '<?= htmlspecialchars($category['name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($category['description'] ?? '', ENT_QUOTES) ?>')"
                                        class="p-2 text-blue-600 hover:text-blue-700" title="Editar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </button>
                                    <form method="POST" action="<?= APP_URL ?>/admin/categories/delete/<?= $category['id'] ?>" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?')" class="inline">
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
                            <td colspan="3" class="px-6 py-8 text-center text-slate-500">
                                No hay categorías aún. Crea la primera usando el formulario.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-xl p-6 w-full max-w-md mx-4">
        <h3 class="text-lg font-bold text-slate-900 mb-4">Editar Categoría</h3>
        <form id="editForm" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Nombre *</label>
                <input type="text" name="name" id="editName" required
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Descripción</label>
                <textarea name="description" id="editDescription" rows="3"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
            </div>

            <div class="flex items-center justify-end gap-4">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-xl hover:bg-slate-300 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-colors">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function editCategory(id, name, description) {
    document.getElementById('editName').value = name;
    document.getElementById('editDescription').value = description;
    document.getElementById('editForm').action = '<?= APP_URL ?>/admin/categories/update/' + id;
    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

// Close modal on outside click
document.getElementById('editModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeEditModal();
    }
});
</script>

<?php
$content = ob_get_clean();
include VIEWS_PATH . 'admin/layouts/admin.php';
?>
