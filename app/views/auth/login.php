<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-2xl mb-4">
                <span class="text-white font-black text-3xl">N</span>
            </div>
            <h1 class="text-2xl font-bold text-white"><?= APP_NAME ?></h1>
            <p class="text-slate-400 text-sm">Panel de Administración</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <h2 class="text-xl font-bold text-slate-900 mb-6 text-center">Iniciar Sesión</h2>

            <?php if (!empty($error)): ?>
            <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl mb-6 text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>

            <form method="POST" action="<?= APP_URL ?>/admin/login" class="space-y-5">
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Usuario</label>
                    <input type="text" name="username" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Ingresa tu usuario">
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Contraseña</label>
                    <input type="password" name="password" required
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Ingresa tu contraseña">
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
                    Ingresar
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="<?= APP_URL ?>" class="text-sm text-slate-500 hover:text-blue-600 transition-colors">
                    ← Volver al sitio
                </a>
            </div>
        </div>

        <p class="text-center text-slate-500 text-xs mt-6">
            © <?= date('Y') ?> <?= APP_NAME ?>
        </p>
    </div>
</body>
</html>
