<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Controller;
use app\models\ProjectService;

class ProjectsController extends Controller
{
    /**
     * List all projects, products, and services grouped by type
     */
    public function actionIndex(): string
    {
        $products = ProjectService::find()->where(['type' => 'product'])->orderBy(['id' => SORT_ASC])->all();
        $services = ProjectService::find()->where(['type' => 'service'])->orderBy(['id' => SORT_ASC])->all();
        $projects = ProjectService::find()->where(['type' => 'project'])->orderBy(['id' => SORT_ASC])->all();

        $this->view->title = 'Nossos Projetos e Serviços - CromIA';

        return $this->render('index', [
            'products' => $products,
            'services' => $services,
            'projects' => $projects,
        ]);
    }
}
