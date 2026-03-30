<?php
/**
 * Traffio Odonto - Página de Contato
 */
?>
<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato | Marketing para Odontologia - Traffio Odonto</title>
    
    <!-- SEO -->
    <meta name="description" content="Entre em contato com a Traffio Odonto. Especialistas em marketing para dentistas e gestão de tráfego para odontologia de alto padrão." />
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="https://traffio-odonto.com.br/contato" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&family=Manrope:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary selection:text-on-primary antialiased">
    
    <!-- Header -->
    <header class="fixed top-0 w-full z-[100] bg-slate-950/60 backdrop-blur-xl border-b border-white/5" id="main-header">
        <nav aria-label="Navegação Principal" class="flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto">
            <a href="index.php" class="font-serif italic text-2xl text-amber-400 no-underline">Traffio Odonto</a>
            <a href="index.php" class="font-sans uppercase tracking-widest text-xs text-slate-300 hover:text-amber-200 no-underline">Voltar ao Início</a>
        </nav>
    </header>

    <main class="pt-32 pb-32">
        <div class="container mx-auto px-8 max-w-4xl">
            <div class="text-center mb-16 reveal-up">
                <span class="text-primary font-label uppercase tracking-widest text-xs">Consultoria Estratégica</span>
                <h1 class="font-headline text-4xl md:text-6xl mt-4 mb-6">Fale com um <span class="italic text-primary">Especialista</span></h1>
                <p class="text-on-surface-variant text-lg font-light leading-relaxed">
                    Preencha o formulário abaixo para iniciarmos a análise do seu consultório e potencial de crescimento.
                </p>
            </div>

            <div class="reveal-up">
                <div class="glass-card p-10 md:p-16 rounded-2xl border border-primary/20 shadow-2xl relative overflow-hidden" id="form-wrapper">
                    <form action="api/submit-lead.php" method="POST" id="multi-step-form" class="space-y-8">
                        <!-- Step 1 -->
                        <div class="step-container space-y-6 active" id="step-1">
                            <h3 class="text-2xl font-headline">Seus Dados</h3>
                            <p class="text-xs text-on-surface-variant uppercase tracking-widest">Passo 1 de 2</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="name">Nome Completo</label>
                                    <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="name" name="name" placeholder="Dr/Dra." required type="text"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="email">E-mail Profissional</label>
                                    <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="email" name="email" placeholder="email@clinica.com.br" required type="email"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="clinic">Clínica / Local de Atendimento</label>
                                    <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="clinic" name="clinic" placeholder="Nome da Clínica" required type="text"/>
                                </div>
                            </div>
                            <button type="button" class="w-full primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary flex justify-center items-center gap-2 group next-step-btn">
                                Próxima Etapa <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                            </button>
                        </div>

                        <!-- Step 2 -->
                        <div class="step-container space-y-6" id="step-2">
                            <h3 class="text-2xl font-headline">Dados da Clínica</h3>
                            <p class="text-xs text-on-surface-variant uppercase tracking-widest">Passo 2 de 2</p>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="whatsapp">WhatsApp Direto</label>
                                    <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000" required type="tel"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="budget">Investimento Mensal Pretendido</label>
                                    <select class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none appearance-none cursor-pointer" id="budget" name="budget" required>
                                        <option disabled selected value="">Selecione uma faixa</option>
                                        <option value="5-10k">R$ 5.000 - R$ 10.000</option>
                                        <option value="10-20k">R$ 10.000 - R$ 20.000</option>
                                        <option value="20k+">Acima de R$ 20.000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <button type="button" class="w-1/3 border border-outline-variant/30 rounded-lg font-label text-on-surface-variant hover:bg-surface-container-highest transition-colors prev-step-btn">Voltar</button>
                                <button type="submit" class="w-2/3 primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary">Solicitar Consultoria</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-slate-950 w-full py-16 border-t border-slate-900 overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-center px-12 gap-8 max-w-screen-2xl mx-auto">
            <div class="font-serif text-xl text-amber-500">Traffio Odonto</div>
            <div class="font-sans text-sm font-light text-slate-500">
                © <?= date('Y') ?> Traffio Odonto. Marketing Ético & Previsível.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
