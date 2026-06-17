<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\ProjectService $item */

use yii\helpers\Html;

// Determine status badges and colors
$statusText = '';
$statusClass = '';

switch ($item->status) {
    case 'stable':
        $statusText = 'Estável';
        $statusClass = 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20';
        break;
    case 'beta':
        $statusText = 'Beta';
        $statusClass = 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border-rose-500/20';
        break;
    case 'active':
        $statusText = 'Ativo';
        $statusClass = 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20';
        break;
    case 'research':
        $statusText = 'R&D';
        $statusClass = 'bg-purple-500/10 text-purple-600 dark:text-purple-400 border-purple-500/20';
        break;
}

?>
<div class="bento-card rounded-2xl p-6 flex flex-col justify-between group h-full">
    <div>
        <!-- Card Header -->
        <div class="flex items-start justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 dark:text-rose-400 group-hover:bg-rose-500/20 transition duration-300">
                    <span class="text-xl"><?= Html::encode($item->icon_emoji) ?></span>
                </div>
                <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-slate-900 dark:group-hover:text-white transition duration-300">
                    <?= Html::encode($item->name) ?>
                </h3>
            </div>
            
            <!-- Status Badge -->
            <span class="px-2 py-0.5 rounded text-[10px] font-semibold border <?= $statusClass ?> uppercase tracking-wider">
                <?= $statusText ?>
            </span>
        </div>

        <!-- Description -->
        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 font-light">
            <?= Html::encode($item->description) ?>
        </p>
    </div>

    <!-- Card Action Footer -->
    <?php if (!empty($item->link_url)): ?>
        <div class="mt-auto pt-4 border-t border-slate-200 dark:border-white/5">
            <a href="<?= Html::encode($item->link_url) ?>" 
               target="_blank" 
               rel="noopener" 
               class="inline-flex items-center text-xs font-bold text-rose-600 dark:text-rose-400 hover:text-rose-600 dark:hover:text-rose-400 group-hover:translate-x-1 transition-all duration-300 gap-1">
                Acessar Repositório / Demo
                <i data-lucide="external-link" class="w-3.5 h-3.5"></i>
            </a>
        </div>
    <?php else: ?>
        <div class="mt-auto pt-4 border-t border-slate-200 dark:border-white/5 flex items-center gap-1.5 text-xs text-slate-500">
            <i data-lucide="shield-check" class="w-3.5 h-3.5 text-slate-400 dark:text-slate-600"></i>
            Disponível para implantação privada
        </div>
    <?php endif; ?>
</div>
