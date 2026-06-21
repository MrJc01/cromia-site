<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'CROM Agent - Orquestrador Local de Agentes Autônomos';
?>
<div class="agent-page max-w-6xl mx-auto relative overflow-hidden">
    <!-- Blueish Ambient Nebulas -->
    <div class="glow-blue top-[-150px] left-[-150px]"></div>
    <div class="glow-cyan top-[30%] right-[-150px]"></div>
    <div class="glow-blue bottom-[-150px] left-[20%]"></div>

    <style>
        .glow-blue {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.08) 0%, rgba(37, 99, 235, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
        }
        .glow-cyan {
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.08) 0%, rgba(6, 182, 212, 0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: -1;
        }
        /* Custom tab styles */
        .tab-btn.active {
            color: #0891b2;
            border-color: #06b6d4;
            background-color: rgba(6, 182, 212, 0.05);
        }
        .dark .tab-btn.active {
            color: #22d3ee;
            border-color: #22d3ee;
            background-color: rgba(6, 182, 212, 0.1);
        }
    </style>

    <!-- HERO SECTION -->
    <div class="relative py-16 md:py-24 flex flex-col items-center text-center">
        <!-- Floating Agent Logo with Hover Swapping -->
        <div class="relative w-36 h-36 rounded-full bg-gradient-to-tr from-cyan-500/20 via-blue-500/10 to-indigo-500/30 border border-cyan-500/20 dark:border-white/5 flex items-center justify-center shadow-2xl dark:shadow-[0_0_80px_rgba(6,182,212,0.15)] mb-8 group backdrop-blur-[8px]">
            <!-- Primary Logo (normal state, fades out on hover) -->
            <img src="<?= Url::to('@web/images/agent-logo-primary.png') ?>" alt="Crom Agent Logo Primary" class="absolute h-20 w-auto transform transition-all duration-500 ease-in-out group-hover:opacity-0 group-hover:scale-90 drop-shadow-[0_0_15px_rgba(6,182,212,0.3)]">
            <!-- Secondary Logo (hover state, fades in on hover) -->
            <img src="<?= Url::to('@web/images/agent-logo-secondary.png') ?>" alt="Crom Agent Logo Secondary" class="absolute h-20 w-auto transform transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100 scale-90 group-hover:scale-100 drop-shadow-[0_0_15px_rgba(6,182,212,0.45)]">
        </div>

        <!-- Tagline Badge -->
        <div class="inline-flex items-center space-x-2 bg-blue-50/50 dark:bg-slate-950/40 border border-blue-100 dark:border-blue-900/30 rounded-full px-4.5 py-1.5 mb-6 backdrop-blur-md">
            <span class="w-2 h-2 rounded-full bg-cyan-500 animate-pulse"></span>
            <span class="text-xs font-semibold text-cyan-600 dark:text-cyan-400 uppercase tracking-widest">Orquestrador Local de IA Autônoma</span>
        </div>

        <!-- Title -->
        <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tighter leading-[0.95] max-w-4xl bg-gradient-to-r from-slate-900 via-blue-800 to-indigo-950 dark:from-white dark:via-blue-100 dark:to-cyan-400 bg-clip-text text-transparent">
            Conheça o <span class="bg-gradient-to-r from-cyan-500 via-blue-500 to-indigo-500 bg-clip-text text-transparent">crom-agente</span>
        </h1>

        <!-- Subtitle -->
        <p class="mt-6 text-lg sm:text-xl text-slate-600 dark:text-slate-400 max-w-3xl font-light leading-relaxed">
            Uma engine local-first para execução de agentes autônomos, integrações de terminal PTY nativas e privacidade total de dados em sua máquina.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 w-full px-4">
            <a href="https://cloud.ia.crom.run" target="_blank" rel="noopener"
               class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-cyan-600 to-blue-600 hover:from-cyan-500 hover:to-blue-500 text-white font-bold rounded-xl shadow-lg shadow-cyan-500/20 transition-all duration-300 text-center transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                <i data-lucide="cloud" class="w-5 h-5"></i> Acessar Portal Cloud
            </a>
            <a href="#arquitetura" 
               class="w-full sm:w-auto px-8 py-4 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900/60 dark:hover:bg-slate-900 border border-slate-200 dark:border-white/5 text-slate-700 dark:text-slate-200 font-semibold rounded-xl transition-all duration-300 text-center backdrop-blur-sm">
                Ver Arquitetura
            </a>
        </div>
        <p class="mt-4 text-sm text-cyan-600 dark:text-cyan-400 font-medium animate-pulse">⚠️ Sistema atualmente em Fase Alpha Pública</p>
    </div>

    <!-- ROADMAP / MODELO DE DISPONIBILIZAÇÃO -->
    <div id="downloads" class="py-16 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold tracking-widest text-cyan-500 uppercase">Distribuição & Roadmap</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Como ter acesso?</h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light">
                O ecossistema Crom está sendo lançado de forma modular. Veja os canais de liberação de cada componente:
            </p>        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- 1. Agente App -->
            <div class="bento-card rounded-2xl p-6 flex flex-col justify-between border border-slate-200 dark:border-blue-900/20 bg-white dark:bg-slate-950/40">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-500 mb-6">
                        <i data-lucide="monitor" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-cyan-600 dark:text-cyan-400 uppercase font-mono">Interface Gráfica</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-1 mb-3">crom-agente-app</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Aplicativo desktop completo com interface gráfica baseada em React e empacotada via Tauri. Permite criar projetos, gerenciar conversas, galeria de mídias e terminais.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-white/5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Beta em Breve
                    </span>
                </div>
            </div>

            <!-- 2. Agente & SDK -->
            <div class="bento-card rounded-2xl p-6 flex flex-col justify-between border border-slate-200 dark:border-blue-900/20 bg-white dark:bg-slate-950/40">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500 mb-6">
                        <i data-lucide="terminal" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-blue-600 dark:text-blue-400 uppercase font-mono">Core & Multi-Provider</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-1 mb-3">Daemon & SDK</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light mb-3">
                        Binário de controle headless escrito em Go. Opera com diversos provedores de modelos (como Ollama local para Llama/Qwen, OpenRouter, Claude, Gemini, etc.), oferecendo terminais PTY seguros via IPC socket.
                    </p>
                    <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed font-light">
                        Estudos de integração e wrappers serão disponibilizados em repositórios organizados, com bindings futuros planejados para Python, TypeScript e Rust.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-white/5">
                    <a href="https://crom.run/apoio" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 text-xs font-bold text-cyan-600 dark:text-cyan-400 hover:underline">
                        Seja um Apoiador <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                    </a>
                </div>
            </div>

            <!-- 3. Crom Agent Cloud -->
            <div class="bento-card rounded-2xl p-6 flex flex-col justify-between border border-slate-200 dark:border-blue-900/20 bg-white dark:bg-slate-950/40">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-500 mb-6">
                        <i data-lucide="cloud" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-indigo-600 dark:text-indigo-400 uppercase font-mono">SaaS / Nuvem Dedicada</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-1 mb-3">crom-agent-cloud</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Sistema de aluguel simplificado do ecossistema do agente rodando em uma VPS própria e segura. Uma alternativa ideal para quem precisa de processamento persistente fora da máquina física.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-white/5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-500/10 text-blue-600 dark:text-blue-400 border border-blue-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Planejado
                    </span>
                </div>
            </div>

            <!-- 4. Crom IA Router -->
            <div class="bento-card rounded-2xl p-6 flex flex-col justify-between border border-slate-200 dark:border-blue-900/20 bg-white dark:bg-slate-950/40">
                <div>
                    <div class="w-12 h-12 rounded-xl bg-rose-500/10 flex items-center justify-center text-rose-500 mb-6">
                        <i data-lucide="zap" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xs font-bold text-rose-600 dark:text-rose-400 uppercase font-mono">Monetização & API</span>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mt-1 mb-3">Crom IA Router</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Desenvolvimento de um roteador de APIs de inteligência artificial otimizado. O serviço oferecerá planos acessíveis cobrando chamadas de modelos, auxiliando na sustentabilidade financeira de toda a pesquisa de IA da Crom.
                    </p>
                </div>
                <div class="mt-6 pt-4 border-t border-slate-100 dark:border-white/5">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Concepção Técnica
                    </span>
                </div>
            </div>
        </div>

        <!-- Banner de Lançamento & Modelo Open Source -->
        <div class="mt-12 p-6 md:p-8 rounded-2xl bg-gradient-to-r from-blue-500/10 via-cyan-500/5 to-indigo-500/10 border border-cyan-500/20 dark:border-cyan-400/10 flex flex-col md:flex-row items-center justify-between gap-6 backdrop-blur-md">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-full bg-cyan-500/15 flex items-center justify-center text-cyan-500 shrink-0">
                    <i data-lucide="rocket" class="w-6 h-6"></i>
                </div>
                <div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 mb-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 animate-pulse"></span> Fase Alpha Ativa
                    </span>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Tudo o que você precisa está no Portal Cloud!</h4>
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-light leading-relaxed">
                        Atualmente o ecossistema encontra-se em <strong>Alpha</strong>. Toda a documentação (SDK, Daemon, CLI), os downloads oficiais e as atualizações automáticas estão centralizadas na <a href="https://cloud.ia.crom.run" target="_blank" class="text-cyan-500 hover:underline font-bold">CromIA Cloud</a>. Crie sua conta e ajude-nos a financiar essa jornada apoiando o projeto!
                    </p>
                </div>
            </div>
            <a href="https://crom.run/apoio" target="_blank" rel="noopener" class="shrink-0 px-6 py-3 bg-cyan-600 hover:bg-cyan-500 text-white text-sm font-bold rounded-xl shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 whitespace-nowrap text-center">
                Apoiar o Projeto
            </a>
        </div>
    </div>

    <!-- REPOSITÓRIOS GITHUB -->
    <div class="py-16 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold tracking-widest text-emerald-500 uppercase">Open Source</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Repositórios Disponíveis</h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light">
                Acesse o código-fonte dos componentes principais do ecossistema no GitHub.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="https://github.com/MrJc01/crom-agente" target="_blank" rel="noopener" class="group block p-6 bg-white dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 rounded-2xl hover:border-emerald-500/30 shadow-sm hover:shadow-emerald-500/10 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <i data-lucide="github" class="w-6 h-6 text-slate-700 dark:text-slate-300 group-hover:text-emerald-500 transition-colors"></i>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-400 transition-colors">crom-agente</h3>
                </div>
                <p class="text-sm text-slate-600 dark:text-slate-400">Daemon Go que gerencia agentes locais, terminais (PTY) e chamadas a modelos IA.</p>
            </a>

            <a href="https://github.com/MrJc01/crom-agente-cli" target="_blank" rel="noopener" class="group block p-6 bg-white dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 rounded-2xl hover:border-emerald-500/30 shadow-sm hover:shadow-emerald-500/10 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <i data-lucide="terminal" class="w-6 h-6 text-slate-700 dark:text-slate-300 group-hover:text-emerald-500 transition-colors"></i>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-400 transition-colors">crom-agente-cli</h3>
                </div>
                <p class="text-sm text-slate-600 dark:text-slate-400">Interface de linha de comando para interagir diretamente com o daemon do agente.</p>
            </a>

            <a href="https://github.com/MrJc01/crom-agente-sdk" target="_blank" rel="noopener" class="group block p-6 bg-white dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 rounded-2xl hover:border-emerald-500/30 shadow-sm hover:shadow-emerald-500/10 transition-all duration-300">
                <div class="flex items-center gap-3 mb-4">
                    <i data-lucide="code" class="w-6 h-6 text-slate-700 dark:text-slate-300 group-hover:text-emerald-500 transition-colors"></i>
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white group-hover:text-emerald-400 transition-colors">crom-agente-sdk</h3>
                </div>
                <p class="text-sm text-slate-600 dark:text-slate-400">Bibliotecas e documentação para integrar as funcionalidades do agente em outras aplicações.</p>
            </a>
        </div>
    </div>

    <!-- SCREENSHOTS SHOWCASE (TABBED INTERACTIVE SECTION) -->
    <div class="py-16 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs font-bold tracking-widest text-cyan-500 uppercase">Visualização da Interface</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">O Aplicativo de Perto</h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light">
                Explore a interface e as capacidades funcionais do aplicativo oficial do agente.
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <!-- Sidebar Nav tabs -->
            <div class="w-full lg:w-80 flex flex-row lg:flex-col flex-wrap lg:flex-nowrap gap-2">
                <button onclick="switchTab('console')" id="tab-btn-console" class="tab-btn w-full text-left px-5 py-3.5 rounded-xl border border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 text-slate-700 dark:text-slate-350 hover:bg-slate-100 dark:hover:bg-slate-900/50 transition-all duration-200 text-sm font-semibold active">
                    1. Console do Agente
                </button>
                <button onclick="switchTab('chat')" id="tab-btn-chat" class="tab-btn w-full text-left px-5 py-3.5 rounded-xl border border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 text-slate-700 dark:text-slate-350 hover:bg-slate-100 dark:hover:bg-slate-900/50 transition-all duration-200 text-sm font-semibold">
                    2. Chat e Logs Síncronos
                </button>
                <button onclick="switchTab('gallery')" id="tab-btn-gallery" class="tab-btn w-full text-left px-5 py-3.5 rounded-xl border border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 text-slate-700 dark:text-slate-350 hover:bg-slate-100 dark:hover:bg-slate-900/50 transition-all duration-200 text-sm font-semibold">
                    3. Galeria de Mídias Local
                </button>
                <button onclick="switchTab('tasks')" id="tab-btn-tasks" class="tab-btn w-full text-left px-5 py-3.5 rounded-xl border border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 text-slate-700 dark:text-slate-350 hover:bg-slate-100 dark:hover:bg-slate-900/50 transition-all duration-200 text-sm font-semibold">
                    4. Agendador de Tarefas
                </button>
                <button onclick="switchTab('mobile')" id="tab-btn-mobile" class="tab-btn w-full text-left px-5 py-3.5 rounded-xl border border-slate-200 dark:border-white/5 bg-slate-50/50 dark:bg-slate-950/20 text-slate-700 dark:text-slate-350 hover:bg-slate-100 dark:hover:bg-slate-900/50 transition-all duration-200 text-sm font-semibold">
                    5. Conexão Wi-Fi Mobile
                </button>
            </div>

            <!-- Content Area (Screenshot + description) -->
            <div class="flex-grow w-full bg-slate-50/30 dark:bg-slate-950/20 border border-slate-200 dark:border-white/5 rounded-3xl p-6 md:p-8 relative shadow-lg">
                <!-- Console Screenshot Content -->
                <div id="tab-content-console" class="tab-content block">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Console Inicial do Agente</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        A tela de entrada permite selecionar seu workspace (diretório local de arquivos) e definir o prompt. Você pode escolher qual LLM rodar (locais via Ollama ou APIs cloud como Gemini) e o escopo de segurança da execução (Local, Sandbox Isolada, etc.).
                    </p>
                    <div class="border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden bg-slate-950">
                        <img src="<?= Url::to('@web/images/agent-console.png') ?>" alt="Console Inicial do Agente" class="w-full max-h-[500px] object-contain mx-auto">
                    </div>
                </div>

                <!-- Chat & Logs Content -->
                <div id="tab-content-chat" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Chat Interativo e Logs do Daemon</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Interface de conversa unificada com o agente. Na lateral direita, você acompanha em tempo real os logs de execução emitidos pelo Daemon local do Go (loops ReAct de tomada de decisões, chamadas de terminal de script e alterações de status).
                    </p>
                    <div class="border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden bg-slate-950">
                        <img src="<?= Url::to('@web/images/agent-chat-logs.png') ?>" alt="Chat do Agente e Logs de Execução" class="w-full max-h-[500px] object-contain mx-auto">
                    </div>
                </div>

                <!-- Gallery Content -->
                <div id="tab-content-gallery" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Galeria de Mídias e Arquivos de Projetos</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Painel centralizado de gravação e arquivamento de mídias do projeto. O aplicativo Tauri gerencia gravações de tela e áudio através do daemon e as indexa localmente em um banco de dados IndexedDB no cliente para fácil acesso e envio aos modelos de visão.
                    </p>
                    <div class="border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden bg-slate-950">
                        <img src="<?= Url::to('@web/images/agent-gallery.png') ?>" alt="Galeria de Mídias e Arquivos" class="w-full max-h-[500px] object-contain mx-auto">
                    </div>
                </div>

                <!-- Tasks Content -->
                <div id="tab-content-tasks" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Agendador de Tarefas Periódicas</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Configure cronjobs ou tarefas agendadas em segundo plano para o agente executar de forma autônoma. O gerenciador monitora execuções de testes, alertas de status e execuções programadas em seus repositórios locais.
                    </p>
                    <div class="border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden bg-slate-950">
                        <img src="<?= Url::to('@web/images/agent-tasks.png') ?>" alt="Agendador de Tarefas" class="w-full max-h-[500px] object-contain mx-auto">
                    </div>
                </div>

                <!-- Mobile Connect Content -->
                <div id="tab-content-mobile" class="tab-content hidden">
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Conexão Wi-Fi para Dispositivos Móveis</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Acesse a interface de chat do agente e a galeria de arquivos diretamente de seu celular. O aplicativo Tauri e o daemon em Go geram um QR code de espelhamento que expõe o painel do agente na rede Wi-Fi local de forma protegida.
                    </p>
                    <div class="border border-slate-200 dark:border-white/5 rounded-2xl overflow-hidden bg-slate-950">
                        <img src="<?= Url::to('@web/images/agent-mobile.png') ?>" alt="Conexão Móvel via QR Code" class="w-full max-h-[500px] object-contain mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TECHNICAL ARCHITECTURE & MERMAID DIAGRAM -->
    <div id="arquitetura" class="py-16 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-xs font-bold tracking-widest text-cyan-500 uppercase">Por Dentro do Sistema</span>
            <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Como o Sistema Funciona?</h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light">
                O crom-agente foi desenvolvido com uma arquitetura híbrida focada em execução nativa local de alta velocidade.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-stretch">
            <!-- Diagram Column -->
            <div class="lg:col-span-7 bg-slate-50/50 dark:bg-slate-950/30 border border-slate-200 dark:border-blue-900/10 rounded-3xl p-6 md:p-8 flex flex-col items-center justify-center shadow-inner relative overflow-hidden group/diag min-h-[520px]">
                <div class="absolute top-4 right-4 z-10 flex items-center space-x-2">
                    <button onclick="toggleDiagramFullscreen()" class="p-2 rounded-xl bg-white/90 hover:bg-white dark:bg-slate-900 dark:hover:bg-slate-800 border border-slate-200 dark:border-white/5 text-slate-600 dark:text-slate-400 transition-all duration-200 shadow-md cursor-pointer hover:scale-105" title="Ver em Tela Cheia">
                        <i data-lucide="maximize-2" class="w-4.5 h-4.5"></i>
                    </button>
                </div>
                
                <!-- Diagram Tab Buttons Selector (Simulating UX Specialist) -->
                <div class="flex items-center space-x-2 mb-6 bg-slate-100 dark:bg-slate-900/60 p-1 rounded-xl border border-slate-200 dark:border-white/5 z-10">
                    <button onclick="switchDiagram('arch')" id="diag-btn-arch" class="diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-800 dark:text-white shadow-sm transition-all duration-200 cursor-pointer">
                        Arquitetura Local
                    </button>
                    <button onclick="switchDiagram('ux')" id="diag-btn-ux" class="diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 transition-all duration-200 cursor-pointer">
                        Jornada & UX de Conexão
                    </button>
                </div>

                <!-- Diagram Container Arch (Active) -->
                <div id="diagram-container-arch" class="mermaid-diagram-block w-full max-w-lg select-none block">
                    <div id="diagram-container" class="mermaid w-full">
