<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\LoginForm $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Acessar Conta';
?>
<div class="site-login max-w-md mx-auto py-12 flex flex-col items-center justify-center">

    <!-- Logo with theme support -->
    <div class="mb-8 relative group">
        <div class="absolute inset-0 bg-gradient-to-r from-rose-600 via-amber-600 to-orange-500 rounded-full blur-3xl opacity-20 group-hover:opacity-35 transition-opacity duration-500"></div>
        <img src="<?= Url::to('@web/images/logo-secondary.png') ?>" alt="CromIA Logo" class="relative h-24 w-auto transform transition duration-500 hover:scale-105" style="filter: hue-rotate(135deg) saturate(1.2) contrast(1.1) drop-shadow(0 0 12px rgba(239,68,68,0.15));">
    </div>

    <!-- Login Container Card -->
    <div class="w-full bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200/80 dark:border-white/5 backdrop-blur-md rounded-3xl p-8 shadow-xl shadow-slate-200/40 dark:shadow-black/60 relative overflow-hidden transition-colors duration-300">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-500/5 to-transparent blur-3xl pointer-events-none"></div>

        <div class="text-center mb-6 relative z-10">
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900 dark:text-white"><?= Html::encode($this->title) ?></h1>
            <p class="text-slate-500 dark:text-slate-400 text-xs mt-1 font-light">Insira suas credenciais da CromIA</p>
        </div>

        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'space-y-5 relative z-10'],
            'fieldConfig' => [
                'options' => ['class' => 'flex flex-col gap-1.5'],
                'labelOptions' => ['class' => 'text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400'],
                'inputOptions' => ['class' => 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-400 dark:placeholder:text-slate-600'],
                'errorOptions' => ['class' => 'text-xs text-rose-500 mt-1 font-semibold'],
            ],
        ]); ?>

        <!-- Username field -->
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Nome de usuário', 'autofocus' => true])->label('Usuário') ?>

        <!-- Password field -->
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Senha'])->label('Senha') ?>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between text-xs text-slate-600 dark:text-slate-450 mt-1">
            <label class="flex items-center space-x-2 cursor-pointer select-none">
                <?= Html::activeCheckbox($model, 'rememberMe', [
                    'label' => false,
                    'class' => 'rounded border-slate-300 dark:border-white/10 bg-white dark:bg-slate-900 text-rose-600 focus:ring-rose-500/40 w-4 h-4 transition duration-200'
                ]) ?>
                <span>Manter conectado</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <?= Html::submitButton('Acessar Portal', [
                'class' => 'w-full py-3.5 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white font-bold rounded-xl shadow-lg shadow-rose-500/10 dark:shadow-none transition duration-200 text-sm cursor-pointer text-center'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>

        <!-- Help Info -->
        <div class="mt-6 pt-5 border-t border-slate-200 dark:border-white/5 text-center text-[10px] text-slate-450 leading-relaxed font-mono">
            Membros autorizados:<br>
            <span class="text-rose-600 dark:text-rose-400 font-semibold">admin</span> (admin) ou <span class="text-rose-600 dark:text-rose-400 font-semibold">cromia</span> (member)
        </div>
    </div>

</div>
