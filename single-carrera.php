<?php get_header(); ?>

<!-- ===================== HERO CON VIDEO (igual a front-page) ===================== -->
<section class="isolate overflow-hidden bg-up-blue-dark">
  <div class="aspect-video mx-auto w-full min-h-[640px] max-h-[80vh] max-w-[2560px] relative flex items-end">

    <!-- 1 · VIDEO -->
    <video
      class="absolute inset-0 w-full h-full object-cover object-[50%_35%]"
      autoplay muted loop playsinline preload="metadata"
      poster="<?php echo esc_url( get_theme_file_uri( '/assets/img/hero-gastronomia.jpg' ) ); ?>">
      <!-- Reemplaza por el video real de la carrera -->
      <source src="<?php echo esc_url( get_theme_file_uri( '/assets/video/preset-home.mp4' ) ); ?>" type="video/mp4">
    </video>

    <!-- 2 · OVERLAYS -->
    <div class="absolute inset-0 bg-up-blue-dark/20"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_top,#020617_0%,rgba(2,6,23,0.85)_22%,rgba(2,6,23,0)_60%)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(to_top_right,rgba(2,6,23,0.6)_0%,rgba(2,6,23,0)_55%)]"></div>

    <!-- 3 · TRAMA: grid sutil + halftone verde / azul -->
    <div class="absolute inset-0 pointer-events-none">
      <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <pattern id="gas-grid" width="44" height="44" patternUnits="userSpaceOnUse">
            <path d="M 44 0 L 0 0 0 44" fill="none" stroke="rgba(255,255,255,0.035)" stroke-width="1"/>
          </pattern>
          <pattern id="gas-halftone" width="16" height="16" patternUnits="userSpaceOnUse">
            <circle cx="8" cy="8" r="2" fill="#52b848"/>
          </pattern>
          <radialGradient id="gas-halftone-fade" cx="100%" cy="0%" r="55%">
            <stop offset="0" stop-color="white" stop-opacity="1"/>
            <stop offset="1" stop-color="white" stop-opacity="0"/>
          </radialGradient>
          <mask id="gas-halftone-mask"><rect width="100%" height="100%" fill="url(#gas-halftone-fade)"/></mask>
          <pattern id="gas-halftone-blue" width="16" height="16" patternUnits="userSpaceOnUse">
            <circle cx="8" cy="8" r="2" fill="#60a5fa"/>
          </pattern>
          <radialGradient id="gas-halftone-fade-blue" cx="0%" cy="100%" r="42%">
            <stop offset="0" stop-color="white" stop-opacity="1"/>
            <stop offset="0.30" stop-color="white" stop-opacity="0.5"/>
            <stop offset="0.55" stop-color="white" stop-opacity="0.12"/>
            <stop offset="0.8" stop-color="white" stop-opacity="0"/>
          </radialGradient>
          <mask id="gas-halftone-mask-blue"><rect width="100%" height="100%" fill="url(#gas-halftone-fade-blue)"/></mask>
        </defs>
        <rect width="100%" height="100%" fill="url(#gas-grid)" opacity="0.6"/>
        <rect width="100%" height="100%" fill="url(#gas-halftone)" mask="url(#gas-halftone-mask)" opacity="0.22"/>
        <rect width="100%" height="100%" fill="url(#gas-halftone-blue)" mask="url(#gas-halftone-mask-blue)" opacity="0.22"/>
      </svg>
    </div>

    <!-- 4 · CONTENIDO -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 sm:pb-16 lg:pb-20 animate-slide-in-left">
      <div class="max-w-5xl flex flex-col gap-2 lg:gap-6">
        <h1 class="text-3xl md:text-6xl lg:text-7xl font-semibold tracking-tight text-white leading-[37px] lg:leading-[64px] drop-shadow-[0_2px_24px_rgba(0,0,0,0.9)]">
          Licenciatura en<br>
          <span class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/80 via-up-green/90 to-up-green">Administración de</span><br>
          Empresas Gastronómicas
        </h1>

        <p class="text-base md:text-xl text-slate-100 font-light max-w-xl drop-shadow-[0_1px_8px_rgba(0,0,0,0.8)]">
          Fórmate como un líder integral capaz de dirigir, innovar y emprender en el sector gastronómico y de servicios a nivel internacional.
        </p>
      </div>
    </div>

    <!-- Filo inferior azul → verde (remate de marca) -->
    <div class="absolute inset-x-0 bottom-0 h-1 bg-gradient-to-r from-up-blue via-up-green to-up-green"></div>
  </div>
