/**
 * @license
 * SPDX-License-Identifier: Apache-2.0
 */

import React, { useEffect, useState, useRef } from 'react';
import { BrowserRouter, Routes, Route, useNavigate, Link } from 'react-router-dom';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function TiltCard({ children, className, style, delay = 0 }: any) {
  const cardRef = useRef<HTMLDivElement>(null);
  
  const handleMouseMove = (e: React.MouseEvent) => {
    if (!cardRef.current) return;
    const rect = cardRef.current.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const centerX = rect.width / 2;
    const centerY = rect.height / 2;
    const rotateX = ((y - centerY) / centerY) * -10;
    const rotateY = ((x - centerX) / centerX) * 10;

    gsap.to(cardRef.current, {
      duration: 0.4,
      rotateX,
      rotateY,
      transformPerspective: 1000,
      ease: 'power2.out',
    });
  };
  
  const handleMouseLeave = () => {
    if (!cardRef.current) return;
    gsap.to(cardRef.current, {
      duration: 0.7,
      rotateX: 0,
      rotateY: 0,
      ease: 'power2.out',
    });
  };

  return (
    <div 
      ref={cardRef} 
      onMouseMove={handleMouseMove} 
      onMouseLeave={handleMouseLeave} 
      className={`card-3d-reveal ${className}`} 
      style={{ ...style, transitionDelay: `${delay}ms` }}
    >
      {children}
    </div>
  );
}

