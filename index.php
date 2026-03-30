<?php
/**
 * Traffio Odonto - Landing Page v2.0 (PHP/High Performance)
 * Target Score: Lighthouse 100
 */
?>
<!DOCTYPE html>
<html lang="pt-BR" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Marketing para Odontologia | Traffio Odonto - Gestão de Tráfego</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🦷</text></svg>" />
    <link rel="apple-touch-icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🦷</text></svg>" />
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Traffio Odonto - Marketing para odontologia e marketing para dentistas. Gestão de tráfego para odontologia com foco em implantes e reabilitações. Atraia pacientes de alto ticket com ética e previsibilidade." />
    <meta name="keywords" content="marketing para odontologia, marketing para dentistas, Gestão de tráfego para odontologia, Gestão de tráfego para dentistas, consultórios de odontologia" />
    <meta name="author" content="Traffio Odonto" />
    <meta name="theme-color" content="#0b1326" />

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://traffio.com.br/" />
    <meta property="og:title" content="Traffio Odonto | Marketing para Odontologia e Gestão de Tráfego" />
    <meta property="og:description" content="Marketing ético e previsível para clínicas odontológicas de alto padrão. Especialistas em gestão de tráfego para dentistas focados em implantes e reabilitações." />
    <meta property="og:image" content="https://traffio-odonto.com.br/og-image.jpg" />

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="https://traffio.com.br/" />
    <meta property="twitter:title" content="Traffio Odonto | Marketing para Odontologia" />
    <meta property="twitter:description" content="Marketing ético e previsível para dentistas de alto padrão. Atraia pacientes qualificados com gestão de tráfego especializada." />
    <meta property="twitter:image" content="https://traffio-odonto.com.br/og-image.jpg" />

    <link rel="canonical" href="https://traffio.com.br/" />

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Traffio Odonto",
      "image": "https://traffio.com.br/logo.png",
      "@id": "https://traffio.com.br/",
      "url": "https://traffio.com.br/",
      "telephone": "+5511999999999",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Av. Premium, 1000",
        "addressLocality": "São Paulo",
        "addressRegion": "SP",
        "postalCode": "01000-000",
        "addressCountry": "BR"
      },
      "description": "Especialistas em marketing para odontologia e gestão de tráfego para dentistas de alto padrão."
    }
    </script>
    
    <!-- Critical Preloads (Performance 100) -->
    <link rel="preload" href="hero-bg.webp" as="image" fetchpriority="high">

    <!-- Google Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&family=Manrope:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" media="print" onload="this.media='all'"/>
    <noscript>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&family=Manrope:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    </noscript>
    
    <!-- Critical CSS (Inlined for 100 Score) -->
    <style>
        :root {
            --color-primary:#e9c349;--color-surface:#0b1326;--color-on-surface:#dae2fd;--font-headline:'Noto Serif',serif;--font-body:'Manrope',sans-serif;
        }
        body{background-color:var(--color-surface);color:var(--color-on-surface);font-family:var(--font-body);margin:0;padding:0;overflow-x:hidden;-webkit-font-smoothing:antialiased;}
        .hero-section{min-height:100dvh !important;height:100dvh !important;display:flex;align-items:center;position:relative;overflow:hidden;background-color:#0b1326;}
        #main-header{position:fixed;top:0;left:0;width:100%;height:80px !important;z-index:100;transition:all .3s ease;display:flex;align-items:center;background-color:rgba(11, 19, 38, 0.6);backdrop-filter:blur(12px);border-bottom:1px solid rgba(255,255,255,0.05);}
        .hero-section::before{content:"";position:absolute;inset:0;background:radial-gradient(circle at 20% 50%, rgba(233,195,73,0.05) 0%, transparent 50%);z-index:1;}
        .primary-gradient-btn{background:linear-gradient(135deg,#e9c349 0%,#9d7d00 100%);color:#3c2f00;text-decoration:none;display:inline-block;transition:all .3s ease;}
        .font-headline{font-family:var(--font-headline);}
        .container{width:100%;max-width:1400px;margin:0 auto;padding:0 2rem;}
        .text-reveal{opacity:0;}
    </style>

    <!-- Main Styles (Deferred) -->
    <!-- Main CSS -->
    <link rel="stylesheet" href="css/style.css?v=1.0.3" media="print" onload="this.media='all'"/>
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary selection:text-on-primary antialiased">
    
    <!-- Floating Orbs for 3D Depth -->
    <div class="fixed inset-0 pointer-events-none z-0 overflow-hidden" aria-hidden="true">
        <div class="absolute top-[10%] left-[5%] w-[30rem] h-[30rem] bg-primary/5 rounded-full blur-[120px] parallax-bg" data-speed="0.3"></div>
        <div class="absolute top-[60%] right-[5%] w-[40rem] h-[40rem] bg-amber-600/5 rounded-full blur-[150px] parallax-bg" data-speed="-0.2"></div>
    </div>

    <!-- Header -->
    <header class="fixed top-0 w-full z-[100] bg-slate-950/60 backdrop-blur-xl border-b border-white/5 transition-all duration-300" id="main-header" style="height: 80px !important;">
        <nav aria-label="Navegação Principal" class="flex justify-between items-center px-8 py-0 max-w-screen-2xl mx-auto h-full">
            <div class="font-serif italic text-2xl text-amber-400">Traffio Odonto</div>
            <div class="hidden md:flex gap-12 items-center">
                <a class="font-sans uppercase tracking-widest text-xs text-amber-400 border-b border-amber-400/50 pb-1 hover:opacity-80 transition-opacity" href="#solucao">Diferenciais</a>
                <a class="font-sans uppercase tracking-widest text-xs text-slate-300 hover:text-amber-200 transition-colors" href="#experiencia">Nossa Ética</a>
                <a class="font-sans uppercase tracking-widest text-xs text-slate-300 hover:text-amber-200 transition-colors" href="#faq">Dúvidas</a>
            </div>
            <a href="#super-form-section" aria-label="Solicitar consultoria gratuita" class="primary-gradient-btn px-6 py-3 rounded-md font-sans uppercase tracking-widest text-xs font-bold text-on-primary scale-95 active:scale-90 transition-transform hover:opacity-80 inline-block text-center shadow-lg shadow-primary/20">
                Consultoria Gratuita
            </a>
        </nav>
    </header>

    <main>
        <section aria-labelledby="hero-title" class="hero-section pt-24 bg-surface" style="min-height: 100dvh !important;">
            <div class="absolute inset-0 z-0 overflow-hidden" style="min-height: 100dvh !important;">
                <img alt="Fundo abstrato premium para marketing odontológico" aria-hidden="true" width="1280" height="720" decoding="sync" fetchpriority="high" loading="eager" src="hero-bg.webp" class="w-full h-full object-cover opacity-30" />
                <div class="absolute inset-0 bg-gradient-to-r from-surface via-surface/80 to-transparent"></div>
            </div>
            <div class="container mx-auto px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12">
                <div class="lg:col-span-8 space-y-8 text-reveal-container">
                    <span class="text-reveal inline-block text-primary uppercase tracking-[0.3em] font-label text-sm font-semibold mb-4">Gestão de Tráfego para Odontologia</span>
                    <h1 class="font-headline text-5xl md:text-8xl font-light tracking-tight leading-[1.1] text-on-surface" id="hero-title">
                        <span class="block overflow-hidden pb-1"><span class="block text-reveal">Marketing para</span></span>
                        <span class="block overflow-hidden pb-1"><span class="block text-reveal italic font-light text-primary">Odontologia Ética</span></span>
                    </h1>
                    <p class="text-reveal text-on-surface-variant text-lg md:text-xl max-w-2xl font-light leading-relaxed">
                        Atraia pacientes de alto ticket com previsibilidade e total conformidade com o CRO. Gestão de tráfego para odontologia que respeita sua reputação e foca em consultas reais.
                    </p>
                    <div class="text-reveal flex flex-col sm:flex-row gap-6 pt-4">
                        <a href="#super-form-section" class="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary hover:shadow-[0_0_30px_rgba(233,195,73,0.3)] transition-all text-center">
                            Garantir Consultoria Estratégica
                        </a>
                        <a href="#experiencia" class="border border-outline-variant/30 px-10 py-5 rounded-md font-label text-lg text-on-surface hover:bg-surface-container-highest transition-colors text-center">
                            Conhecer nossa Ética
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Solution Section -->
        <section aria-labelledby="solution-title" class="py-32 bg-surface-container-low relative" id="solucao">
            <div class="container mx-auto px-8">
                <div class="max-w-4xl mx-auto text-center mb-24 reveal-up">
                    <h2 class="font-headline text-4xl md:text-5xl mb-6" id="solution-title">Pacientes reais na sua cadeira. Chega de curiosos.</h2>
                    <div aria-hidden="true" class="h-px w-24 bg-primary mx-auto opacity-50 mb-8"></div>
                    <p class="text-on-surface-variant text-lg font-light">
                        O marketing para dentistas comum atrai curtidas. Nós atraímos quem valoriza seu trabalho e tem poder de investimento.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div class="tilt-card p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5 active-tilt reveal-up">
                        <span aria-label="Frustrado com curiosos" class="material-symbols-outlined text-primary text-5xl">person_search</span>
                        <h3 class="font-headline text-2xl">Frustrado com "Curiosos"?</h3>
                        <p class="text-on-surface-variant leading-relaxed">Filtramos o público no Google e Instagram para entregar pacientes qualificados. Gestão de tráfego para dentistas que gera lucro real.</p>
                    </div>
                    <div class="tilt-card p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5 active-tilt reveal-up" data-delay="100">
                        <span aria-label="Conformidade ética" class="material-symbols-outlined text-primary text-5xl">verified_user</span>
                        <h3 class="font-headline text-2xl">Conformidade Ética Total</h3>
                        <p class="text-on-surface-variant leading-relaxed">Campanhas que seguem as normas do CRO. Marketing sofisticado que eleva sua autoridade profissional e autoridade no mercado.</p>
                    </div>
                    <div class="tilt-card p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5 active-tilt reveal-up" data-delay="200">
                        <span aria-label="ROI mensurável" class="material-symbols-outlined text-primary text-5xl">monitoring</span>
                        <h3 class="font-headline text-2xl">ROI Mensurável</h3>
                        <p class="text-on-surface-variant leading-relaxed">Rastreamento preciso de cada paciente. Atuamos desde o anúncio até a recepção, sendo um parceiro real no seu marketing odontológico.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Form Section -->
        <section aria-labelledby="form-title" class="py-32 bg-surface relative overflow-hidden" id="super-form-section">
            <div aria-hidden="true" class="absolute inset-0 z-0">
                <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/5 via-transparent to-transparent"></div>
            </div>
            <div class="container mx-auto px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                    <div class="space-y-8 reveal-up">
                        <span class="text-primary font-label uppercase tracking-widest text-xs">Seu próximo passo estratégico</span>
                        <h2 class="font-headline text-4xl md:text-5xl leading-tight" id="form-title">Construa um faturamento <span class="italic text-primary">Sustentável</span></h2>
                        <p class="text-on-surface-variant text-lg leading-relaxed">
                            Buscamos parcerias de longo prazo, não apenas contratos. Marketing para odontologia de alto padrão para quem está pronto para crescer.
                        </p>
                        <ul class="space-y-4" role="list">
                            <li class="flex items-center gap-3 text-on-surface-variant">
                                <span aria-hidden="true" class="material-symbols-outlined text-primary text-xl">check_circle</span>
                                <span>Foco em Implantes, Lentes e Reabilitações</span>
                            </li>
                            <li class="flex items-center gap-3 text-on-surface-variant">
                                <span aria-hidden="true" class="material-symbols-outlined text-primary text-xl">check_circle</span>
                                <span>Rastreio total de pacientes via Google/Meta</span>
                            </li>
                            <li class="flex items-center gap-3 text-on-surface-variant">
                                <span aria-hidden="true" class="material-symbols-outlined text-primary text-xl">check_circle</span>
                                <span>Apoio tático à sua equipe de atendimento</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="reveal-up">
                        <div class="glass-card p-10 md:p-12 rounded-2xl border border-primary/10 shadow-2xl relative overflow-hidden active-tilt" id="form-wrapper">
                            <div aria-hidden="true" class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary to-transparent opacity-50"></div>
                            
                            <form action="api/submit-lead.php" method="POST" id="multi-step-form" class="space-y-8">
                                <!-- Step 1 -->
                                <div class="step-container space-y-6 active" id="step-1">
                                    <h3 class="text-2xl font-headline">Identificação Profissional</h3>
                                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Passo 1 de 2</p>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="name">Seu Nome Completo</label>
                                            <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="name" name="name" placeholder="Ex: Dr. Marcelo Santos" required type="text"/>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="email">Seu E-mail</label>
                                            <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="email" name="email" placeholder="Ex: dr.marcelo@clinica.com" required type="email"/>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="clinic">Nome da Clínica</label>
                                            <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="clinic" name="clinic" placeholder="Ex: Santos Odontologia Premium" required type="text"/>
                                        </div>
                                    </div>
                                    <button type="button" class="w-full primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary flex justify-center items-center gap-2 group next-step-btn">
                                        Próxima Etapa <span class="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                                    </button>
                                </div>

                                <!-- Step 2 -->
                                <div class="step-container space-y-6" id="step-2">
                                    <h3 class="text-2xl font-headline">Dados Estratégicos</h3>
                                    <p class="text-xs text-on-surface-variant uppercase tracking-widest">Passo 2 de 2</p>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="whatsapp">Seu WhatsApp</label>
                                            <input class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000" required type="tel"/>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" for="budget">Orçamento Mensal em Tráfego Pago</label>
                                            <select class="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface focus:bg-surface-container-highest transition-all outline-none appearance-none cursor-pointer" id="budget" name="budget" required>
                                                <option disabled selected value="">Selecione uma faixa</option>
                                                <option value="5-10k">R$ 5.000 - R$ 10.000</option>
                                                <option value="10-20k">R$ 10.000 - R$ 20.000</option>
                                                <option value="20-50k">R$ 20.000 - R$ 50.000</option>
                                                <option value="50k+">Acima de R$ 50.000</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <button type="button" class="w-1/3 border border-outline-variant/30 rounded-lg font-label text-on-surface-variant hover:bg-surface-container-highest transition-colors prev-step-btn">Voltar</button>
                                        <button type="submit" class="w-2/3 primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary">Finalizar Inscrição</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Authority Section -->
        <section aria-labelledby="authority-title" class="py-32 bg-surface relative overflow-hidden" id="experiencia">
            <div aria-hidden="true" class="absolute -right-64 top-0 w-full h-full opacity-10">
                <span class="parallax-bg inline-block font-headline text-[30rem] leading-none select-none italic text-primary" data-speed="0.05">2018</span>
            </div>
            <div class="container mx-auto px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
                    <div class="space-y-8 reveal-up">
                        <span class="text-primary font-label uppercase tracking-widest text-xs">Marketing para Consultórios de Odontologia</span>
                        <h2 class="font-headline text-4xl md:text-5xl leading-tight" id="authority-title">A Inteligência de Mercado que sua Clínica merece</h2>
                        <p class="text-on-surface-variant text-lg leading-relaxed">
                            Não somos apenas uma agência de anúncios. Somos parceiros estratégicos que entendem a psicologia do paciente premium. Marketing odontológico que gera autoridade e lucro.
                        </p>
                        <div class="grid grid-cols-2 gap-8 pt-8">
                            <div>
                                <div class="text-4xl font-headline text-primary mb-2">Segurança</div>
                                <p class="text-sm font-label uppercase tracking-wider text-on-surface-variant">Marketing 100% Ético CRO</p>
                            </div>
                            <div>
                                <div class="text-4xl font-headline text-primary mb-2">Precisão</div>
                                <p class="text-sm font-label uppercase tracking-wider text-on-surface-variant">Segmentação de Alto Padrão</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative reveal-up">
                        <div class="aspect-square rounded-2xl overflow-hidden shadow-2xl">
                            <img alt="Close-up de um dentista realizando um procedimento de precisão" width="800" height="800" decoding="async" loading="lazy" class="image-scale-parallax w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBNtb8YLUMAGYbn6X-5fRIIucesv6Uir11SCUbmAPkXcAx4BwawLZdQnsQ5Y3H0UiLJmFXfVMzwE30fKExVtBdkI6ZFROm-XPWzOFUNWBQDU-D8CW7zeGGXVA1CuFRnip-FAaPc2ZLufbgrPv2AszIWlT2MFxrFXlOy8KVgr492RQh55pp4pQcpVo-2CxA7BoqeBvLYDIKnL2DkPFwQ-lw_kyXL-Mo4iatzCpmT7nlX5NZci1zB6_wvMCs0ELleMjoLqjxszNAq4nT"/>
                        </div>
                        <div class="absolute -bottom-10 -left-10 glass-card p-10 rounded-xl max-w-xs hidden md:block active-tilt">
                            <blockquote class="italic text-lg font-headline leading-snug">
                                "Marketing ético não é sobre promessas, é sobre resultados previsíveis e respeito ao paciente."
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section aria-labelledby="testimonials-title" class="py-32 bg-surface-container-low relative border-y border-white/5">
            <div class="container mx-auto px-8">
                <div class="text-center mb-24 reveal-up">
                    <span class="text-primary font-label uppercase tracking-widest text-xs">Resultados Reais</span>
                    <h2 class="font-headline text-4xl md:text-5xl mt-4" id="testimonials-title">O Topo do Mercado para Dentistas</h2>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="glass-card p-10 rounded-2xl border border-white/5 flex flex-col justify-between h-full reveal-up active-tilt">
                        <div class="space-y-6">
                            <div class="flex gap-1 text-primary">
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                            </div>
                            <p class="text-on-surface-variant italic font-light leading-relaxed text-lg">
                                "Antes da Traffio, recebia muitos 'curiosos'. Hoje, o tráfego é qualificado: pacientes de alto ticket que buscam reabilitação oral. Meu ROI no marketing para dentistas nunca foi tão claro."
                            </p>
                        </div>
                        <div class="mt-10 pt-8 border-t border-white/5">
                            <p class="font-headline text-xl text-primary">Dr. Roberto Silva</p>
                            <p class="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Implantodontista</p>
                        </div>
                    </div>
                    <div class="glass-card p-10 rounded-2xl border border-primary/30 flex flex-col justify-between h-full relative z-10 shadow-[0_0_40px_rgba(233,195,73,0.1)] reveal-up active-tilt" data-delay="100">
                        <div class="space-y-6">
                            <div class="flex gap-1 text-primary">
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                            </div>
                            <p class="text-on-surface font-light leading-relaxed text-lg">
                                "Minha maior preocupação era o CRO. A equipe da Traffio entende as normas perfeitamente, fazendo um marketing para dentistas elegante que valoriza minha autoridade."
                            </p>
                        </div>
                        <div class="mt-10 pt-8 border-t border-white/5">
                            <p class="font-headline text-xl text-primary">Dra. Mariana Costa</p>
                            <p class="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Estética Orofacial</p>
                        </div>
                    </div>
                    <div class="glass-card p-10 rounded-2xl border border-white/5 flex flex-col justify-between h-full reveal-up active-tilt" data-delay="200">
                        <div class="space-y-6">
                            <div class="flex gap-1 text-primary">
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                                <span class="material-symbols-outlined font-fill">star</span>
                            </div>
                            <p class="text-on-surface-variant italic font-light leading-relaxed text-lg">
                                "Suporte diário. Não é só anúncio, é gestão de crescimento sustentável. Eles realmente dominam a gestão de tráfego para odontologia."
                            </p>
                        </div>
                        <div class="mt-10 pt-8 border-t border-white/5">
                            <p class="font-headline text-xl text-primary">Dr. Felipe Mendes</p>
                            <p class="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Ortodontia Invisível</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section aria-labelledby="faq-title" class="py-32 bg-surface-container-low" id="faq">
            <div class="container mx-auto px-8 max-w-4xl">
                <div class="text-center mb-24 reveal-up">
                    <span class="text-primary font-label uppercase tracking-widest text-xs">Transparência</span>
                    <h2 class="font-headline text-4xl md:text-5xl mt-4" id="faq-title">Perguntas Frequentes</h2>
                </div>
                <div class="space-y-4">
                    <div class="accordion-item reveal-up border border-outline-variant/20 bg-surface-container-highest/20 rounded-xl overflow-hidden group">
                        <button class="w-full flex items-center justify-between p-8 text-left outline-none" aria-expanded="false">
                            <span class="text-xl font-headline">Como vocês garantem a qualidade dos pacientes?</span>
                            <span class="material-symbols-outlined accordion-icon transition-transform text-primary">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div class="px-8 pb-8 text-on-surface-variant font-light leading-relaxed">
                                Utilizamos segmentação avançada por interesses, localização e poder aquisitivo no Google e Meta. Além disso, estruturamos filtros na captação para que apenas quem realmente tem interesse e condições de pagar pelo tratamento premium chegue até seu WhatsApp.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item reveal-up border border-outline-variant/20 bg-surface-container-highest/20 rounded-xl overflow-hidden group">
                        <button class="w-full flex items-center justify-between p-8 text-left outline-none" aria-expanded="false">
                            <span class="text-xl font-headline">Em quanto tempo o ROI se torna positivo?</span>
                            <span class="material-symbols-outlined accordion-icon transition-transform text-primary">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div class="px-8 pb-8 text-on-surface-variant font-light leading-relaxed">
                                Os resultados começam a aparecer em dias, mas o ROI estruturado depende do ciclo de venda da sua clínica. Como focamos em tratamentos de alto ticket (implantes, lentes), uma única conversão costuma cobrir todo o investimento mensal em tráfego.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item reveal-up border border-outline-variant/20 bg-surface-container-highest/20 rounded-xl overflow-hidden group">
                        <button class="w-full flex items-center justify-between p-8 text-left outline-none" aria-expanded="false">
                            <span class="text-xl font-headline">Como funciona a política de cancelamento?</span>
                            <span class="material-symbols-outlined accordion-icon transition-transform text-primary">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div class="px-8 pb-8 text-on-surface-variant font-light leading-relaxed">
                                Acreditamos em parcerias baseadas em resultados, não em amarras contratuais. Nossa transparência é total: se não houver alinhamento ou entrega, o encerramento é simples e profissional.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item reveal-up border border-outline-variant/20 bg-surface-container-highest/20 rounded-xl overflow-hidden group">
                        <button class="w-full flex items-center justify-between p-8 text-left outline-none" aria-expanded="false">
                            <span class="text-xl font-headline">As campanhas respeitam o Código de Ética do CRO?</span>
                            <span class="material-symbols-outlined accordion-icon transition-transform text-primary">expand_more</span>
                        </button>
                        <div class="accordion-content">
                            <div class="px-8 pb-8 text-on-surface-variant font-light leading-relaxed">
                                Sim, integralmente. Não trabalhamos com anúncios sensacionalistas. Focamos em autoridade e nos benefícios reais do tratamento, mantendo a sobriedade que o público de alto ticket exige.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA -->
        <section aria-labelledby="cta-title" class="py-32 bg-surface-container-lowest relative overflow-hidden">
            <div aria-hidden="true" class="absolute inset-0 z-0 opacity-20">
                <img alt="Interior de consultório de odontologia moderno e tecnológico" width="1920" height="1080" class="parallax-bg w-full h-full object-cover scale-110" loading="lazy" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlq1qxqBDuGBL3AGXJsNK2nlrgRzqzd64lfjFjDNcIU6ivQlxTsGfEG7ZAbB89q4ai4CNDL90kBsFyWW0HH66JfxJTyiZVoNXd7QMpi8L8guqgXYxjrr4g3GTUAYhnH5SIY0uSF_MoWffoDEVbURHW8C2RQ_FffJvm6oDBGbpP6U3E203JGe0Pcs_Ma2XVfBNY89KXLZbcilGFC73DQZkdIMpdTdRwaSocbdceyXELQVtFHA8zbuvUDEPLKkO-lR1p1p7sI8NBuUvW"/>
            </div>
            <div class="container mx-auto px-8 relative z-10 text-center max-w-4xl">
                <h2 class="reveal-up font-headline text-5xl md:text-6xl mb-8 leading-tight" id="cta-title">Pronto para um crescimento sustentável?</h2>
                <p class="reveal-up text-on-surface-variant text-xl mb-12 font-light">
                    Marketing para odontologia de alto padrão. Selecionamos apenas 2 novas clínicas por mês.
                </p>
                <a href="#super-form-section" class="reveal-up primary-gradient-btn px-12 py-6 rounded-md font-label text-xl font-bold text-on-primary hover:scale-105 transition-transform shadow-2xl shadow-primary/20 inline-block">
                    Garantir Consultoria Gratuita
                </a>
                <p class="reveal-up mt-8 text-sm font-label uppercase tracking-widest text-primary/60">Vagas limitadas para este semestre.</p>
            </div>
        </section>
    </main>

    <footer class="bg-slate-950 w-full py-16 border-t border-slate-900 overflow-hidden">
        <div class="flex flex-col md:flex-row justify-between items-center px-12 gap-8 max-w-screen-2xl mx-auto">
            <div class="font-serif text-xl text-amber-500">Traffio Odonto</div>
            <nav aria-label="Links Úteis" class="flex flex-wrap justify-center gap-4 md:gap-8">
                <a class="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="#">Privacidade</a>
                <a class="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="#">Termos</a>
                <a aria-label="LinkedIn" class="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="#">LinkedIn</a>
                <a aria-label="Instagram" class="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="#">Instagram</a>
            </nav>
            <div class="font-sans text-sm font-light text-slate-500 text-center md:text-right">
                © <?= date('Y') ?> Traffio Odonto. The Clinical Atelier. <br> Marketing Ético & Previsível para Dentistas.
            </div>
        </div>
    </footer>

    <!-- GSAP / Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="js/main.js?v=1.0.3"></script>
</body>
</html>