</section>

<!-- ===================== INFO BAR (datos clave, tarjeta traslapada) ===================== -->
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-5 sm:-mt-10 relative z-20">
  <div class="bg-up-blue-dark rounded-2xl shadow-lg shadow-black/20 border border-white/10 overflow-hidden">
    <div class="flex flex-col divide-y divide-white/10
                sm:flex-row sm:flex-wrap sm:items-center sm:justify-center sm:divide-y-0
                px-2 sm:px-6 lg:px-8 sm:py-6 sm:gap-x-12 md:gap-x-20">

      <!-- Duración -->
      <div class="flex items-center gap-4 px-4 py-4 sm:p-0">
        <span class="w-11 h-11 rounded-xl bg-up-green/10 flex items-center justify-center shrink-0 sm:bg-transparent sm:w-auto sm:h-auto sm:rounded-none">
          <i data-lucide="clock" class="w-6 h-6 sm:w-7 sm:h-7 text-up-green" stroke-width="1.5"></i>
        </span>
        <div>
          <p class="text-[11px] sm:text-xs text-blue-300/70 uppercase tracking-wider font-semibold">Duración</p>
          <p class="text-lg font-semibold text-white leading-tight">3 años</p>
        </div>
      </div>

      <!-- Modalidad -->
      <div class="flex items-center gap-4 px-4 py-4 sm:p-0">
        <span class="w-11 h-11 rounded-xl bg-up-green/10 flex items-center justify-center shrink-0 sm:bg-transparent sm:w-auto sm:h-auto sm:rounded-none">
          <i data-lucide="book-open" class="w-6 h-6 sm:w-7 sm:h-7 text-up-green" stroke-width="1.5"></i>
        </span>
        <div>
          <p class="text-[11px] sm:text-xs text-blue-300/70 uppercase tracking-wider font-semibold">Modalidad</p>
          <p class="text-lg font-semibold text-white leading-tight">Escolarizada</p>
        </div>
      </div>

      <!-- Reconocimiento -->
      <div class="flex items-center gap-4 px-4 py-4 sm:p-0">
        <span class="w-11 h-11 rounded-xl bg-up-green/10 flex items-center justify-center shrink-0 sm:bg-transparent sm:w-auto sm:h-auto sm:rounded-none">
          <i data-lucide="award" class="w-6 h-6 sm:w-7 sm:h-7 text-up-green" stroke-width="1.5"></i>
        </span>
        <div>
          <p class="text-[11px] sm:text-xs text-blue-300/70 uppercase tracking-wider font-semibold">Reconocimiento</p>
          <p class="text-lg font-semibold text-white leading-tight">RVOE SEP</p>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ===================== SOBRE EL PROGRAMA ===================== -->
