<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User[] $users */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Gerenciamento de Usuários - CromIA';
?>
<div class="panel-users max-w-7xl mx-auto py-6">

    <!-- Header Banner -->
    <div class="relative bg-gradient-to-br from-slate-50 to-rose-50/30 dark:from-slate-950/60 dark:to-rose-950/5 border border-slate-200 dark:border-white/5 rounded-3xl p-8 mb-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <a href="<?= Url::to(['panel/index']) ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-rose-500 hover:text-rose-600 mb-2 uppercase tracking-wider">
                    <span class="material-symbols-outlined text-xs">arrow_back</span> Voltar ao Painel
                </a>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Usuários Registrados</h1>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 font-light">
                    Administre os membros da plataforma CromIA.
                </p>
            </div>
            <div>
                <a href="<?= Url::to(['panel/create-user']) ?>" class="px-5 py-2.5 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white text-xs font-bold rounded-lg transition duration-200 flex items-center gap-1 shadow-md shadow-rose-500/10">
                    <span class="material-symbols-outlined text-xs">person_add</span> Novo Usuário
                </a>
            </div>
        </div>
    </div>

    <!-- Users Table Container -->
    <div class="bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 backdrop-blur-md rounded-3xl p-8 shadow-xl shadow-slate-200/40 dark:shadow-black/60">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-slate-200 dark:border-white/5">
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">ID</th>
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">Usuário</th>
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">E-mail</th>
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">Função</th>
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">Descrição / Biografia</th>
                        <th class="pb-4 text-slate-500 dark:text-slate-400 font-semibold uppercase tracking-wider text-xs">Criado Em</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-white/5">
                    <?php if (empty($users)): ?>
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-500 font-light">Nenhum usuário encontrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($users as $user): ?>
                            <tr class="group hover:bg-slate-100/50 dark:hover:bg-slate-900/10 transition duration-150">
                                <td class="py-4 text-slate-500 font-mono text-xs"><?= $user->id ?></td>
                                <td class="py-4 pr-3 text-slate-700 dark:text-slate-200 font-medium group-hover:text-slate-900 dark:group-hover:text-white">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-rose-500/10 flex items-center justify-center text-xs font-bold text-rose-500 uppercase">
                                            <?= substr($user->username, 0, 2) ?>
                                        </div>
                                        <span><?= Html::encode($user->username) ?></span>
                                    </div>
                                </td>
                                <td class="py-4 text-slate-600 dark:text-slate-350"><?= Html::encode($user->email ?: 'Sem e-mail') ?></td>
                                <td class="py-4">
                                    <span class="px-2.5 py-0.5 rounded text-[10px] uppercase font-bold tracking-wider <?= $user->role === 'admin' ? 'bg-rose-500/10 text-rose-500 border border-rose-500/20' : 'bg-slate-500/10 text-slate-550 border border-slate-500/20' ?>">
                                        <?= Html::encode($user->role) ?>
                                    </span>
                                </td>
                                <td class="py-4 text-xs text-slate-500 max-w-[300px] truncate" title="<?= Html::encode($user->bio_description) ?>">
                                    <?= Html::encode($user->bio_description ?: 'Nenhuma descrição adicionada.') ?>
                                </td>
                                <td class="py-4 text-xs text-slate-500 font-mono"><?= date('d/m/Y H:i', $user->created_at) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
