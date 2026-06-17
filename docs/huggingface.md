# Hub Hugging Face (CromIA)

Nossas principais contribuições para a comunidade de IA de código aberto estão disponíveis no Hugging Face sob a organização **[CromIA](https://huggingface.co/CromIA)**. 

---

## 🌖 Modelos Pequenos de Linguagem (SLMs)

Nosso foco é desenvolver modelos pequenos altamente eficientes que rodam de forma nativa e extremamente rápida em hardware local (Local-First).

### 1. Coleção MicroLM
Modelos projetados para tarefas de texto gerais e processamento superleve:
*   **[CromIA/MicroLM-1M](https://huggingface.co/CromIA/MicroLM-1M)**: Nosso modelo inicial focado em geração leve de texto (1.18M parâmetros).
*   **[CromIA/MicroLM2-1M](https://huggingface.co/CromIA/MicroLM2-1M)**: Segunda geração evoluída do MicroLM (1.71M parâmetros) com melhorias significativas de coerência.
*   **[CromIA/MicroLM2-1M-tokenizer](https://huggingface.co/CromIA/MicroLM2-1M-tokenizer)**: Tokenizer proprietário otimizado para o ecossistema MicroLM.

### 2. Modelos Híbridos de Raciocínio (Think Vetor)
Focados em resolver problemas de lógica e matemática com precisão através de inferência de raciocínio latente:
*   **[CromIA/think-vetor-1b-hybrid-lora](https://huggingface.co/CromIA/think-vetor-1b-hybrid-lora)**: Adaptador LoRA híbrido para modelos de 1B de parâmetros, focado em acurácia de raciocínio.
*   **[CromIA/think-vetor-0.5b-lora](https://huggingface.co/CromIA/think-vetor-0.5b-lora)**: Adaptador LoRA ultra-leve para modelos de 0.5B de parâmetros.

### 3. Coleção vPureDNA
*   **[CromIA/vpuredna-v5-qwen3-1.7b](https://huggingface.co/CromIA/vpuredna-v5-qwen3-1.7b)**: Modelo de 1.7B de parâmetros baseado na arquitetura Qwen3, refinado para entender representações lógicas complexas.
*   **[CromIA/CROM-IA-V4.2](https://huggingface.co/CromIA/CROM-IA-V4.2)**: Modelo estável com 4.59M de parâmetros.
*   **[CromIA/CROM-IA-V3.5-Qwen-1.5B-Organic](https://huggingface.co/CromIA/CROM-IA-V3.5-Qwen-1.5B-Organic)**: Variante orgânica otimizada para respostas naturais.
*   **[CromIA/CROM-IA-V1-DNA](https://huggingface.co/CromIA/CROM-IA-V1-DNA)**: O modelo fundador de 0.5B de parâmetros.

---

## 📊 Datasets

*   **[CromIA/crom-tabnews-db](https://huggingface.co/datasets/CromIA/crom-tabnews-db)**:
    *   **Tamanho**: 20.9k downloads / 396 curtidas.
    *   **Descrição**: Dataset aberto contendo 20.857 posts minerados do TabNews. Ideal para treinamento de modelos de linguagem em português brasileiro e análise de tendências de tecnologia.

---

## 🐢 Spaces e Agentes Interativos

Demonstrações interativas hospedadas na infraestrutura Hugging Face Spaces para experimentação rápida:

1.  **[Think Vetor 1b Hybrid Chat](https://huggingface.co/spaces/CromIA/think-vetor-1b-hybrid-chat)**:
    *   *Assistente de raciocínio lógico-matemático de 1B parâmetros.* Resolva equações e problemas de lógica com o assistente analisando o pensamento intermediário.
2.  **[Think Vetor Chat](https://huggingface.co/spaces/CromIA/think-vetor-chat)**:
    *   *Chat com IA lógica.* Computa cálculos matemáticos instantaneamente.
3.  **[MicroLM 1M Space](https://huggingface.co/spaces/CromIA/MicroLM-1M-space)**:
    *   *Playground oficial para testar o MicroLM-1M* direto no navegador.
4.  **[Rosa Chat V3.5b](https://huggingface.co/spaces/CromIA/Rosa-Chat-V3.5b)**:
    *   *Assistente de chat* equipado com o modelo CROM-IA de alta performance.
