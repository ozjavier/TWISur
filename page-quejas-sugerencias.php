<?php get_header(); ?>

<section class="bg-up-blue-dark text-white pt-40 pb-14 px-6 relative overflow-hidden">
  <!-- Patrón de puntos sutil -->
  <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
  <!-- Gradiente decorativo -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute -top-[25%] -right-[10%] w-[50%] h-[50%] rounded-full bg-up-blue blur-[120px] opacity-60"></div>
      <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-up-green blur-[150px] opacity-20"></div>
  </div>


        <div class="relative max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold text-white tracking-tight mb-4 lg:mb-8 max-w-4xl mx-auto leading-tight">
                Ayúdanos a crear la mejor <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/90 to-up-green">experiencia universitaria</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 max-w-2xl pb-4 mx-auto font-normal leading-relaxed">
                En IUP Sur, creemos en la mejora continua. Tus comentarios, quejas y sugerencias son la herramienta más valiosa para perfeccionar nuestras instalaciones, programas y servicios.
            </p>
        </div>
</section>

<!-- Beneficios / Valor SEO -->
<section class="py-14 bg-white border-y border-slate-100 relative overflow-hidden">

  <style>
    /* --- Slider Beneficios (solo móvil) --- */
    .benef-slider .blaze-track-container { overflow: hidden; }

    /* Desktop (>=768): grid de 3 columnas (el slider se destruye por JS) */
    @media (min-width: 768px) {
      .benef-slider .blaze-track-container { overflow: visible !important; }
      .benef-slider .blaze-track {
        display: grid !important;
        grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
        gap: 3rem !important;
        transform: none !important;
        width: 100% !important;
      }
      .benef-slider .blaze-track > * { width: auto !important; margin: 0 !important; }
    }

    /* Paginación */
    .benef-pagination { display: flex; align-items: center; gap: 8px; }
    .benef-pagination button {
      width: 8px; height: 8px; border-radius: 9999px;
      background: #cbd5e1; padding: 0; border: 0; cursor: pointer;
      transition: all .3s ease;
      font-size: 0; /* <-- SOLUCIÓN: Oculta el texto numérico del botón */
    }
    .benef-pagination button.active { background: #52b848; width: 24px; }

    /* Flechas */
    .benef-arrow {
      width: 40px; height: 40px; border-radius: 9999px;
      border: 1px solid #e2e8f0; background: #fff; color: #000000;
      display: flex; align-items: center; justify-content: center;
      transition: all .2s ease; flex-shrink: 0;
    }
    .benef-arrow:hover { background: #52b848; border-color: #52b848; color: #000; }
  </style>

  <!-- Fondo decorativo: glows + cruz índigo + halftone verde (patrón del sitio) -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-28 -left-24 w-96 h-96 bg-[#171269]/8 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-28 -right-24 w-[26rem] h-[26rem] bg-up-green/10 rounded-full blur-3xl"></div>
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="benef-cross" width="60" height="60" patternUnits="userSpaceOnUse">
          <path d="M 30 25 L 30 35 M 25 30 L 35 30" fill="none" stroke="rgba(23,18,105,1)" stroke-width="1.5"></path>
        </pattern>
        <pattern id="benef-dots" width="22" height="22" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1.4" fill="rgba(163,230,53,1)"></circle>
        </pattern>
        <radialGradient id="benef-fade-tl" cx="0%" cy="0%" r="55%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="benef-mask-tl"><rect width="100%" height="100%" fill="url(#benef-fade-tl)"></rect></mask>
        <radialGradient id="benef-fade-br" cx="100%" cy="100%" r="50%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="benef-mask-br"><rect width="100%" height="100%" fill="url(#benef-fade-br)"></rect></mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#benef-cross)" mask="url(#benef-mask-tl)" opacity="0.10"></rect>
      <rect width="100%" height="100%" fill="url(#benef-dots)" mask="url(#benef-mask-br)" opacity="0.18"></rect>
    </svg>
  </div>

  <div class="max-w-6xl mx-auto px-6 relative z-10">

    <div class="blaze-slider benef-slider"
          data-slides-desktop="3"
          data-slides-tablet="3"
          data-slides-mobile="1">
      <div class="blaze-container">
        <div class="blaze-track-container">
          <div class="blaze-track">

            <!-- Beneficio 1 -->
            <div class="flex flex-col items-start">
              <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center mb-6 text-slate-700">
                <i data-lucide="shield-check" class="w-6 h-6" stroke-width="1.5"></i>
              </div>
              <h3 class="text-xl font-medium tracking-tight text-up-blue-dark mb-3">
                Total confidencialidad
              </h3>
              <p class="text-base text-slate-600 font-normal">
                Toda la información que nos compartas es tratada con estricta
                privacidad. Puedes optar por enviar tus comentarios de forma
                totalmente anónima.
              </p>
            </div>

            <!-- Beneficio 2 -->
            <div class="flex flex-col items-start">
              <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center mb-6 text-slate-700">
                <i data-lucide="zap" class="w-6 h-6" stroke-width="1.5"></i>
              </div>
              <h3 class="text-xl font-medium tracking-tight text-up-blue-dark mb-3">
                Acción inmediata
              </h3>
              <p class="text-base text-slate-600 font-normal">
                Nuestro equipo directivo revisa cada caso de manera individual
                para implementar soluciones reales y tangibles en el menor tiempo
                posible.
              </p>
            </div>

            <!-- Beneficio 3 -->
            <div class="flex flex-col items-start">
              <div class="w-12 h-12 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center mb-6 text-slate-700">
                <i data-lucide="users" class="w-6 h-6" stroke-width="1.5"></i>
              </div>
              <h3 class="text-xl font-medium tracking-tight text-up-blue-dark mb-3">
                Impacto comunitario
              </h3>
              <p class="text-base text-slate-600 font-normal">
                Tu reporte no solo resuelve un problemka individual, sino que ayuda
                a prevenir situaciones similares y mejora el entorno para todos.
              </p>
            </div>

          </div>
        </div>

        <!-- Controles (solo móvil) -->
        <div class="benef-controls flex md:hidden items-center justify-center gap-4 mt-10">
          <button type="button" class="blaze-prev benef-arrow" aria-label="Anterior">
            <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="1.5"></i>
          </button>
          <div class="blaze-pagination benef-pagination"></div>
          <button type="button" class="blaze-next benef-arrow" aria-label="Siguiente">
            <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="1.5"></i>
          </button>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- Sección Principal Oscura con Formulario -->
 <section class="py-16 bg-up-blue-dark text-slate-50 relative overflow-hidden">
  <!-- Glows decorativos -->
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none opacity-20">
    <div class="absolute -top-[20%] -left-[10%] w-[50%] h-[50%] rounded-full bg-up-blue blur-[120px]"></div>
    <div class="absolute top-[60%] -right-[10%] w-[40%] h-[40%] rounded-full bg-up-green/30 blur-[100px]"></div>
  </div>

  <!-- Fondo decorativo: cruz verde + halftone blanco difuminado (patrón del sitio) -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="form-cross" width="60" height="60" patternUnits="userSpaceOnUse">
          <path d="M 30 25 L 30 35 M 25 30 L 35 30" fill="none" stroke="rgba(163,230,53,1)" stroke-width="1.5"></path>
        </pattern>
        <pattern id="form-dots" width="16" height="16" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1.4" fill="rgba(255,255,255,1)"></circle>
        </pattern>
        <radialGradient id="form-fade-br" cx="100%" cy="100%" r="60%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="form-mask-br"><rect width="100%" height="100%" fill="url(#form-fade-br)"></rect></mask>
        <radialGradient id="form-fade-tl" cx="0%" cy="0%" r="50%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="form-mask-tl"><rect width="100%" height="100%" fill="url(#form-fade-tl)"></rect></mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#form-cross)" mask="url(#form-mask-br)" opacity="0.14"></rect>
      <rect width="100%" height="100%" fill="url(#form-dots)" mask="url(#form-mask-tl)" opacity="0.06"></rect>
    </svg>
  </div>

  <div class="max-w-6xl mx-auto px-6 relative z-10">
    <!-- SOLUCIÓN: Cambiado a flex-col-reverse para móvil y restaurado a grid en lg -->
    <div class="flex flex-col-reverse lg:grid lg:grid-cols-2 gap-16 items-center">
      
      <!-- Columna Izquierda: Texto de compromiso (abajo en móvil) -->
      <div class="space-y-8 w-full">
        <h2 class="text-3xl md:text-4xl font-medium tracking-tight text-white leading-tight">
          Nuestro compromiso con la excelencia educativa
        </h2>

        <div class="space-y-6">
          <div class="flex gap-4 items-start">
            <i data-lucide="target" class="w-6 h-6 text-up-green shrink-0 mt-1" stroke-width="1.5"></i>
            <div>
              <h4 class="text-lg font-medium text-white mb-2 tracking-tight">
                Atención personalizada
              </h4>
              <p class="text-base text-slate-400 font-normal">
                Cada sugerencia es clasificada y dirigida al departamento correspondiente para asegurar una atención experta y oportuna.
              </p>
            </div>
          </div>

          <div class="flex gap-4 items-start">
            <i data-lucide="line-chart" class="w-6 h-6 text-up-green shrink-0 mt-1" stroke-width="1.5"></i>
            <div>
              <h4 class="text-lg font-medium text-white mb-2 tracking-tight">
                Seguimiento de procesos
              </h4>
              <p class="text-base text-slate-400 font-normal">
                Mantenemos un registro detallado de las incidencias para identificar áreas de oportunidad recurrentes e implementar mejoras estructurales.
              </p>
            </div>
          </div>
        </div>

        <!-- Testimonial / Cita -->
        <div class="p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm mt-8">
          <p class="text-base text-slate-300 italic mb-4 font-normal">
            "Gracias a los reportes de nuestros alumnos durante el último ciclo, logramos reestructurar nuestros servicios de biblioteca y modernizar los equipos de cómputo."
          </p>
          <div class="flex items-center gap-3">
            <div>
              <div class="text-base font-medium text-white">
                Dirección Académica
              </div>
              <div class="text-sm text-slate-500">IUP Sur</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Columna Derecha: El Formulario (arriba en móvil) -->
      <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl relative w-full">
        <div class="absolute -top-3 -right-3 w-24 h-24 bg-up-green/30 rounded-full blur-2xl"></div>

        <h3 class="text-2xl font-medium tracking-tight text-up-blue-dark mb-2">
          Ingresa tu reporte
        </h3>
        <p class="text-base text-slate-500 mb-8 font-normal">
          Los campos marcados con un asterisco (*) son opcionales si deseas mantener el anonimato.
        </p>

        <form action="#" method="POST" class="space-y-6">
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label for="name" class="block text-base font-medium text-slate-700">
                Nombre completo
              </label>
              <input type="text" id="name" name="name" placeholder="Ej. Juan Pérez" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-up-text focus:ring-up-blue" />
            </div>

            <div class="space-y-2">
              <label for="phone" class="block text-base font-medium text-slate-700">
                Teléfono <span class="text-slate-400 font-normal">*</span>
              </label>
              <input type="tel" id="phone" name="phone" placeholder="10 dígitos" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-up-text focus:ring-up-blue" />
            </div>
          </div>

          <div class="space-y-2">
            <label for="email" class="block text-base font-medium text-slate-700">
              Correo electrónico <span class="text-slate-400 font-normal">*</span>
            </label>
            <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-up-text focus:ring-up-blue" />
          </div>

          <div class="space-y-2">
            <label for="type" class="block text-base font-medium text-slate-700">
              Tipo de reporte
            </label>
            <div class="relative">
              <select id="type" name="type" class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base focus:outline-none focus:ring-2 focus:border-transparent transition-all cursor-pointer text-up-text focus:ring-up-blue">
                <option value="" disabled="" selected="">Selecciona una opción...</option>
                <option value="queja">Queja (inconformidad con un servicio o persona)</option>
                <option value="sugerencia">Sugerencia (propuesta de mejora)</option>
                <option value="comentario">Comentario general</option>
                <option value="reconocimiento">Reconocimiento (felicitación)</option>
              </select>
              <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                <i data-lucide="chevron-down" class="w-5 h-5" stroke-width="1.5"></i>
              </div>
            </div>
          </div>

          <div class="space-y-2">
            <label for="message" class="block text-base font-medium text-slate-700">
              Mensaje detallado
            </label>
            <textarea id="message" name="message" rows="4" placeholder="Describe la situación con el mayor detalle posible. Incluye fechas, áreas o personas involucradas si aplica..." class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all resize-y text-up-text focus:ring-up-blue"></textarea>
          </div>

          <!-- Checkbox Custom -->
          <div class="pt-2">
            <label class="flex items-start gap-3 cursor-pointer group">
              <div class="relative flex items-center justify-center w-5 h-5 mt-0.5 shrink-0">
                <input type="checkbox" class="peer absolute w-full h-full opacity-0 cursor-pointer" required="" />
                <div class="absolute inset-0 border border-slate-300 rounded group-hover:border-slate-400 peer-focus-visible:ring-2 peer-focus-visible:ring-up-blue peer-focus-visible:ring-offset-2 transition-all"></div>
                <div class="absolute inset-0 bg-up-blue rounded opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                <i data-lucide="check" class="w-3.5 h-3.5 text-white opacity-0 peer-checked:opacity-100 transition-opacity z-10" stroke-width="1.5"></i>
              </div>
              <span class="text-sm text-slate-600 leading-tight font-normal">
                He leído y acepto el <a href="#" class="text-up-blue underline underline-offset-2 decoration-slate-300 hover:decoration-up-blue transition-colors">aviso de privacidad</a> en relación al tratamiento de mis datos personales.
              </span>
            </label>
          </div>

          <button type="submit" class="w-full bg-up-blue text-white rounded-xl px-6 py-4 text-base font-medium hover:bg-up-blue-dark focus:outline-none focus:ring-2 focus:ring-up-blue focus:ring-offset-2 transition-all flex justify-center items-center gap-2">
            Enviar reporte de forma segura
            <i data-lucide="arrow-right" class="w-5 h-5" stroke-width="1.5"></i>
          </button>
        </form>
      </div>

    </div>
  </div>
</section>   

<!-- FAQ Section (SEO / Confianza) -->
<section class="py-12 bg-white relative overflow-hidden">
  <style>
    /* Acordeón colapsable (animación suave sin saber la altura) */
    .faq-panel { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .3s ease; }
    .faq-panel.open { grid-template-rows: 1fr; }
    .faq-panel-inner { overflow: hidden; }
    .faq-chevron { transition: transform .3s ease; }
    .faq-toggle[aria-expanded="true"] .faq-chevron { transform: rotate(180deg); }
    .faq-toggle[aria-expanded="true"] .faq-icon {
      background-color: #171269; border-color: #171269; color: #fff;
    }
  </style>

  <!-- Fondo decorativo: glows + cruz índigo + halftone verde (patrón del sitio) -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#171269]/8 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-24 -left-24 w-[26rem] h-[26rem] bg-up-green/10 rounded-full blur-3xl"></div>
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="faqdeco-cross" width="60" height="60" patternUnits="userSpaceOnUse">
          <path d="M 30 25 L 30 35 M 25 30 L 35 30" fill="none" stroke="rgba(23,18,105,1)" stroke-width="1.5"></path>
        </pattern>
        <pattern id="faqdeco-dots" width="22" height="22" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1.4" fill="rgba(163,230,53,1)"></circle>
        </pattern>
        <radialGradient id="faqdeco-fade-tr" cx="100%" cy="0%" r="55%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="faqdeco-mask-tr"><rect width="100%" height="100%" fill="url(#faqdeco-fade-tr)"></rect></mask>
        <radialGradient id="faqdeco-fade-bl" cx="0%" cy="100%" r="50%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="faqdeco-mask-bl"><rect width="100%" height="100%" fill="url(#faqdeco-fade-bl)"></rect></mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#faqdeco-cross)" mask="url(#faqdeco-mask-tr)" opacity="0.10"></rect>
      <rect width="100%" height="100%" fill="url(#faqdeco-dots)" mask="url(#faqdeco-mask-bl)" opacity="0.18"></rect>
    </svg>
  </div>

  <div class="max-w-3xl mx-auto px-6 relative z-10">
    <div class="text-center mb-12">
      <h2 class="text-2xl md:text-3xl font-medium tracking-tight text-up-blue-dark mb-4">
        Preguntas Frecuentes
      </h2>
      <p class="text-base text-slate-600 font-normal">
        Resolvemos tus dudas sobre el proceso de retroalimentación.
      </p>
    </div>

    <div class="space-y-4">

      <!-- FAQ Item 1 -->
      <div class="border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors">
        <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between gap-3 p-6 text-left font-medium text-[#050b14]" aria-expanded="true">
          <span class="text-lg">¿Mi reporte es realmente anónimo?</span>
          <span class="faq-icon shrink-0 bg-white p-1.5 rounded-full border border-gray-200 text-[#050b14] transition-colors">
            <i data-lucide="chevron-down" stroke-width="1.5" class="faq-chevron w-5 h-5 block"></i>
          </span>
        </button>
        <div class="faq-panel open">
          <div class="faq-panel-inner">
            <div class="px-6 pb-6 text-slate-600 text-base leading-relaxed">
              <p>Sí. Si decides no proporcionar tu nombre, teléfono o correo, el sistema registrará tu mensaje sin ningún dato que te identifique. Valoramos la honestidad por encima de todo.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div class="border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors">
        <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between gap-3 p-6 text-left font-medium text-[#050b14]" aria-expanded="false">
          <span class="text-lg">¿Cuánto tiempo tardan en dar respuesta?</span>
          <span class="faq-icon shrink-0 bg-white p-1.5 rounded-full border border-gray-200 text-[#050b14] transition-colors">
            <i data-lucide="chevron-down" stroke-width="1.5" class="faq-chevron w-5 h-5 block"></i>
          </span>
        </button>
        <div class="faq-panel">
          <div class="faq-panel-inner">
            <div class="px-6 pb-6 text-slate-600 text-base leading-relaxed">
              <p>El tiempo de resolución varía según la complejidad del caso. Sin embargo, todos los reportes son leídos y clasificados en un plazo máximo de 48 horas hábiles. Si dejaste tus datos de contacto, recibirás actualizaciones.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors">
        <button type="button" class="faq-toggle flex w-full cursor-pointer items-center justify-between gap-3 p-6 text-left font-medium text-[#050b14]" aria-expanded="false">
          <span class="text-lg">¿Qué pasa si mi queja es sobre un profesor o directivo?</span>
          <span class="faq-icon shrink-0 bg-white p-1.5 rounded-full border border-gray-200 text-[#050b14] transition-colors">
            <i data-lucide="chevron-down" stroke-width="1.5" class="faq-chevron w-5 h-5 block"></i>
          </span>
        </button>
        <div class="faq-panel">
          <div class="faq-panel-inner">
            <div class="px-6 pb-6 text-slate-600 text-base leading-relaxed">
              <p>Contamos con un comité de ética que evalúa estas situaciones de manera objetiva e imparcial. Se garantiza la protección del alumno frente a posibles represalias.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script>
    (function () {
      var toggles = document.querySelectorAll('.faq-toggle');
      toggles.forEach(function (btn) {
        btn.addEventListener('click', function () {
          var expanded = btn.getAttribute('aria-expanded') === 'true';
          btn.setAttribute('aria-expanded', String(!expanded));
          var panel = btn.nextElementSibling;
          if (panel && panel.classList.contains('faq-panel')) {
            panel.classList.toggle('open', !expanded);
          }
        });
      });
    })();
  </script>
</section>

<!-- Footer CTA (Verde vibrante) -->
<section class="py-12 bg-up-green text-up-blue-dark mt-auto">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-3xl md:text-4xl font-medium tracking-tight mb-6">
      Tu opinión tiene el poder de transformar nuestra institución.
    </h2>
    <p
      class="text-lg md:text-xl font-normal opacity-90 mb-10 max-w-2xl mx-auto"
    >
      No subestimes el impacto de un simple comentario. Únete a nosotros en
      la construcción del mejor entorno para tu desarrollo.
    </p>
    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a
        href="#"
        class="inline-flex items-center justify-center gap-2 bg-black text-white rounded-full px-8 py-4 text-base font-medium hover:bg-black/80 transition-colors"
      >
        Conoce más de IUP
      </a>
      <a
        href="#"
        class="inline-flex items-center justify-center gap-2 bg-transparent text-up-blue-dark border border-up-blue-dark rounded-full px-8 py-4 text-base font-medium hover:bg-up-blue hover:text-white transition-colors"
      >
        Contáctanos directamente
      </a>
    </div>
  </div>
</section>



<?php get_footer(); ?>