<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\ProjectService $model */
/** @var string $title */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $title . ' - CromIA';
?>
<div class="project-form max-w-3xl mx-auto py-6">

    <!-- Header Navigation and Title -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200 dark:border-white/5">
        <div>
            <span class="text-xs font-bold tracking-widest text-amber-500 uppercase">Projetos & Serviços</span>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1"><?= Html::encode($title) ?></h1>
        </div>
        <a href="<?= Url::to(['panel/index']) ?>" class="inline-flex items-center gap-1 text-sm font-semibold text-slate-550 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-200 group">
            <span class="material-symbols-outlined text-sm transform group-hover:-translate-x-0.5 transition duration-200">arrow_back</span>
            Voltar para o Painel
        </a>
    </div>

    <!-- Glowing Form Card -->
    <div class="bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 backdrop-blur-md rounded-3xl p-8 shadow-xl relative overflow-hidden">
        <!-- Subtle back glow -->
        <div class="absolute inset-0 bg-gradient-to-tr from-amber-500/5 to-transparent blur-3xl pointer-events-none"></div>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'space-y-6 relative z-10'],
            'fieldConfig' => [
                'options' => ['class' => 'flex flex-col gap-1.5'],
                'labelOptions' => ['class' => 'text-xs font-bold uppercase tracking-wider text-slate-550 dark:text-slate-400'],
                'inputOptions' => ['class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-amber-500/40 focus:ring-1 focus:ring-amber-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600'],
                'errorOptions' => ['class' => 'text-xs text-rose-500 mt-1 font-semibold'],
            ],
        ]); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name Field -->
            <?= $form->field($model, 'name')->textInput(['placeholder' => 'ex: Think Vetor Chat']) ?>

            <!-- Icon Emoji -->
            <?= $form->field($model, 'icon_emoji')->textInput(['placeholder' => 'ex: 🧠, 🧬, 🛡️']) ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Type Dropdown -->
            <?= $form->field($model, 'type')->dropDownList([
                'product' => 'Produto',
                'service' => 'Serviço',
                'project' => 'Projeto Ativo / Pesquisa',
            ], [
                'class' => 'bg-white dark:bg-slate-900 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-amber-500/40 focus:ring-1 focus:ring-amber-500/30 transition duration-200 w-full font-light'
            ]) ?>

            <!-- Status Dropdown -->
            <?= $form->field($model, 'status')->dropDownList([
                'stable' => 'Estável (Stable)',
                'beta' => 'Beta',
                'active' => 'Ativo (Active Development)',
                'research' => 'Pesquisa (Research / R&D)',
            ], [
                'class' => 'bg-white dark:bg-slate-900 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-amber-500/40 focus:ring-1 focus:ring-amber-500/30 transition duration-200 w-full font-light'
            ]) ?>
        </div>

        <!-- Slug (Optional, auto-generated if left blank) -->
        <?= $form->field($model, 'slug')->textInput([
            'placeholder' => 'Deixe em branco para gerar automaticamente a partir do nome',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-amber-500/40 focus:ring-1 focus:ring-amber-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-500'
        ]) ?>

        <!-- Link URL -->
        <?= $form->field($model, 'link_url')->textInput(['placeholder' => 'ex: https://github.com/MrJc01/think-vetor']) ?>

        <!-- Description -->
        <?= $form->field($model, 'description')->textarea([
            'rows' => 5, 
            'placeholder' => 'Breve descrição sobre o produto, serviço ou projeto em andamento...',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-amber-500/40 focus:ring-1 focus:ring-amber-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600 resize-none'
        ]) ?>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200 dark:border-white/5">
            <a href="<?= Url::to(['panel/index']) ?>" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-850 text-slate-700 dark:text-slate-300 font-semibold rounded-xl transition duration-200 text-sm">
                Cancelar
            </a>
            <?= Html::submitButton($model->isNewRecord ? 'Criar Item' : 'Salvar Alterações', [
                'class' => 'px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-500 hover:from-amber-500 hover:to-orange-400 text-white font-bold rounded-xl shadow-lg transition duration-200 text-sm cursor-pointer'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
