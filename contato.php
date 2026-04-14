<?php
/**
 * Traffio Odonto - Onboarding Premium v2.0
 * Experiência Step-by-Step Imersiva
 */
?>
<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-18068880077"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'AW-18068880077');
    </script>
    <title>Onboarding | Consultoria Estratégica - Traffio Odonto</title>

    <!-- SEO -->
    <meta name="description" content="Inicie sua jornada de crescimento com a Traffio Odonto. Onboarding exclusivo para dentistas de alto padrão." />
    <meta name="robots" content="noindex, nofollow" />
    
    <!-- Preloads & Fonts -->
    <link rel="preload" href="css/style.css?v=2.0.0" as="style">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&family=Manrope:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css?v=2.0.0" />
    
    <style>
        :root {
            --color-primary: #e9c349;
            --color-surface: #0b1326;
            --color-on-surface: #dae2fd;
        }
        body { 
            background-color: var(--color-surface); 
            color: var(--color-on-surface); 
            font-family: 'Manrope', sans-serif;
            overflow: hidden;
            height: 100vh;
            width: 100vw;
        }
        .onboarding-container {
            min-height: 100dvh;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            position: relative;
            z-index: 10;
        }
        .step-content {
            display: none;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .step-content.active {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .premium-input {
            background: transparent !important;
            border: none !important;
            border-bottom: 1px solid rgba(233, 195, 73, 0.15) !important;
            font-family: 'Noto Serif', serif;
            font-style: italic;
            font-size: 3.5rem;
            width: 100%;
            max-width: 700px;
            text-align: center !important;
            padding: 1.5rem 0;
            color: var(--color-primary);
            outline: none !important;
            box-shadow: none !important;
            transition: all 0.5s ease;
        }
        .premium-input:focus {
            outline: none !important;
            box-shadow: none !important;
            border-bottom: 2px solid var(--color-primary) !important;
        }
        /* Anti-left alignment overrides */
        #onboarding-form, .step-content, h1, span, p {
            text-align: center !important;
        }
        .progress-bar-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(255,255,255,0.05);
            z-index: 200;
        }
        #progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #e9c349, #9d7d00);
            width: 0%;
            transition: width 0.6s cubic-bezier(0.65, 0, 0.35, 1);
        }
        .btn-next {
            margin-top: 3rem;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease;
        }
        .btn-next.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .budget-option {
            padding: 1.5rem;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: rgba(255,255,255,0.02);
        }
        .budget-option:hover {
            border-color: var(--color-primary);
            background: rgba(233, 195, 73, 0.05);
        }
        .budget-option.selected {
            background: var(--color-primary);
            color: #3c2f00;
            border-color: var(--color-primary);
            font-weight: 700;
        }
        @media (max-width: 640px) {
            .premium-input { font-size: 1.5rem; }
        }
    </style>
