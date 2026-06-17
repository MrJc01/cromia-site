<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use cebe\markdown\GithubMarkdown;
use cebe\markdown\Markdown;

class DocsController extends Controller
{
    /**
     * Map of valid documentation pages to their files under @app/docs/
     */
    private array $docsMap = [
        'index' => 'index.md',
        'huggingface' => 'huggingface.md',
        'repositories' => 'repositories.md',
        'articles' => 'articles.md',
        'collaborate' => 'collaborate.md',
    ];

    /**
     * Menu configuration for the sidebar
     */
    private array $menuItems = [
        ['label' => 'Visão Geral', 'page' => 'index'],
        ['label' => 'Hugging Face Hub', 'page' => 'huggingface'],
        ['label' => 'Repositórios GitHub', 'page' => 'repositories'],
        ['label' => 'Artigos e Ensaios', 'page' => 'articles'],
        ['label' => 'Colaborar & Contatos', 'page' => 'collaborate'],
    ];

    /**
     * View action to load and parse markdown files
     */
    public function actionView(string $page = 'index'): string
    {
        if (!isset($this->docsMap[$page])) {
            throw new NotFoundHttpException('A página de documentação solicitada não foi encontrada.');
        }

        $filePath = Yii::getAlias('@app/docs/' . $this->docsMap[$page]);
        if (!file_exists($filePath)) {
            throw new NotFoundHttpException('O arquivo de documentação correspondente não existe.');
        }

        $markdownContent = file_get_contents($filePath);
        
        // Instantiate the parser with a fallback strategy
        if (class_exists(GithubMarkdown::class)) {
            $parser = new GithubMarkdown();
            $parser->html5 = true;
            $parser->keepListStartNumber = true;
        } else {
            $parser = new Markdown();
        }

        $htmlContent = $parser->parse($markdownContent);

        // Set page title dynamically based on the current label
        $activeLabel = 'Documentação';
        foreach ($this->menuItems as $item) {
            if ($item['page'] === $page) {
                $activeLabel = $item['label'];
                break;
            }
        }
        $this->view->title = $activeLabel . ' - CromIA Docs';

        return $this->render('view', [
            'htmlContent' => $htmlContent,
            'currentPage' => $page,
            'menuItems' => $this->menuItems,
        ]);
    }
}
