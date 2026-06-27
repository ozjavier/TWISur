<?php get_header(); ?>

<section class=" isolate overflow-hidden  bg-up-blue-dark">
  <div class="aspect-video mx-auto w-full min-h-[640px]  max-h-[75vh] max-w-[2560px] relative flex items-end">
  <!-- 1 · VIDEO -->
  <video
    class="absolute  inset-0 w-full h-full object-cover object-[50%_28%]"
    autoplay muted loop playsinline preload="metadata"
    poster="<?php echo esc_url( get_theme_file_uri( '/assets/img/hero-poster.jpg' ) ); ?>">
    <source src="<?php echo esc_url( get_theme_file_uri( '/assets/video/preset-home.mp4' ) ); ?>" type="video/mp4">
  </video>

  <!-- 2 · OVERLAYS — dejan ver el video y protegen el texto -->
  <div class="absolute inset-0 bg-up-blue-dark/15"></div>
  <div class="absolute inset-0 bg-[linear-gradient(to_top,#020617_0%,rgba(2,6,23,0.85)_20%,rgba(2,6,23,0)_60%)]"></div>
  <div class="absolute inset-0 bg-[linear-gradient(to_top_right,rgba(2,6,23,0.55)_0%,rgba(2,6,23,0)_50%)]"></div>

  <!-- 5 · TRAMA: grid sutil + halftone (sin cruces) -->
  <div class="absolute inset-0 pointer-events-none">
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="iup-grid" width="44" height="44" patternUnits="userSpaceOnUse">
          <path d="M 44 0 L 0 0 0 44" fill="none" stroke="rgba(255,255,255,0.035)" stroke-width="1"/>
        </pattern>

        <!-- halftone verde (arriba-derecha) -->
        <pattern id="iup-halftone" width="16" height="16" patternUnits="userSpaceOnUse">
          <circle cx="8" cy="8" r="2" fill="#a3e635"/>
        </pattern>
        <radialGradient id="iup-halftone-fade" cx="100%" cy="0%" r="55%">
          <stop offset="0" stop-color="white" stop-opacity="1"/>
          <stop offset="1" stop-color="white" stop-opacity="0"/>
        </radialGradient>
        <mask id="iup-halftone-mask">
          <rect width="100%" height="100%" fill="url(#iup-halftone-fade)"/>
        </mask>

        <!-- halftone azul (abajo-izquierda) · degradado agresivo -->
        <pattern id="iup-halftone-blue" width="16" height="16" patternUnits="userSpaceOnUse">
          <circle cx="8" cy="8" r="2" fill="#60a5fa"/>
        </pattern>
        <radialGradient id="iup-halftone-fade-blue" cx="0%" cy="100%" r="42%">
          <stop offset="0"    stop-color="white" stop-opacity="1"/>
          <stop offset="0.30" stop-color="white" stop-opacity="0.5"/>
          <stop offset="0.55" stop-color="white" stop-opacity="0.12"/>
          <stop offset="0.8"  stop-color="white" stop-opacity="0"/>
        </radialGradient>
        <mask id="iup-halftone-mask-blue">
          <rect width="100%" height="100%" fill="url(#iup-halftone-fade-blue)"/>
        </mask>
      </defs>

      <rect width="100%" height="100%" fill="url(#iup-grid)" opacity="0.6"/>
      <rect width="100%" height="100%" fill="url(#iup-halftone)" mask="url(#iup-halftone-mask)" opacity="0.22"/>
      <rect width="100%" height="100%" fill="url(#iup-halftone-blue)" mask="url(#iup-halftone-mask-blue)" opacity="0.22"/>
    </svg>
  </div>

  <!-- 6 · CONTENIDO -->
  <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-7 lg:pb-24 mb-0  animate-slide-in-left">
    <div class="max-w-4xl">
      <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold tracking-tight text-white max-w-3xl drop-shadow-[0_2px_24px_rgba(0,0,0,0.9)]">
        Forma parte del
        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-up-green/80 via-up-green/90 to-up-green">
          Instituto Universitario
        </span>
        <span class="text-2xl md:text-4xl lg:text-5xl block">
          para la Región Sur de Puebla
        </span>
      </h1>

      <p class="mt-3 text-base leading-[21px] md:text-xl text-slate-100 max-w-xl font-light drop-shadow-[0_1px_8px_rgba(0,0,0,0.8)]">
        Calidad académica a costos accesibles. Descubre nuestros programas en
        Salud, Ciencias Sociales y más.
      </p>

    </div>
  </div>

  <!-- Filo inferior azul → lima (remate de marca) -->
  <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-up-blue via-up-green to-up-green"></div>
  </div>
</section>