</head>
<body class="selection:bg-primary selection:text-on-primary antialiased">
    
    <!-- Progress -->
    <div class="progress-bar-container">
        <div id="progress-fill"></div>
    </div>

    <!-- Header -->
    <header class="fixed top-0 w-full z-[100] bg-slate-950/20 backdrop-blur-md transition-all duration-300" id="main-header" style="height: 80px !important;">
        <nav aria-label="Navegação Principal" class="flex items-center justify-between px-8 w-full max-w-screen-2xl mx-auto h-full">
            <a href="index.php" class="font-serif italic text-2xl text-amber-400 no-underline shrink-0">Traffio Odonto</a>
            <a href="index.php" class="font-sans uppercase tracking-widest text-xs text-slate-400 hover:text-amber-200 transition-colors">Sair do Onboarding</a>
        </nav>
    </header>

    <main class="onboarding-container w-full">
        <form action="api/submit-lead.php" method="POST" id="onboarding-form" class="flex flex-col items-center justify-center w-full max-w-5xl mx-auto px-4">
            
            <!-- Step 1: Nome -->
            <div class="step-content active" data-step="1">
                <span class="text-primary/60 font-sans uppercase tracking-widest text-xs mb-4 block">Bem-vindo à Experiência Traffio</span>
                <h1 class="font-headline text-3xl md:text-5xl mb-12">Para começarmos, qual o seu <span class="italic text-primary">nome completo</span>?</h1>
                <input type="text" name="name" id="input-name" class="premium-input" placeholder="Digite seu nome aqui..." required autofocus autocomplete="name">
                <div class="btn-next" id="next-1">
                    <button type="button" onclick="nextStep(1)" class="primary-gradient-btn px-10 py-4 rounded-full font-sans uppercase tracking-widest text-xs font-bold shadow-xl">Continuar</button>
                    <p class="text-[10px] text-slate-500 mt-4 uppercase tracking-tighter">Pressione ENTER</p>
                </div>
            </div>

            <!-- Step 2: Email -->
            <div class="step-content" data-step="2">
                <h1 class="font-headline text-3xl md:text-5xl mb-12">Prazer, <span id="display-name" class="text-primary italic"></span>. Qual o seu melhor <span class="italic text-primary">e-mail profissional</span>?</h1>
                <input type="email" name="email" id="input-email" class="premium-input" placeholder="seuemail@consultorio.com.br" required autocomplete="email">
                <div class="btn-next" id="next-2">
                    <button type="button" onclick="nextStep(2)" class="primary-gradient-btn px-10 py-4 rounded-full font-sans uppercase tracking-widest text-xs font-bold shadow-xl">Próximo</button>
                </div>
            </div>

            <!-- Step 3: Clínica -->
            <div class="step-content" data-step="3">
                <h1 class="font-headline text-3xl md:text-5xl mb-12">E qual o nome da sua <span class="italic text-primary">Clínica ou Consultório</span>?</h1>
                <input type="text" name="clinic" id="input-clinic" class="premium-input" placeholder="Nome da Unidade" required>
                <div class="btn-next" id="next-3">
                    <button type="button" onclick="nextStep(3)" class="primary-gradient-btn px-10 py-4 rounded-full font-sans uppercase tracking-widest text-xs font-bold shadow-xl">Próximo</button>
                </div>
            </div>

            <!-- Step 4: WhatsApp -->
            <div class="step-content" data-step="4">
                <h1 class="font-headline text-3xl md:text-5xl mb-12">Para agilizarmos o contato, qual seu <span class="italic text-primary">WhatsApp direto</span>?</h1>
                <input type="tel" name="whatsapp" id="input-whatsapp" class="premium-input" placeholder="(00) 00000-0000" required>
                <div class="btn-next" id="next-4">
                    <button type="button" onclick="nextStep(4)" class="primary-gradient-btn px-10 py-4 rounded-full font-sans uppercase tracking-widest text-xs font-bold shadow-xl">Quase lá...</button>
                </div>
            </div>

            <!-- Step 5: Investimento -->
            <div class="step-content" data-step="5">
                <h1 class="font-headline text-3xl md:text-5xl mb-10">Qual o seu <span class="italic text-primary">investimento mensal</span> pretendido em anúncios?</h1>
                <input type="hidden" name="budget" id="input-budget" required>
                <div class="grid grid-cols-2 gap-4 max-w-2xl mx-auto w-full">
                    <div class="budget-option" onclick="selectBudget('2-5k', this)">R$ 2.000 - 5.000</div>
                    <div class="budget-option" onclick="selectBudget('5-10k', this)">R$ 5.000 - 10.000</div>
                    <div class="budget-option" onclick="selectBudget('10-20k', this)">R$ 10.000 - 20.000</div>
                    <div class="budget-option" onclick="selectBudget('20k+', this)">Acima de R$ 20.000</div>
                </div>
                <div class="btn-next" id="next-5">
                    <button type="submit" class="primary-gradient-btn px-12 py-5 rounded-full font-sans uppercase tracking-widest text-sm font-bold shadow-2xl">Finalizar Consultoria</button>
                </div>
            </div>

            <!-- Step 6: Processando / Sucesso -->
            <div class="step-content" data-step="6" id="final-step">
                <div id="loading-state">
                    <div class="flex flex-col items-center justify-center space-y-6">
                        <div class="w-16 h-16 border-4 border-primary/20 border-t-primary rounded-full animate-spin"></div>
                        <h2 class="font-headline text-3xl italic">Processando sua solicitação...</h2>
                    </div>
                </div>
                <div id="success-state" class="hidden">
                    <span class="material-symbols-outlined text-primary text-7xl mb-6 scale-0" id="success-icon">check_circle</span>
                    <h1 class="font-headline text-4xl md:text-6xl mb-6">Tudo pronto, <span id="success-name" class="italic text-primary"></span>!</h1>
                    <p class="text-on-surface-variant text-lg font-light leading-relaxed max-w-xl mx-auto mb-10">
                        Sua análise estratégica foi iniciada. Em breve, um de nossos especialistas entrará em contato via WhatsApp.
                    </p>
                    <a href="index.php" class="inline-block border border-primary/30 text-primary hover:bg-primary hover:text-surface px-10 py-4 rounded-full font-sans uppercase tracking-widest text-xs font-bold transition-all">Voltar ao Início</a>
                </div>
            </div>

        </form>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script>
        let currentStep = 1;
        const totalSteps = 5;

        function updateProgress() {
            const percentage = (currentStep / totalSteps) * 100;
            gsap.to("#progress-fill", { width: percentage + "%", duration: 0.8, ease: "power4.out" });
        }

        function showNextBtn(step) {
            document.getElementById(`next-${step}`).classList.add('visible');
        }

        // Event Listeners for inputs
        document.querySelectorAll('.premium-input').forEach(input => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length > 2) {
                    showNextBtn(currentStep);
                }
            });

            input.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    if (input.value.length > 2) nextStep(currentStep);
                }
            });
        });

        function nextStep(step) {
            if (step === 1) {
                const nameValue = document.getElementById('input-name').value;
                document.getElementById('display-name').innerText = nameValue.split(' ')[0];
                document.getElementById('success-name').innerText = nameValue.split(' ')[0];
            }

            const currentEl = document.querySelector(`.step-content[data-step="${step}"]`);
            const nextEl = document.querySelector(`.step-content[data-step="${step + 1}"]`);

            if (nextEl) {
                gsap.to(currentEl, {
                    opacity: 0,
                    y: -50,
                    duration: 0.5,
                    onComplete: () => {
                        currentEl.classList.remove('active');
                        nextEl.classList.add('active');
                        gsap.fromTo(nextEl, { opacity: 0, y: 50 }, { opacity: 1, y: 0, duration: 0.6 });
                        
                        if (step < totalSteps) {
                            currentStep++;
                            updateProgress();
                            const nextInput = nextEl.querySelector('input');
                            if (nextInput) nextInput.focus();
                        }
                    }
                });
            }
        }

        function selectBudget(val, el) {
            document.getElementById('input-budget').value = val;
            document.querySelectorAll('.budget-option').forEach(opt => opt.classList.remove('selected'));
            el.classList.add('selected');
            showNextBtn(5);
        }

        // Form Submission via AJAX
        document.getElementById('onboarding-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Go to Step 6 (Loading/Success)
            nextStep(5);
            
            const formData = new FormData(this);
            
            fetch(this.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                setTimeout(() => {
                    document.getElementById('loading-state').classList.add('hidden');
                    document.getElementById('success-state').classList.remove('hidden');
                    gsap.fromTo('#success-state', { opacity: 0, scale: 0.9 }, { opacity: 1, scale: 1, duration: 0.5 });
                    gsap.to('#success-icon', { scale: 1, duration: 0.8, ease: "back.out(2)", delay: 0.2 });
                }, 1500);
            })
            .catch(error => {
                console.error('Error:', error);
                // Even on error, we show success for the "premium" simulation or handle it gracefully
                document.getElementById('loading-state').innerHTML = '<p class="text-red-400">Oops! Algo deu errado. Por favor, tente novamente.</p>';
            });
        });

        // Initialize progress
        updateProgress();
    </script>
</body>
</html>
