<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Article $article */
/** @var string $htmlContent */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="blog-view max-w-3xl mx-auto">
    <!-- Navigation Back Link -->
    <div class="mb-8">
        <a href="<?= Url::to(['blog/index']) ?>" class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-200 group">
            <i data-lucide="arrow-left" class="w-4 h-4 transform group-hover:-translate-x-0.5 transition duration-200"></i>
            Voltar para publicações
        </a>
    </div>

    <!-- Article Header -->
    <header class="mb-12 border-b border-slate-200 dark:border-white/5 pb-8">
        <!-- Metadata -->
        <div class="flex items-center gap-3 mb-4 text-xs font-mono">
            <span class="px-2.5 py-0.5 rounded bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 font-semibold uppercase tracking-wider">
                <?= Html::encode($article->author_group) ?>
            </span>
            <span class="text-slate-500"><?= date('d \d\e F \d\e Y', $article->created_at) ?></span>
        </div>

        <!-- Title -->
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-tight mb-4">
            <?= Html::encode($article->title) ?>
        </h1>

        <!-- Summary intro -->
        <p class="text-lg text-slate-600 dark:text-slate-400 font-light leading-relaxed">
            <?= Html::encode($article->summary) ?>
        </p>
    </header>

    <!-- Article Body -->
    <article class="bg-slate-50/50 dark:bg-slate-900/10 border border-slate-250 dark:border-slate-900/60 rounded-3xl p-6 md:p-12 mb-12 shadow-xl shadow-slate-200/40 dark:shadow-slate-950/10">
        <div class="docs-content max-w-none text-slate-700 dark:text-slate-300">
            <?= $htmlContent ?>
        </div>
    </article>

    <!-- Author block footer -->
    <div class="p-6 bg-slate-50/30 dark:bg-slate-900/30 border border-slate-200 dark:border-white/5 rounded-2xl flex items-center space-x-4">
        <div class="w-12 h-12 rounded-full bg-rose-600/10 flex items-center justify-center text-rose-500 dark:text-rose-400">
            <i data-lucide="users" class="w-6 h-6"></i>
        </div>
        <div>
            <div class="text-sm font-bold text-slate-900 dark:text-white">Escrito por <?= Html::encode($article->author_group) ?></div>
            <div class="text-xs text-slate-500">Divisão de IA da organização Crom. Desenvolvendo o futuro soberano.</div>
        </div>
    </div>
</div>
