<?php

declare(strict_types=1);

namespace app\controllers;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Article;
use cebe\markdown\GithubMarkdown;
use cebe\markdown\Markdown;

class BlogController extends Controller
{
    /**
     * List all articles
     */
    public function actionIndex(): string
    {
        $articles = Article::find()->orderBy(['created_at' => SORT_DESC])->all();

        return $this->render('index', [
            'articles' => $articles,
        ]);
    }

    /**
     * View a single article by slug
     */
    public function actionView(string $slug): string
    {
        $article = Article::findOne(['slug' => $slug]);
        if ($article === null) {
            throw new NotFoundHttpException('O artigo solicitado não foi encontrado.');
        }

        // Parse Markdown content
        if (class_exists(GithubMarkdown::class)) {
            $parser = new GithubMarkdown();
            $parser->html5 = true;
            $parser->keepListStartNumber = true;
        } else {
            $parser = new Markdown();
        }

        $htmlContent = $parser->parse($article->content);

        $this->view->title = $article->title . ' - CromIA Blog';

        return $this->render('view', [
            'article' => $article,
            'htmlContent' => $htmlContent,
        ]);
    }

    /**
     * View author profile and their articles
     */
    public function actionAuthor(int $id): string
    {
        $author = \app\models\User::findOne($id);
        if ($author === null) {
            throw new NotFoundHttpException('O autor solicitado não existe.');
        }

        $articles = Article::find()->where(['author_id' => $id])->orderBy(['created_at' => SORT_DESC])->all();

        $this->view->title = 'Perfil de ' . $author->username . ' - CromIA';

        return $this->render('author', [
            'author' => $author,
            'articles' => $articles,
        ]);
    }
}
