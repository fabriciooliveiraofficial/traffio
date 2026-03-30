/**
 * Traffio Odonto - Main Scripts
 * GSAP 3.12.5 + Vanilla JS
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Initialize GSAP & ScrollTrigger
    gsap.registerPlugin(ScrollTrigger);

    // 2. Reveal Up Animation
    gsap.utils.toArray('.reveal-up').forEach((el) => {
        const delay = el.getAttribute('data-delay') || 0;
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top 85%",
                toggleActions: "play none none none"
            },
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: delay / 1000,
            ease: "power2.out"
        });
    });

    // 3. 3D Text Reveal
    gsap.utils.toArray('.text-reveal-container').forEach((container) => {
        const text = container.querySelectorAll('.text-reveal');
        gsap.fromTo(text,
            { y: '100%', opacity: 0, rotateX: -20, transformOrigin: "0% 50% -50" },
            {
                scrollTrigger: { trigger: container, start: "top 85%" },
                y: '0%', opacity: 1, rotateX: 0, duration: 1.2, stagger: 0.15, ease: 'power4.out'
            }
        );
    });

    // 4. Parallax Backgrounds
    gsap.utils.toArray('.parallax-bg').forEach((el) => {
        const speed = parseFloat(el.getAttribute('data-speed')) || 0.1;
        gsap.to(el, {
            scrollTrigger: {
                trigger: el,
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            },
            y: (i, target) => {
                return (window.innerHeight) * speed;
            },
            ease: "none"
        });
    });

    // 5. Image Scale Parallax
    gsap.utils.toArray('.image-scale-parallax').forEach((el) => {
        gsap.fromTo(el, 
            { scale: 1.2 },
            {
                scrollTrigger: { trigger: el, start: "top bottom", end: "bottom top", scrub: true },
                scale: 1,
                ease: "none"
            }
        );
    });

    // 6. 3D Tilt Effect
    const tiltContainers = document.querySelectorAll('.active-tilt');
    tiltContainers.forEach((card) => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const rotateX = ((y - centerY) / centerY) * -10;
            const rotateY = ((x - centerX) / centerX) * 10;

            gsap.to(card, {
                duration: 0.5,
                rotateX,
                rotateY,
                transformPerspective: 1000,
                ease: 'power2.out',
                overwrite: true
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                duration: 0.8,
                rotateX: 0,
                rotateY: 0,
                ease: 'power2.out',
                overwrite: true
            });
        });
    });

    // 7. Accordion Logic
    const accordionItems = document.querySelectorAll('.accordion-item');
    accordionItems.forEach((item) => {
        const button = item.querySelector('button');
        button.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other items
            accordionItems.forEach(i => i.classList.remove('active'));
            accordionItems.forEach(i => i.querySelector('button').setAttribute('aria-expanded', 'false'));
            
            if (!isActive) {
                item.classList.add('active');
                button.setAttribute('aria-expanded', 'true');
            }
        });
    });

    // 8. Multi-step Form Logic
    const form = document.getElementById('multi-step-form');
    if (form) {
        const step1 = document.getElementById('step-1');
        const step2 = document.getElementById('step-2');
        const nextBtn = form.querySelector('.next-step-btn');
        const prevBtn = form.querySelector('.prev-step-btn');
        const submitBtn = form.querySelector('button[type="submit"]');

        nextBtn.addEventListener('click', () => {
            const inputs = step1.querySelectorAll('input[required]');
            let valid = true;
            inputs.forEach(input => {
                if (!input.checkValidity()) {
                    input.reportValidity();
                    valid = false;
                }
            });

            if (valid) {
                step1.classList.remove('active');
                step2.classList.add('active');
            }
        });

        prevBtn.addEventListener('click', () => {
            step2.classList.remove('active');
            step1.classList.add('active');
        });

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            
            submitBtn.disabled = true;
            submitBtn.innerText = 'Enviando...';

            try {
                const response = await fetch('api/submit-lead.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (result.success) {
                    window.location.href = 'obrigado.php';
                } else {
                    alert('Erro ao enviar: ' + (result.error || 'Tente novamente mais tarde.'));
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Finalizar Inscrição';
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Erro de conexão. Tente novamente.');
                submitBtn.disabled = false;
                submitBtn.innerText = 'Finalizar Inscrição';
            }
        });
    }

    // 9. Sticky Header Effect
    const header = document.getElementById('main-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            header.classList.add('py-4', 'bg-slate-950/90');
            header.classList.remove('py-6', 'bg-slate-950/60');
        } else {
            header.classList.add('py-6', 'bg-slate-950/60');
            header.classList.remove('py-4', 'bg-slate-950/90');
        }
    });
});
