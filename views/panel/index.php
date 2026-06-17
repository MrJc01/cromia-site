<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Article[] $articles */
/** @var app\models\ProjectService[] $projects */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Painel de Controle - CromIA';
$currentUser = Yii::$app->user->identity;
?>
<div class="panel-index max-w-7xl mx-auto py-6">

    <!-- Header & Welcome Banner -->
    <div class="relative bg-gradient-to-br from-slate-50 to-rose-50/30 dark:from-slate-950/60 dark:to-rose-950/5 border border-slate-200 dark:border-white/5 rounded-3xl p-8 mb-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Sistema de Gestão</span>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Portal de Autoria CromIA</h1>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 font-light">
                    Olá, <span class="text-slate-900 dark:text-white font-semibold"><?= Html::encode($currentUser?->username) ?></span> (Membro com privilégios de <span class="text-rose-400 font-semibold uppercase font-mono text-xs"><?= Html::encode($currentUser?->role) ?></span>).
                </p>
            </div>
            <div class="flex items-center gap-3">
                <a href="<?= Url::to(['/site/index']) ?>" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900/60 dark:hover:bg-slate-900 border border-slate-200 dark:border-white/5 text-slate-700 dark:text-slate-200 font-semibold rounded-xl transition duration-300 text-sm backdrop-blur-sm">
                    Visualizar Site
                </a>
            </div>
        </div>
    </div>

    <!-- Main Grid Panels (Modular Bento Sections) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- ARTICLE MANAGEMENT SECTION -->
        <div class="bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 backdrop-blur-md rounded-2xl p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/5 mb-6">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-rose-400">article</span>
                        Gestão de Artigos (Blog)
                    </h2>
                    <a href="<?= Url::to(['panel/create-article']) ?>" class="px-4 py-2 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white text-xs font-bold rounded-lg transition duration-200 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">add</span> Novo Artigo
                    </a>
                </div>

                <!-- Articles Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-white/5">
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Título</th>
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Grupo Autor</th>
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Data</th>
                                <th class="pb-3 text-right text-slate-500 dark:text-slate-400 font-semibold">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-white/5">
                            <?php if (empty($articles)): ?>
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-500 font-light">Nenhum artigo encontrado.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($articles as $article): ?>
                                    <tr class="group hover:bg-slate-100/50 dark:hover:bg-slate-900/10 transition duration-150">
                                        <td class="py-3.5 pr-3 text-slate-700 dark:text-slate-200 font-medium group-hover:text-slate-900 dark:group-hover:text-white max-w-[200px] truncate">
                                            <?= Html::encode($article->title) ?>
                                        </td>
                                        <td class="py-3.5 text-xs text-rose-600 dark:text-rose-400/80 font-mono"><?= Html::encode($article->author_group) ?></td>
                                        <td class="py-3.5 text-xs text-slate-500"><?= date('d/m/Y', $article->created_at) ?></td>
                                        <td class="py-3.5 text-right flex items-center justify-end gap-2.5">
                                            <a href="<?= Url::to(['panel/update-article', 'id' => $article->id]) ?>" class="text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-150" title="Editar">
                                                <span class="material-symbols-outlined text-sm">edit</span>
                                            </a>
                                            <?= Html::a('<span class="material-symbols-outlined text-sm">delete</span>', ['panel/delete-article', 'id' => $article->id], [
                                                'class' => 'text-slate-400 dark:text-slate-500 hover:text-rose-500 transition duration-150',
                                                'data' => [
                                                    'confirm' => 'Tem certeza de que deseja excluir este artigo?',
                                                    'method' => 'post',
                                                ],
                                                'title' => 'Excluir'
                                            ]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- PROJECT/SERVICES MANAGEMENT SECTION -->
        <div class="bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 backdrop-blur-md rounded-2xl p-6 flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/5 mb-6">
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="material-symbols-outlined text-amber-400">deployed_code</span>
                        Projetos, Produtos & Serviços
                    </h2>
                    <a href="<?= Url::to(['panel/create-project']) ?>" class="px-4 py-2 bg-gradient-to-r from-amber-600 to-orange-500 hover:from-amber-500 hover:to-orange-400 text-white text-xs font-bold rounded-lg transition duration-200 flex items-center gap-1">
                        <span class="material-symbols-outlined text-xs">add</span> Novo Registro
                    </a>
                </div>

                <!-- Projects Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-white/5">
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Nome</th>
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Tipo</th>
                                <th class="pb-3 text-slate-500 dark:text-slate-400 font-semibold">Status</th>
                                <th class="pb-3 text-right text-slate-500 dark:text-slate-400 font-semibold">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-white/5">
                            <?php if (empty($projects)): ?>
                                <tr>
                                    <td colspan="4" class="py-8 text-center text-slate-500 font-light">Nenhum projeto registrado.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($projects as $project): ?>
                                    <tr class="group hover:bg-slate-100/50 dark:hover:bg-slate-900/10 transition duration-150">
                                        <td class="py-3.5 pr-3 text-slate-700 dark:text-slate-200 font-medium group-hover:text-slate-900 dark:group-hover:text-white flex items-center gap-2">
                                            <span class="text-base leading-none"><?= Html::encode($project->icon_emoji) ?></span>
                                            <?= Html::encode($project->name) ?>
                                        </td>
                                        <td class="py-3.5 text-xs text-amber-600 dark:text-amber-400 uppercase tracking-wider font-semibold"><?= Html::encode($project->type) ?></td>
                                        <td class="py-3.5 text-xs">
                                            <?php
                                                $statusText = '';
                                                $statusClass = '';
                                                switch ($project->status) {
                                                    case 'stable':
                                                        $statusText = 'Estável';
                                                        $statusClass = 'bg-emerald-500/10 text-emerald-650 dark:text-emerald-400 border border-emerald-500/20';
                                                        break;
                                                    case 'beta':
                                                        $statusText = 'Beta';
                                                        $statusClass = 'bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20';
                                                        break;
                                                    case 'active':
                                                        $statusText = 'Ativo';
                                                        $statusClass = 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border border-amber-500/20';
                                                        break;
                                                    case 'research':
                                                        $statusText = 'R&D';
                                                        $statusClass = 'bg-purple-500/10 text-purple-600 dark:text-purple-400 border border-purple-500/20';
                                                        break;
                                                }
                                            ?>
                                            <span class="px-2 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider <?= $statusClass ?>">
                                                <?= $statusText ?>
                                            </span>
                                        </td>
                                        <td class="py-3.5 text-right flex items-center justify-end gap-2.5">
                                            <a href="<?= Url::to(['panel/update-project', 'id' => $project->id]) ?>" class="text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-150" title="Editar">
                                                <span class="material-symbols-outlined text-sm">edit</span>
                                            </a>
                                            <?= Html::a('<span class="material-symbols-outlined text-sm">delete</span>', ['panel/delete-project', 'id' => $project->id], [
                                                'class' => 'text-slate-400 dark:text-slate-500 hover:text-rose-500 transition duration-150',
                                                'data' => [
                                                    'confirm' => 'Tem certeza de que deseja excluir este item?',
                                                    'method' => 'post',
                                                ],
                                                'title' => 'Excluir'
                                            ]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
