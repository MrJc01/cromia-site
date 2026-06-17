<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\Article;
use app\models\ProjectService;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\Response;

class PanelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create-article', 'update-article', 'delete-article', 'profile'],
                        'roles' => ['@'], // Only logged-in users
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create-project', 'update-project', 'delete-project', 'users'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity?->role === 'admin';
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete-article' => ['POST'],
                    'delete-project' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Dashboard listing all articles and projects/services.
     * @return string
     */
    public function actionIndex(): string
    {
        $articles = Article::find()->orderBy(['created_at' => SORT_DESC])->all();
        $projects = ProjectService::find()->orderBy(['created_at' => SORT_DESC])->all();

        return $this->render('index', [
            'articles' => $articles,
            'projects' => $projects,
        ]);
    }

    /**
     * Create Article
     */
    public function actionCreateArticle()
    {
        $model = new Article();
        // Default values for fields
        $model->author_group = Yii::$app->user->identity->username;
        $model->author_id = Yii::$app->user->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Artigo criado com sucesso.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('article-form', [
            'model' => $model,
            'title' => 'Criar Artigo',
        ]);
    }

    /**
     * Update Article
     */
    public function actionUpdateArticle($id)
    {
        $model = $this->findArticle((int)$id);

        // Authorization check: only admin or the article owner can update
        if (Yii::$app->user->identity->role !== 'admin' && (int)$model->author_id !== (int)Yii::$app->user->id) {
            throw new ForbiddenHttpException('Você não tem permissão para editar este artigo.');
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Artigo atualizado com sucesso.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('article-form', [
            'model' => $model,
            'title' => 'Editar Artigo: ' . $model->title,
        ]);
    }

    /**
     * Delete Article
     */
    public function actionDeleteArticle($id): Response
    {
        $model = $this->findArticle((int)$id);

        // Authorization check: only admin or the article owner can delete
        if (Yii::$app->user->identity->role !== 'admin' && (int)$model->author_id !== (int)Yii::$app->user->id) {
            throw new ForbiddenHttpException('Você não tem permissão para excluir este artigo.');
        }

        $model->delete();
        Yii::$app->session->setFlash('success', 'Artigo excluído com sucesso.');
        return $this->redirect(['index']);
    }

    /**
     * Create Project
     */
    public function actionCreateProject()
    {
        $model = new ProjectService();
        // Default values
        $model->status = 'active';
        $model->type = 'project';

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Projeto/Serviço criado com sucesso.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('project-form', [
            'model' => $model,
            'title' => 'Criar Projeto / Serviço',
        ]);
    }

    /**
     * Update Project
     */
    public function actionUpdateProject($id)
    {
        $model = $this->findProject((int)$id);

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Projeto/Serviço atualizado com sucesso.');
                return $this->redirect(['index']);
            }
        }

        return $this->render('project-form', [
            'model' => $model,
            'title' => 'Editar Projeto/Serviço: ' . $model->name,
        ]);
    }

    /**
     * Delete Project
     */
    public function actionDeleteProject($id): Response
    {
        $model = $this->findProject((int)$id);
        $model->delete();
        Yii::$app->session->setFlash('success', 'Projeto/Serviço excluído com sucesso.');
        return $this->redirect(['index']);
    }

    /**
     * List all users (admin only)
     * @return string
     */
    public function actionUsers(): string
    {
        $users = User::find()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('users', [
            'users' => $users,
        ]);
    }

    /**
     * User profile update (email, bio, password)
     */
    public function actionProfile()
    {
        /** @var User $model */
        $model = Yii::$app->user->identity;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Perfil atualizado com sucesso.');
                return $this->refresh();
            }
        }

        $model->new_password = '';
        $model->confirm_password = '';

        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    /**
     * Finds Article
     */
    protected function findArticle(int $id): Article
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('O artigo solicitado não existe.');
    }

    /**
     * Finds Project
     */
    protected function findProject(int $id): ProjectService
    {
        if (($model = ProjectService::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('O projeto/serviço solicitado não existe.');
    }
}
