<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$items = [
    [
        'label' => 'Home',
        'url' => ['/site/index'],
    ],
    [
        'label' => 'Docs',
        'url' => ['/docs/view', 'page' => 'index'],
    ],
    [
        'label' => 'Blog',
        'url' => ['/blog/index'],
    ],
    [
        'label' => 'Projetos',
        'url' => ['/projects/index'],
    ],
    [
        'label' => 'Agente',
        'url' => ['/site/agent'],
    ],
    [
        'label' => 'Apoiar',
        'url' => 'https://crom.run/apoio',
        'linkOptions' => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ],
    [
        'label' => 'Painel',
        'url' => ['/panel/index'],
        'visible' => !Yii::$app->user->isGuest,
    ],
    [
        'label' => 'Perfil',
        'url' => ['/panel/profile'],
        'visible' => !Yii::$app->user->isGuest,
    ],
    [
        'label' => 'Usuários',
        'url' => ['/panel/users'],
        'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity?->role === 'admin'),
    ],

    [
        'label' => 'Logout (' . Html::encode(Yii::$app->user->identity?->username ?? '') . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'logout-link',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ],
];

?>
<header id="header" class="sticky top-0 z-50 bg-white/90 dark:bg-[#030307]/90 backdrop-blur-md border-b border-slate-200 dark:border-amber-900/30 shadow-lg shadow-amber-950/5 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo / Brand -->
            <div class="flex items-center">
                <a href="<?= Yii::$app->homeUrl ?>" class="flex items-center space-x-3 group relative">
                    <div class="relative w-9 h-9">
                        <!-- Primary Logo (normal state, fades out on hover) -->
                        <img src="<?= Url::to('@web/images/logo-primary.png') ?>" alt="CromIA Logo Primary" class="absolute inset-0 h-9 w-auto transform transition-all duration-500 ease-in-out group-hover:opacity-0" style="filter: hue-rotate(135deg) saturate(1.2) contrast(1.1);">
                        <!-- Secondary Logo (hover state, fades in on hover) -->
                        <img src="<?= Url::to('@web/images/logo-secondary.png') ?>" alt="CromIA Logo Secondary" class="absolute inset-0 h-9 w-auto transform transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100 scale-90 group-hover:scale-100" style="filter: hue-rotate(135deg) saturate(1.2) contrast(1.1);">
                    </div>
                    <span class="text-xl font-extrabold bg-gradient-to-r from-rose-500 via-amber-500 to-orange-400 bg-clip-text text-transparent tracking-tight">
                        <?= Html::encode(Yii::$app->name) ?>
                    </span>
                </a>
            </div>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center space-x-8">
                <?php foreach ($items as $item): ?>
                    <?php if (isset($item['visible']) && !$item['visible']) continue; ?>
                    <?php
                        $url = is_array($item['url']) ? Url::to($item['url']) : $item['url'];
                        $options = $item['linkOptions'] ?? [];
                        
                        // Robust active check matching controller id
                        $isActive = false;
                        if (is_array($item['url'])) {
                            $urlRoute = ltrim($item['url'][0], '/');
                            $urlParts = explode('/', $urlRoute);
                            $urlController = $urlParts[0] ?? '';
                            if ($urlController === 'site') {
                                $isActive = (Yii::$app->controller && Yii::$app->controller->route === $urlRoute);
                            } else {
                                $isActive = (Yii::$app->controller && Yii::$app->controller->id === $urlController);
                            }
                        }
                        
                        $class = $isActive 
                            ? 'text-rose-600 dark:text-rose-400 font-semibold border-b-2 border-rose-600 dark:border-rose-400 py-1' 
                            : 'text-slate-600 dark:text-slate-300 hover:text-rose-600 dark:hover:text-amber-400 font-medium transition-colors duration-200 py-1';
                    ?>
                    <a href="<?= $url ?>" 
                       class="<?= $class ?> <?= $options['class'] ?? '' ?>" 
                       <?= isset($options['data-method']) ? 'data-method="' . $options['data-method'] . '"' : '' ?>
                       <?= isset($options['target']) ? 'target="' . $options['target'] . '"' : '' ?>
                       <?= isset($options['rel']) ? 'rel="' . $options['rel'] . '"' : '' ?>>
                        <?= $item['label'] ?>
                    </a>
                <?php endforeach; ?>
                
                <!-- Desktop Theme Toggle -->
                <button id="theme-toggle" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900/50 focus:outline-none rounded-lg text-sm p-1.5 transition duration-200 cursor-pointer flex items-center justify-center ml-2" aria-label="Toggle theme">
                    <span id="theme-toggle-dark-icon" class="material-symbols-outlined hidden text-[20px] leading-none">dark_mode</span>
                    <span id="theme-toggle-light-icon" class="material-symbols-outlined hidden text-[20px] leading-none">light_mode</span>
                </button>
            </nav>

            <!-- Mobile Menu Button & Theme Toggle -->
            <div class="flex items-center space-x-2.5 md:hidden">
                <!-- Mobile Theme Toggle -->
                <button id="theme-toggle-mobile" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-900/50 focus:outline-none rounded-lg text-sm p-1.5 transition duration-200 cursor-pointer flex items-center justify-center" aria-label="Toggle theme">
                    <span id="theme-toggle-dark-icon-mobile" class="material-symbols-outlined hidden text-[20px] leading-none">dark_mode</span>
                    <span id="theme-toggle-light-icon-mobile" class="material-symbols-outlined hidden text-[20px] leading-none">light_mode</span>
                </button>
                <button type="button" id="mobile-menu-btn" class="inline-flex items-center justify-center p-2 rounded-md text-slate-400 hover:text-white hover:bg-slate-900 focus:outline-none transition duration-200" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu Icon -->
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Nav Menu -->
    <div class="hidden md:hidden bg-white dark:bg-[#030307] border-b border-slate-200 dark:border-amber-900/20 px-4 pt-2 pb-4 space-y-1" id="mobile-menu">
        <?php foreach ($items as $item): ?>
            <?php if (isset($item['visible']) && !$item['visible']) continue; ?>
            <?php
                $url = is_array($item['url']) ? Url::to($item['url']) : $item['url'];
                $options = $item['linkOptions'] ?? [];
                
                // Robust active check
                $isActive = false;
                if (is_array($item['url'])) {
                    $urlParts = explode('/', ltrim($item['url'][0], '/'));
                    $urlController = $urlParts[0] ?? '';
                    if ($urlController === 'site') {
                        $isActive = (Yii::$app->controller && Yii::$app->controller->route === ltrim($item['url'][0], '/'));
                    } else {
                        $isActive = (Yii::$app->controller && Yii::$app->controller->id === $urlController);
                    }
                }
                
                $class = $isActive 
                    ? 'block px-3 py-2 rounded-md text-base font-semibold text-rose-600 dark:text-rose-400 bg-slate-100 dark:bg-slate-900/50' 
                    : 'block px-3 py-2 rounded-md text-base font-medium text-slate-600 dark:text-slate-350 hover:text-rose-600 dark:hover:text-amber-400 hover:bg-slate-50 dark:hover:bg-slate-900/30 transition duration-150';
            ?>
            <a href="<?= $url ?>" 
               class="<?= $class ?> <?= $options['class'] ?? '' ?>" 
               <?= isset($options['data-method']) ? 'data-method="' . $options['data-method'] . '"' : '' ?>
               <?= isset($options['target']) ? 'target="' . $options['target'] . '"' : '' ?>
               <?= isset($options['rel']) ? 'rel="' . $options['rel'] . '"' : '' ?>>
                <?= $item['label'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        }

        // Theme toggler elements
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        const themeToggleBtnMobile = document.getElementById('theme-toggle-mobile');
        const themeToggleDarkIconMobile = document.getElementById('theme-toggle-dark-icon-mobile');
        const themeToggleLightIconMobile = document.getElementById('theme-toggle-light-icon-mobile');

        // Explicitly set visibility of icons on page load based on current state of document class
        function updateIcons() {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                // Dark mode: show light_mode icon (sun) to switch to light, hide dark_mode icon (moon)
                themeToggleLightIcon?.classList.remove('hidden');
                themeToggleLightIconMobile?.classList.remove('hidden');
                themeToggleDarkIcon?.classList.add('hidden');
                themeToggleDarkIconMobile?.classList.add('hidden');
            } else {
                // Light mode: show dark_mode icon (moon) to switch to dark, hide light_mode icon (sun)
                themeToggleDarkIcon?.classList.remove('hidden');
                themeToggleDarkIconMobile?.classList.remove('hidden');
                themeToggleLightIcon?.classList.add('hidden');
                themeToggleLightIconMobile?.classList.add('hidden');
            }
        }
        
        updateIcons();

        function toggleTheme() {
            const currentIsDark = document.documentElement.classList.contains('dark');
            if (currentIsDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('color-theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('color-theme', 'dark');
            }
            updateIcons();
        }

        themeToggleBtn?.addEventListener('click', toggleTheme);
        themeToggleBtnMobile?.addEventListener('click', toggleTheme);
    });
</script>
