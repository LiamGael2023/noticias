<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? htmlspecialchars($title) . ' - ' : '' ?><?= APP_NAME ?></title>
    <meta name="description" content="Portal de noticias de investigación sobre proyectos de desarrollo regional, Chavimochic y avances en infraestructura, agricultura y tecnología en La Libertad, Perú.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
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

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 5px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.5s ease-out;
        }

        /* Image loading placeholder */
        img {
            background: linear-gradient(110deg, #f1f5f9 8%, #e2e8f0 18%, #f1f5f9 33%);
            background-size: 200% 100%;
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">
    <?php include VIEWS_PATH . 'partials/header.php'; ?>

    <main class="min-h-screen">
        <?= $content ?>
    </main>

    <?php include VIEWS_PATH . 'partials/footer.php'; ?>

    <!-- Back to top button -->
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            class="fixed bottom-6 right-6 p-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition-all hover:scale-110 opacity-0 invisible"
            id="backToTop">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    <script>
        // Back to top button visibility
        window.addEventListener('scroll', function() {
            const btn = document.getElementById('backToTop');
            if (window.scrollY > 300) {
                btn.classList.remove('opacity-0', 'invisible');
                btn.classList.add('opacity-100', 'visible');
            } else {
                btn.classList.add('opacity-0', 'invisible');
                btn.classList.remove('opacity-100', 'visible');
            }
        });
    </script>
</body>
</html>