<section id="programa" class="py-12 md:py-28 bg-white relative overflow-hidden">
  <!-- Decoración: glow + puntos índigo difuminados -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute top-40 -right-20 w-72 h-72 bg-up-green/10 rounded-full blur-3xl"></div>
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="prog-dots" width="26" height="26" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1.4" fill="rgba(23,18,105,1)"></circle>
        </pattern>
        <radialGradient id="prog-fade" cx="0%" cy="0%" r="60%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="prog-mask"><rect width="100%" height="100%" fill="url(#prog-fade)"></rect></mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#prog-dots)" mask="url(#prog-mask)" opacity="0.10"></rect>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">

    <div class="order-2 lg:order-2 relative">
      <div class="absolute -inset-4 bg-gradient-to-tr from-up-green/20 to-up-blue/20 rounded-3xl transform rotate-2"></div>
      <img src="https://images.unsplash.com/photo-1600565193348-f74bd3c7ccdf?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Estudiantes en cocina" class="relative rounded-2xl shadow-2xl z-10 w-full object-cover aspect-[4/3]">
    </div>

    <div class="order-1 lg:order-1 flex flex-col gap-6">
      <div class="inline-flex items-center gap-2">
        <span class="w-8 h-px bg-up-green"></span>
        <span class="text-sm font-medium text-up-green uppercase tracking-widest">Conoce la carrera</span>
      </div>
      <h2 class="text-4xl md:text-5xl font-semibold tracking-tight text-up-blue-dark">Sobre el programa</h2>
      <p class="text-lg text-slate-600 leading-relaxed">
        La Licenciatura en Administración de Empresas Gastronómicas forma profesionales con las competencias necesarias para gestionar, operar y dirigir establecimientos de alimentos y bebidas, integrando el arte culinario con sólidos conocimientos administrativos y de negocios.
      </p>
      <p class="text-lg text-slate-600 leading-relaxed">
        Nuestro enfoque práctico te permite desarrollar habilidades desde el primer día en laboratorios especializados, preparándote para enfrentar los retos del mercado global.
      </p>
      <div class="mt-4">
        <a href="#" class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-up-blue text-white text-base font-medium rounded-lg hover:bg-up-blue-dark transition-all">
          Descargar plan de estudios
          <i data-lucide="download" class="w-4 h-4"></i>
        </a>
      </div>
    </div>

  </div>
</section>

<!-- ===================== PERFIL DE INGRESO ===================== -->
<section id="perfil" class="relative overflow-hidden bg-gray-50/40 border-t border-gray-100 pb-0">
  <!-- Decoración de sección -->
  <div class="absolute inset-0 -z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -left-24 w-96 h-96 bg-up-blue/[0.06] rounded-full blur-3xl"></div>
    <svg class="absolute top-10 left-6 w-28 h-28 text-up-blue/10" fill="currentColor" viewBox="0 0 100 100">
      <circle cx="10" cy="10" r="3"/><circle cx="30" cy="10" r="3"/><circle cx="50" cy="10" r="3"/><circle cx="70" cy="10" r="3"/>
      <circle cx="10" cy="30" r="3"/><circle cx="30" cy="30" r="3"/><circle cx="50" cy="30" r="3"/><circle cx="70" cy="30" r="3"/>
      <circle cx="10" cy="50" r="3"/><circle cx="30" cy="50" r="3"/><circle cx="50" cy="50" r="3"/><circle cx="70" cy="50" r="3"/>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-0 items-end relative z-10">
    <!-- Texto -->
    <div class="order-1 lg:order-1 pb-0 lg:pb-24 flex flex-col gap-6 mt-28 -mb-28 min-[390px]:-mb-0 lg:mb-0 lg:mt-0">
      <h2 class="text-4xl md:text-5xl font-semibold tracking-tight leading-[1.05]">
        <span class="block text-up-blue-dark">Perfil de</span>
        <span class="block text-up-blue">Ingreso</span>
      </h2>
      <p class="text-lg text-slate-600 max-w-md">El aspirante a esta licenciatura debe contar con las siguientes características:</p>

      <ul class="space-y-4 max-w-md">
        <li class="flex items-start gap-4">
          <div class="mt-1 bg-green-100 p-1 rounded-full text-up-green shrink-0"><i data-lucide="check" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Vocación de servicio e interés por la hospitalidad y la gastronomía.</span>
        </li>
        <li class="flex items-start gap-4">
          <div class="mt-1 bg-green-100 p-1 rounded-full text-up-green shrink-0"><i data-lucide="check" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Capacidad para el trabajo en equipo y bajo presión.</span>
        </li>
        <li class="flex items-start gap-4">
          <div class="mt-1 bg-green-100 p-1 rounded-full text-up-green shrink-0"><i data-lucide="check" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Interés por las culturas, tradiciones y tendencias culinarias globales.</span>
        </li>
        <li class="flex items-start gap-4">
          <div class="mt-1 bg-green-100 p-1 rounded-full text-up-green shrink-0"><i data-lucide="check" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Habilidades básicas de comunicación, liderazgo y organización.</span>
        </li>
      </ul>
    </div>

    <!-- Figura recortada + decoración detrás -->
    <div class="order-2 lg:order-2 relative self-end h-[420px] sm:h-[520px] lg:h-[640px]">
      <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[105%] h-[78%] rounded-full bg-gradient-to-t from-up-green/15 via-up-green/5 to-transparent blur-2xl"></div>
      <div class="absolute top-10 right-6 w-44 h-44 rounded-full border border-up-blue/10"></div>
      <div class="absolute top-16 right-12 w-32 h-32 rounded-full border border-up-green/15"></div>
      <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <pattern id="ing-dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1.5" fill="#171269"/></pattern>
          <radialGradient id="ing-fade" cx="60%" cy="40%" r="60%"><stop offset="0" stop-color="white" stop-opacity="1"/><stop offset="1" stop-color="white" stop-opacity="0"/></radialGradient>
          <mask id="ing-mask"><rect width="100%" height="100%" fill="url(#ing-fade)"/></mask>
        </defs>
        <rect width="100%" height="100%" fill="url(#ing-dots)" mask="url(#ing-mask)" opacity="0.08"/>
      </svg>

      <img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/cienciass-pg-2.webp' ) ); ?>"
           alt="Aspirantes Instituto Universitario"
           class="absolute bottom-0 inset-x-0 mx-auto lg:mx-0 lg:right-0 h-full w-auto max-w-full object-contain object-bottom z-10 drop-shadow-[0_20px_40px_rgba(0,16,62,0.18)]">
    </div>
  </div>
</section>

<!-- ===================== PERFIL DE EGRESO ===================== -->
<section class="relative overflow-hidden bg-white pb-0">
  <!-- Decoración de sección -->
  <div class="absolute inset-0 -z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-24 -right-24 w-96 h-96 bg-up-green/[0.08] rounded-full blur-3xl"></div>
    <svg class="absolute top-10 right-6 w-28 h-28 text-up-green/15" fill="currentColor" viewBox="0 0 100 100">
      <circle cx="10" cy="10" r="3"/><circle cx="30" cy="10" r="3"/><circle cx="50" cy="10" r="3"/><circle cx="70" cy="10" r="3"/>
      <circle cx="10" cy="30" r="3"/><circle cx="30" cy="30" r="3"/><circle cx="50" cy="30" r="3"/><circle cx="70" cy="30" r="3"/>
      <circle cx="10" cy="50" r="3"/><circle cx="30" cy="50" r="3"/><circle cx="50" cy="50" r="3"/><circle cx="70" cy="50" r="3"/>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2  items-end relative z-10">
    <!-- Figura recortada + decoración detrás -->
    <div class="order-2 lg:order-1 relative self-end h-[420px] sm:h-[520px] lg:h-[640px]">
      <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[105%] h-[78%] rounded-full bg-gradient-to-t from-up-blue/15 via-up-blue/5 to-transparent blur-2xl"></div>
      <div class="absolute top-10 left-6 w-44 h-44 rounded-full border border-up-green/20"></div>
      <div class="absolute top-16 left-12 w-32 h-32 rounded-full border border-up-blue/10"></div>
      <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
        <defs>
          <pattern id="egr-dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="2" cy="2" r="1.5" fill="#52b848"/></pattern>
          <radialGradient id="egr-fade" cx="40%" cy="40%" r="60%"><stop offset="0" stop-color="white" stop-opacity="1"/><stop offset="1" stop-color="white" stop-opacity="0"/></radialGradient>
          <mask id="egr-mask"><rect width="100%" height="100%" fill="url(#egr-fade)"/></mask>
        </defs>
        <rect width="100%" height="100%" fill="url(#egr-dots)" mask="url(#egr-mask)" opacity="0.12"/>
      </svg>

      <img src="<?php echo esc_url( get_theme_file_uri( '/assets/img/carreras/cienciass-pg-3.webp' ) ); ?>"
           alt="Egresados Instituto Universitario"
           class="absolute bottom-0 inset-x-0 mx-auto lg:mx-0 lg:left-0 h-full w-auto max-w-full object-contain object-bottom z-10 drop-shadow-[0_20px_40px_rgba(0,16,62,0.18)]">
    </div>

    <!-- Texto -->
    <div class="order-1 lg:order-2  pb-16 lg:pb-24 flex flex-col gap-6 mt-28 lg:mt-0 -mb-30 min-[390px]:-mb-9 lg:mb-0 sm:ml-auto sm:mr-0 sm:w-fit">
      <h2 class="text-4xl md:text-5xl font-semibold tracking-tight leading-[1.05] lg:text-right">
        <span class="block text-up-blue-dark">Perfil de</span>
        <span class="block text-up-green">Egreso</span>
      </h2>
      <p class="text-lg text-slate-600 lg:text-right lg:ml-auto max-w-md">Al concluir tus estudios, serás un profesional capaz de:</p>

      <ul class="space-y-4 lg:ml-auto max-w-md">
        <li class="flex items-start gap-4 flex-row-reverse text-right">
          <div class="mt-1 bg-up-blue/10 p-1 rounded-full text-up-blue shrink-0"><i data-lucide="chevron-left" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Diseñar, planear y operar empresas gastronómicas con estándares internacionales de calidad.</span>
        </li>
        <li class="flex items-start gap-4 flex-row-reverse text-right">
          <div class="mt-1 bg-up-blue/10 p-1 rounded-full text-up-blue shrink-0"><i data-lucide="chevron-left" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Aplicar técnicas culinarias de vanguardia y tradicionales en la creación de menús innovadores.</span>
        </li>
        <li class="flex items-start gap-4 flex-row-reverse text-right">
          <div class="mt-1 bg-up-blue/10 p-1 rounded-full text-up-blue shrink-0"><i data-lucide="chevron-left" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Gestionar eficientemente los recursos humanos, financieros y materiales de la industria de alimentos y bebidas.</span>
        </li>
        <li class="flex items-start gap-4 flex-row-reverse text-right">
          <div class="mt-1 bg-up-blue/10 p-1 rounded-full text-up-blue shrink-0"><i data-lucide="chevron-left" class="w-4 h-4"></i></div>
          <span class="text-lg text-slate-700">Emprender proyectos de negocios propios en el sector de la hospitalidad y gastronomía.</span>
        </li>
      </ul>
    </div>
  </div>
</section>

<!-- ===================== AGENDA UNA CITA (formulario, navy) ===================== -->
<section id="contacto" class="py-15 bg-up-blue-dark relative overflow-hidden">
  <!-- Trama de marca -->
  <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
  <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-up-blue/30 rounded-full blur-[100px] pointer-events-none"></div>
  <div class="absolute right-0 top-0 w-[300px] h-[300px] bg-up-green/10 rounded-full blur-[80px] pointer-events-none"></div>

  <div class="max-w-3xl mx-auto px-6 relative z-10 text-center">
    <h2 class="text-4xl md:text-5xl font-semibold tracking-tight text-white mb-4">Agenda una cita</h2>
    <p class="text-lg text-blue-200 mb-10">Déjanos tus datos y un asesor académico se pondrá en contacto contigo para resolver todas tus dudas.</p>

    <form class="bg-white/5 backdrop-blur-md p-8 md:p-10 rounded-2xl border border-white/10 shadow-2xl">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="space-y-2 text-left">
          <label for="nombre" class="text-sm font-medium text-blue-100">Nombre completo</label>
          <input type="text" id="nombre" class="w-full bg-up-blue-dark border border-white/15 text-white rounded-lg px-4 py-3 focus:outline-none focus:border-up-green focus:ring-1 focus:ring-up-green transition-colors placeholder:text-slate-500" placeholder="Ej. Juan Pérez">
        </div>
        <div class="space-y-2 text-left">
          <label for="apellidos" class="text-sm font-medium text-blue-100">Apellidos</label>
          <input type="text" id="apellidos" class="w-full bg-up-blue-dark border border-white/15 text-white rounded-lg px-4 py-3 focus:outline-none focus:border-up-green focus:ring-1 focus:ring-up-green transition-colors placeholder:text-slate-500" placeholder="Ej. García López">
        </div>
      </div>
      <div class="space-y-2 text-left mb-6">
        <label for="correo" class="text-sm font-medium text-blue-100">Correo electrónico</label>
        <input type="email" id="correo" class="w-full bg-up-blue-dark border border-white/15 text-white rounded-lg px-4 py-3 focus:outline-none focus:border-up-green focus:ring-1 focus:ring-up-green transition-colors placeholder:text-slate-500" placeholder="tu@correo.com">
      </div>
      <div class="space-y-2 text-left mb-8">
        <label for="telefono" class="text-sm font-medium text-blue-100">Número de teléfono / WhatsApp</label>
        <div class="relative">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i data-lucide="phone" class="h-5 w-5 text-slate-500"></i>
          </div>
          <input type="tel" id="telefono" class="w-full bg-up-blue-dark border border-white/15 text-white rounded-lg pl-10 pr-4 py-3 focus:outline-none focus:border-up-green focus:ring-1 focus:ring-up-green transition-colors placeholder:text-slate-500" placeholder="10 dígitos">
        </div>
      </div>

      <button type="button" class="w-full bg-up-green text-up-blue-dark text-lg font-semibold py-4 rounded-lg hover:bg-[#47a23e] transition-colors cursor-pointer">
        Enviar información
      </button>
    </form>
  </div>
</section>

<!-- ===================== PLAN DE ESTUDIOS ===================== -->
<section id="plan" class="py-12 lg:py-20 bg-gray-50/50">
  <style>
    /* Paginación */
    .plan-slider .blaze-pagination { display: flex; gap: 0.5rem; }
    .plan-slider .blaze-pagination button {
      width: 0.5rem; height: 0.5rem; padding: 0;
      border: 0; border-radius: 9999px; cursor: pointer;
      font-size: 0; line-height: 0; color: transparent;
      background: rgba(15, 23, 42, 0.2);
      transition: width 0.3s ease, background 0.3s ease;
    }
    .plan-slider .blaze-pagination button.active {
      width: 1.5rem;
      background: #52b848;
    }
  </style>

  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-up-blue-dark mb-4">Plan de estudios</h2>
      <p class="text-lg text-slate-600 max-w-2xl mx-auto">Nuestro programa está estructurado para brindarte un aprendizaje progresivo, combinando teoría, práctica y visión de negocios desde el primer semestre.</p>
    </div>

    <div class="blaze-slider plan-slider relative">
      <div class="blaze-container">
        <div class="blaze-track-container">
          <div class="blaze-track">

            <!-- 1er -->
            <div class="bg-white p-8 rounded-2xl border border-gray-200 hover:border-up-green transition-all hover:shadow-lg relative overflow-hidden group">
              <div class="absolute -right-4 -top-4 text-8xl font-black text-up-green/50 opacity-90 group-hover:text-up-green transition-colors pointer-events-none">1</div>
              <h3 class="text-xl font-semibold text-up-blue-dark mb-6 relative z-10 border-b border-up-green pb-2 inline-block">1er Semestre</h3>
              <ul class="space-y-3 relative z-10">
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Bases Culinarias I</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Sanidad e Higiene</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Introducción a la Admón.</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Matemáticas Básicas</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Historia de la Gastronomía</li>
              </ul>
            </div>

            <!-- 2do -->
            <div class="bg-white p-8 rounded-2xl border border-gray-200 hover:border-up-green transition-all hover:shadow-lg relative overflow-hidden group">
              <div class="absolute -right-4 -top-4 text-8xl font-black text-up-green/50 opacity-90 group-hover:text-up-green transition-colors pointer-events-none">2</div>
              <h3 class="text-xl font-semibold text-up-blue-dark mb-6 relative z-10 border-b border-up-green pb-2 inline-block">2do Semestre</h3>
              <ul class="space-y-3 relative z-10">
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Bases Culinarias II</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Nutrición Básica</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Contabilidad Financiera</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Química de Alimentos</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Técnicas de Servicio</li>
              </ul>
            </div>

            <!-- 3er -->
            <div class="bg-white p-8 rounded-2xl border border-gray-200 hover:border-up-green transition-all hover:shadow-lg relative overflow-hidden group">
              <div class="absolute -right-4 -top-4 text-8xl font-black text-up-green/50 opacity-90 group-hover:text-up-green transition-colors pointer-events-none">3</div>
              <h3 class="text-xl font-semibold text-up-blue-dark mb-6 relative z-10 border-b border-up-green pb-2 inline-block">3er Semestre</h3>
              <ul class="space-y-3 relative z-10">
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Panadería Básica</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Costos de A y B</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Derecho Laboral</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Enología y Maridaje</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Mercadotecnia</li>
              </ul>
            </div>

            <!-- 4to -->
            <div class="bg-white p-8 rounded-2xl border border-gray-200 hover:border-up-green transition-all hover:shadow-lg relative overflow-hidden group">
              <div class="absolute -right-4 -top-4 text-8xl font-black text-up-green/50 opacity-90 group-hover:text-up-green transition-colors pointer-events-none">4</div>
              <h3 class="text-xl font-semibold text-up-blue-dark mb-6 relative z-10 border-b border-up-green pb-2 inline-block">4to Semestre</h3>
              <ul class="space-y-3 relative z-10">
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Cocina Mexicana</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Repostería Básica</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Gestión de Compras</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Coctelería</li>
                <li class="text-sm text-slate-600 flex items-center gap-2"><span class="w-1 h-1 rounded-full bg-up-blue"></span> Admón. de Recursos Humanos</li>
              </ul>
            </div>

            

          </div>
        </div>

        <!-- Controles (visibles en todos los anchos) -->
        <div class="flex items-center justify-center gap-4 mt-10">
          <button class="blaze-prev w-10 h-10 rounded-full border border-gray-300 bg-white text-up-blue shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Anterior">
            <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="2"></i>
          </button>
          <div class="blaze-pagination"></div>
          <button class="blaze-next w-10 h-10 rounded-full border border-gray-300 bg-white text-up-blue shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Siguiente">
            <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="2"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    /* Slider activo en TODOS los anchos: 4 (xl) → 3 (lg) → 2 (sm) → 1 (móvil) */
    (function () {
      function initPlan() {
        if (typeof BlazeSlider === "undefined") return;
        var el = document.querySelector(".plan-slider");
        if (!el || el.dataset.blazeInit === "1") return;
        el.dataset.blazeInit = "1";

        new BlazeSlider(el, {
          all: {
            slidesToShow: 1,
            slidesToScroll: 1,
            slideGap: "1.5rem",
            loop: true,
            enableAutoplay: false,
            transitionDuration: 400,
          },
          "(min-width: 640px)":  { slidesToShow: 2 },
          "(min-width: 1024px)": { slidesToShow: 3 },
          "(min-width: 1280px)": { slidesToShow: 4 },
        });

        if (typeof lucide !== "undefined") lucide.createIcons();
      }

      if (document.readyState !== "loading") initPlan();
      else document.addEventListener("DOMContentLoaded", initPlan);
    })();
  </script>
</section>

<!-- ===================== VIDA ESTUDIANTIL (banner verde) ===================== -->
<section class="bg-up-green py-12 relative overflow-hidden">
  <!-- Forma de marca recolorada -->
  <svg class="absolute top-0 right-0 h-full text-[#45a03c] opacity-50" viewBox="0 0 200 100" preserveAspectRatio="none">
    <path d="M0,0 L200,0 L200,100 L50,100 Q100,50 0,0 Z" fill="currentColor"></path>
  </svg>

  <div class="max-w-7xl mx-auto px-6 relative z-10 flex flex-col md:flex-row items-center justify-between gap-10">
    <div class="md:w-1/2">
      <h2 class="text-4xl md:text-5xl font-bold tracking-tight text-up-blue-dark mb-4">Vida estudiantil</h2>
      <p class="text-xl text-up-blue-dark/80 font-medium">En el IUP no solo vienes a estudiar, vienes a vivir la gastronomía.</p>
      <p class="mt-4 text-up-blue-dark/70 text-lg">Participa en concursos internos, prácticas profesionales en los mejores restaurantes, congresos y eventos culinarios de talla nacional e internacional que enriquecerán tu formación.</p>
    </div>
    <div class="md:w-5/12">
      <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Alumnos en evento" class="rounded-2xl shadow-[10px_10px_0px_rgba(0,16,62,0.15)] border-4 border-white transform rotate-2">
    </div>
  </div>
</section>

<!-- ===================== HERRAMIENTAS / INSTALACIONES ===================== -->
<section class="py-12 lg:py-18 bg-white">
  <style>
    /* DESKTOP (≥1024px): el track vuelve a ser grid de 4 columnas */
    @media (min-width: 1024px) {
      .tools-slider .blaze-track-container { overflow: visible; }
      .tools-slider .blaze-track {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        column-gap: 2rem;            /* gap-x-8 */
        transform: none !important;
        width: 100% !important;
      }
      .tools-slider .blaze-track > * { width: 100% !important; }
    }

    /* Paginación (visible solo en el slider, oculta en desktop por lg:hidden) */
    .tools-slider .blaze-pagination { display: flex; gap: 0.5rem; }
    .tools-slider .blaze-pagination button {
      width: 0.5rem; height: 0.5rem; padding: 0;
      border: 0; border-radius: 9999px; cursor: pointer;
      font-size: 0; line-height: 0; color: transparent;
      background: rgba(15, 23, 42, 0.2);
      transition: width 0.3s ease, background 0.3s ease;
    }
    .tools-slider .blaze-pagination button.active {
      width: 1.5rem;
      background: #00103e;
    }
  </style>

  <div class="max-w-7xl mx-auto px-6">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-semibold tracking-tight text-up-blue-dark mb-4">Tu formación, tus herramientas</h2>
      <p class="text-lg text-slate-600 max-w-2xl mx-auto">Contamos con instalaciones de primer nivel diseñadas específicamente para el desarrollo óptimo de tus habilidades prácticas y teóricas.</p>
    </div>

    <div class="blaze-slider tools-slider relative">
      <div class="blaze-container">
        <div class="blaze-track-container">
          <div class="blaze-track">

            <div class="text-center flex flex-col items-center group">
              <div class="w-16 h-16 rounded-2xl bg-blue-50 text-up-blue flex items-center justify-center mb-4 border border-blue-100 shadow-sm group-hover:bg-up-blue group-hover:text-white transition-colors">
                <i data-lucide="chef-hat" class="w-8 h-8"></i>
              </div>
              <h3 class="text-lg font-semibold text-up-text mb-2">Laboratorios Culinarios</h3>
              <p class="text-sm text-slate-600">Cocinas industriales equipadas con tecnología de vanguardia para prácticas reales.</p>
            </div>

            <div class="text-center flex flex-col items-center group">
              <div class="w-16 h-16 rounded-2xl bg-blue-50 text-up-blue flex items-center justify-center mb-4 border border-blue-100 shadow-sm group-hover:bg-up-blue group-hover:text-white transition-colors">
                <i data-lucide="glass-water" class="w-8 h-8"></i>
              </div>
              <h3 class="text-lg font-semibold text-up-text mb-2">Sala de Catas</h3>
              <p class="text-sm text-slate-600">Espacio especializado para el estudio de la enología, mixología y análisis sensorial.</p>
            </div>

            <div class="text-center flex flex-col items-center group">
              <div class="w-16 h-16 rounded-2xl bg-blue-50 text-up-blue flex items-center justify-center mb-4 border border-blue-100 shadow-sm group-hover:bg-up-blue group-hover:text-white transition-colors">
                <i data-lucide="monitor-play" class="w-8 h-8"></i>
              </div>
              <h3 class="text-lg font-semibold text-up-text mb-2">Simulador de Negocios</h3>
              <p class="text-sm text-slate-600">Software especializado para la administración y control de restaurantes y hoteles.</p>
            </div>

            <div class="text-center flex flex-col items-center group">
              <div class="w-16 h-16 rounded-2xl bg-blue-50 text-up-blue flex items-center justify-center mb-4 border border-blue-100 shadow-sm group-hover:bg-up-blue group-hover:text-white transition-colors">
                <i data-lucide="book-copy" class="w-8 h-8"></i>
              </div>
              <h3 class="text-lg font-semibold text-up-text mb-2">Biblioteca Gastronómica</h3>
              <p class="text-sm text-slate-600">Acervo bibliográfico especializado en artes culinarias, nutrición y administración.</p>
            </div>

          </div>
        </div>

        <!-- Controles (visibles solo en el slider: <1024px) -->
        <div class="lg:hidden flex items-center justify-center gap-4 mt-10">
          <button class="blaze-prev w-10 h-10 rounded-full border border-gray-300 bg-white text-up-blue shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Anterior">
            <i data-lucide="chevron-left" class="w-5 h-5" stroke-width="2"></i>
          </button>
          <div class="blaze-pagination"></div>
          <button class="blaze-next w-10 h-10 rounded-full border border-gray-300 bg-white text-up-blue shadow-sm flex items-center justify-center hover:bg-gray-50 transition-colors" aria-label="Siguiente">
            <i data-lucide="chevron-right" class="w-5 h-5" stroke-width="2"></i>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    /* Slider SOLO <1024px (1 card <768, 2 cards 768–1023); en desktop se
       destruye y el track vuelve a ser grid de 4 columnas. */
    (function () {
      function initTools() {
        if (typeof BlazeSlider === "undefined") return;
        var el = document.querySelector(".tools-slider");
        if (!el) return;

        var instance = null;
        var mq = window.matchMedia("(max-width: 1023px)");

        function sync() {
          if (mq.matches && !instance) {
            instance = new BlazeSlider(el, {
              all: {
                slidesToShow: 1,
                slidesToScroll: 1,
                slideGap: "1.5rem",
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

      if (document.readyState !== "loading") initTools();
      else document.addEventListener("DOMContentLoaded", initTools);
    })();
  </script>
</section>

<!-- Footer CTA (Verde vibrante) -->
<section class="py-12 bg-up-blue text-slate-200 mt-auto">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
          <div
            class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8"
          >
            <div class="text-center md:text-left">
              <h2
                class="text-3xl lg:text-4xl font-semibold tracking-tight text-slate-200 mb-3"
              >
                ¿Quieres conocer nuestras instalaciones?
              </h2>
              <p
                class="text-lg md:text-xl text-slate-300 font-medium max-w-2xl"
              >
                Agenda una visita guiada y conoce nuestra infraestructura,
                laboratorios y áreas de estudio.
              </p>
            </div>
            <a
              href="#"
              class="shrink-0 inline-flex items-center gap-2 bg-up-green text-up-blue-dark px-8 py-4 rounded-xl font-medium hover:bg-up-green/90 hover:shadow-xl transition-all text-lg"
            >
              Agendar visita
            </a>
          </div>
        </div>
  </div>
</section>

<?php get_footer(); ?>