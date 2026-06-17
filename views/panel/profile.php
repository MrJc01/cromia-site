<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User $model */

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Editar Perfil - CromIA';
?>
<div class="panel-profile max-w-3xl mx-auto py-6">

    <!-- Header Banner -->
    <div class="relative bg-gradient-to-br from-slate-50 to-rose-50/30 dark:from-slate-950/60 dark:to-rose-950/5 border border-slate-200 dark:border-white/5 rounded-3xl p-8 mb-10 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <a href="<?= Url::to(['panel/index']) ?>" class="inline-flex items-center gap-1.5 text-xs font-semibold text-rose-500 hover:text-rose-600 mb-2 uppercase tracking-wider">
                    <span class="material-symbols-outlined text-xs">arrow_back</span> Voltar ao Painel
                </a>
                <h1 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Seu Perfil</h1>
                <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 font-light">
                    Mantenha suas informações pessoais e credenciais de segurança atualizadas.
                </p>
            </div>
        </div>
    </div>

    <!-- Edit Profile Card -->
    <div class="bg-slate-50/50 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 backdrop-blur-md rounded-3xl p-8 shadow-xl shadow-slate-200/40 dark:shadow-black/60 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-500/5 to-transparent blur-3xl pointer-events-none"></div>

        <?php $form = ActiveForm::begin([
            'id' => 'profile-form',
            'options' => ['class' => 'space-y-6 relative z-10'],
            'fieldConfig' => [
                'options' => ['class' => 'flex flex-col gap-1.5'],
                'labelOptions' => ['class' => 'text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400'],
                'inputOptions' => ['class' => 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-450 dark:placeholder:text-slate-600'],
                'errorOptions' => ['class' => 'text-xs text-rose-500 mt-1 font-semibold'],
            ],
        ]); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Username (read-only) -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Usuário</label>
                <input type="text" class="bg-slate-100 dark:bg-slate-950 border border-slate-200 dark:border-white/5 rounded-xl px-4 py-3 text-slate-500 dark:text-slate-500 w-full font-light cursor-not-allowed" value="<?= Html::encode($model->username) ?>" readonly>
                <div class="text-[10px] text-slate-400 font-light mt-0.5">O nome de usuário não pode ser alterado.</div>
            </div>

            <!-- Email -->
            <?= $form->field($model, 'email')->textInput(['placeholder' => 'seu-email@dominio.com', 'type' => 'email']) ?>
        </div>

        <!-- Biography / Description -->
        <?= $form->field($model, 'bio_description')->textarea([
            'placeholder' => 'Fale um pouco sobre você, sua formação ou sua função na CromIA...',
            'rows' => 4,
            'class' => 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-white/5 rounded-xl px-4 py-3 text-slate-900 dark:text-white focus:outline-none focus:border-rose-500/40 focus:ring-1 focus:ring-rose-500/30 transition duration-200 w-full font-light placeholder:text-slate-450 dark:placeholder:text-slate-600'
        ])->label('Biografia / Descrição Pessoal') ?>

        <div class="pt-4 border-t border-slate-200 dark:border-white/5">
            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-4 uppercase tracking-wider">Alterar Senha</h3>
            <p class="text-xs text-slate-500 mb-6 font-light">Deixe os campos abaixo em branco se não desejar alterar sua senha atual.</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- New Password -->
                <?= $form->field($model, 'new_password')->passwordInput(['placeholder' => 'Mínimo 4 caracteres'])->label('Nova Senha') ?>

                <!-- Confirm New Password -->
                <?= $form->field($model, 'confirm_password')->passwordInput(['placeholder' => 'Repita a nova senha'])->label('Confirmar Nova Senha') ?>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4 flex justify-end gap-3">
            <a href="<?= Url::to(['panel/index']) ?>" class="px-6 py-3 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900/60 dark:hover:bg-slate-900 border border-slate-200 dark:border-white/5 text-slate-700 dark:text-slate-200 font-semibold rounded-xl transition duration-300 text-sm">
                Cancelar
            </a>
            <?= Html::submitButton('Salvar Alterações', [
                'class' => 'px-6 py-3 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white font-bold rounded-xl shadow-lg shadow-rose-500/10 dark:shadow-none transition duration-200 text-sm cursor-pointer'
            ]) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>

</div>
