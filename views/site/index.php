<?php

/** @var yii\web\View $this */
/** @var app\models\Article[] $latestArticles */
/** @var app\models\ProjectService[] $featuredProducts */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'CROM | Autonomia Técnica e Soberania Digital - CromIA';
?>
<div class="site-index">

    <!-- HERO SECTION -->
    <div class="relative py-20 md:py-28 flex flex-col items-center text-center">
        <!-- Background Hero Rose Watermark (fades out on hover) -->
        <div class="absolute top-0 right-[5%] lg:right-[15%] z-0 opacity-[0.05] hover:opacity-0 transition-opacity duration-1000 ease-out select-none pointer-events-auto cursor-help text-rose-500 hidden md:block" title="CromIA Rose">
            <span class="material-symbols-outlined text-[160px]">deceased</span>
        </div>
        <!-- Translucent sphere (inspired by reference design image) -->
        <div class="relative w-64 h-64 md:w-80 md:h-80 rounded-full bg-gradient-to-tr from-rose-500/10 via-amber-500/10 to-purple-500/20 dark:from-rose-500/5 dark:via-amber-500/5 dark:to-purple-500/10 border border-slate-250/50 dark:border-white/5 flex items-center justify-center shadow-lg dark:shadow-[0_0_80px_rgba(239,68,68,0.06)] mb-10 group backdrop-blur-[6px] overflow-hidden">
            <!-- Neural grid line connection decoration inside the sphere -->
            <div class="absolute inset-0 rounded-full bg-[radial-gradient(rgba(0,0,0,0.08)_1px,transparent_1px)] dark:bg-[radial-gradient(rgba(255,255,255,0.04)_1px,transparent_1px)] [background-size:14px_14px]"></div>
            <div class="relative w-32 h-32 md:w-40 md:h-40 flex items-center justify-center">
                <!-- Secondary Logo (normal state, fades out on hover) -->
                <img src="<?= Url::to('@web/images/logo-secondary.png') ?>" alt="CromIA Logo Secondary" class="absolute inset-0 h-32 md:h-40 w-auto transform transition-all duration-700 ease-in-out group-hover:opacity-0 group-hover:scale-95" style="filter: hue-rotate(135deg) saturate(1.2) contrast(1.1) drop-shadow(0 0 20px rgba(239,68,68,0.15));">
                <!-- Primary Logo (hover state, fades in on hover) -->
                <img src="<?= Url::to('@web/images/logo-primary.png') ?>" alt="CromIA Logo Primary" class="absolute inset-0 h-32 md:h-40 w-auto transform transition-all duration-700 ease-in-out opacity-0 group-hover:opacity-100 scale-95 group-hover:scale-100" style="filter: hue-rotate(135deg) saturate(1.2) contrast(1.1) drop-shadow(0 0 20px rgba(239,68,68,0.15));">
            </div>
        </div>

        <!-- Tagline Badge -->
        <div class="inline-flex items-center space-x-2 bg-slate-100/80 dark:bg-slate-950/40 border border-slate-200 dark:border-white/5 rounded-full px-4.5 py-1.5 mb-6 backdrop-blur-md">
            <span class="w-2 h-2 rounded-full bg-rose-500 animate-pulse"></span>
            <span class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-widest">Soberania Digital & IA Local-First</span>
        </div>

        <!-- Title -->
        <h1 class="text-5xl sm:text-6xl md:text-7xl font-extrabold tracking-tighter leading-[0.95] max-w-4xl bg-gradient-to-r from-slate-900 via-slate-800 to-slate-700 dark:from-white dark:via-slate-100 dark:to-slate-400 bg-clip-text text-transparent">
            Soberania Técnica no <span class="bg-gradient-to-r from-rose-500 via-amber-500 to-orange-400 bg-clip-text text-transparent">Brasil</span>
        </h1>

        <!-- Subtitle -->
        <p class="mt-6 text-lg sm:text-xl text-slate-600 dark:text-slate-400 max-w-2xl font-light leading-relaxed">
            Desenvolvemos modelos de linguagem, compactadores neurais e swarms de agentes concebidos para execução local e privacidade absoluta.
        </p>

        <!-- CTA Buttons -->
        <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4 w-full px-4">
            <a href="<?= Url::to(['docs/view', 'page' => 'index']) ?>" 
               class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-rose-600 to-amber-600 hover:from-rose-500 hover:to-amber-500 text-white font-bold rounded-xl shadow-lg shadow-rose-500/20 transition-all duration-300 text-center transform hover:-translate-y-0.5">
                Ver Documentação
            </a>
            <a href="<?= Url::to(['projects/index']) ?>" 
               class="w-full sm:w-auto px-8 py-4 bg-slate-900/60 hover:bg-slate-900 border border-white/5 text-slate-200 font-semibold rounded-xl transition-all duration-300 text-center backdrop-blur-sm">
                Nossos Projetos
            </a>
        </div>

        <!-- Metrics Stats -->
        <div class="grid grid-cols-3 gap-8 md:gap-16 mt-16 max-w-xl w-full border-t border-slate-200 dark:border-white/5 pt-8 font-mono">
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white">10+</div>
                <div class="text-[11px] text-slate-500 uppercase tracking-wider mt-1">Modelos SLM</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-rose-500">20k+</div>
                <div class="text-[11px] text-slate-500 uppercase tracking-wider mt-1">Posts Dataset</div>
            </div>
            <div class="text-center">
                <div class="text-3xl md:text-4xl font-extrabold text-slate-900 dark:text-white">100%</div>
                <div class="text-[11px] text-slate-500 uppercase tracking-wider mt-1">Acurácia Math</div>
            </div>
        </div>
    <    <!-- PROJETOS DESTAQUE -->
    <div class="py-20 border-t border-slate-200 dark:border-white/5">
        <div class="flex items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Portfólio</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Projetos Destaque</h2>
            </div>
            <a href="<?= Url::to(['projects/index']) ?>" class="text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 transition-colors duration-200 flex items-center gap-1">
                Ver todos <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="bento-card bento-card-rose rounded-2xl p-6 flex flex-col justify-between group">
                    <div>
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-rose-500/10 text-rose-500 dark:text-rose-400 group-hover:bg-rose-500/20 transition duration-300">
                                <span class="text-xl"><?= Html::encode($product->icon_emoji) ?></span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-800 dark:text-slate-100 group-hover:text-slate-900 dark:group-hover:text-white transition duration-300">
                                <?= Html::encode($product->name) ?>
                            </h3>
                        </div>
                        <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-6 font-light">-light">
                            <?= Html::encode($product->description) ?>
                        </p>
                    </div>
                    <?php if (!empty($product->link_url)): ?>
                        <a href="<?= Html::encode($product->link_url) ?>" 
                           target="_blank" 
                           rel="noopener" 
                           class="inline-flex items-center text-xs font-semibold text-rose-400 hover:text-rose-400 group-hover:translate-x-1 transition-all duration-300 gap-1">
                            Acessar Plataforma <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- VOCÊ É NECESSÁRIO / FILOSOFIA BENTO GRID -->
    <div class="py-20 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                VOCÊ É <span class="text-rose-500">NECESSÁRIO</span>
            </h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light leading-relaxed">
                Desenvolvemos inteligência livre para pessoas livres. Acreditamos na autonomia tecnológica contra a centralização de dados corporativos nas mãos de monopólios de nuvem.
            </p>
        </div>

        <!-- Outer panel wrapper with a thin outline border (inspired by reference design image) -->
        <div class="border border-slate-250/50 dark:border-white/5 rounded-3xl p-6 md:p-10 bg-slate-50/10 dark:bg-slate-950/20 backdrop-blur-sm shadow-sm dark:shadow-none transition-colors duration-300">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Bento 1: Não comprometemos -->
                <div class="bento-card rounded-2xl p-8">
                    <div class="w-12 h-12 rounded-xl bg-rose-500/10 flex items-center justify-center text-rose-500 dark:text-rose-400 mb-6">
                        <i data-lucide="shield-check" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Não Comprometemos</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Sua infraestrutura de computação é sua. Seus segredos de negócios e dados privados permanecem inteiramente sob seu domínio físico e lógico.
                    </p>
                </div>

                <!-- Bento 2: privacidade local -->
                <div class="bento-card rounded-2xl p-8">
                    <div class="w-12 h-12 rounded-xl bg-rose-500/10 flex items-center justify-center text-rose-500 dark:text-rose-400 mb-6">
                        <i data-lucide="eye-off" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Privacidade Sem Obstrução</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Nossos modelos rodam localmente (Local-First), garantindo conformidade natural com a LGPD e privacidade absoluta por design padrão.
                    </p>
                </div>

                <!-- Bento 3: Construtores -->
                <div class="bento-card rounded-2xl p-8">
                    <div class="w-12 h-12 rounded-xl bg-rose-500/10 flex items-center justify-center text-rose-500 dark:text-rose-400 mb-6">
                        <i data-lucide="cpu" class="w-6 h-6"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Desenvolvido para Máquinas</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed font-light">
                        Código sem dependências infladas. Foco máximo em latência mínima, taxa de tokens ideal e menor pegada energética para rodar em hardware modesto.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- TIMELINE DE PROJETOS E ARQUITETURA -->
    <div class="py-20 border-t border-slate-200 dark:border-white/5">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-4xl font-extrabold tracking-tight text-slate-900 dark:text-white">
                Ecossistema Swarm & Modelos
            </h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light">
                Uma visão sequencial da arquitetura de inteligência desenvolvida sob os pilares da CromIA.
            </p>
        </div>

        <div class="relative max-w-3xl mx-auto">
            <!-- Linha vertical central -->
            <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-[1px] bg-slate-200 dark:bg-slate-800"></div>

            <div class="space-y-12">
                <!-- Timeline Item 1 -->
                <div class="flex items-center justify-between w-full">
                    <div class="w-5/12 hidden md:block"></div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 rounded-full bg-white dark:bg-slate-950 border border-rose-500 text-rose-600 dark:text-rose-400 text-xs font-mono">
                        1
                    </div>
                    <div class="w-full md:w-5/12 bg-slate-50/50 dark:bg-slate-950/20 border border-slate-200 dark:border-slate-900 rounded-2xl p-6 shadow-lg">
                        <div class="text-xs text-rose-600 dark:text-rose-400 font-bold tracking-wider mb-1 uppercase font-mono">Modelos de Linguagem</div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">MicroLM Series</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed font-light">
                            Modelos leves (1.18M e 1.71M parâmetros) otimizados para execução ultrarrápida de geração de texto na borda (edge).
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="flex items-center justify-between w-full flex-row-reverse md:flex-row">
                    <div class="w-full md:w-5/12 bg-slate-50/50 dark:bg-slate-950/20 border border-slate-200 dark:border-slate-900 rounded-2xl p-6 shadow-lg">
                        <div class="text-xs text-amber-600 dark:text-amber-500 font-bold tracking-wider mb-1 uppercase font-mono">Raciocínio Latente</div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Think Vetor Chat</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed font-light">
                            Integração de gramática TV-DSL com cadeias de pensamento latente (`<thought>`) permitindo 100% de acurácia matemática em pequenos modelos.
                        </p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 rounded-full bg-white dark:bg-slate-950 border border-amber-600 text-amber-600 dark:text-amber-500 text-xs font-mono">
                        2
                    </div>
                    <div class="w-5/12 hidden md:block"></div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="flex items-center justify-between w-full">
                    <div class="w-5/12 hidden md:block"></div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 rounded-full bg-white dark:bg-slate-950 border border-rose-500 text-rose-600 dark:text-rose-400 text-xs font-mono">
                        3
                    </div>
                    <div class="w-full md:w-5/12 bg-slate-50/50 dark:bg-slate-950/20 border border-slate-200 dark:border-slate-900 rounded-2xl p-6 shadow-lg">
                        <div class="text-xs text-rose-600 dark:text-rose-400 font-bold tracking-wider mb-1 uppercase font-mono">Estrutura de Dados</div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">DBFakeAI Generator</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed font-light">
                            Geração de banco de dados fictícios relacionais mantendo distribuições estatísticas exatas do banco original para fins de desenvolvimento.
                        </p>
                    </div>
                </div>

                <!-- Timeline Item 4 -->
                <div class="flex items-center justify-between w-full flex-row-reverse md:flex-row">
                    <div class="w-full md:w-5/12 bg-slate-50/50 dark:bg-slate-950/20 border border-slate-200 dark:border-slate-900 rounded-2xl p-6 shadow-lg">
                        <div class="text-xs text-amber-600 dark:text-amber-500 font-bold tracking-wider mb-1 uppercase font-mono">Compressão Científica</div>
                        <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Crompressor Neurônio</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-xs leading-relaxed font-light">
                            Algoritmos de compactação matemática de dados estruturados com o uso de redes neurais convolucionais integradas.
                        </p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 rounded-full bg-white dark:bg-slate-950 border border-amber-500 text-amber-600 dark:text-amber-500 text-xs font-mono">
                        4
                    </div>
                    <div class="w-5/12 hidden md:block"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- PRIMARY WRAPPER FOR BLOG -->
    <div class="py-20 border-t border-slate-200 dark:border-white/5 relative">
        <!-- Background Section Rose Watermark (fades out on hover) -->
        <div class="absolute bottom-10 left-[2%] z-0 opacity-[0.03] hover:opacity-0 transition-opacity duration-1000 ease-out select-none pointer-events-auto cursor-help text-rose-500 hidden xl:block" title="CromIA Research">
            <span class="material-symbols-outlined text-[130px]">deceased</span>
        </div>
        <div class="flex items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Pesquisa</span>
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-1">Últimas Publicações</h2>
            </div>
            <a href="<?= Url::to(['blog/index']) ?>" class="text-sm font-semibold text-slate-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 transition-colors duration-200 flex items-center gap-1">
                Ver todos <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php $i = 1; foreach ($latestArticles as $article): ?>
                <article class="relative p-6 bg-slate-50/50 hover:bg-slate-50/80 dark:bg-slate-950/20 dark:hover:bg-slate-950/40 border border-slate-200/60 dark:border-white/5 hover:border-rose-500/20 rounded-2xl transition duration-300 group flex flex-col justify-between h-full">
                    <!-- Número gigante com opacidade em cima (Estilo crom.run) -->
                    <div class="absolute top-2 right-4 font-mono font-bold text-6xl text-slate-300 dark:text-slate-800/10 group-hover:text-rose-500/10 select-none pointer-events-none transition duration-300">
                        <?= sprintf('%02d', $i++) ?>
                    </div>
                    
                    <div>
                        <div class="flex items-center gap-3 mb-4 text-xs font-mono">
                            <span class="text-rose-600 dark:text-rose-400 font-semibold uppercase tracking-wider">
                                CROM &bull; <?= Html::encode($article->author_group) ?>
                            </span>
                            <span class="text-slate-500"><?= date('d/m/Y', $article->created_at) ?></span>
                        </div>
                        
                        <h3 class="text-lg font-bold text-slate-800 dark:text-slate-200 group-hover:text-slate-900 dark:group-hover:text-white transition duration-200 mb-3 line-clamp-2 leading-tight">
                            <a href="<?= Url::to(['blog/view', 'slug' => $article->slug]) ?>">
                                <?= Html::encode($article->title) ?>
                            </a>
                        </h3>
                        
                        <p class="text-slate-600 dark:text-slate-400 text-sm line-clamp-3 leading-relaxed mb-6 font-light">
                            <?= Html::encode($article->summary) ?>
                        </p>
                    </div>

                    <div class="flex items-center gap-1 text-xs font-bold text-rose-600 dark:text-rose-400 group-hover:text-rose-500 dark:group-hover:text-rose-300 transition duration-200 mt-auto">
                        <a href="<?= Url::to(['blog/view', 'slug' => $article->slug]) ?>">Ler artigo completo</a>
                        <i data-lucide="arrow-right" class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition duration-200"></i>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- BANNER: PRONTO PARA CONSTRUIR? -->
    <div class="relative my-16 bg-gradient-to-br from-slate-50 to-rose-50/30 dark:from-slate-950/60 dark:to-rose-950/5 border border-slate-200 dark:border-white/5 rounded-3xl p-8 md:p-16 text-center overflow-hidden">
        <!-- Glow interno rose/copper -->
        <div class="absolute inset-0 bg-gradient-to-tr from-rose-600/5 to-transparent blur-3xl pointer-events-none"></div>

        <div class="relative z-10 max-w-2xl mx-auto">
            <span class="text-xs font-bold tracking-widest text-rose-500 uppercase">Começar</span>
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900 dark:text-white mt-2 leading-tight">
                Pronto para Construir?
            </h2>
            <p class="mt-4 text-slate-600 dark:text-slate-400 font-light leading-relaxed">
                Acesse nossos repositórios open-source, leia a documentação e experimente os modelos hospedados em nosso hub.
            </p>

            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="<?= Url::to(['docs/view', 'page' => 'index']) ?>" class="px-8 py-3.5 bg-gradient-to-r from-rose-600 to-amber-600 text-white font-bold rounded-xl shadow-lg transition duration-300">
                    Documentação
                </a>
                <a href="https://huggingface.co/CromIA" target="_blank" rel="noopener" class="px-8 py-3.5 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-850 border border-slate-200 dark:border-white/5 text-slate-800 dark:text-slate-200 font-bold rounded-xl transition duration-300">
                    Hugging Face
                </a>
                <a href="https://github.com/MrJc01" target="_blank" rel="noopener" class="px-8 py-3.5 bg-slate-100 hover:bg-slate-200 dark:bg-slate-900 dark:hover:bg-slate-850 border border-slate-200 dark:border-white/5 text-slate-800 dark:text-slate-200 font-bold rounded-xl transition duration-300">
                    GitHub
                </a>
                <a href="https://crom.run/apoio" target="_blank" rel="noopener" class="px-8 py-3.5 bg-rose-600 hover:bg-rose-500 text-white font-bold rounded-xl shadow-lg transition duration-300 flex items-center gap-1.5 cursor-pointer">
                    <span class="material-symbols-outlined text-[18px] leading-none">favorite</span> Apoiar CromIA
                </a>
            </div>
        </div>
    </div>
</div>
