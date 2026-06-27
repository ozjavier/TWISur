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
                Queremos ayudarte <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/90 to-up-green">¡Contáctanos!</span>
            </h1>

            <p class="text-lg md:text-xl text-gray-200 max-w-2xl pb-4 mx-auto font-normal leading-relaxed">
                En IUPSUR, estamos aquí para ofrecerte todo el apoyo que necesitas durante tu formación académica y profesional.
            </p>
        </div>
</section>

<section class="py-16 bg-white text-slate-800 relative overflow-hidden">
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

  <div class="max-w-7xl mx-auto px-6 relative z-10">
    <!-- SOLUCIÓN: Cambiado a grid-cols-12 para darle un poco más de espacio horizontal al formulario de contacto -->
    <div class="flex flex-col-reverse lg:grid lg:grid-cols-12 gap-12 lg:gap-16 items-start">
      
      <!-- Columna Izquierda: Información de Contacto -->
      <div class="space-y-8 w-full lg:col-span-5 lg:sticky lg:top-32">
        <div>
          <h2 class="text-3xl md:text-4xl font-medium tracking-tight text-up-blue-dark leading-tight">
            Atención directa
          </h2>
          <p class="mt-3 text-base text-slate-600 font-normal">
            ¡Platica con nosotros! Estamos aquí para resolver tus dudas y orientarte en tu proceso.
          </p>
        </div>

        <div class="space-y-6">
          <!-- Horarios -->
          <div class="flex gap-4 items-start">
            <i data-lucide="clock" class="w-6 h-6 text-up-blue shrink-0 mt-1" stroke-width="1.5"></i>
            <div class="w-full">
              <h4 class="text-lg font-medium text-up-blue-dark mb-2 tracking-tight">
                Horarios de atención
              </h4>
              <div class="space-y-1 text-base text-slate-600 font-normal">
                <div class="flex flex-col md:flex-row justify-between gap-1 md:gap-4 max-w-[280px]">
                  <span>Lunes a Viernes</span>
                  <span>9:00 a 17:00 hrs</span>
                </div>
                <div class="flex flex-col md:flex-row justify-between gap-1 md:gap-4 max-w-[280px]">
                  <span>Sábado</span>
                  <span>9:00 a 14:00 hrs</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Dirección -->
          <div class="flex gap-4 items-start">
            <i data-lucide="map-pin" class="w-6 h-6 text-up-blue shrink-0 mt-1" stroke-width="1.5"></i>
            <div>
              <h4 class="text-lg font-medium text-up-blue-dark mb-2 tracking-tight">
                Dirección
              </h4>
              <p class="text-base text-slate-600 font-normal mb-2">
                Av. Ferrocarriles 1926 Col. Guadalupe Victoria,<br> 74280 Atlixco, México
              </p>
              <a href="#" class="inline-flex items-center text-sm font-medium text-up-blue-dark hover:text-up-green transition-colors group">
                Ver en Google Maps 
                <i data-lucide="arrow-up-right" class="w-4 h-4 ml-1 group-hover:-translate-y-0.5 group-hover:translate-x-0.5 transition-transform" stroke-width="1.5"></i>
              </a>
            </div>
          </div>

          <!-- Teléfono -->
          <div class="flex gap-4 items-start">
            <i data-lucide="phone" class="w-6 h-6 text-up-blue shrink-0 mt-1" stroke-width="1.5"></i>
            <div>
              <h4 class="text-lg font-medium text-up-blue-dark mb-1 tracking-tight">
                Teléfono
              </h4>
              <p class="text-base text-slate-600 font-normal">
                244 44 61 425
              </p>
            </div>
          </div>

<!-- WhatsApp -->
          <div class="flex gap-4 items-start">
            <!-- Icono SVG de WhatsApp junto al título -->
            <svg class="w-6 h-6 text-up-blue shrink-0 mt-1 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
            </svg>
            <div>
              <h4 class="text-lg font-medium text-up-blue-dark mb-3 tracking-tight">
                WhatsApp
              </h4>
              <a href="#" class="inline-flex items-center gap-2 bg-up-green text-white px-5 py-2.5 rounded-lg font-medium hover:bg-[#20b858] transition-colors shadow-sm shadow-up-green/20">
                <!-- Icono SVG de WhatsApp dentro del botón -->
                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 0 0-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 0 1-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 0 1-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 0 1 2.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0 0 12.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 0 0 5.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 0 0-3.48-8.413Z"/>
                </svg>
                Contáctanos por WhatsApp
              </a>
            </div>
          </div>

        </div>

        <hr class="border-slate-200/60">

        <!-- Redes Sociales -->
