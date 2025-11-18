<?php
/**
 * Ad Banner Component
 */

if (!function_exists('renderAd')) {
function renderAd($position, $className = '') {
    $sizes = Ad::getSizes();
    $size = isset($sizes[$position]) ? $sizes[$position] : $sizes['header'];

    $widthClass = '';
    $heightClass = '';

    switch ($position) {
        case 'header':
        case 'in-feed':
        case 'mid-article':
        case 'pre-footer':
        case 'footer':
            $widthClass = 'w-full max-w-[728px]';
            $heightClass = 'h-[90px]';
            break;
        case 'sidebar-top':
        case 'sidebar-bottom':
            $widthClass = 'w-[300px]';
            $heightClass = 'h-[250px]';
            break;
        case 'sidebar-middle':
            $widthClass = 'w-[300px]';
            $heightClass = 'h-[600px]';
            break;
    }

    $positionLabel = ucwords(str_replace('-', ' ', $position));
    ?>
    <div class="flex justify-center <?= $className ?>">
        <div class="<?= $widthClass ?> <?= $heightClass ?> bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center text-gray-500 hover:border-gray-400 hover:bg-gray-100 transition-all duration-300 cursor-pointer">
            <span class="text-xs font-semibold uppercase tracking-wider mb-1">Publicidad</span>
            <span class="text-lg font-bold"><?= $size['label'] ?></span>
            <span class="text-xs mt-1"><?= $positionLabel ?></span>
        </div>
    </div>
    <?php
}
}
