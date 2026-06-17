<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;

?>
<footer id="footer" class="mt-auto border-t border-slate-250 dark:border-slate-900 bg-slate-50/50 dark:bg-slate-950/60 py-8 transition-colors duration-350">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-4 md:space-y-0 text-sm text-slate-500">
            <!-- Copyright -->
            <div class="text-center md:text-left">
                &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>. Todos os direitos reservados.
            </div>
            
            <!-- Powered by Yii -->
            <div class="flex items-center space-x-2">
                <a href="https://www.yiiframework.com/" rel="external" target="_blank" class="hover:text-slate-700 dark:hover:text-slate-300 transition-colors duration-200 flex items-center space-x-1.5">
                    <span><?= Yii::t('yii', 'Powered by') ?></span>
                    <!-- Inline SVGs or styled images. Since Yii images are available, we will load them. -->
                    <?= Html::img(
                        '@web/images/yii3_full_for_dark.svg',
                        [
                            'alt' => 'Yii Framework',
                            'class' => 'h-5 w-auto filter opacity-60 hover:opacity-100 transition-opacity duration-200',
                        ],
                    ) ?>
                </a>
            </div>
        </div>
    </div>
</footer>
