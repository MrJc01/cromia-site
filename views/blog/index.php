<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Article[] $articles */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="blog-index">
    <!-- Header Area -->
    <div class="mb-16 text-center max-w-3xl mx-auto">
        <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Pesquisa & Divulgação</span>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-2">
            Ensaios Técnicos & Blog
        </h1>
        <p class="mt-4 text-slate-600 dark:text-slate-400 font-light leading-relaxed">
            Publicações científicas, relatos de otimização de modelos de linguagem e discussões de arquitetura produzidas pelos grupos da CromIA.
        </p>
    </div>

    <!-- Grid List -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php $i = 1; foreach ($articles as $article): ?>
            <article class="relative p-8 bg-slate-50/50 hover:bg-slate-50/80 dark:bg-slate-900/20 dark:hover:bg-slate-900/40 border border-slate-200/60 dark:border-white/5 hover:border-rose-500/20 rounded-2xl transition duration-300 group flex flex-col justify-between h-full">
                <!-- Large card number overlay -->
                <div class="absolute top-2 right-4 font-mono font-bold text-6xl text-slate-300 dark:text-slate-800/10 group-hover:text-rose-500/10 select-none pointer-events-none transition duration-300">
                    <?= sprintf('%02d', $i++) ?>
                </div>

                <div>
                    <!-- Meta info -->
                    <div class="flex items-center gap-3 mb-4 text-xs font-mono">
                        <span class="px-2 py-0.5 rounded bg-slate-100 dark:bg-slate-900 text-rose-600 dark:text-rose-400 border border-slate-200 dark:border-slate-800 font-semibold uppercase tracking-wider">
                            <?= Html::encode($article->author_group) ?>
                        </span>
                        <span class="text-slate-500"><?= date('d/m/Y', $article->created_at) ?></span>
                    </div>

                    <!-- Title -->
                    <h2 class="text-xl font-bold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-white transition duration-200 mb-3 leading-tight">
                        <a href="<?= Url::to(['blog/view', 'slug' => $article->slug]) ?>">
                            <?= Html::encode($article->title) ?>
                        </a>
                    </h2>

                    <!-- Summary -->
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 font-light">
                        <?= Html::encode($article->summary) ?>
                    </p>
                </div>

                <!-- Footer link -->
                <div class="flex items-center gap-1 text-xs font-bold text-rose-600 dark:text-rose-400 group-hover:text-rose-500 dark:group-hover:text-rose-300 transition duration-200 mt-auto">
                    <a href="<?= Url::to(['blog/view', 'slug' => $article->slug]) ?>">Ler artigo completo</a>
                    <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition duration-200"></i>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>
