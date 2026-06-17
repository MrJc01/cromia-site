<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $htmlContent */
/** @var string $currentPage */
/** @var array $menuItems */

use yii\helpers\Url;

?>
<div class="flex flex-col lg:flex-row gap-8 lg:gap-12 relative">
    
    <!-- Sidebar Navigation -->
    <aside class="w-full lg:w-64 flex-shrink-0 lg:sticky lg:top-24 h-auto lg:h-[calc(100vh-8rem)] overflow-y-auto border-b lg:border-b-0 lg:border-r border-slate-200 dark:border-slate-900 pb-6 lg:pb-0 pr-0 lg:pr-6">
        <div class="mb-4">
            <span class="text-xs font-semibold tracking-wider text-slate-500 uppercase">Documentação</span>
        </div>
        <nav class="flex flex-row lg:flex-col flex-wrap lg:flex-nowrap gap-2 lg:gap-1">
            <?php foreach ($menuItems as $item): ?>
                <?php
                    $url = Url::to(['docs/view', 'page' => $item['page']]);
                    $isActive = $currentPage === $item['page'];
                    $class = $isActive 
                        ? 'text-rose-600 dark:text-rose-400 font-bold border-rose-500 dark:border-rose-400 bg-rose-500/5 lg:bg-transparent pl-3 pr-3 lg:pr-0 py-2 border rounded-lg lg:rounded-none border-rose-500/20 lg:border-0 lg:border-l-2 transition-all duration-200' 
                        : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 hover:border-slate-300 dark:hover:border-slate-700 pl-3 pr-3 lg:pr-0 py-2 border rounded-lg lg:rounded-none border-transparent lg:border-0 lg:border-l-2 transition-all duration-200';
                ?>
                <a href="<?= $url ?>" class="text-sm font-medium <?= $class ?>">
                    <?= $item['label'] ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </aside>

    <!-- Main Content Panel -->
    <div class="flex-grow max-w-4xl">
        <article class="bg-slate-50/50 dark:bg-slate-900/30 backdrop-blur-sm border border-slate-200 dark:border-slate-900 rounded-2xl p-6 md:p-10 shadow-xl shadow-slate-200/40 dark:shadow-slate-950/20">
            <div class="docs-content max-w-none text-slate-750 dark:text-slate-300">
                <?= $htmlContent ?>
            </div>
        </article>
    </div>
</div>
