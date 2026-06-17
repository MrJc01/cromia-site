<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\helpers\Html;

$this->render('_head');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-full scroll-smooth">
<head>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
    
    <!-- Modern typography from crom.run -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    
    <!-- Material Symbols for Rose Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Inline script to prevent screen flash on load -->
    <script>
        if (localStorage.getItem('color-theme') === 'dark') {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="flex flex-col min-h-full antialiased selection:bg-rose-600 selection:text-white bg-white dark:bg-[#030307] text-slate-800 dark:text-slate-300 transition-colors duration-350">
<?php $this->beginBody() ?>

<?= $this->render('_header') ?>

<!-- Floating Background Rose Icons (fade out on hover) -->
<div class="fixed top-1/4 left-6 z-40 opacity-[0.12] dark:opacity-[0.06] hover:opacity-0 transition-all duration-700 ease-out pointer-events-auto cursor-help text-rose-600 dark:text-rose-500 hidden lg:block select-none" title="Rosa Chat / vPureDNA">
    <span class="material-symbols-outlined text-6xl">deceased</span>
</div>
<div class="fixed bottom-1/4 right-6 z-40 opacity-[0.12] dark:opacity-[0.06] hover:opacity-0 transition-all duration-700 ease-out pointer-events-auto cursor-help text-rose-600 dark:text-rose-500 hidden lg:block select-none" title="CromIA Research">
    <span class="material-symbols-outlined text-7xl">deceased</span>
</div>
<div class="fixed top-1/3 right-10 z-40 opacity-[0.08] dark:opacity-[0.04] hover:opacity-0 transition-all duration-700 ease-out pointer-events-auto cursor-help text-rose-600 dark:text-rose-500 hidden xl:block select-none" title="Soberania Digital">
    <span class="material-symbols-outlined text-5xl">deceased</span>
</div>
<div class="fixed bottom-1/3 left-10 z-40 opacity-[0.08] dark:opacity-[0.04] hover:opacity-0 transition-all duration-700 ease-out pointer-events-auto cursor-help text-rose-600 dark:text-rose-500 hidden xl:block select-none" title="Think Vetor">
    <span class="material-symbols-outlined text-[56px]">deceased</span>
</div>

<main id="main" class="flex-grow flex flex-col justify-start relative overflow-hidden" role="main">
    <!-- Cosmic Nebula Glows -->
    <div class="glow-rose top-[-250px] left-[-250px]"></div>
    <div class="glow-copper top-[20%] right-[-250px]"></div>
    <div class="glow-rose bottom-[-250px] left-[10%]"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full relative z-10">
        <!-- Render alert widget if any notifications exist -->
        <?= Alert::widget() ?>
        
        <?= $content ?>
    </div>
</main>

<?= $this->render('_footer') ?>

<!-- Initialize Lucide Icons -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
