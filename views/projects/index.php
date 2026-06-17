<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\ProjectService[] $products */
/** @var app\models\ProjectService[] $services */
/** @var app\models\ProjectService[] $projects */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="projects-index">
    <!-- Header Area -->
    <div class="mb-16 text-center max-w-3xl mx-auto">
        <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Nosso Trabalho</span>
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-2">
            Projetos, Produtos & Serviços
        </h1>
        <p class="mt-4 text-slate-600 dark:text-slate-400 font-light leading-relaxed">
            Consulte nosso ecossistema de software e inteligência artificial soberana: desde pacotes de código aberto estáveis até serviços corporativos.
        </p>
    </div>

    <!-- 1. Nossos Produtos (Products) -->
    <section class="mb-20">
        <div class="border-b border-slate-200 dark:border-white/5 pb-4 mb-8">
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                <i data-lucide="package" class="w-6 h-6 text-rose-500"></i>
                Nossos Produtos
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <?= $this->render('_item_card', ['item' => $product]) ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 2. Serviços Corporativos (Services) -->
    <section class="mb-20">
        <div class="border-b border-slate-200 dark:border-white/5 pb-4 mb-8">
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                <i data-lucide="briefcase" class="w-6 h-6 text-rose-500"></i>
                Serviços Crom
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach ($services as $service): ?>
                <?= $this->render('_item_card', ['item' => $service]) ?>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- 3. Projetos Ativos e R&D (Projects) -->
    <section class="mb-20">
        <div class="border-b border-slate-200 dark:border-white/5 pb-4 mb-8">
            <h2 class="text-2xl font-extrabold text-slate-900 dark:text-white flex items-center gap-2">
                <i data-lucide="git-fork" class="w-6 h-6 text-rose-500"></i>
                Pesquisa e Projetos em Andamento
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($projects as $project): ?>
                <?= $this->render('_item_card', ['item' => $project]) ?>
            <?php endforeach; ?>
        </div>
    </section>
</div>
