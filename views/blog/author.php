<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User $author */
/** @var app\models\Article[] $articles */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="blog-author max-w-4xl mx-auto py-6">

    <!-- Back to Blog Link -->
    <div class="mb-8">
        <a href="<?= Url::to(['blog/index']) ?>" class="inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-200 group">
            <i data-lucide="arrow-left" class="w-4 h-4 transform group-hover:-translate-x-0.5 transition duration-200"></i>
            Voltar para o blog
        </a>
    </div>

    <!-- Author Profile Header -->
    <div class="relative bg-gradient-to-br from-slate-50 to-rose-50/30 dark:from-slate-950/60 dark:to-rose-950/5 border border-slate-200 dark:border-white/5 rounded-3xl p-8 md:p-10 mb-12 overflow-hidden shadow-xl shadow-slate-200/40 dark:shadow-none">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-6">
            <!-- Avatar initial -->
            <div class="w-20 h-20 rounded-2xl bg-gradient-to-tr from-rose-600 to-amber-600 flex items-center justify-center text-white text-3xl font-extrabold shadow-lg shadow-rose-500/20 dark:shadow-none uppercase select-none">
                <?= substr($author->username, 0, 2) ?>
            </div>
            <div class="flex-grow">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                        <?= Html::encode($author->username) ?>
                    </h1>
                    <span class="px-2.5 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 font-mono">
                        <?= Html::encode($author->role) ?>
                    </span>
                </div>
                
                <p class="text-slate-650 dark:text-slate-350 text-sm mt-3 font-light leading-relaxed max-w-2xl">
                    <?= Html::encode($author->bio_description ?: 'Este autor é um membro contribuinte da equipe de inteligência artificial da CromIA.') ?>
                </p>
                
                <div class="flex items-center gap-4 mt-4 text-xs text-slate-500 font-mono">
                    <span class="flex items-center gap-1">
                        <i data-lucide="mail" class="w-3.5 h-3.5"></i>
                        <?= Html::encode($author->email ?: 'contato@cromia.run') ?>
                    </span>
                    <span class="flex items-center gap-1">
                        <i data-lucide="calendar" class="w-3.5 h-3.5"></i>
                        Membro desde <?= date('M Y', $author->created_at) ?>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Publications List -->
    <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-8 flex items-center gap-2">
            <i data-lucide="pen-tool" class="w-5 h-5 text-rose-500"></i>
            Publicações de <?= Html::encode($author->username) ?> (<?= count($articles) ?>)
        </h2>

        <div class="space-y-6">
            <?php if (empty($articles)): ?>
                <div class="bg-slate-50/20 dark:bg-slate-900/10 border border-slate-200 dark:border-white/5 rounded-2xl p-8 text-center text-slate-500 font-light">
                    Este autor ainda não publicou nenhum artigo.
                </div>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                    <a href="<?= Url::to(['blog/view', 'slug' => $article->slug]) ?>" class="block group bg-slate-50/30 hover:bg-slate-100/50 dark:bg-slate-900/10 dark:hover:bg-slate-900/20 border border-slate-250 dark:border-white/5 rounded-2xl p-6 transition duration-300">
                        <div class="flex flex-col gap-2">
                            <span class="text-xs text-slate-500 font-mono"><?= date('d/m/Y', $article->created_at) ?></span>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-rose-550 dark:group-hover:text-rose-400 transition duration-200">
                                <?= Html::encode($article->title) ?>
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 font-light leading-relaxed max-w-3xl">
                                <?= Html::encode($article->summary) ?>
                            </p>
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-rose-550 dark:text-rose-400 mt-2">
                                Ler artigo Completo
                                <i data-lucide="chevron-right" class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition duration-250"></i>
                            </span>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

</div>
