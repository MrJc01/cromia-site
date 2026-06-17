<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var string $title */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $title . ' - CromIA';
?>
<div class="article-form max-w-3xl mx-auto py-6">

    <!-- Header navigation and Title -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200 dark:border-white/5">
        <div>
            <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Artigos</span>
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
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-500/5 to-transparent blur-3xl pointer-events-none"></div>

        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'space-y-6 relative z-10'],
            'fieldConfig' => [
                'options' => ['class' => 'flex flex-col gap-1.5'],
                'labelOptions' => ['class' => 'text-xs font-bold uppercase tracking-wider text-slate-550 dark:text-slate-400'],
                'inputOptions' => ['class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600'],
                'errorOptions' => ['class' => 'text-xs text-rose-500 mt-1 font-semibold'],
            ],
        ]); ?>

        <!-- Title Field -->
        <?= $form->field($model, 'title')->textInput(['placeholder' => 'ex: Como fiz uma micro-LLM atingir 100% de acurácia']) ?>

        <!-- Author Group (only editable by admin) -->
        <?php if (Yii::$app->user->identity?->role === 'admin'): ?>
            <?= $form->field($model, 'author_group')->textInput(['placeholder' => 'ex: CromIA Core, CromIA Logic, CromIA Data']) ?>
        <?php else: ?>
            <?= Html::activeHiddenInput($model, 'author_group') ?>
        <?php endif; ?>

        <!-- Author Selection (only editable by admin) -->
        <?php if (Yii::$app->user->identity?->role === 'admin'): ?>
            <?php
                $usersList = \yii\helpers\ArrayHelper::map(\app\models\User::find()->orderBy(['username' => SORT_ASC])->all(), 'id', 'username');
            ?>
            <?= $form->field($model, 'author_id')->dropDownList($usersList, [
                'prompt' => 'Selecione o Autor...',
                'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light'
            ])->label('Autor da Publicação') ?>
        <?php else: ?>
            <?= Html::activeHiddenInput($model, 'author_id') ?>
        <?php endif; ?>

        <!-- Slug (Optional, auto-generated if left blank) -->
        <?= $form->field($model, 'slug')->textInput([
            'placeholder' => 'Deixe em branco para gerar automaticamente a partir do título',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-500'
        ]) ?>

        <!-- Summary text area -->
        <?= $form->field($model, 'summary')->textarea([
            'rows' => 3, 
            'placeholder' => 'Um resumo curto que será exibido nos cards do blog/feed.',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600 resize-none'
        ]) ?>

        <!-- Content Area (Markdown) -->
        <?= $form->field($model, 'content')->textarea([
            'rows' => 12, 
            'placeholder' => 'Escreva o conteúdo do artigo aqui usando formatação Markdown padrão.',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-250 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-mono font-light text-xs placeholder:text-slate-400 dark:placeholder:text-slate-600 resize-y min-h-[300px]'
        ]) ?>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200 dark:border-white/5">
            <a href="<?= Url::to(['panel/index']) ?>" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-850 text-slate-700 dark:text-slate-300 font-semibold rounded-xl transition duration-200 text-sm">
                Cancelar
            </a>
            <?= Html::submitButton($model->isNewRecord ? 'Criar Artigo' : 'Salvar Alterações', [
                'class' => 'px-6 py-3 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white font-bold rounded-xl shadow-lg transition duration-200 text-sm cursor-pointer'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
