<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) . ' - ' : '' ?><?= APP_NAME ?></title>
    <meta name="description" content="Portal de noticias de investigación sobre proyectos de desarrollo regional, Chavimochic y avances en infraestructura, agricultura y tecnología en La Libertad, Perú.">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    <?php include VIEWS_PATH . 'partials/header.php'; ?>

    <main class="min-h-screen">
        <?= $content ?>
    </main>

    <?php include VIEWS_PATH . 'partials/footer.php'; ?>
</body>
</html>