graph TD
    %% Componentes
    App["Tauri App (crom-agente-app)"] -->|HTTP / WS| Daemon
    CLI["crom-agente-cli"] -->|IPC Socket| Daemon
    VSCode["Crom IDE (VS Code Fork)"] -->|gRPC / REST| Daemon
    
    subgraph Daemon ["Daemon Go (crom-agente)"]
        APIServer["Servidor HTTP/WS"]
        GRPCServer["Servidor gRPC"]
        IPCServer["Servidor Unix Socket"]
        ProcessCtrl["PTY Shell Manager"]
        MediaCtrl["GStreamer & Vosk"]
        AgentLoop["ReAct Agent Engine"]
    end

    %% Camada SDK Atual e Futura
    SDKGo["Go SDK (crom-agente4/5)"] -->|gRPC / REST| Daemon
    
    subgraph SDKs ["Camada SDK Futura (Multi-Language)"]
        SDKPython["Python SDK"]
        SDKNode["TypeScript / Node.js SDK"]
        SDKRust["Rust SDK"]
    end
    SDKs -->|gRPC / REST| Daemon

    %% Recursos do Sistema
    ProcessCtrl -->|Fork / Exec| Bash["Bash Terminals"]
    MediaCtrl -->|wmctrl| X11["X11 Display Server"]
    MediaCtrl -->|arecord| Mic["Audio Input"]
                    </div>
                </div>

                <!-- Diagram Container UX (Hidden) -->
                <div id="diagram-container-ux" class="mermaid-diagram-block w-full max-w-lg select-none hidden">
                    <div id="diagram-container-ux-raw" class="mermaid w-full">
