<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página no encontrada | <?= APP_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-9xl font-bold text-gray-200">404</h1>
            <h2 class="text-2xl font-bold text-gray-900 mt-4">Página no encontrada</h2>
            <p class="text-gray-600 mt-2">Lo sentimos, la página que buscas no existe.</p>
            <a href="<?= APP_URL ?>" class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                Volver al Inicio
            </a>
        </div>
    </div>
</body>
</html>
