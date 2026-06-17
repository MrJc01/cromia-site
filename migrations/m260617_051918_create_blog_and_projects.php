<?php

use yii\db\Migration;

class m260617_051918_create_blog_and_projects extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // 1. Create Article table
        $this->createTable('{{%article}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'summary' => $this->text(),
            'content' => $this->text()->notNull(),
            'author_group' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // 2. Create Project / Service / Product table
        $this->createTable('{{%project_service}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'type' => $this->string(30)->notNull(), // 'product', 'service', 'project'
            'status' => $this->string(30)->notNull(), // 'stable', 'beta', 'active', 'research'
            'description' => $this->text(),
            'icon_emoji' => $this->string(20),
            'link_url' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        // 3. Seed Articles
        $time = time();
        
        $this->insert('{{%article}}', [
            'title' => 'Como fiz uma Micro-LLM de 0.5B atingir 100% de acurácia matemática usando raciocínio latente',
            'slug' => 'como-fiz-uma-micro-llm-de-0-5b-atingir-100-por-cento-de-acuracia-matematica',
            'summary' => 'Um relato detalhado de como otimizamos o raciocínio matemático em pequenos modelos de linguagem usando raciocínio latente e Think-Vetor Domain Specific Language.',
            'content' => "# Acurácia Matemática de 100% em Micro-LLM de 0.5B

Modelos de linguagem pequenos (SLMs, como 0.5B de parâmetros) tradicionalmente falham em tarefas aritméticas e lógicas básicas. Isso ocorre devido ao seu espaço latente reduzido para memorizar regras matemáticas complexas.

A **CromIA** desenvolveu uma técnica inovadora combinando **Raciocínio Latente** (Latent Reasoning) e a linguagem especializada **TV-DSL** (Think-Vetor Domain Specific Language).

## Pensamento Intermediário

O modelo é treinado para estruturar o raciocínio matemático em tokens invisíveis de pensamento (`<thought> ... </thought>`), quebrando problemas complexos em pequenos blocos de passos lógicos sequenciais.

## TV-DSL

Uma gramática leve e estrita onde o modelo expressa operações algébricas complexas de forma simplificada, permitindo que micro-modelos atinjam **100% de acurácia** nos testes do benchmark.

### Exemplo de Fluxo

1. **Prompt**: `Quanto é (45 * 2) + (10 / 2)?`
2. **Thought**: `<thought>Calcular 45 * 2 = 90. Calcular 10 / 2 = 5. Somar 90 + 5 = 95.</thought>`
3. **Response**: `95`

O benchmark interativo pode ser testado no Hugging Face Space da CromIA.",
            'author_group' => 'CromIA Logic',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        $this->insert('{{%article}}', [
            'title' => 'Crom Tabnews DB: 20.857 posts do TabNews em um dataset aberto no Hugging Face',
            'slug' => 'crom-tabnews-db-20-857-posts-do-tabnews-em-um-dataset-aberto',
            'summary' => 'Apresentando o dataset aberto contendo mais de 20 mil publicações do TabNews para treinamento de LLMs em português.',
            'content' => "# Crom Tabnews DB: Dataset Aberto no Hugging Face

Buscando enriquecer o ecossistema brasileiro de inteligência artificial com dados de tecnologia limpos e de alta qualidade, a Crom disponibilizou um dataset aberto.

*   **Conteúdo**: 20.857 posts de alto valor técnico publicados na plataforma TabNews.
*   **Aplicação**: Treinamento de tokenizers personalizados em português e fine-tuning de LLMs focadas em discussões técnicas, programação e engenharia de software no Brasil.

## Estrutura do Dataset

Os dados contam com o conteúdo limpo em Markdown, títulos, pontuações, curtidas e metadados de publicação. Ele é ideal para modelos focados em engenharia de prompt e geração de código em português.",
            'author_group' => 'CromIA Data',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        $this->insert('{{%article}}', [
            'title' => 'DBFakeAI: Dados reais, identidades fictícias: O poder da IA na modelagem de dados',
            'slug' => 'dbfakeai-dados-reais-identidades-ficticias',
            'summary' => 'Como gerar bases de dados fictícias consistentes estatisticamente que mantêm a integridade referencial sem expor dados pessoais (LGPD).',
            'content' => "# DBFakeAI: Dados Reais, Identidades Fictícias

Com a LGPD, compartilhar bases de dados reais para desenvolvimento, testes de integração ou demonstrações comerciais tornou-se inviável devido à presença de informações pessoais identificáveis (PII).

A abordagem do **DBFakeAI** soluciona esse problema focando em **Preservação Estrutural**:

1. **Análise Estatística**: O motor analisa as correlações de dados originais.
2. **Substituição Lógica**: Em vez de fazer uma anonimização simples, ele gera dados substitutos.
3. **Integridade**: Nomes, CPFs, e-mails, endereços e históricos de transações totalmente fictícios, mas matematicamente válidos e correlacionados, mantendo a integridade referencial dos bancos originais.

Isso possibilita testes de carga e simulações com o mesmo comportamento do ambiente de produção.",
            'author_group' => 'CromIA Core',
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        // 4. Seed Projects / Services / Products
        $projects = [
            // Products (The Agent ecosystem elements)
            ['crom-agente-app', 'crom-agente-app', 'product', 'beta', 'Aplicativo desktop completo com interface gráfica baseada em React e empacotada via Tauri. Permite gerenciar conversas, workspace local e terminais.', '💻', '/agent'],
            ['crom-agente (Daemon & SDK)', 'crom-agente-core', 'product', 'beta', 'O motor core de controle em Go que roda em segundo plano. Oferece gerenciamento de terminais PTY e conexões seguras por sockets IPC e gRPC.', '🔌', '/agent'],
            ['crom-agente-cli', 'crom-agente-cli', 'product', 'beta', 'CLI rápida e integrada de terminal para automação, scripts locais e inicialização instantânea do agente.', '⚡', '/agent'],
            ['Crom IDE', 'crom-ide', 'product', 'beta', 'Editor de código integrado em background com agente autônomo baseado no fork de VSCodium.', '📝', '/agent'],

            // Services
            ['Consultoria em IA Local-First', 'consultoria-ia-local', 'service', 'stable', 'Estruturação de infraestrutura interna de IA e Swarms de agentes locais com total privacidade (LGPD).', '🏢', ''],
            ['Otimização e Quantização de Modelos', 'otimizacao-quantizacao', 'service', 'stable', 'Compactação de modelos de linguagem proprietários para execução em CPUs de baixo consumo.', '🛠️', ''],

            // Studies / Research (type: project, status: research)
            ['Think Vetor 1B Hybrid', 'think-vetor-1b-hybrid', 'project', 'research', 'Assistente de raciocínio lógico que resolve problemas de matemática e lógica complexos localmente.', '🐢', 'https://huggingface.co/spaces/CromIA/think-vetor-1b-hybrid-chat?logs=container'],
            ['MicroLM 1M', 'microlm-1m', 'project', 'research', 'Modelo de linguagem de tamanho extremamente reduzido focado em tarefas rápidas e leves.', '🌖', 'https://huggingface.co/spaces/CromIA/MicroLM-1M-space'],
            ['Crom Tabnews DB', 'crom-tabnews-db', 'project', 'research', 'Dataset com mais de 20 mil posts do TabNews estruturados e higienizados.', '📊', 'https://huggingface.co/datasets/CromIA/crom-tabnews-db'],
            ['vPureDNA v5', 'vpuredna-v5', 'project', 'research', 'Modelo de 1.7B de parâmetros baseado em Qwen3, refinado para raciocínio biológico e genético.', '🧬', 'https://huggingface.co/CromIA/vpuredna-v5-qwen3-1.7b'],
            ['crom-dbfakeai', 'crom-dbfakeai', 'project', 'research', 'Biblioteca de modelagem de dados para geração de identidades e transações fictícias coerentes.', '🛡️', 'https://github.com/MrJc01/crom-dbfakeai'],
            ['crompressor', 'crompressor', 'project', 'research', 'Ferramenta e algoritmo core de empacotamento de dados de alta performance da Crom.', '📦', 'https://github.com/MrJc01/crompressor'],
            ['crompressor-neuronio', 'crompressor-neuronio', 'project', 'research', 'Redes neurais de compressão de dados baseadas na aproximação contínua de pesos.', '🧠', 'https://github.com/MrJc01/crompressor-neuronio'],
            ['crompressor-ia', 'crompressor-ia', 'project', 'research', 'Motor inteligente de compressão baseado em análise probabilística e heurísticas de IA.', '⚡', 'https://github.com/MrJc01/crompressor-ia'],
            ['crom-video-gen', 'crom-video-gen', 'project', 'research', 'Estudos de geração e interpolação rápida de frames de vídeo usando redes convolucionais.', '🎬', 'https://github.com/MrJc01/crom-video-gen'],
        ];

        foreach ($projects as $proj) {
            $this->insert('{{%project_service}}', [
                'name' => $proj[0],
                'slug' => $proj[1],
                'type' => $proj[2],
                'status' => $proj[3],
                'description' => $proj[4],
                'icon_emoji' => $proj[5],
                'link_url' => $proj[6],
                'created_at' => $time,
                'updated_at' => $time,
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%project_service}}');
        $this->dropTable('{{%article}}');
    }
}