graph TD
    %% Jornada de Interação do Usuário (UI/UX)
    User["Novo Visitante"] -->|Navega pelo Site| LandingPage["Landing Page (CromIA)"]
    LandingPage -->|Explora docs/pesquisas| HF["Playground Hugging Face / Spaces"]
    LandingPage -->|Interessado no Agente| Downloads["Downloads Section (/agent)"]
    
    Downloads -->|Geral: Baixa App| TauriApp["crom-agente-app (React/Tauri)"]
    Downloads -->|Apoiador: Acesso SDK/Core| GoDaemon["Headless Core (Go Daemon)"]
    Downloads -->|Dev: Editor Integrado| CromIDE["Crom IDE (VS Code Fork)"]
    
    %% Configuração & Inicialização do Cliente
    TauriApp -->|1. Abre App & Cria Projeto| Workspace["Workspace Local"]
    TauriApp -->|2. Auto-detecta/Conecta| GoDaemon
    
    GoDaemon -->|Porta 9090/9091| API["Servidor local HTTP/WS/gRPC"]
    GoDaemon -->|Auto-detecta hardware| LLM["Ollama (Local LLMs) / APIs Cloud"]
    
    %% Loop de Ação do Cliente
    TauriApp -->|3. Prompt do Usuário| AgentLoop["Loop ReAct (Go Daemon)"]
    AgentLoop -->|4. Toma Decisão| ProcessControl["PTY Terminal / Sandbox"]
    ProcessControl -->|Executa Scripts/Testes| FileSystem["Arquivos Locais"]
    FileSystem -->|Gera Outputs/Alterações| TauriApp
    
    %% Conexão Wi-Fi Mobile
    TauriApp -->|Gera QR Code| QRCode["QR Code local"]
    QRCode -->|Pinch-to-Scan| Mobile["Mobile Companion / Browser no Celular"]
    Mobile -->|Interação Remota na rede local| GoDaemon
                    </div>
                </div>
            </div>

            <!-- Description Column -->
            <div class="lg:col-span-5 space-y-6 flex flex-col justify-between">
                <div class="p-6 bg-slate-50/20 dark:bg-slate-900/10 border border-slate-200 dark:border-white/5 rounded-2xl flex-grow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">1. O Daemon em Go (Core)</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-light leading-relaxed">
                        Um processo binário ultra-leve que executa silenciosamente em segundo plano. Ele gerencia as pseudo-terminais (PTY) de execução do sistema operacional e se comunica de forma assíncrona por gRPC, Unix Socket e WebSockets.
                    </p>
                </div>

                <div class="p-6 bg-slate-50/20 dark:bg-slate-900/10 border border-slate-200 dark:border-white/5 rounded-2xl flex-grow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">2. Comunicação e Integração SDK</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-light leading-relaxed">
                        O daemon expõe rotas HTTP e streams WebSocket. No desktop, o aplicativo Tauri consome esses dados para renderizar terminais interativos em tempo real e fornecer um visualizador de mídia dinâmico baseado em IndexedDB.
                    </p>
                </div>

                <div class="p-6 bg-slate-50/20 dark:bg-slate-900/10 border border-slate-200 dark:border-white/5 rounded-2xl flex-grow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">3. Execuções em Sandbox Isoladas</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-light leading-relaxed">
                        Para tarefas e comandos de script potencialmente destrutivos (como modificação profunda de arquivos de sistema ou comandos remotos), o daemon gerencia loops ReAct inteligentes capazes de rodar em sandbox Docker ou isolamento lógico local.
                    </p>
                </div>

                <div class="p-6 bg-slate-50/20 dark:bg-slate-900/10 border border-slate-200 dark:border-white/5 rounded-2xl flex-grow">
                    <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-2">4. Multi-provedores & Modularidade</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm font-light leading-relaxed">
                        O agente foi concebido para operar de forma flexível com múltiplos provedores de inteligência artificial, como Ollama (execução local), OpenRouter, Claude, Gemini, entre outros. Novos repositórios organizados serão disponibilizados em breve para unificar o ecossistema.
                    </p>
                </div>
            </div>
        </div>
    </div>



    <!-- Fullscreen Diagram Modal -->
    <div id="diagram-modal" class="fixed inset-0 z-[99999] hidden bg-slate-950/95 backdrop-blur-md flex flex-col items-center justify-between p-6 transition-all duration-300 opacity-0">
        <!-- Close Button -->
        <div class="absolute top-6 right-6 z-[102]">
            <button onclick="closeDiagramFullscreen()" class="p-3 rounded-full bg-slate-900 hover:bg-slate-800 border border-white/10 text-white cursor-pointer transition-all duration-200 shadow-lg" title="Fechar">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>
        
        <!-- Header Info -->
        <div class="text-center mt-4 mb-6 max-w-2xl px-4 z-[101]">
            <h3 class="text-2xl font-bold text-white mb-1">Diagrama de Arquitetura Local</h3>
            <p class="text-slate-400 text-sm font-light">Visão técnica do ecossistema crom-agente e sua jornada de execução local e em nuvem</p>
        </div>

        <!-- Scrollable content area containing diagram -->
        <div class="w-full flex-grow flex items-center justify-center overflow-auto p-4 md:p-8 z-[101]" id="modal-diagram-scroll-container">
            <!-- Container where the diagram will be copied or displayed -->
            <div id="modal-diagram-content" class="w-full max-w-5xl overflow-visible flex items-center justify-center select-none scale-95 transition-transform duration-300">
                <!-- Cloned SVG is injected here -->
            </div>
        </div>

        <!-- Zoom Controls Spacer -->
        <div class="h-16"></div>

        <!-- Zoom Controls -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center space-x-2 bg-slate-900/90 border border-white/10 rounded-full px-4 py-2 shadow-2xl backdrop-blur-md z-[102]">
            <button onclick="zoomDiagram(-25)" class="p-1.5 rounded-full hover:bg-slate-800 text-slate-355 hover:text-white transition-colors cursor-pointer" title="Zoom Out">
                <i data-lucide="zoom-out" class="w-5 h-5"></i>
            </button>
            <span id="zoom-indicator" class="text-xs font-mono font-bold text-slate-350 px-2 min-w-[48px] text-center select-none">100%</span>
            <button onclick="zoomDiagram(25)" class="p-1.5 rounded-full hover:bg-slate-800 text-slate-355 hover:text-white transition-colors cursor-pointer" title="Zoom In">
                <i data-lucide="zoom-in" class="w-5 h-5"></i>
            </button>
            <div class="w-px h-4 bg-white/10"></div>
            <button onclick="resetZoomDiagram()" class="p-1.5 rounded-full hover:bg-slate-800 text-slate-355 hover:text-white transition-colors cursor-pointer" title="Redefinir Zoom">
                <i data-lucide="rotate-ccw" class="w-5 h-5"></i>
            </button>
        </div>
    </div>