<section class="relative z-20 py-7 lg:-mt-24 xl:-mt-17 mb-0 lg:-mb-87 lg:bg-transparent bg-white">

  <style>
    /* ===== Features · slider <1024px / grid ≥1024px ===== */

    /* DESKTOP (≥1024px): el track vuelve a ser el grid de 3 columnas. */
    @media (min-width: 1024px) {
      .features-slider .blaze-track-container { overflow: visible; }
      .features-slider .blaze-track {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;                 /* equivale a gap-6 */
        transform: none !important;
        width: 100% !important;
      }
      .features-slider .blaze-track > * { width: 100% !important; }
    }

    /* SLIDER (<1024px): sin hover táctil, forzamos el estado activo en las
       cards visibles con efectos que viven DENTRO de la card. Sin lift ni
       sombra grande, que el slider (overflow:hidden) recortaría. */
    @media (max-width: 1023px) {
      .features-slider .feature-card--green { border-color: rgba(82, 184, 72, 0.7) !important; }
      .features-slider .feature-card--blue  { border-color: rgba(59, 130, 246, 0.55) !important; }

      .features-slider .feature-card--green .feature-glow { background-color: rgba(82, 184, 72, 0.18) !important; }
      .features-slider .feature-card--blue  .feature-glow { background-color: rgba(59, 130, 246, 0.22) !important; }

      .features-slider .feature-img { transform: scale(1.05) !important; }
      .features-slider .feature-overlay { opacity: 1 !important; }
      .features-slider .feature-bar { transform: scaleX(1) !important; }
    }

    /* Paginación (visible solo en el slider, oculta en desktop por lg:hidden) */
    .features-slider .blaze-pagination { display: flex; gap: 0.5rem; }
    .features-slider .blaze-pagination button {
      width: 0.5rem; height: 0.5rem; padding: 0;
      border: 0; border-radius: 9999px; cursor: pointer;
      font-size: 0; line-height: 0; color: transparent;
      background: rgba(15, 23, 42, 0.2); /* slate-900/20, legible sobre blanco */
      transition: width 0.3s ease, background 0.3s ease;
    }
    .features-slider .blaze-pagination button.active {
      width: 1.5rem;
      background: #52b848; /* verde que contrasta sobre blanco */
    }
  </style>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
    <div class="absolute inset-0 z-0 opacity-20 pointer-events-none hidden lg:block">
      <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <pattern id="dots-features" width="24" height="24" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="1.5" fill="rgba(255,255,255,0.5)"></circle>
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#dots-features)"></rect>
      </svg>
    </div>

    <div class="blaze-slider features-slider relative z-10">
      <div class="blaze-container">
        <div class="blaze-track-container">
          <div class="blaze-track">

            <!-- Card 1 (impar · verde · claro) -->
            <div class="feature-card feature-card--green group bg-white backdrop-blur-xl border border-slate-200 hover:border-up-green/70 rounded-2xl p-8 transition-all duration-300 shadow-sm lg:shadow-xl lg:shadow-slate-950/30 lg:hover:shadow-2xl lg:hover:-translate-y-1 relative overflow-hidden">
              <div class="feature-glow absolute top-0 right-0 w-40 h-40 rounded-full blur-3xl group-hover:bg-up-green/20 transition-all"></div>
              <div class="relative -mx-8 -mt-8 mb-6 h-44 overflow-hidden transform-gpu isolate">
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/psicologia-pg-5.webp' ) ); ?>" alt="Educación de calidad"
                      class="feature-img absolute -inset-px w-[calc(100%+2px)] h-[calc(100%+2px)] object-cover transition-transform duration-500 transform-gpu [backface-visibility:hidden] will-change-transform group-hover:scale-105" />
                <div class="feature-overlay absolute inset-0 bg-gradient-to-tr from-up-green/25 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="feature-bar absolute bottom-0 inset-x-0 h-[3px] bg-up-green origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
              </div>
              <h3 class="text-xl font-semibold text-[#00103e] tracking-tight mb-3 group-hover:text-up-green transition-colors relative z-10">
                Educación de calidad
              </h3>
              <p class="text-lg text-slate-600 font-light relative z-10">
                Programas actualizados y docentes capacitados para asegurar tu
                excelencia profesional.
              </p>
            </div>

            <!-- Card 2 (par · azul · oscuro) -->
            <div class="feature-card feature-card--blue group bg-[#00103e]/90 backdrop-blur-xl border border-white/10 hover:border-blue-500/50 rounded-2xl p-8 transition-all duration-300 shadow-sm lg:shadow-xl lg:shadow-slate-950/40 lg:hover:shadow-2xl lg:hover:-translate-y-1 relative overflow-hidden">
              <div class="feature-glow absolute top-0 right-0 w-40 h-40 rounded-full blur-3xl group-hover:bg-blue-500/20 transition-all"></div>
              <div class="relative -mx-8 -mt-8 mb-6 h-44 overflow-hidden transform-gpu isolate">
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/criminologia-pg-2.webp' ) ); ?>" alt="Seguro IUP-SUR"
                      class="feature-img absolute -inset-px w-[calc(100%+2px)] h-[calc(100%+2px)] object-cover transition-transform duration-500 transform-gpu [backface-visibility:hidden] will-change-transform group-hover:scale-105" />
                <div class="feature-overlay absolute inset-0 bg-gradient-to-tr from-blue-500/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="feature-bar absolute bottom-0 inset-x-0 h-[3px] bg-blue-500 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
              </div>
              <h3 class="text-xl font-semibold text-white tracking-tight mb-3 group-hover:text-blue-400 transition-colors relative z-10">
                Seguro IUP-SUR
              </h3>
              <p class="text-lg text-slate-300 font-light relative z-10">
                Protegemos a nuestra comunidad con cobertura integral durante su
                estancia académica.
              </p>
            </div>

            <!-- Card 3 (impar · verde · claro) -->
            <div class="feature-card feature-card--green group bg-white backdrop-blur-xl border border-slate-200 hover:border-up-green/70 rounded-2xl p-8 transition-all duration-300 shadow-sm lg:shadow-xl lg:shadow-slate-950/30 lg:hover:shadow-2xl lg:hover:-translate-y-1 relative overflow-hidden">
              <div class="feature-glow absolute top-0 right-0 w-40 h-40 rounded-full blur-3xl group-hover:bg-up-green/20 transition-all"></div>
              <div class="relative -mx-8 -mt-8 mb-6 h-44 overflow-hidden transform-gpu isolate">
                <img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/derecho-pg-5.webp' ) ); ?>" alt="Oferta académica"
                      class="feature-img absolute -inset-px w-[calc(100%+2px)] h-[calc(100%+2px)] object-cover transition-transform duration-500 transform-gpu [backface-visibility:hidden] will-change-transform group-hover:scale-105" />
                <div class="feature-overlay absolute inset-0 bg-gradient-to-tr from-up-green/25 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="feature-bar absolute bottom-0 inset-x-0 h-[3px] bg-up-green origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
              </div>
              <h3 class="text-xl font-semibold text-[#00103e] tracking-tight mb-3 group-hover:text-up-green transition-colors relative z-10">
                Oferta académica
              </h3>
              <p class="text-lg text-slate-600 font-light relative z-10">
                Más de 13 programas académicos entre licenciaturas y maestrías
                diseñados para el futuro.
              </p>
            </div>

          </div>
        </div>

        <!-- Controles (visibles en el slider: <1024px) -->
        <div class="lg:hidden flex items-center justify-center gap-4 mt-6">
          <button class="blaze-prev w-10 h-10 rounded-full border border-gray-300 bg-white text-[#171269] shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Anterior">
            <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="2"></i>
          </button>
          <div class="blaze-pagination"></div>
          <button class="blaze-next w-10 h-10 rounded-full border border-gray-300 bg-white text-[#171269] shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Siguiente">
            <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="2"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    /* Inicializa el slider SOLO por debajo de 1024px (1 carta <768, 2 cartas
       768–1023) y lo destruye en desktop, donde el track vuelve a ser grid.
       Init dedicado: el global de ofertas apunta a .oferta-slider, no choca. */
    (function () {
      function initFeatures() {
          console.log("[features] BlazeSlider:", typeof BlazeSlider, "readyState:", document.readyState);

        if (typeof BlazeSlider === "undefined") return;
        var el = document.querySelector(".features-slider");
        if (!el) return;

        var instance = null;
        var mq = window.matchMedia("(max-width: 1023px)");

        function sync() {
          if (mq.matches && !instance) {
            instance = new BlazeSlider(el, {
              all: {
                slidesToShow: 1,
                slidesToScroll: 1,
                slideGap: "1rem",
                loop: true,
                enableAutoplay: false,
                transitionDuration: 400,
              },
              "(min-width: 768px)": { slidesToShow: 2 },
            });
            if (typeof lucide !== "undefined") lucide.createIcons();
          } else if (!mq.matches && instance) {
            instance.destroy();
            instance = null;
          }
        }

        sync();
        if (mq.addEventListener) mq.addEventListener("change", sync);
        else mq.addListener(sync);
      }

      if (document.readyState !== "loading") initFeatures();
      else document.addEventListener("DOMContentLoaded", initFeatures);
    })();
  </script>