function LandingPage() {
  const navigate = useNavigate();
  const [step, setStep] = useState(1);
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [activeAccordion, setActiveAccordion] = useState<number | null>(null);

  useEffect(() => {
    const ctx = gsap.context(() => {
      gsap.utils.toArray('.reveal-up').forEach((el: any) => {
        gsap.to(el, {
          scrollTrigger: {
            trigger: el,
            start: "top 85%",
            toggleActions: "play none none none"
          },
          opacity: 1,
          y: 0,
          duration: 0.8,
          ease: "power2.out"
        });
      });

      // 3D Text Reveal
      gsap.utils.toArray('.text-reveal-container').forEach((container: any) => {
        const text = container.querySelectorAll('.text-reveal');
        gsap.fromTo(text,
          { y: '100%', opacity: 0, rotateX: -20, transformOrigin: "0% 50% -50" },
          {
            scrollTrigger: { trigger: container, start: "top 85%" },
            y: '0%', opacity: 1, rotateX: 0, duration: 1.2, stagger: 0.15, ease: 'power4.out'
          }
        );
      });

      // 3D Card Reveal
      gsap.utils.toArray('.card-3d-reveal').forEach((el: any) => {
        gsap.fromTo(el,
          { opacity: 0, y: 100, rotateX: -15, scale: 0.95, transformPerspective: 1000 },
          {
            scrollTrigger: { trigger: el, start: "top 85%" },
            opacity: 1, y: 0, rotateX: 0, scale: 1, duration: 1.2, ease: "expo.out"
          }
        );
      });

      // Image Scale Parallax
      gsap.utils.toArray('.image-scale-parallax').forEach((el: any) => {
        gsap.fromTo(el, 
          { scale: 1.3 },
          {
            scrollTrigger: { trigger: el, start: "top bottom", end: "bottom top", scrub: true },
            scale: 1,
            ease: "none"
          }
        );
      });

      gsap.utils.toArray('.parallax-bg').forEach((el: any) => {
        const speed = parseFloat(el.getAttribute('data-speed')) || 0.1;
        gsap.to(el, {
          scrollTrigger: {
            trigger: el,
            start: "top bottom",
            end: "bottom top",
            scrub: 1
          },
          y: (i, target) => {
            return target.offsetHeight * speed;
          },
          ease: "none"
        });
      });
    });
    return () => ctx.revert();
  }, []);

  const handleNextStep = () => {
    const nameInput = document.getElementById('name') as HTMLInputElement;
    const emailInput = document.getElementById('email') as HTMLInputElement;
    const clinicInput = document.getElementById('clinic') as HTMLInputElement;
    
    if (nameInput && !nameInput.checkValidity()) {
      nameInput.reportValidity();
      return;
    }
    if (emailInput && !emailInput.checkValidity()) {
      emailInput.reportValidity();
      return;
    }
    if (clinicInput && !clinicInput.checkValidity()) {
      clinicInput.reportValidity();
      return;
    }
    
    setStep(2);
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setIsSubmitting(true);

    const form = e.target as HTMLFormElement;
    const formData = new FormData(form);
    const data = {
      name: formData.get('name'),
      email: formData.get('email'),
      clinic: formData.get('clinic'),
      whatsapp: formData.get('whatsapp'),
      budget: formData.get('budget'),
    };

    try {
      await fetch('/api/submit-lead.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      });
    } catch (error) {
      console.error('Erro ao enviar formulário:', error);
    }

    setIsSubmitting(false);
    navigate('/obrigado');
  };

  const toggleAccordion = (index: number) => {
    setActiveAccordion(activeAccordion === index ? null : index);
  };

  return (
    <div className="font-body selection:bg-primary selection:text-on-primary relative">
      {/* Floating Orbs for 3D Depth */}
      <div className="fixed inset-0 pointer-events-none z-0 overflow-hidden">
        <div className="absolute top-[10%] left-[5%] w-[30rem] h-[30rem] bg-primary/5 rounded-full blur-[120px] parallax-bg" data-speed="0.3"></div>
        <div className="absolute top-[60%] right-[5%] w-[40rem] h-[40rem] bg-amber-600/5 rounded-full blur-[150px] parallax-bg" data-speed="-0.2"></div>
      </div>

      {/* Header */}
      <header className="fixed top-0 w-full z-[100] bg-slate-950/60 backdrop-blur-xl border-b border-white/5">
        <nav aria-label="Navegação Principal" className="flex justify-between items-center px-8 py-6 max-w-screen-2xl mx-auto">
          <div className="font-serif italic text-2xl text-amber-400">Traffio Odonto</div>
          <div className="hidden md:flex gap-12 items-center">
            <a className="font-sans uppercase tracking-widest text-xs text-amber-400 border-b border-amber-400/50 pb-1 hover:opacity-80 transition-opacity" href="#solucao">Diferenciais</a>
            <a className="font-sans uppercase tracking-widest text-xs text-slate-300 hover:text-amber-200 transition-colors" href="#experiencia">Nossa Ética</a>
            <a className="font-sans uppercase tracking-widest text-xs text-slate-300 hover:text-amber-200 transition-colors" href="#faq">Dúvidas</a>
          </div>
          <a href="#super-form-section" aria-label="Solicitar consultoria gratuita" className="primary-gradient-btn px-6 py-3 rounded-md font-sans uppercase tracking-widest text-xs font-bold text-on-primary scale-95 active:scale-90 transition-transform hover:opacity-80 inline-block text-center">
            Consultoria Gratuita
          </a>
        </nav>
      </header>

      <main>
        {/* Hero Section */}
        <section aria-labelledby="hero-title" className="relative min-h-screen flex items-center pt-24 overflow-hidden">
          <div className="absolute inset-0 z-0">
            <img alt="Fundo abstrato premium para marketing odontológico" aria-hidden="true" width="1920" height="1080" decoding="async" className="parallax-bg w-full h-full object-cover opacity-30 scale-125" fetchPriority="high" loading="eager" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAvL_pU30QBbreIN0Ps-EYIQvbJxLYXcy7hdaMCAQ03yUS-YfKXU1I_eLx4yD1vKsx1RChsFZNTueZXCcozKp5Oy3ht6oEr5JSJdfgnvNGwyfvwg1vS9R1gU06G0fA8UBI8_HBmXhIutMpHpQh9QKeOSXIDuwUYKOF5zs0XMxvmcLde2x5XP3Hy_SQHKCA3Qad4U3HSx7Lsak2XIe-ra2603n8VwaUpavqbBrPZkfUmhyXTmiHLMqCSDYUh8kXVVGWe_CEfWZARDhpS"/>
            <div className="absolute inset-0 bg-gradient-to-r from-surface via-surface/80 to-transparent"></div>
          </div>
          <div className="container mx-auto px-8 relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12">
            <div className="lg:col-span-8 space-y-8 text-reveal-container">
              <span className="text-reveal inline-block text-primary uppercase tracking-[0.3em] font-label text-sm font-semibold mb-4">Gestão de Tráfego para Odontologia</span>
              <h1 className="font-headline text-5xl md:text-8xl font-light tracking-tight leading-[1.1] text-on-surface" id="hero-title">
                <span className="block overflow-hidden pb-2"><span className="block text-reveal">Marketing para</span></span>
                <span className="block overflow-hidden pb-2"><span className="block text-reveal italic font-light text-primary">Odontologia Ética</span></span>
              </h1>
              <p className="text-reveal text-on-surface-variant text-lg md:text-xl max-w-2xl font-light leading-relaxed">
                Atraia pacientes de alto ticket com previsibilidade e total conformidade com o CRO. Gestão de tráfego que respeita sua reputação e foca em consultas reais, não em métricas de vaidade.
              </p>
              <div className="text-reveal flex flex-col sm:flex-row gap-6 pt-4">
                <a href="#super-form-section" aria-label="Garantir Consultoria Estratégica" className="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary hover:shadow-[0_0_30px_rgba(233,195,73,0.3)] transition-all text-center">
                  Garantir Consultoria Estratégica
                </a>
                <a href="#experiencia" aria-label="Ver Metodologia" className="border border-outline-variant/30 px-10 py-5 rounded-md font-label text-lg text-on-surface hover:bg-surface-container-highest transition-colors text-center">
                  Conhecer nossa Ética
                </a>
              </div>
            </div>
          </div>
          <div aria-hidden="true" className="absolute left-1/2 bottom-0 h-32 gold-thread hidden lg:block"></div>
        </section>

        {/* Pain/Solution Section */}
        <section aria-labelledby="solution-title" className="py-32 bg-surface-container-low relative" id="solucao">
          <div className="container mx-auto px-8">
            <div className="max-w-4xl mx-auto text-center mb-24 reveal-up">
              <h2 className="font-headline text-4xl md:text-5xl mb-6" id="solution-title">Pacientes reais na sua cadeira. Chega de curiosos.</h2>
              <div aria-hidden="true" className="h-px w-24 bg-primary mx-auto opacity-50 mb-8"></div>
              <p className="text-on-surface-variant text-lg font-light">
                O marketing odontológico comum atrai curtidas. Nós atraímos quem valoriza seu trabalho e tem poder de investimento em tratamentos complexos.
              </p>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-3 gap-12">
              <TiltCard className="p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5">
                <span aria-hidden="true" className="material-symbols-outlined text-primary text-5xl">person_search</span>
                <h3 className="font-headline text-2xl">Frustrado com "Curiosos"?</h3>
                <p className="text-on-surface-variant leading-relaxed">Filtramos o público no Google e Instagram para entregar pacientes qualificados. Chega de perder tempo respondendo orçamentos vazios no WhatsApp.</p>
              </TiltCard>
              <TiltCard delay={100} className="p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5">
                <span aria-hidden="true" className="material-symbols-outlined text-primary text-5xl">verified_user</span>
                <h3 className="font-headline text-2xl">Conformidade Ética Total</h3>
                <p className="text-on-surface-variant leading-relaxed">Nossas campanhas seguem rigorosamente as normas do CRO. Garantimos um marketing sofisticado que eleva, e nunca compromete, sua autoridade profissional.</p>
              </TiltCard>
              <TiltCard delay={200} className="p-12 bg-surface-container-highest/30 rounded-xl space-y-6 shadow-xl border border-white/5">
                <span aria-hidden="true" className="material-symbols-outlined text-primary text-5xl">monitoring</span>
                <h3 className="font-headline text-2xl">ROI Mensurável</h3>
                <p className="text-on-surface-variant leading-relaxed">Rastreamento preciso da origem de cada paciente. Atuamos como uma extensão da sua equipe, resolvendo gargalos desde o anúncio até a recepção.</p>
              </TiltCard>
            </div>
          </div>
        </section>

        {/* Super Form Section */}
        <section aria-labelledby="form-title" className="py-32 bg-surface relative overflow-hidden" id="super-form-section">
          <div aria-hidden="true" className="absolute inset-0 z-0">
            <div className="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/5 via-transparent to-transparent"></div>
          </div>
          <div className="container mx-auto px-8 relative z-10">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
              <div className="space-y-8 reveal-up">
                <span className="text-primary font-label uppercase tracking-widest text-xs">Seu próximo passo estratégico</span>
                <h2 className="font-headline text-4xl md:text-5xl leading-tight" id="form-title">Construa um faturamento <span className="italic text-primary">Sustentável</span></h2>
                <p className="text-on-surface-variant text-lg leading-relaxed">
                  Buscamos parcerias de longo prazo, não apenas contratos. Nossa triagem garante que atendemos apenas clínicas prontas para absorver uma demanda qualificada de alto valor.
                </p>
                <ul className="space-y-4" role="list">
                  <li className="flex items-center gap-3 text-on-surface-variant">
                    <span aria-hidden="true" className="material-symbols-outlined text-primary text-xl">check_circle</span>
                    <span>Foco em Implantes, Lentes e Reabilitações</span>
                  </li>
                  <li className="flex items-center gap-3 text-on-surface-variant">
                    <span aria-hidden="true" className="material-symbols-outlined text-primary text-xl">check_circle</span>
                    <span>Rastreio total de pacientes via Google/Meta</span>
                  </li>
                  <li className="flex items-center gap-3 text-on-surface-variant">
                    <span aria-hidden="true" className="material-symbols-outlined text-primary text-xl">check_circle</span>
                    <span>Apoio tático à sua equipe de atendimento</span>
                  </li>
                </ul>
              </div>
              
              <div className="reveal-up">
                <div className="glass-card p-10 md:p-12 rounded-2xl border border-primary/10 shadow-2xl relative overflow-hidden" id="form-wrapper">
                  <div aria-hidden="true" className="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-primary to-transparent opacity-50"></div>
                  
                  <form className="space-y-8" id="multi-step-form" onSubmit={handleSubmit}>
                    {/* Step 1 */}
                      <fieldset className={`step-container space-y-6 ${step === 1 ? 'active' : ''}`} id="step-1">
                        <legend className="sr-only">Passo 1: Identificação Profissional</legend>
                        <div className="space-y-2">
                          <h3 className="text-2xl font-headline">Identificação Profissional</h3>
                          <p className="text-xs text-on-surface-variant uppercase tracking-widest">Passo 1 de 2</p>
                        </div>
                        <div className="space-y-4">
                          <div>
                            <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" htmlFor="name">Seu Nome Completo</label>
                            <input className="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface transition-all focus:bg-surface-container-highest" id="name" name="name" placeholder="Ex: Dr. Marcelo Santos" required type="text"/>
                          </div>
                          <div>
                            <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" htmlFor="email">Seu E-mail</label>
                            <input className="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface transition-all focus:bg-surface-container-highest" id="email" name="email" placeholder="Ex: dr.marcelo@clinica.com" required type="email"/>
                          </div>
                          <div>
                            <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" htmlFor="clinic">Nome da Clínica</label>
                            <input className="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface transition-all focus:bg-surface-container-highest" id="clinic" name="clinic" placeholder="Ex: Santos Odontologia Premium" required type="text"/>
                          </div>
                        </div>
                        <button aria-label="Ir para o próximo passo" className="w-full primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary flex justify-center items-center gap-2 group" onClick={handleNextStep} type="button">
                          Próxima Etapa
                          <span aria-hidden="true" className="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </button>
                      </fieldset>

                      {/* Step 2 */}
                      <fieldset className={`step-container space-y-6 ${step === 2 ? 'active' : ''}`} id="step-2">
                        <legend className="sr-only">Passo 2: Dados Estratégicos</legend>
                        <div className="space-y-2">
                          <h3 className="text-2xl font-headline">Dados Estratégicos</h3>
                          <p className="text-xs text-on-surface-variant uppercase tracking-widest">Passo 2 de 2</p>
                        </div>
                        <div className="space-y-4">
                          <div>
                            <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" htmlFor="whatsapp">Seu WhatsApp</label>
                            <input className="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface transition-all focus:bg-surface-container-highest" id="whatsapp" name="whatsapp" placeholder="(00) 00000-0000" required type="tel"/>
                          </div>
                          <div>
                            <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider" htmlFor="budget">Orçamento Mensal em Tráfego Pago</label>
                            <select className="w-full bg-surface-container-low border border-outline-variant/30 rounded-lg px-4 py-4 text-on-surface transition-all focus:bg-surface-container-highest" id="budget" name="budget" required>
                              <option disabled value="">Selecione uma faixa</option>
                              <option value="5-10k">R$ 5.000 - R$ 10.000</option>
                              <option value="10-20k">R$ 10.000 - R$ 20.000</option>
                              <option value="20-50k">R$ 20.000 - R$ 50.000</option>
                              <option value="50k+">Acima de R$ 50.000</option>
                            </select>
                          </div>
                        </div>
                        <div className="flex gap-4">
                          <button aria-label="Voltar para o passo anterior" className="w-1/3 border border-outline-variant/30 rounded-lg font-label text-on-surface-variant hover:bg-surface-container-highest transition-colors" onClick={() => setStep(1)} type="button">Voltar</button>
                          <button aria-label="Enviar inscrição" className={`w-2/3 primary-gradient-btn py-5 rounded-lg font-label font-bold text-on-primary ${isSubmitting ? 'opacity-70 cursor-not-allowed' : ''}`} disabled={isSubmitting} type="submit">
                            {isSubmitting ? 'Enviando...' : 'Finalizar Inscrição'}
                          </button>
                        </div>
                      </fieldset>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Authority Section */}
        <section aria-labelledby="authority-title" className="py-32 bg-surface relative overflow-hidden" id="experiencia">
          <div aria-hidden="true" className="absolute -right-64 top-0 w-full h-full opacity-10">
            <span className="parallax-bg inline-block font-headline text-[30rem] leading-none select-none italic text-primary" data-speed="0.05">2018</span>
          </div>
          <div className="container mx-auto px-8 relative z-10">
            <div className="grid grid-cols-1 lg:grid-cols-2 gap-24 items-center">
              <div className="space-y-8 reveal-up">
                <span className="text-primary font-label uppercase tracking-widest text-xs">Extensão da sua Gestão</span>
                <h2 className="font-headline text-4xl md:text-5xl leading-tight" id="authority-title">A Inteligência de Mercado que sua Clínica merece</h2>
                <p className="text-on-surface-variant text-lg leading-relaxed">
                  Não somos apenas uma agência de anúncios. Somos parceiros estratégicos que entendem a psicologia do paciente que busca alta estética e reabilitação. Nossa metodologia une engenharia de tráfego a um atendimento comercial de excelência.
                </p>
                <div className="grid grid-cols-2 gap-8 pt-8">
                  <div>
                    <div className="text-4xl font-headline text-primary mb-2">Segurança</div>
                    <p className="text-sm font-label uppercase tracking-wider text-on-surface-variant">Marketing 100% Ético CRO</p>
                  </div>
                  <div>
                    <div className="text-4xl font-headline text-primary mb-2">Precisão</div>
                    <p className="text-sm font-label uppercase tracking-wider text-on-surface-variant">Segmentação de Alto Padrão</p>
                  </div>
                </div>
              </div>
              <div className="relative reveal-up">
                <div className="aspect-square rounded-2xl overflow-hidden shadow-2xl">
                  <img alt="Close-up de um dentista realizando um procedimento de precisão" width="800" height="800" decoding="async" className="image-scale-parallax w-full h-full object-cover grayscale hover:grayscale-0 transition-all duration-1000" loading="lazy" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBNtb8YLUMAGYbn6X-5fRIIucesv6Uir11SCUbmAPkXcAx4BwawLZdQnsQ5Y3H0UiLJmFXfVMzwE30fKExVtBdkI6ZFROm-XPWzOFUNWBQDU-D8CW7zeGGXVA1CuFRnip-FAaPc2ZLufbgrPv2AszIWlT2MFxrFXlOy8KVgr492RQh55pp4pQcpVo-2CxA7BoqeBvLYDIKnL2DkPFwQ-lw_kyXL-Mo4iatzCpmT7nlX5NZci1zB6_wvMCs0ELleMjoLqjxszNAq4nT"/>
                </div>
                <div className="absolute -bottom-10 -left-10 glass-card p-10 rounded-xl max-w-xs hidden md:block">
                  <blockquote className="italic text-lg font-headline leading-snug">
                    "Marketing ético não é sobre promessas, é sobre resultados previsíveis e respeito ao paciente."
                  </blockquote>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Testimonials Section */}
        <section aria-labelledby="testimonials-title" className="py-32 bg-surface-container-low relative border-y border-white/5">
          <div className="container mx-auto px-8">
            <div className="text-center mb-24 reveal-up">
              <span className="text-primary font-label uppercase tracking-widest text-xs">Resultados Reais</span>
              <h2 className="font-headline text-4xl md:text-5xl mt-4" id="testimonials-title">A Experiência de quem busca o Topo</h2>
            </div>
            <div className="grid grid-cols-1 lg:grid-cols-3 gap-8">
              {/* Testimonial 1 */}
              <TiltCard className="glass-card p-10 rounded-2xl border border-white/5 flex flex-col justify-between h-full">
                <div className="space-y-6">
                  <div className="flex gap-1 text-primary">
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                  </div>
                  <p className="text-on-surface-variant italic font-light leading-relaxed text-lg">
                    "Antes da Traffio, eu recebia muitos 'curiosos' que travavam meu WhatsApp. Hoje, o tráfego é qualificado: pacientes que buscam reabilitação oral de alto ticket e realmente agendam a consulta. Meu ROI nunca foi tão claro."
                  </p>
                </div>
                <div className="mt-10 pt-8 border-t border-white/5">
                  <p className="font-headline text-xl text-primary">Dr. Roberto Silva</p>
                  <p className="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Implantodontista</p>
                </div>
              </TiltCard>
              {/* Testimonial 2 */}
              <TiltCard delay={100} className="glass-card p-10 rounded-2xl border border-primary/30 flex flex-col justify-between h-full relative z-10 shadow-[0_0_40px_rgba(233,195,73,0.1)]">
                <div className="space-y-6">
                  <div className="flex gap-1 text-primary">
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                  </div>
                  <p className="text-on-surface font-light leading-relaxed text-lg">
                    "Minha maior preocupação era o código de ética do CRO. A equipe da Traffio entende as normas perfeitamente, fazendo um marketing elegante que valoriza minha autoridade sem ser sensacionalista. Sinto que tenho uma extensão da minha clínica cuidando do meu nome."
                  </p>
                </div>
                <div className="mt-10 pt-8 border-t border-white/5">
                  <p className="font-headline text-xl text-primary">Dra. Mariana Costa</p>
                  <p className="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Estética Orofacial</p>
                </div>
              </TiltCard>
              {/* Testimonial 3 */}
              <TiltCard delay={200} className="glass-card p-10 rounded-2xl border border-white/5 flex flex-col justify-between h-full">
                <div className="space-y-6">
                  <div className="flex gap-1 text-primary">
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                    <span className="material-symbols-outlined font-fill">star</span>
                  </div>
                  <p className="text-on-surface-variant italic font-light leading-relaxed text-lg">
                    "Muitas agências prometem milagres e somem. Com a Traffio, o suporte é diário. Eles nos ajudaram inclusive a ajustar nosso processo de recepção para absorver a demanda. Não é só anúncio, é gestão de crescimento sustentável."
                  </p>
                </div>
                <div className="mt-10 pt-8 border-t border-white/5">
                  <p className="font-headline text-xl text-primary">Dr. Felipe Mendes</p>
                  <p className="text-xs font-label uppercase tracking-widest text-on-surface-variant/60 mt-1">Ortodontia Invisível</p>
                </div>
              </TiltCard>
            </div>
          </div>
        </section>

        {/* FAQ Section */}
        <section aria-labelledby="faq-title" className="py-32 bg-surface-container-low" id="faq">
          <div className="container mx-auto px-8 max-w-4xl">
            <div className="text-center mb-24 reveal-up">
              <span className="text-primary font-label uppercase tracking-widest text-xs">Transparência</span>
              <h2 className="font-headline text-4xl md:text-5xl mt-4" id="faq-title">Perguntas Frequentes</h2>
            </div>
            <div className="space-y-4">
              {[
                {
                  q: "Como vocês garantem a qualidade dos pacientes?",
                  a: "Utilizamos segmentação avançada por interesses, localização e poder aquisitivo no Google e Meta. Além disso, estruturamos filtros na captação para que apenas quem realmente tem interesse e condições de pagar pelo tratamento premium chegue até seu WhatsApp."
                },
                {
                  q: "Em quanto tempo o ROI se torna positivo?",
                  a: "Os resultados começam a aparecer em dias, mas o ROI estruturado depende do ciclo de venda da sua clínica. Como focamos em tratamentos de alto ticket (implantes, lentes), uma única conversão costuma cobrir todo o investimento mensal em tráfego."
                },
                {
                  q: "Como funciona a política de cancelamento?",
                  a: "Acreditamos em parcerias baseadas em resultados, não em amarras contratuais. Nossa transparência é total: se não houver alinhamento ou entrega, o encerramento é simples e profissional."
                },
                {
                  q: "As campanhas respeitam o Código de Ética do CRO?",
                  a: "Sim, integralmente. Não trabalhamos com anúncios sensacionalistas, \"antes e depois\" proibidos ou promessas de cura. Focamos em autoridade, infraestrutura e benefícios dos tratamentos, mantendo a sobriedade que o público premium exige."
                }
              ].map((faq, index) => (
                <div key={index} className={`accordion-item reveal-up border border-outline-variant/20 bg-surface-container-highest/20 rounded-xl overflow-hidden transition-all duration-300 hover:border-primary/30 ${activeAccordion === index ? 'active' : ''}`} style={{ transitionDelay: `${index * 50}ms` }}>
                  <button aria-expanded={activeAccordion === index} className="w-full flex items-center justify-between p-8 text-left group" onClick={() => toggleAccordion(index)}>
                    <span className="text-xl font-headline">{faq.q}</span>
                    <span aria-hidden="true" className="material-symbols-outlined accordion-icon transition-transform text-primary">expand_more</span>
                  </button>
                  <div className="accordion-content" role="region">
                    <div className="px-8 pb-8 text-on-surface-variant font-light leading-relaxed">
                      {faq.a}
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Final CTA Section */}
        <section aria-labelledby="cta-title" className="py-32 bg-surface-container-lowest relative overflow-hidden">
          <div aria-hidden="true" className="absolute inset-0 z-0 opacity-20">
            <img alt="Interior de consultório de odontologia moderno e tecnológico" aria-hidden="true" width="1920" height="1080" decoding="async" className="parallax-bg w-full h-full object-cover scale-110" loading="lazy" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlq1qxqBDuGBL3AGXJsNK2nlrgRzqzd64lfjFjDNcIU6ivQlxTsGfEG7ZAbB89q4ai4CNDL90kBsFyWW0HH66JfxJTyiZVoNXd7QMpi8L8guqgXYxjrr4g3GTUAYhnH5SIY0uSF_MoWffoDEVbURHW8C2RQ_FffJvm6oDBGbpP6U3E203JGe0Pcs_Ma2XVfBNY89KXLZbcilGFC73DQZkdIMpdTdRwaSocbdceyXELQVtFHA8zbuvUDEPLKkO-lR1p1p7sI8NBuUvW"/>
          </div>
          <div className="container mx-auto px-8 relative z-10 text-center max-w-4xl">
            <h2 className="reveal-up font-headline text-5xl md:text-6xl mb-8 leading-tight" id="cta-title">Pronto para um crescimento sustentável?</h2>
            <p className="reveal-up text-on-surface-variant text-xl mb-12 font-light">
              Selecionamos apenas 2 novas clínicas por mês para garantir o padrão de entrega que sua reputação exige.
            </p>
            <a href="#super-form-section" aria-label="Garantir Consultoria Gratuita" className="reveal-up primary-gradient-btn px-12 py-6 rounded-md font-label text-xl font-bold text-on-primary hover:scale-105 transition-transform shadow-2xl shadow-primary/20 inline-block">
              Garantir Consultoria Gratuita
            </a>
            <p className="reveal-up mt-8 text-sm font-label uppercase tracking-widest text-primary/60">Vagas limitadas para este semestre.</p>
          </div>
        </section>
      </main>

      <footer className="bg-slate-950 w-full py-16 border-t border-slate-900">
        <div className="flex flex-col md:flex-row justify-between items-center px-12 gap-8 max-w-screen-2xl mx-auto">
          <div className="font-serif text-xl text-amber-500">Traffio Odonto</div>
          <nav aria-label="Links Úteis" className="flex flex-wrap justify-center gap-4 md:gap-8">
            <a className="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="/">Privacidade</a>
            <a className="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="/">Termos</a>
            <a aria-label="LinkedIn" className="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="/" rel="noopener noreferrer">LinkedIn</a>
            <a aria-label="Instagram" className="font-sans text-sm font-light text-slate-400 hover:text-amber-200 transition-colors p-2" href="/" rel="noopener noreferrer">Instagram</a>
          </nav>
          <div className="font-sans text-sm font-light text-slate-500">
            © 2024 Traffio Odonto. The Clinical Atelier. Marketing Ético & Previsível.
          </div>
        </div>
      </footer>
    </div>
  );
}

function ThankYouPage() {
  return (
    <div className="min-h-screen bg-surface flex flex-col items-center justify-center relative overflow-hidden font-body selection:bg-primary selection:text-on-primary">
      {/* Background effects */}
      <div className="absolute inset-0 z-0 opacity-20">
        <img alt="Fundo de página de agradecimento" aria-hidden="true" width="1920" height="1080" decoding="async" className="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlq1qxqBDuGBL3AGXJsNK2nlrgRzqzd64lfjFjDNcIU6ivQlxTsGfEG7ZAbB89q4ai4CNDL90kBsFyWW0HH66JfxJTyiZVoNXd7QMpi8L8guqgXYxjrr4g3GTUAYhnH5SIY0uSF_MoWffoDEVbURHW8C2RQ_FffJvm6oDBGbpP6U3E203JGe0Pcs_Ma2XVfBNY89KXLZbcilGFC73DQZkdIMpdTdRwaSocbdceyXELQVtFHA8zbuvUDEPLKkO-lR1p1p7sI8NBuUvW"/>
      </div>
      <div className="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/10 via-surface to-surface z-0"></div>

      <div className="relative z-10 glass-card p-12 md:p-16 rounded-2xl border border-primary/20 shadow-2xl max-w-2xl w-full mx-4 text-center animate-[fadeIn_0.8s_ease-out]">
        <div className="inline-flex items-center justify-center w-24 h-24 rounded-full bg-primary/10 mb-8 border border-primary/30">
          <span className="material-symbols-outlined text-6xl text-primary">check_circle</span>
        </div>
        <h1 className="text-4xl md:text-5xl font-headline text-on-surface mb-6">Solicitação <span className="italic text-primary">Recebida!</span></h1>
        <p className="text-on-surface-variant text-lg md:text-xl font-light mb-10 leading-relaxed">
          Sua aplicação para a consultoria estratégica foi enviada com sucesso. Nossa equipe analisará seus dados e entrará em contato via WhatsApp em breve.
        </p>
        <Link to="/" className="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary hover:shadow-[0_0_30px_rgba(233,195,73,0.3)] transition-all inline-block">
          Voltar para a Página Inicial
        </Link>
      </div>
    </div>
  );
}

function ContactPage() {
  const navigate = useNavigate();
  const [step, setStep] = useState(0);
  const [formData, setFormData] = useState({ name: '', email: '', clinic: '', whatsapp: '', budget: '' });
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [error, setError] = useState('');

  const handleChange = (e: React.ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
    setFormData({ ...formData, [e.target.name]: e.target.value });
    setError('');
  };

  const handleNext = () => {
    if (step === 1 && (!formData.name || !formData.email || !formData.email.includes('@'))) {
      setError('Por favor, preencha um nome e e-mail válidos.');
      return;
    }
    if (step === 2 && !formData.clinic) {
      setError('Por favor, informe o nome da clínica.');
      return;
    }
    if (step === 3 && !formData.whatsapp) {
      setError('Por favor, informe seu WhatsApp.');
      return;
    }
    setStep(s => s + 1);
  };

  const handleSubmit = async () => {
    if (!formData.budget) {
      setError('Por favor, selecione uma faixa de orçamento.');
      return;
    }
    setIsSubmitting(true);
    try {
      await fetch('/api/submit-lead.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(formData),
      });
      navigate('/obrigado');
    } catch (error) {
      console.error('Erro ao enviar formulário:', error);
      setError('Ocorreu um erro. Tente novamente.');
      setIsSubmitting(false);
    }
  };

  const handleKeyDown = (e: React.KeyboardEvent) => {
    if (e.key === 'Enter' && step > 0 && step < 4) {
      handleNext();
    }
  };

  return (
    <div className="min-h-screen bg-surface flex flex-col font-body selection:bg-primary selection:text-on-primary relative overflow-hidden">
      {/* Background */}
      <div className="absolute inset-0 z-0 opacity-20">
        <img alt="Fundo de formulário de contato" aria-hidden="true" width="1920" height="1080" decoding="async" className="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlq1qxqBDuGBL3AGXJsNK2nlrgRzqzd64lfjFjDNcIU6ivQlxTsGfEG7ZAbB89q4ai4CNDL90kBsFyWW0HH66JfxJTyiZVoNXd7QMpi8L8guqgXYxjrr4g3GTUAYhnH5SIY0uSF_MoWffoDEVbURHW8C2RQ_FffJvm6oDBGbpP6U3E203JGe0Pcs_Ma2XVfBNY89KXLZbcilGFC73DQZkdIMpdTdRwaSocbdceyXELQVtFHA8zbuvUDEPLKkO-lR1p1p7sI8NBuUvW"/>
      </div>
      <div className="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/5 via-surface to-surface z-0"></div>

      {/* Header */}
      <header className="relative z-10 w-full p-8 flex justify-between items-center">
        <Link to="/" className="font-serif italic text-xl text-amber-400 hover:opacity-80 transition-opacity">Traffio Odonto</Link>
        <Link to="/" className="text-on-surface-variant hover:text-primary transition-colors flex items-center gap-2 text-sm font-label uppercase tracking-widest">
          <span className="material-symbols-outlined text-lg">close</span> Fechar
        </Link>
      </header>

      {/* Progress Bar */}
      {step > 0 && (
        <div className="relative z-10 w-full h-1 bg-surface-container-highest">
          <div 
            className="h-full bg-primary transition-all duration-700 ease-out"
            style={{ width: `${(step / 4) * 100}%` }}
          ></div>
        </div>
      )}

      {/* Content */}
      <main className="relative z-10 flex-1 flex flex-col items-center justify-center p-8 w-full max-w-4xl mx-auto">
        <div key={step} className="w-full animate-fade-in-up">
          {step === 0 && (
            <div className="text-center space-y-8">
              <span className="inline-block text-primary uppercase tracking-[0.3em] font-label text-sm font-semibold mb-2">Consultoria Estratégica</span>
              <h1 className="text-5xl md:text-7xl font-headline font-light leading-tight">
                Pronto para escalar <br/><span className="italic text-primary">sua clínica?</span>
              </h1>
              <p className="text-on-surface-variant text-xl font-light max-w-xl mx-auto">
                Precisamos de algumas informações para entender seu momento e preparar uma estratégia personalizada. Leva menos de 1 minuto.
              </p>
              <button onClick={() => setStep(1)} className="primary-gradient-btn px-12 py-6 rounded-md font-label text-xl font-bold text-on-primary hover:scale-105 transition-transform shadow-2xl shadow-primary/20 inline-block mt-8">
                Começar Agora
              </button>
            </div>
          )}

          {step === 1 && (
            <div className="space-y-12 w-full max-w-2xl mx-auto">
              <h2 className="text-3xl md:text-5xl font-headline font-light leading-tight">
                Primeiro, como podemos <span className="italic text-primary">te chamar?</span>
              </h2>
              <div className="space-y-8">
                <div>
                  <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider">Seu Nome Completo</label>
                  <input autoFocus type="text" name="name" value={formData.name} onChange={handleChange} onKeyDown={handleKeyDown} placeholder="Ex: Dr. Marcelo Santos" className="w-full bg-transparent border-b-2 border-outline-variant/30 text-2xl md:text-4xl py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:border-primary focus:outline-none transition-colors" />
                </div>
                <div>
                  <label className="block text-sm font-label text-primary/80 mb-2 uppercase tracking-wider">Seu Melhor E-mail</label>
                  <input type="email" name="email" value={formData.email} onChange={handleChange} onKeyDown={handleKeyDown} placeholder="dr.marcelo@clinica.com" className="w-full bg-transparent border-b-2 border-outline-variant/30 text-2xl md:text-4xl py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:border-primary focus:outline-none transition-colors" />
                </div>
              </div>
              {error && <p className="text-error text-sm font-label">{error}</p>}
              <button onClick={handleNext} className="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary flex items-center gap-2 group">
                Continuar <span className="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
              </button>
            </div>
          )}

          {step === 2 && (
            <div className="space-y-12 w-full max-w-2xl mx-auto">
              <h2 className="text-3xl md:text-5xl font-headline font-light leading-tight">
                Prazer, {formData.name.split(' ')[0]}. Qual o nome da <span className="italic text-primary">sua clínica?</span>
              </h2>
              <div className="space-y-8">
                <div>
                  <input autoFocus type="text" name="clinic" value={formData.clinic} onChange={handleChange} onKeyDown={handleKeyDown} placeholder="Ex: Santos Odontologia Premium" className="w-full bg-transparent border-b-2 border-outline-variant/30 text-2xl md:text-4xl py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:border-primary focus:outline-none transition-colors" />
                </div>
              </div>
              {error && <p className="text-error text-sm font-label">{error}</p>}
              <div className="flex gap-4">
                <button onClick={() => setStep(1)} className="px-8 py-5 rounded-md font-label text-lg text-on-surface-variant hover:bg-surface-container-highest transition-colors">Voltar</button>
                <button onClick={handleNext} className="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary flex items-center gap-2 group">
                  Continuar <span className="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
              </div>
            </div>
          )}

          {step === 3 && (
            <div className="space-y-12 w-full max-w-2xl mx-auto">
              <h2 className="text-3xl md:text-5xl font-headline font-light leading-tight">
                Ótimo. Qual o seu <span className="italic text-primary">WhatsApp</span> para contato?
              </h2>
              <div className="space-y-8">
                <div>
                  <input autoFocus type="tel" name="whatsapp" value={formData.whatsapp} onChange={handleChange} onKeyDown={handleKeyDown} placeholder="(00) 00000-0000" className="w-full bg-transparent border-b-2 border-outline-variant/30 text-2xl md:text-4xl py-4 text-on-surface placeholder:text-on-surface-variant/30 focus:border-primary focus:outline-none transition-colors" />
                </div>
              </div>
              {error && <p className="text-error text-sm font-label">{error}</p>}
              <div className="flex gap-4">
                <button onClick={() => setStep(2)} className="px-8 py-5 rounded-md font-label text-lg text-on-surface-variant hover:bg-surface-container-highest transition-colors">Voltar</button>
                <button onClick={handleNext} className="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary flex items-center gap-2 group">
                  Continuar <span className="material-symbols-outlined group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </button>
              </div>
            </div>
          )}

          {step === 4 && (
            <div className="space-y-12 w-full max-w-2xl mx-auto">
              <h2 className="text-3xl md:text-5xl font-headline font-light leading-tight">
                Para alinharmos expectativas, qual seu <span className="italic text-primary">orçamento mensal</span> para Tráfego Pago?
              </h2>
              <div className="space-y-8">
                <div>
                  <select autoFocus name="budget" value={formData.budget} onChange={handleChange} className="w-full bg-surface-container-low border-b-2 border-outline-variant/30 text-xl md:text-3xl py-4 text-on-surface focus:border-primary focus:outline-none transition-colors appearance-none cursor-pointer">
                    <option disabled value="">Selecione uma faixa...</option>
                    <option value="5-10k">R$ 5.000 - R$ 10.000</option>
                    <option value="10-20k">R$ 10.000 - R$ 20.000</option>
                    <option value="20-50k">R$ 20.000 - R$ 50.000</option>
                    <option value="50k+">Acima de R$ 50.000</option>
                  </select>
                </div>
              </div>
              {error && <p className="text-error text-sm font-label">{error}</p>}
              <div className="flex gap-4">
                <button onClick={() => setStep(3)} className="px-8 py-5 rounded-md font-label text-lg text-on-surface-variant hover:bg-surface-container-highest transition-colors">Voltar</button>
                <button onClick={handleSubmit} disabled={isSubmitting} className={`primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary flex items-center gap-2 group ${isSubmitting ? 'opacity-70 cursor-not-allowed' : ''}`}>
                  {isSubmitting ? 'Enviando...' : 'Finalizar Inscrição'} <span className="material-symbols-outlined group-hover:translate-x-1 transition-transform">check_circle</span>
                </button>
              </div>
            </div>
          )}
        </div>
      </main>
    </div>
  );
}

export default function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route path="/" element={<LandingPage />} />
        <Route path="/obrigado" element={<ThankYouPage />} />
        <Route path="/contato" element={<ContactPage />} />
      </Routes>
    </BrowserRouter>
  );
}
