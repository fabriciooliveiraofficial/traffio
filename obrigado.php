<?php
/**
 * Traffio Odonto - Págiana de Agradecimento
 */
?>
<!DOCTYPE html>
<html lang="pt-BR" class="dark">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Solicitação Recebida | Traffio Odonto</title>
    
    <!-- SEO -->
    <meta name="robots" content="noindex" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,300;0,400;0,700;1,300&family=Manrope:wght@200;300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="bg-surface text-on-surface font-body selection:bg-primary selection:text-on-primary antialiased">
    
    <main class="min-h-screen flex flex-col items-center justify-center relative overflow-hidden">
        <!-- Background effects -->
        <div class="absolute inset-0 z-0 opacity-20" aria-hidden="true">
            <img alt="Fundo premium de clínica odontológica" width="1920" height="1080" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDlq1qxqBDuGBL3AGXJsNK2nlrgRzqzd64lfjFjDNcIU6ivQlxTsGfEG7ZAbB89q4ai4CNDL90kBsFyWW0HH66JfxJTyiZVoNXd7QMpi8L8guqgXYxjrr4g3GTUAYhnH5SIY0uSF_MoWffoDEVbURHW8C2RQ_FffJvm6oDBGbpP6U3E203JGe0Pcs_Ma2XVfBNY89KXLZbcilGFC73DQZkdIMpdTdRwaSocbdceyXELQVtFHA8zbuvUDEPLKkO-lR1p1p7sI8NBuUvW"/>
        </div>
        <div class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/10 via-surface to-surface z-0"></div>

        <div class="relative z-10 glass-card p-12 md:p-16 rounded-2xl border border-primary/20 shadow-2xl max-w-2xl w-full mx-4 text-center">
            <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-primary/10 mb-8 border border-primary/30">
                <span class="material-symbols-outlined text-6xl text-primary">check_circle</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-headline mb-6">Solicitação <span class="italic text-primary">Recebida!</span></h1>
            <p class="text-on-surface-variant text-lg md:text-xl font-light mb-10 leading-relaxed">
                Sua aplicação para a consultoria estratégica foi enviada com sucesso. Nossa equipe analisará seus dados e entrará em contato via WhatsApp em breve.
            </p>
            <a href="index.php" class="primary-gradient-btn px-10 py-5 rounded-md font-label text-lg font-bold text-on-primary hover:shadow-[0_0_30px_rgba(233,195,73,0.3)] transition-all inline-block">
                Voltar para a Página Inicial
            </a>
        </div>
    </main>

</body>
</html>
