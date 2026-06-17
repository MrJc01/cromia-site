<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<footer id="footer" class="mt-auto border-t border-slate-250 dark:border-slate-900 bg-slate-50/50 dark:bg-slate-950/60 py-8 transition-colors duration-350">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 text-sm text-slate-500">
            <!-- Copyright -->
            <div class="w-full text-center">
                &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>. Todos os direitos reservados.
            </div>
        </div>
    </div>
</footer>