<div class="flex flex-col md:flex-row items-center gap-2 md:gap-4">
          <h4 class="text-base font-medium text-up-blue-dark tracking-tight">
            Síguenos en redes
          </h4>
          <div class="flex gap-3">
            <a href="#" aria-label="Facebook" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-up-blue-dark hover:border-up-blue-dark hover:bg-white transition-all shadow-sm">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
            <a href="#" aria-label="Instagram" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-up-blue-dark hover:border-up-blue-dark hover:bg-white transition-all shadow-sm">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"></line></svg>
            </a>
            <a href="#" aria-label="TikTok" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-up-blue-dark hover:border-up-blue-dark hover:bg-white transition-all shadow-sm">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.74a4.85 4.85 0 0 1-1.01-.05z"/></svg>
            </a>
            <a href="#" aria-label="X" class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-slate-600 hover:text-up-blue-dark hover:border-up-blue-dark hover:bg-white transition-all shadow-sm">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.988l4.265 5.638 4.741-5.638Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z"></path></svg>
            </a>
          </div>
        </div>

      </div>

      <!-- Columna Derecha: El Formulario de Contacto -->
      <div class="bg-white rounded-3xl p-6 md:p-10 shadow-2xl relative w-full border border-slate-100 lg:col-span-7">
        <div class="absolute -top-3 -right-3 w-24 h-24 bg-up-green/30 rounded-full blur-2xl"></div>

        <h3 class="text-2xl font-medium tracking-tight text-up-blue-dark mb-2">
          Completa el formulario
        </h3>
        <p class="text-base text-slate-500 mb-8 font-normal">
          En IUPSUR, estamos aquí para ofrecerte todo el apoyo que necesitas. Completa el formulario a continuación y nos pondremos en contacto contigo lo antes posible.
        </p>

        <form action="#" method="POST" class="space-y-6 relative z-10">
          
          <!-- Nombre -->
          <div class="space-y-2">
            <label for="nombre" class="block text-base font-medium text-slate-700">
              Nombre(s) <span class="text-red-500">*</span>
            </label>
            <input type="text" id="nombre" name="nombre" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-slate-900 focus:ring-up-blue" required />
          </div>

          <!-- Apellidos -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label for="paterno" class="block text-base font-medium text-slate-700">
                Apellido paterno <span class="text-red-500">*</span>
              </label>
              <input type="text" id="paterno" name="paterno" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-slate-900 focus:ring-up-blue" required />
            </div>
            <div class="space-y-2">
              <label for="materno" class="block text-base font-medium text-slate-700">
                Apellido materno <span class="text-red-500">*</span>
              </label>
              <input type="text" id="materno" name="materno" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-slate-900 focus:ring-up-blue" required />
            </div>
          </div>

          <!-- Contacto -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-2">
              <label for="email" class="block text-base font-medium text-slate-700">
                Correo electrónico <span class="text-red-500">*</span>
              </label>
              <input type="email" id="email" name="email" placeholder="tucorreo@ejemplo.com" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-slate-900 focus:ring-up-blue" required />
            </div>
            <div class="space-y-2">
              <label for="telefono" class="block text-base font-medium text-slate-700">
                Teléfono <span class="text-red-500">*</span>
              </label>
              <input type="tel" id="telefono" name="telefono" placeholder="10 dígitos" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all text-slate-900 focus:ring-up-blue" required />
            </div>
          </div>

          <!-- Asunto -->
          <div class="space-y-2">
            <label for="asunto" class="block text-base font-medium text-slate-700">
              Asunto <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <select id="asunto" name="asunto" class="w-full appearance-none bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base focus:outline-none focus:ring-2 focus:border-transparent transition-all cursor-pointer text-slate-900 focus:ring-up-blue" required>
                <option value="" disabled="" selected="">Selecciona una opción...</option>
                <option value="informacion">Información general</option>
                <option value="admisiones">Admisiones</option>
                <option value="becas">Becas</option>
                <option value="otro">Otro</option>
              </select>
              <div class="absolute inset-y-0 right-4 flex items-center pointer-events-none text-slate-400">
                <i data-lucide="chevron-down" class="w-5 h-5" stroke-width="1.5"></i>
              </div>
            </div>
          </div>

          <!-- Mensaje -->
          <div class="space-y-2">
            <label for="mensaje" class="block text-base font-medium text-slate-700">
              Mensaje <span class="text-red-500">*</span>
            </label>
            <textarea id="mensaje" name="mensaje" rows="4" placeholder="¿En qué te podemos ayudar?" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-base placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:border-transparent transition-all resize-y text-slate-900 focus:ring-up-blue" required></textarea>
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

          <!-- Botón de Envío -->
          <button type="submit" class="w-full bg-up-blue text-white rounded-xl px-6 py-4 text-base font-medium hover:bg-up-blue-dark focus:outline-none focus:ring-2 focus:ring-up-blue focus:ring-offset-2 transition-all flex justify-center items-center gap-2 group">
            Enviar mensaje
            <i data-lucide="send" class="w-5 h-5 group-hover:translate-x-1 group-hover:-translate-y-1 transition-transform" stroke-width="1.5"></i>
          </button>

        </form>
      </div>

    </div>
  </div>
</section>


<!-- Footer CTA (Verde vibrante) -->
<section class="py-12 bg-up-green text-up-blue-dark mt-auto">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
          <div
            class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8"
          >
            <div class="text-center md:text-left">
              <h2
                class="text-3xl lg:text-4xl font-semibold tracking-tight text-up-blue-dark mb-3"
              >
                ¿Quieres conocer nuestras instalaciones?
              </h2>
              <p
                class="text-lg md:text-xl text-up-blue-dark/80 font-medium max-w-2xl"
              >
                Agenda una visita guiada y conoce nuestra infraestructura,
                laboratorios y áreas de estudio.
              </p>
            </div>
            <a
              href="#"
              class="shrink-0 inline-flex items-center gap-2 bg-up-blue-dark text-white px-8 py-4 rounded-xl font-medium hover:bg-slate-900 hover:shadow-xl transition-all text-lg"
            >
              Agendar visita
              <i data-lucide="calendar" class="w-5 h-5" stroke-width="1.5"></i>
            </a>
          </div>
        </div>
  </div>
</section>

<?php get_footer(); ?>