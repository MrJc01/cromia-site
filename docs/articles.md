# Ensaios e Artigos Técnicos

Nossos artigos científicos, relatos de desenvolvimento e tutoriais avançados de engenharia de software são publicados originalmente no **TabNews**. Reunimos abaixo o resumo conceitual dessas publicações.

---

## 🔬 [Acurácia Matemática de 100% em Micro-LLM de 0.5B](https://www.tabnews.com.br/MrJ/como-fiz-uma-micro-llm-de-0-5b-atingir-100-por-cento-de-acuracia-matematica-usando-raciocinio-latente-e-tv-dsl-benchmark-space-huggingface)

### O Problema
Modelos de linguagem pequenos (SLMs, como 0.5B de parâmetros) tradicionalmente falham em tarefas aritméticas e lógicas básicas devido ao seu espaço latente reduzido para memorizar regras matemáticas complexas.

### A Solução da CromIA
Desenvolvemos uma técnica combinando **Raciocínio Latente** (Latent Reasoning) e a linguagem especializada **TV-DSL** (Think-Vetor Domain Specific Language).
*   **Pensamento Intermediário**: O modelo é treinado para estruturar o raciocínio matemático em tokens invisíveis de pensamento (`<thought> ... </thought>`), quebrando problemas complexos em pequenos blocos de passos lógicos sequenciais.
*   **TV-DSL**: Uma gramática leve e estrita onde o modelo expressa operações algébricas complexas de forma simplificada, permitindo que micro-modelos atinjam **100% de acurácia** nos testes do benchmark.
*   **Hospedagem**: O benchmark interativo pode ser testado no [Hugging Face Space da CromIA](https://huggingface.co/spaces/CromIA/think-vetor-chat).

---

## 📊 [Crom Tabnews DB: Dataset com 20.857 Posts em Hugging Face](https://www.tabnews.com.br/MrJ/crom-tabnews-db-20-857-posts-do-tabnews-em-um-dataset-aberto-no-hugging-face)

### O Projeto
Buscando enriquecer o ecossistema brasileiro de inteligência artificial com dados de tecnologia limpos e de alta qualidade, a Crom disponibilizou um dataset aberto.

*   **Conteúdo**: 20.857 posts de alto valor técnico publicados na plataforma TabNews.
*   **Aplicação**: Treinamento de tokenizers personalizados em português e fine-tuning de LLMs focadas em discussões técnicas, programação e engenharia de software no Brasil.
*   **Link**: Acesso direto no [Hugging Face Dataset](https://huggingface.co/datasets/CromIA/crom-tabnews-db).

---

## 🛡️ [DBFakeAI: Dados Reais, Identidades Fictícias](https://www.tabnews.com.br/MrJ/dbfakeai-dados-reais-identidades-ficticias-o-poder-da-ia-na-modelagem-de-dados)

### O Problema
Com a LGPD, compartilhar bases de dados reais para desenvolvimento, testes de integração ou demonstrações comerciais tornou-se inviável devido à presença de informações pessoais identificáveis (PII).

### A Abordagem DBFakeAI
*   **Preservação Estrutural**: Em vez de fazer uma anonimização simples (que destrói a coerência e os relacionamentos lógicos do banco), o **DBFakeAI** analisa as distribuições estatísticas reais e gera dados de substituição lógicos.
*   **Geração Inteligente**: Cria nomes, CPFs, e-mails, endereços e históricos de transações totalmente fictícios, mas matematicamente válidos e correlacionados, mantendo a integridade referencial dos bancos originais para simulação fiel.

---

## 📑 [Catálogo de Conteúdos da Crom](https://www.tabnews.com.br/MrJ/conteudos/1)
*   Espaço de indexação centralizado onde publicamos atualizações constantes de nosso roteiro tecnológico, notas sobre novos modelos e ensaios rápidos sobre inteligência local e compactação.
