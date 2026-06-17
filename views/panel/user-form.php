<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var string $title */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $title . ' - CromIA';
?>
<div class="user-form max-w-3xl mx-auto py-6">

    <!-- Header navigation and Title -->
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-slate-200 dark:border-white/5">
        <div>
            <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Usuários</span>
            <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1"><?= Html::encode($title) ?></h1>
        </div>
        <a href="<?= Url::to(['panel/users']) ?>" class="inline-flex items-center gap-1 text-sm font-semibold text-slate-550 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white transition duration-200 group">
            <span class="material-symbols-outlined text-sm transform group-hover:-translate-x-0.5 transition duration-200">arrow_back</span>
            Voltar para Usuários
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
                'inputOptions' => ['class' => 'bg-white dark:bg-slate-900/80 border border-slate-255 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600'],
                'errorOptions' => ['class' => 'text-xs text-rose-500 mt-1 font-semibold'],
            ],
        ]); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Username -->
            <?= $form->field($model, 'username')->textInput(['placeholder' => 'Nome de usuário']) ?>

            <!-- Role Selection -->
            <?= $form->field($model, 'role')->dropDownList([
                'member' => 'Membro (member)',
                'admin' => 'Administrador (admin)',
            ], [
                'class' => 'bg-white dark:bg-slate-900/80 border border-slate-255 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light'
            ]) ?>
        </div>

        <!-- Email -->
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'ex: usuario@cromia.run', 'type' => 'email']) ?>

        <!-- Biography / Description -->
        <?= $form->field($model, 'bio_description')->textarea([
            'rows' => 4,
            'placeholder' => 'Descrição ou biografia profissional do usuário...',
            'class' => 'bg-white dark:bg-slate-900/80 border border-slate-255 dark:border-white/5 rounded-xl px-4.5 py-3 text-slate-800 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600'
        ]) ?>

        <!-- Passwords -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- New Password -->
            <?= $form->field($model, 'new_password')->passwordInput(['placeholder' => 'Senha de acesso (mínimo 4 caracteres)'])->label('Senha') ?>

            <!-- Confirm Password -->
            <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Repita a senha'])->label('Confirmar Senha') ?>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-200 dark:border-white/5">
            <a href="<?= Url::to(['panel/users']) ?>" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-850 text-slate-700 dark:text-slate-300 font-semibold rounded-xl transition duration-200 text-sm">
                Cancelar
            </a>
            <?= Html::submitButton('Criar Usuário', [
                'class' => 'px-6 py-3 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white font-bold rounded-xl shadow-lg transition duration-200 text-sm cursor-pointer'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
