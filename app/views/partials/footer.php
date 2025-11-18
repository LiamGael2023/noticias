<?php
// Get categories for footer
$categoryModel = new Category();
$footerCategories = $categoryModel->all('name ASC');
?>
<footer class="bg-gray-900 text-white mt-12">
    <!-- Pre-Footer Ad -->
    <div class="bg-gray-100 py-6">
        <?php renderAd('pre-footer'); ?>
    </div>

    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About -->
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold">N</span>
                    </div>
                    <span class="text-xl font-bold"><?= APP_NAME ?></span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed">
                    Portal de noticias dedicado a la investigación periodística y seguimiento
                    de proyectos de desarrollo regional, con enfoque en Chavimochic y la
                    región La Libertad.
                </p>
            </div>

            <!-- Categories -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Categorías</h3>
                <ul class="space-y-2">
                    <?php foreach ($footerCategories as $cat): ?>
                    <li>
                        <a href="<?= APP_URL ?>/categoria/<?= $cat['slug'] ?>" class="text-gray-400 hover:text-white transition-colors text-sm">
                            <?= htmlspecialchars($cat['name']) ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Enlaces</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Sobre Nosotros</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Contacto</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Publicidad</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Términos y Condiciones</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition-colors text-sm">Política de Privacidad</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contacto</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start space-x-2">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>Trujillo, La Libertad, Perú</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span>contacto@noticiasinvestiga.com</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <span>+51 944 123 456</span>
                    </li>
                </ul>

                <!-- Social Links -->
                <div class="flex space-x-3 mt-4">
                    <a href="#" class="p-2 bg-gray-800 rounded-lg hover:bg-blue-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                        </svg>
                    </a>
                    <a href="#" class="p-2 bg-gray-800 rounded-lg hover:bg-blue-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                        </svg>
                    </a>
                    <a href="#" class="p-2 bg-gray-800 rounded-lg hover:bg-red-600 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer Ad -->
        <div class="mt-8 pt-8 border-t border-gray-800">
            <?php renderAd('footer'); ?>
        </div>

        <!-- Copyright -->
        <div class="mt-8 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
            <p>&copy; <?= date('Y') ?> <?= APP_NAME ?>. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