</div>

<!-- Scripts for Mermaid Rendering and Tab Switching -->
<script src="https://cdn.jsdelivr.net/npm/mermaid/dist/mermaid.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Mermaid with theme matching the page dark/light mode
        function initMermaid() {
            const isDark = document.documentElement.classList.contains('dark');
            mermaid.initialize({
                startOnLoad: true,
                theme: isDark ? 'dark' : 'default',
                securityLevel: 'loose',
                themeVariables: {
                    primaryColor: isDark ? '#1e293b' : '#f8fafc',
                    primaryTextColor: isDark ? '#cbd5e1' : '#334155',
                    lineColor: '#0ea5e9',
                    fontFamily: 'JetBrains Mono, monospace'
                }
            });
        }
        
        initMermaid();

        // Listen for theme switch toggle clicks to rebuild/retheme mermaid diagram if needed
        const toggleBtn = document.getElementById('theme-toggle');
        const toggleBtnMobile = document.getElementById('theme-toggle-mobile');
        
        const handleThemeChange = () => {
            // Give classList time to update
            setTimeout(() => {
                const isDark = document.documentElement.classList.contains('dark');
                // We re-render the diagram by changing its theme settings
                mermaid.initialize({
                    theme: isDark ? 'dark' : 'default',
                    themeVariables: {
                        primaryColor: isDark ? '#1e293b' : '#f8fafc',
                        primaryTextColor: isDark ? '#cbd5e1' : '#334155',
                        lineColor: '#0ea5e9'
                    }
                });
                // Force mermaid parsing
                mermaid.init(undefined, document.querySelectorAll('.mermaid'));
            }, 100);
        };

        toggleBtn?.addEventListener('click', handleThemeChange);
        toggleBtnMobile?.addEventListener('click', handleThemeChange);
    });

    // Tab switcher logic
    function switchTab(tabId) {
        // Hide all contents
        const contents = document.querySelectorAll('.tab-content');
        contents.forEach(content => {
            content.classList.add('hidden');
            content.classList.remove('block');
        });

        // Deactivate all buttons
        const buttons = document.querySelectorAll('.tab-btn');
        buttons.forEach(btn => {
            btn.classList.remove('active', 'text-cyan-600', 'dark:text-cyan-400', 'border-cyan-500', 'dark:border-cyan-400', 'bg-cyan-500/5', 'dark:bg-cyan-500/10');
        });

        // Show selected content
        const targetContent = document.getElementById('tab-content-' + tabId);
        if (targetContent) {
            targetContent.classList.remove('hidden');
            targetContent.classList.add('block');
        }

        // Activate selected button
        const targetBtn = document.getElementById('tab-btn-' + tabId);
        if (targetBtn) {
            targetBtn.classList.add('active', 'text-cyan-600', 'dark:text-cyan-400', 'border-cyan-500', 'dark:border-cyan-400', 'bg-cyan-500/5', 'dark:bg-cyan-500/10');
        }
    }

    // Diagram tab switcher (Architecture vs UX journey)
    function switchDiagram(type) {
        // Toggle blocks
        const archBlock = document.getElementById('diagram-container-arch');
        const uxBlock = document.getElementById('diagram-container-ux');
        
        if (type === 'arch') {
            archBlock.classList.remove('hidden');
            archBlock.classList.add('block');
            uxBlock.classList.remove('block');
            uxBlock.classList.add('hidden');
        } else {
            uxBlock.classList.remove('hidden');
            uxBlock.classList.add('block');
            archBlock.classList.remove('block');
            archBlock.classList.add('hidden');
        }
        
        // Toggle buttons classes
        const btnArch = document.getElementById('diag-btn-arch');
        const btnUx = document.getElementById('diag-btn-ux');
        if (type === 'arch') {
            btnArch.className = 'diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-800 dark:text-white shadow-sm transition-all duration-200 cursor-pointer';
            btnUx.className = 'diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 transition-all duration-200 cursor-pointer';
        } else {
            btnUx.className = 'diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold bg-white dark:bg-slate-800 text-slate-800 dark:text-white shadow-sm transition-all duration-200 cursor-pointer';
            btnArch.className = 'diag-tab-btn px-4 py-1.5 rounded-lg text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 transition-all duration-200 cursor-pointer';
        }
    }

    // Fullscreen diagram functions and zooming
    let currentDiagramZoom = 100;

    function applyZoom() {
        const svg = document.querySelector('#modal-diagram-content svg');
        const indicator = document.getElementById('zoom-indicator');
        if (svg) {
            svg.style.width = currentDiagramZoom + '%';
            svg.style.maxWidth = 'none';
            svg.style.height = 'auto';
            svg.style.maxHeight = 'none';
        }
        if (indicator) {
            indicator.textContent = currentDiagramZoom + '%';
        }
    }

    function zoomDiagram(amount) {
        currentDiagramZoom = Math.max(50, Math.min(300, currentDiagramZoom + amount));
        applyZoom();
    }

    function resetZoomDiagram() {
        currentDiagramZoom = 100;
        applyZoom();
    }

    function toggleDiagramFullscreen() {
        const modal = document.getElementById('diagram-modal');
        const activeBlock = document.querySelector('.mermaid-diagram-block.block');
        const originalSvg = activeBlock ? activeBlock.querySelector('svg') : null;
        const modalContent = document.getElementById('modal-diagram-content');
        const modalTitle = modal ? modal.querySelector('h3') : null;
        
        if (originalSvg && modal && modalContent) {
            // Update title in modal dynamically depending on active diagram
            if (modalTitle) {
                const isActiveArch = activeBlock.id === 'diagram-container-arch';
                modalTitle.textContent = isActiveArch ? 'Diagrama de Arquitetura Local' : 'Diagrama de Jornada & UX de Conexão';
            }

            // Append modal directly to body to escape parent stacking context and be strictly on front
            if (modal.parentElement !== document.body) {
                document.body.appendChild(modal);
            }
            
            const clonedSvg = originalSvg.cloneNode(true);
            modalContent.innerHTML = '';
            modalContent.appendChild(clonedSvg);
            
            // Reset zoom state
            currentDiagramZoom = 100;
            applyZoom();
            
            // Make sure Lucide icons inside modal are initialized
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                modalContent.classList.remove('scale-95');
                modalContent.classList.add('scale-100');
            }, 10);
        }
    }
    
    function closeDiagramFullscreen() {
        const modal = document.getElementById('diagram-modal');
        const modalContent = document.getElementById('modal-diagram-content');
        if (modal) {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            if (modalContent) {
                modalContent.classList.remove('scale-100');
                modalContent.classList.add('scale-95');
            }
            setTimeout(() => {
                modal.classList.add('hidden');
                modalContent.innerHTML = '';
            }, 300);
        }
    }

    // Escape key listener to close fullscreen
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeDiagramFullscreen();
        }
    });
</script>
