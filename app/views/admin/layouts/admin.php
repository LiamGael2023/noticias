<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?> - <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-slate-900 text-white z-50">
        <div class="p-6 border-b border-slate-700">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center">
                    <span class="text-white font-bold text-xl">N</span>
                </div>
                <div>
                    <h1 class="font-bold text-lg"><?= APP_NAME ?></h1>
                    <p class="text-xs text-slate-400">Panel Admin</p>
                </div>
            </div>
        </div>

        <nav class="p-4 space-y-1">
            <a href="<?= APP_URL ?>/admin" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors <?= ($currentPage ?? '') === 'dashboard' ? 'bg-slate-800 text-blue-400' : 'text-slate-300' ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Dashboard
            </a>

            <a href="<?= APP_URL ?>/admin/news" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors <?= ($currentPage ?? '') === 'news' ? 'bg-slate-800 text-blue-400' : 'text-slate-300' ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                Noticias
            </a>

            <a href="<?= APP_URL ?>/admin/categories" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors <?= ($currentPage ?? '') === 'categories' ? 'bg-slate-800 text-blue-400' : 'text-slate-300' ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                Categorías
            </a>

            <a href="<?= APP_URL ?>/admin/ads" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors <?= ($currentPage ?? '') === 'ads' ? 'bg-slate-800 text-blue-400' : 'text-slate-300' ?>">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/>
                </svg>
                Publicidad
            </a>

            <div class="pt-4 mt-4 border-t border-slate-700">
                <a href="<?= APP_URL ?>" target="_blank" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 transition-colors text-slate-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                    Ver Sitio
                </a>

                <a href="<?= APP_URL ?>/admin/logout" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-600 transition-colors text-slate-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                    </svg>
                    Cerrar Sesión
                </a>
            </div>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <!-- Header -->
        <header class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-slate-900"><?= $title ?? 'Dashboard' ?></h1>
                <p class="text-slate-500 text-sm">Bienvenido, <?= $_SESSION['user_name'] ?? 'Admin' ?></p>
            </div>
        </header>

        <!-- Content -->
        <?= $content ?>
    </main>
</body>
</html>