</section>

<section
    id="conocenos"
    class="py-24 pt-9 lg:pt-90 xl:pt-95 bg-up-blue-dark pb-12 lg:pb-20 relative border-t border-white/5 overflow-hidden"
  >
  <!-- Decoración: mismo lenguaje visual que el hero (grid + halftone) + anillos -->
  <div class="absolute inset-0 pointer-events-none">
    <!-- Grid sutil + halftone verde (esquina inferior derecha) -->
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="conocenos-grid" width="44" height="44" patternUnits="userSpaceOnUse">
          <path d="M 44 0 L 0 0 0 44" fill="none" stroke="rgba(255,255,255,0.035)" stroke-width="1"/>
        </pattern>
        <pattern id="conocenos-halftone" width="16" height="16" patternUnits="userSpaceOnUse">
          <circle cx="8" cy="8" r="2" fill="#a3e635"/>
        </pattern>
        <radialGradient id="conocenos-halftone-fade" cx="100%" cy="100%" r="50%">
          <stop offset="0"    stop-color="white" stop-opacity="1"/>
          <stop offset="0.55" stop-color="white" stop-opacity="0.4"/>
          <stop offset="1"    stop-color="white" stop-opacity="0"/>
        </radialGradient>
        <mask id="conocenos-halftone-mask">
          <rect width="100%" height="100%" fill="url(#conocenos-halftone-fade)"/>
        </mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#conocenos-grid)" opacity="0.6"/>
      <rect width="100%" height="100%" fill="url(#conocenos-halftone)" mask="url(#conocenos-halftone-mask)" opacity="0.15"/>
    </svg>

    <!-- Anillo azul (izquierda) — el que ya te gustaba -->
    <svg class="absolute left-40 top-1/2 -translate-y-1/2 w-96 h-96 text-blue-900/20"
         viewBox="0 0 100 100" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path d="M50 0C77.6 0 100 22.4 100 50C100 77.6 77.6 100 50 100C22.4 100 0 77.6 0 50C0 22.4 22.4 0 50 0ZM50 10C27.9 10 10 27.9 10 50C10 72.1 27.9 90 50 90C72.1 90 90 72.1 90 50C90 27.9 72.1 10 50 10Z"/>
    </svg>

    <!-- Anillo verde (inferior derecha) — forma complementaria -->
    <svg class="absolute -right-24 -bottom-24 w-80 h-80 text-up-green/10"
         viewBox="0 0 100 100" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path d="M50 0C77.6 0 100 22.4 100 50C100 77.6 77.6 100 50 100C22.4 100 0 77.6 0 50C0 22.4 22.4 0 50 0ZM50 10C27.9 10 10 27.9 10 50C10 72.1 27.9 90 50 90C72.1 90 90 72.1 90 50C90 27.9 72.1 10 50 10Z"/>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="relative">
      <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">
        <!-- Image side -->
        <div class="relative">
          <div
            class="absolute -inset-4 bg-gradient-to-r from-lime-500/20 to-blue-600/20 rounded-3xl blur-xl opacity-50"
          ></div>
          <div
            class="relative rounded-2xl overflow-hidden border border-slate-700 bg-slate-800 aspect-[4/5] sm:aspect-auto sm:h-[600px]"
          >
            <img
              src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/derecho-pg-2.webp' ) ); ?>"
              alt="Estudiante en campus"
              class="w-full h-full object-cover opacity-80 mix-blend-normal transition-all duration-700"
            />
          </div>
        </div>

        <!-- Text side -->
        <div class="animate-slide-in-left">
          <h2
            class="text-3xl leading-[33px] lg:leading-[39px] xl:leading-[42px] text-center lg:text-left lg:text-4xl xl:text-5xl text-pretty font-bold tracking-tight text-white mb-6"
          >
            <span class="relative inline-block isolate">
              <span class="relative">Universidad</span>
            </span>
            certificada internacional en
            <span
              class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/80 via-up-green/90 to-up-green"
            >
              enseñanza y aprendizaje
            </span>
          </h2>
          <div class="space-y-6 text-lg text-center lg:text-left text-slate-100 font-light">
            <p>
              El Instituto Universitario para la Región Sur de Puebla se
              dedica a educar a los líderes en educación superior. Ofrecemos
              programas acreditados con RVOE y oportunidades de inmersión
              internacional.
            </p>
            <p>
              Nos dedicamos a formar profesionales éticos y comprometidos con
              el desarrollo sostenible. Únete a nuestra comunidad y asegura tu
              futuro con una educación de calidad.
            </p>
            <p>
              Contamos con una planta docente de excelencia, donde el 80% de
              nuestros maestros tienen maestría o doctorado, entre ellos
              jueces y ex-funcionarios federales.
            </p>
          </div>

          <div
            class="mt-10 pt-7 border-t border-slate-800 flex items-center gap-6"
          >
            <div class="flex items-center flex-col lg:flex-row mx-auto lg:m-0 gap-5">
              <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/certificacion-bureau.svg' ) ); ?>" class="w-full max-w-fit h-auto max-h-[60px]" alt="Logo Instituto Universitario">
              <div class="text-slate-100">
                <p>
                  <strong>Institución Certificada Internacionalmente</strong>
                </p>
                <p>ISO 9001:2015 / NMX-CC-9001-IMNC-2015</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="oferta" class="pt-16 bg-white relative overflow-hidden">

  <style>
    /* Selección legible en zonas blancas de esta sección.
       Si ya lo moviste a tu CSS global, puedes quitar este bloque. */
    #oferta ::selection { color: #0f172a; }
    #oferta ::-moz-selection { color: #0f172a; }

    /* Móvil/tablet: las flechas dejan de estar superpuestas a los lados y
       se alinean en la fila de los bullets. En desktop no aplica, así que
       tu CSS .oferta-arrow (absoluto) sigue mandando. */
    @media (max-width: 1024px) {
      .oferta-slider .oferta-arrow {
        position: static !important;
        inset: auto !important;
        transform: none !important;
        margin: 0 !important;
      }
    }
  </style>

  <!-- Fondo decorativo: cruz + halftone denso verde/azul + glows -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden opacity-65">

      <!-- Glows suaves en esquinas (como el banner UNAM) -->
      <div class="absolute -top-20 -right-20 w-96 h-96 bg-lime-400/20 rounded-full blur-3xl"></div>
      <div class="absolute -bottom-24 -left-24 w-[28rem] h-[28rem] bg-blue-500/15 rounded-full blur-3xl"></div>
      <div class="absolute top-1/3 left-1/2 -translate-x-1/2 w-72 h-72 bg-lime-300/10 rounded-full blur-3xl"></div>

      <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <!-- Cruz (motivo de la sección) -->
          <pattern id="cross-oferta" width="60" height="60" patternUnits="userSpaceOnUse">
            <path d="M 30 25 L 30 35 M 25 30 L 35 30" fill="none" stroke="rgba(163,230,53,1)" stroke-width="1.5"></path>
          </pattern>

          <!-- Campo de puntos fino -->
          <pattern id="oferta-dots-base" width="22" height="22" patternUnits="userSpaceOnUse">
            <circle cx="2" cy="2" r="1.4" fill="rgba(100,116,139,0.35)"></circle>
          </pattern>

          <!-- Máscara que vacía el centro y deja puntos en los bordes -->
          <radialGradient id="oferta-center-clear" cx="50%" cy="50%" r="62%">
            <stop offset="0"    stop-color="white" stop-opacity="0"></stop>
            <stop offset="0.45" stop-color="white" stop-opacity="0"></stop>
            <stop offset="0.75" stop-color="white" stop-opacity="0.6"></stop>
            <stop offset="1"    stop-color="white" stop-opacity="1"></stop>
          </radialGradient>
          <mask id="oferta-mask-edges"><rect width="100%" height="100%" fill="url(#oferta-center-clear)"></rect></mask>

          <!-- Halftone verde (arriba-derecha) -->
          <pattern id="oferta-halftone-green" width="15" height="15" patternUnits="userSpaceOnUse">
            <circle cx="7.5" cy="7.5" r="2.4" fill="#a3e635"></circle>
          </pattern>
          <radialGradient id="oferta-fade-green" cx="100%" cy="0%" r="60%">
            <stop offset="0" stop-color="white" stop-opacity="1"></stop>
            <stop offset="1" stop-color="white" stop-opacity="0"></stop>
          </radialGradient>
          <mask id="oferta-mask-green"><rect width="100%" height="100%" fill="url(#oferta-fade-green)"></rect></mask>

          <!-- Halftone azul (abajo-izquierda) -->
          <pattern id="oferta-halftone-blue" width="15" height="15" patternUnits="userSpaceOnUse">
            <circle cx="7.5" cy="7.5" r="2.4" fill="#2563eb"></circle>
          </pattern>
          <radialGradient id="oferta-fade-blue" cx="0%" cy="100%" r="55%">
            <stop offset="0"   stop-color="white" stop-opacity="1"></stop>
            <stop offset="0.5" stop-color="white" stop-opacity="0.45"></stop>
            <stop offset="1"   stop-color="white" stop-opacity="0"></stop>
          </radialGradient>
          <mask id="oferta-mask-blue"><rect width="100%" height="100%" fill="url(#oferta-fade-blue)"></rect></mask>
        </defs>

        <!-- Capa base: puntos solo hacia los bordes (centro despejado) -->
        <rect width="100%" height="100%" fill="url(#oferta-dots-base)" mask="url(#oferta-mask-edges)" opacity="0.6"></rect>
        <!-- Cruz, también despejada en el centro -->
        <rect width="100%" height="100%" fill="url(#cross-oferta)" mask="url(#oferta-mask-edges)" opacity="0.18"></rect>
        <!-- Halftones de color en esquinas opuestas -->
        <rect width="100%" height="100%" fill="url(#oferta-halftone-green)" mask="url(#oferta-mask-green)" opacity="0.22"></rect>
        <rect width="100%" height="100%" fill="url(#oferta-halftone-blue)" mask="url(#oferta-mask-blue)" opacity="0.18"></rect>
      </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
      <div class="text-center max-w-3xl mx-auto mb-16">
        <h2 class="text-base font-semibold tracking-widest text-up-green uppercase mb-1">
          Descubre tu camino
        </h2>
        <h3 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 mb-6">
          Oferta Académica
        </h3>
        <p class="text-[18px] leading-[22px] lg:text-xl text-slate-800 font-light lg:leading-relaxed">
          Descubre la oferta académica del Instituto Universitario de la
          Región Sur de Puebla en Atlixco, con licenciaturas y maestrías con
          RVOE enfocadas a empleabilidad, innovación y desarrollo profesional.
        </p>
      </div>

      <!-- SLIDER -->
      <div class="blaze-slider oferta-slider"
           data-slides-desktop="4" data-slides-tablet="2" data-slides-mobile="1"
           data-autoplay="true" data-autoplay-interval="5000">
        <div class="blaze-container">
          <div class="blaze-track-container">
            <div class="blaze-track">

              <!-- Card 1 · Ciencias Forenses -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-up-green/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Ciencias Forenses" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-up-green text-black text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-up-green transition-colors">Ciencias Forenses</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Formación integral en investigación científica y legal.</p>
                  <div class="mt-6 flex items-center text-base text-[#171269] font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 2 · Derecho -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-[#171269]/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Derecho" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-[#171269] text-white text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-[#171269] transition-colors">Derecho</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Defensa de la justicia y aplicación de marcos normativos.</p>
                  <div class="mt-6 flex items-center text-base text-up-green font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 3 · Administración de Empresas -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-up-green/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://hoirqrkdgbmvpwutwuwj.supabase.co/storage/v1/object/public/assets/assets/917d6f93-fb36-439a-8c48-884b67b35381_1600w.jpg" alt="Administración de Empresas" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-up-green text-black text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-up-green transition-colors">Administración de Empresas</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Liderazgo y gestión estratégica para organizaciones.</p>
                  <div class="mt-6 flex items-center text-base text-[#171269] font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 4 · Intervención Pedagógica · Maestría -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-[#171269]/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Intervención Pedagógica" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-[#171269] text-white text-xs font-medium rounded uppercase tracking-wider">Maestría</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-[#171269] transition-colors">Intervención Pedagógica</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Especialización en desarrollo de estrategias educativas.</p>
                  <div class="mt-6 flex items-center text-base text-up-green font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 5 · Criminología -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-up-green/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Criminología" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-up-green text-black text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-up-green transition-colors">Criminología</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Prevención, análisis del delito y seguridad ciudadana.</p>
                  <div class="mt-6 flex items-center text-base text-[#171269] font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 6 · Psicología -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-[#171269]/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Psicología" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-[#171269] text-white text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-[#171269] transition-colors">Psicología</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Comprensión del comportamiento y bienestar humano.</p>
                  <div class="mt-6 flex items-center text-base text-up-green font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 7 · Enfermería -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-up-green/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&amp;fit=crop&amp;q=80&amp;w=800" alt="Enfermería" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-up-green text-black text-xs font-medium rounded uppercase tracking-wider">Licenciatura</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-up-green transition-colors">Enfermería</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Cuidado integral de la salud con vocación de servicio.</p>
                  <div class="mt-6 flex items-center text-base text-[#171269] font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

              <!-- Card 8 · Educación · Maestría -->
              <div class="group relative rounded-xl overflow-hidden bg-white border border-gray-200 hover:border-[#171269]/50 transition-colors shadow-sm hover:shadow-md">
                <div class="aspect-[4/3] w-full relative overflow-hidden bg-gray-100">
                  <img src="https://hoirqrkdgbmvpwutwuwj.supabase.co/storage/v1/object/public/assets/assets/917d6f93-fb36-439a-8c48-884b67b35381_1600w.jpg" alt="Maestría en Educación" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                  <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1.5 bg-[#171269] text-white text-xs font-medium rounded uppercase tracking-wider">Maestría</span>
                  </div>
                </div>
                <div class="p-6">
                  <h4 class="text-xl font-medium tracking-tight text-[#050b14] mb-2 group-hover:text-[#171269] transition-colors">Educación</h4>
                  <p class="text-lg text-gray-500 font-light line-clamp-2">Innovación docente y liderazgo en sistemas educativos.</p>
                  <div class="mt-6 flex items-center text-base text-up-green font-medium">
                    Ver detalles <i data-lucide="arrow-right" class="w-4 h-4 ml-2" stroke-width="1.5"></i>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Controles: un solo par de flechas + paginación.
               Desktop: las flechas quedan superpuestas a los lados (CSS .oferta-arrow).
               Móvil/tablet: el CSS de la cabecera las pone inline, junto a los bullets. -->
          <div class="oferta-controls flex items-center justify-center gap-4 mt-5">
            <button class="blaze-prev oferta-arrow oferta-arrow--prev" aria-label="Anterior">
              <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="2"></i>
            </button>
            <div class="blaze-pagination"></div>
            <button class="blaze-next oferta-arrow oferta-arrow--next" aria-label="Siguiente">
              <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="2"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- UNAM Incorporation Banner -->
      <div class="mt-8 bg-[#00103e] rounded-2xl border border-white/10 relative overflow-hidden shadow-xl">
        <!-- Glow decorativo -->
        <div class="absolute top-0 right-0 w-80 h-80 bg-[#171269]/40 rounded-full blur-[80px] pointer-events-none z-0"></div>

        <div class="flex flex-col md:flex-row items-stretch">

          <!-- Columna de texto (en móvil va debajo de la imagen) -->
          <div class="relative z-10 w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center order-2 md:order-1">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/unam-incorporacion.svg' ) ); ?>" class="h-20 md:h-24 max-w-fit w-auto shrink-0 mb-1" alt="Sí somos UNAM">

            <div class="flex items-center gap-5 mb-4">
              <h3 class="text-3xl md:text-5xl font-semibold tracking-tight text-white">Incorporada a la UNAM</h3>
            </div>

            <p class="text-gray-200 text-lg font-light mb-2 lg:mb-5">Acuerdo CIREYTG (8553-43). 12/26 del 23/03/26.</p>

            <p class="text-2xl font-medium text-white tracking-tight mb-6">Licenciatura en Pedagogía</p>

            <a href="#" class="inline-flex items-center gap-2 w-fit px-5 py-2.5 rounded-lg bg-up-green text-black font-medium hover:bg-[#47a23e] transition-colors">
              Conoce la carrera <i data-lucide="arrow-right" class="w-4 h-4" stroke-width="1.5"></i>
            </a>
          </div>

          <!-- Columna de imagen (en móvil va primero y más alta) -->
          <div class="relative w-full md:w-1/2 h-80 sm:h-96 md:h-auto md:min-h-[360px] overflow-hidden order-1 md:order-2">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/carreras/pedagogia-pg-home.webp' ) ); ?>"
                 class="absolute inset-0 w-full h-full object-cover object-[center_50%] scale-105 transition-transform duration-700 hover:scale-110"
                 alt="Licenciatura en Pedagogía" />
            <!-- Degradado para fundir la imagen con el panel (izquierda en desktop) -->
            <div class="hidden md:block absolute inset-y-0 left-0 w-32 bg-gradient-to-r from-[#00103e] to-transparent pointer-events-none"></div>
            <!-- Degradado inferior en móvil (la imagen va arriba, funde hacia el texto) -->
            <div class="md:hidden absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#00103e] to-transparent pointer-events-none"></div>
          </div>

        </div>
      </div>
    </div>

    <!-- Stats Banner (sin cambios) -->
    <div class="py-14 mt-0 relative overflow-hidden">
      <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMCwwLDAsMC4wNSkiLz48L3N2Zz4=')] opacity-50"></div>
      <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-slate-900 mb-4">
          <span class="text-up-green">+10 años</span> formando profesionales
        </h2>
        <p class="text-[18px] leading-[22px] lg:leading-relaxed lg:text-xl text-slate-800 font-light">
          No solo fomentamos el crecimiento profesional, sino también personal
          en nuestros alumnos. Vive la experiencia IUP que transforma a México.
        </p>
      </div>
    </div>

    <script>
  (function () {
    function initOferta() {
      if (typeof BlazeSlider === "undefined") return;
      var el = document.querySelector(".oferta-slider");
      if (!el || el.dataset.blazeInit === "1") return;   // evita doble init si el global también corre
      el.dataset.blazeInit = "1";

      new BlazeSlider(el, {
        all: {
          slidesToShow: 1,
          slidesToScroll: 1,
          slideGap: "1.5rem",
          loop: true,
          enableAutoplay: true,
          autoplayInterval: 5000,
          stopAutoplayOnInteraction: true,
          transitionDuration: 400,
        },
        "(min-width: 768px)":  { slidesToShow: 2 },
        "(min-width: 1024px)": { slidesToShow: 4 },
      });

      if (typeof lucide !== "undefined") lucide.createIcons();
    }

    if (document.readyState !== "loading") initOferta();
    else document.addEventListener("DOMContentLoaded", initOferta);
  })();
</script>
</section>

<!-- Mission, Vision, Values -->
<section class="py-12 lg:py-24 bg-up-blue-dark relative overflow-hidden">

  <style>
    /* ====== Misión/Visión/Valores · slider solo en móvil ====== */

    /* DESKTOP (≥1024px): neutralizamos el slider y dejamos el timeline vertical.
       Los !important ganan sobre los estilos inline que BlazeSlider pudiera dejar. */
    @media (min-width: 1024px) {
      .mvv-slider .blaze-track-container { overflow: visible; }
      .mvv-slider .blaze-track {
        flex-direction: column;
        gap: 3rem;                 /* equivale a space-y-12 */
        transform: none !important;
        width: 100% !important;
      }
      .mvv-slider .blaze-track > * { width: 100% !important; }
    }

    /* Paginación (solo visible en móvil por la clase lg:hidden del markup) */
    .mvv-slider .blaze-pagination { display: flex; gap: 0.5rem; }
    .mvv-slider .blaze-pagination button {
      width: 0.5rem; height: 0.5rem; padding: 0;
      border: 0; border-radius: 9999px; cursor: pointer;
      font-size: 0; line-height: 0; color: transparent; /* oculta el número del botón */
      background: rgba(255,255,255,0.25);
      transition: width 0.3s ease, background 0.3s ease;
    }
    .mvv-slider .blaze-pagination button.active {
      width: 1.5rem;
      background: #a3e635; /* up-green */
    }
  </style>

  <!-- Fondo decorativo (cuadrícula) -->
  <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="grid-mission" width="60" height="60" patternUnits="userSpaceOnUse">
          <path d="M 60 0 L 0 0 0 60" fill="none" stroke="rgba(59,130,246,1)" stroke-width="1"></path>
        </pattern>
      </defs>
      <rect width="100%" height="100%" fill="url(#grid-mission)"></rect>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="grid lg:grid-cols-2 gap-8 lg:gap-16 items-center">

      <!-- Lado de texto: timeline en desktop / slider en móvil -->
      <div class="order-2 lg:order-1">
        <div class="blaze-slider mvv-slider">
          <div class="blaze-container">
            <div class="blaze-track-container">
              <div class="blaze-track">

                <!-- Visión -->
                <div class="relative lg:pl-8 lg:border-l-2 lg:border-slate-800 lg:hover:border-up-green transition-colors duration-300">
                  <div class="hidden lg:block absolute left-[-9px] top-1 w-4 h-4 rounded-full bg-slate-950 border-2 border-up-green"></div>
                  <div class="lg:hidden h-1 w-12 rounded-full bg-up-green mb-5"></div>
                  <h3 class="text-2xl font-semibold text-white tracking-tight mb-3 flex items-center gap-2">
                    <i data-lucide="eye" class="w-6 h-6 text-up-green" stroke-width="1.5"></i>
                    Visión
                  </h3>
                  <p class="text-lg text-slate-300 font-light">
                    Reconocimiento estatal y nacional por su formación integral
                    basada en excelencia académica, procesos de enseñanza y
                    aprendizaje de vanguardia. Docentes y estudiantes competentes y
                    éticos. Diversidad y actualidad en sus programas académicos.
                    Reconocidos por su estrecha vinculación con el sector público y
                    privado, así como con la sociedad en general.
                  </p>
                </div>

                <!-- Misión -->
                <div class="relative lg:pl-8 lg:border-l-2 lg:border-slate-800 lg:hover:border-blue-500 transition-colors duration-300">
                  <div class="hidden lg:block absolute left-[-9px] top-1/2 w-4 h-4 rounded-full bg-slate-950 border-2 border-blue-500"></div>
                  <div class="lg:hidden h-1 w-12 rounded-full bg-blue-500 mb-5"></div>
                  <h3 class="text-2xl font-semibold text-white tracking-tight mb-3 flex items-center gap-2">
                    <i data-lucide="target" class="w-6 h-6 text-blue-400" stroke-width="1.5"></i>
                    Misión
                  </h3>
                  <p class="text-lg text-slate-300 font-light">
                    Formar profesionales íntegros mediante la implementación de
                    modelos educativos de vanguardia con alto valor humano,
                    consciencia social y compromiso con su comunidad, país y medio
                    ambiente; capaces de ser agentes de cambio, líderes
                    caracterizados por su excelencia académica, manejo de nuevas
                    tecnologías de información y comunicación.
                  </p>
                </div>

                <!-- Valores -->
                <div class="relative lg:pl-8 lg:border-l-2 lg:border-slate-800 lg:hover:border-up-green transition-colors duration-300">
                  <div class="hidden lg:block absolute left-[-9px] bottom-1 w-4 h-4 rounded-full bg-slate-950 border-2 border-up-green"></div>
                  <div class="lg:hidden h-1 w-12 rounded-full bg-up-green mb-5"></div>
                  <h3 class="text-2xl font-semibold text-white tracking-tight mb-3 flex items-center gap-2">
                    <i data-lucide="heart" class="w-6 h-6 text-up-green" stroke-width="1.5"></i>
                    Valores
                  </h3>
                  <p class="text-lg text-slate-300 font-light">
                    Autenticidad, Honestidad, Solidaridad, Lealtad, Superación,
                    Perseverancia, Equidad e Integridad.
                  </p>
                </div>

              </div>
            </div>

            <!-- Controles (solo móvil/tablet) -->
            <div class="lg:hidden flex items-center justify-center gap-4 mt-10">
              <button class="blaze-prev w-10 h-10 rounded-full border border-white/15 text-white flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="Anterior">
                <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="2"></i>
              </button>
              <div class="blaze-pagination"></div>
              <button class="blaze-next w-10 h-10 rounded-full border border-white/15 text-white flex items-center justify-center hover:bg-white/10 transition-colors" aria-label="Siguiente">
                <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="2"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Lado de imagen: ahora siempre visible -->
      <div class="relative order-1 lg:order-2">
        <!-- Glow decorativo: el rotate/scale solo en desktop para no salirse en móvil -->
        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/20 to-lime-500/20 rounded-3xl blur-2xl lg:rotate-3 lg:scale-105"></div>
        <div class="relative rounded-3xl overflow-hidden border border-slate-700 bg-slate-800">
          <img
            src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/psicologia-pg-2.webp' ) ); ?>"
            alt="Estudiantes en aula"
            class="w-full h-72 sm:h-96 lg:h-[600px] object-cover max-w-full transition-all duration-700"
          />
        </div>
      </div>

    </div>
  </div>

  <script>
    /* Inicializa el slider SOLO en móvil/tablet (<1024px) y lo destruye en desktop,
       de modo que en pantallas grandes se conserva el timeline vertical original.
       Es independiente del init global; ver nota para evitar doble inicialización. */
    (function () {
      function initMVV() {
        if (typeof BlazeSlider === "undefined") return;
        var el = document.querySelector(".mvv-slider");
        if (!el) return;

        var instance = null;
        var mq = window.matchMedia("(max-width: 1023px)");

        function sync() {
          if (mq.matches && !instance) {
            instance = new BlazeSlider(el, {
              all: {
                slidesToShow: 1,
                slidesToScroll: 1,
                slideGap: "1rem",
                loop: true,
                enableAutoplay: false,
                transitionDuration: 400,
              },
            });
            if (typeof lucide !== "undefined") lucide.createIcons();
          } else if (!mq.matches && instance) {
            instance.destroy();
            instance = null;
          }
        }

        sync();
        if (mq.addEventListener) mq.addEventListener("change", sync);
        else mq.addListener(sync);
      }

      if (document.readyState !== "loading") initMVV();
      else document.addEventListener("DOMContentLoaded", initMVV);
    })();
  </script>
</section>

  <!-- Bottom CTA -->
<section class="py-6 md:py-12 bg-up-green relative overflow-hidden">
    <div
      class="absolute inset-0 z-0 opacity-10 pointer-events-none mix-blend-multiply relative z-10"
    >
      <svg
        class="absolute inset-0 w-full h-full"
        xmlns="http://www.w3.org/2000/svg"
      >
        <defs>
          <pattern
            id="dots-cta"
            width="16"
            height="16"
            patternUnits="userSpaceOnUse"
          >
            <circle cx="2" cy="2" r="1.5" fill="#020617"></circle>
          </pattern>
        </defs>
        <rect width="100%" height="100%" fill="url(#dots-cta)"></rect>
      </svg>
    </div>
    <div
      class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-6"
    >
      <div class="text-slate-950">
        <h3 class="text-2xl font-semibold tracking-tight">
          Inicia tu registro escolar
        </h3>
        <p class="text-base font-medium opacity-80">
          Asegura tu lugar para el próximo ciclo.
        </p>
      </div>
      <a
        href="#contacto"
        class="whitespace-nowrap px-8 py-4 bg-slate-950 hover:bg-slate-800 text-white text-lg font-medium rounded-full transition-colors flex items-center gap-2"
      >
        Registrarse ahora
        <i data-lucide="arrow-right" class="w-5 h-5" stroke-width="1.5"></i>
      </a>
    </div>
</section>


<?php get_footer(); ?>