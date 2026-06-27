<?php get_header(); ?>

<section class="bg-[#00103e] text-white pt-40 pb-14 lg:pb-32 px-6 relative overflow-hidden">
  <!-- Patrón de puntos sutil -->
  <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
  <!-- Gradiente decorativo -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute -top-[25%] -right-[10%] w-[50%] h-[50%] rounded-full bg-[#171269] blur-[120px] opacity-60"></div>
      <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-[#52b848] blur-[150px] opacity-20"></div>
  </div>
  
  <div class="max-w-4xl mx-auto relative z-10 text-center">
      <h1 class="text-4xl md:text-6xl font-semibold tracking-tight mb-8 text-white">
          Gestiona tus pagos de manera <span class="text-up-green">fácil y segura</span>
      </h1>
      <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-12 leading-relaxed">
          Conoce las opciones que tenemos para ti. Realiza tus pagos de colegiatura y servicios desde donde estés o directamente en nuestro campus.
      </p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
          <a href="#transferencia" class="bg-up-green text-black px-8 py-4 rounded-xl font-medium hover:bg-[#459e3c] transition flex items-center justify-center gap-2">
              Ver opciones de pago <i data-lucide="arrow-down" stroke-width="1.5" class="w-5 h-5"></i>
          </a>
      </div>
  </div>
</section>

<!-- Sección: Transferencia Bancaria -->
<section id="transferencia" class="py-12 pb-16 lg:py-18 px-6 bg-white relative overflow-hidden">

  <!-- Fondo decorativo: glows + puntos índigo difuminados -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-28 -left-28 w-96 h-96 bg-[#171269]/8 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-28 right-1/4 w-96 h-96 bg-up-green/8 rounded-full blur-3xl"></div>
    <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
      <defs>
        <pattern id="transfer-dots" width="24" height="24" patternUnits="userSpaceOnUse">
          <circle cx="2" cy="2" r="1.4" fill="rgba(23,18,105,1)"></circle>
        </pattern>
        <radialGradient id="transfer-fade" cx="100%" cy="100%" r="65%">
          <stop offset="0" stop-color="white" stop-opacity="1"></stop>
          <stop offset="1" stop-color="white" stop-opacity="0"></stop>
        </radialGradient>
        <mask id="transfer-mask"><rect width="100%" height="100%" fill="url(#transfer-fade)"></rect></mask>
      </defs>
      <rect width="100%" height="100%" fill="url(#transfer-dots)" mask="url(#transfer-mask)" opacity="0.14"></rect>
    </svg>
  </div>

  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-10 lg:gap-16 relative z-10">
      <div class="lg:w-1/2">
          <h2 class="text-3xl md:text-4xl font-semibold tracking-tight mb-6 text-[#171269]">
              Pago Electrónico mediante <br>Transferencia Bancaria
          </h2>
          <p class="text-lg text-gray-700 mb-10 leading-relaxed">
              Los pasos descritos en este proceso pueden variar ligeramente dependiendo de la aplicación bancaria que utilices en tu dispositivo móvil. Agiliza tu pago sin salir de casa.
          </p>

          <div class="space-y-6">
              <!-- Paso 1 -->
              <div class="flex gap-5 group">
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-[#171269] flex items-center justify-center font-semibold border border-blue-100 group-hover:bg-[#171269] group-hover:text-white transition-colors">1</div>
                  <div>
                      <p class="text-lg text-[#050b14] font-medium mb-1">Ingresa a tu banca móvil</p>
                      <p class="text-gray-500">Abre la aplicación de tu banco desde tu dispositivo móvil y selecciona la opción para realizar una nueva transferencia o pago.</p>
                  </div>
              </div>
              <!-- Paso 2 -->
              <div class="flex gap-5 group">
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-[#171269] flex items-center justify-center font-semibold border border-blue-100 group-hover:bg-[#171269] group-hover:text-white transition-colors">2</div>
                  <div>
                      <p class="text-lg text-[#050b14] font-medium mb-1">Ingresa los datos bancarios</p>
                      <p class="text-gray-500">Introduce la información de nuestra institución, asegurándote de colocar el monto exacto de tu pago.</p>
                  </div>
              </div>
              <!-- Paso 3 -->
              <div class="flex gap-5 group">
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-[#171269] flex items-center justify-center font-semibold border border-blue-100 group-hover:bg-[#171269] group-hover:text-white transition-colors">3</div>
                  <div>
                      <p class="text-lg text-[#050b14] font-medium mb-1">Confirma y guarda el comprobante</p>
                      <p class="text-gray-500">Confirma la transferencia y guarda una captura de pantalla o descarga el comprobante digital.</p>
                  </div>
              </div>
              <!-- Paso 4 -->
              <div class="flex gap-5 group">
                  <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-50 text-[#171269] flex items-center justify-center font-semibold border border-blue-100 group-hover:bg-[#171269] group-hover:text-white transition-colors">4</div>
                  <div>
                      <p class="text-lg text-[#050b14] font-medium mb-1">Notifica tu pago</p>
                      <p class="text-gray-500">Envía el comprobante a nuestro correo o WhatsApp. Incluye tu nombre completo, matrícula y concepto de pago. Recibirás confirmación pronto.</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="lg:w-1/2 w-full relative">
          <div class="absolute inset-0 bg-gradient-to-tr from-blue-100 to-transparent rounded-3xl transform translate-x-4 translate-y-4 -z-10"></div>
          <div class="aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-black/5 bg-gray-100">
              <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Estudiante pagando en línea" class="w-full h-full object-cover">
          </div>
          <!-- Floating badge -->
          <div class="absolute bottom-4 left-4 lg:-bottom-6 lg:-left-6 bg-white p-5 rounded-2xl shadow-xl ring-1 ring-black/5 flex items-center gap-4">
              <div class="bg-green-100 p-3 rounded-full text-up-green">
                  <i data-lucide="shield-check" stroke-width="1.5" class="w-6 h-6"></i>
              </div>
              <div>
                  <p class="text-sm text-gray-500 font-medium">Proceso</p>
                  <p class="text-[#050b14] font-semibold">100% Seguro</p>
              </div>
          </div>
      </div>
  </div>
</section>

    <!-- Sección: Cajero Institucional -->
    <section class="py-24 pb-16 lg:py-24 px-6 bg-gray-50/50 border-y border-gray-100 relative overflow-hidden">

        <!-- Fondo decorativo: glows + cruz índigo + puntos verdes difuminados -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute -top-24 right-0 w-[26rem] h-[26rem] bg-up-green/8 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-[#171269]/7 rounded-full blur-3xl"></div>
            <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="cajero-cross" width="60" height="60" patternUnits="userSpaceOnUse">
                        <path d="M 30 25 L 30 35 M 25 30 L 35 30" fill="none" stroke="rgba(23,18,105,1)" stroke-width="1.5"></path>
                    </pattern>
                    <pattern id="cajero-dots" width="22" height="22" patternUnits="userSpaceOnUse">
                        <circle cx="2" cy="2" r="1.4" fill="rgba(82,184,72,1)"></circle>
                    </pattern>
                    <radialGradient id="cajero-fade-tl" cx="0%" cy="0%" r="60%">
                        <stop offset="0" stop-color="white" stop-opacity="1"></stop>
                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                    </radialGradient>
                    <mask id="cajero-mask-tl"><rect width="100%" height="100%" fill="url(#cajero-fade-tl)"></rect></mask>
                    <radialGradient id="cajero-fade-br" cx="100%" cy="100%" r="55%">
                        <stop offset="0" stop-color="white" stop-opacity="1"></stop>
                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                    </radialGradient>
                    <mask id="cajero-mask-br"><rect width="100%" height="100%" fill="url(#cajero-fade-br)"></rect></mask>
                </defs>
                <rect width="100%" height="100%" fill="url(#cajero-cross)" mask="url(#cajero-mask-tl)" opacity="0.10"></rect>
                <rect width="100%" height="100%" fill="url(#cajero-dots)" mask="url(#cajero-mask-br)" opacity="0.16"></rect>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto flex flex-col lg:flex-row-reverse items-center gap-10 lg:gap-16 relative z-10">
            <div class="lg:w-1/2">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-up-green text-white text-sm font-medium mb-6 border border-green-100">
                    <i data-lucide="map-pin" stroke-width="1.5" class="w-4 h-4"></i> Presencial en Campus
                </div>
                <h2 class="text-3xl md:text-4xl font-semibold tracking-tight mb-6 text-[#171269]">
                    Pago en Cajero Institucional
                </h2>
                <p class="text-lg text-gray-700 mb-10 leading-relaxed">
                    Nuestra institución agiliza tus procesos de pago, ofreciéndote un entorno seguro, rápido y de calidad directamente en nuestras instalaciones.
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Tarjeta Paso 1 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-[#171269]/5 flex items-center justify-center text-[#171269] mb-4">
                            <i data-lucide="id-card" stroke-width="1.5" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-medium text-lg text-[#050b14] mb-2">1. Matrícula</h3>
                        <p class="text-gray-500">Ingresa tu matrícula institucional en la pantalla principal del cajero.</p>
                    </div>
                    <!-- Tarjeta Paso 2 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-[#171269]/5 flex items-center justify-center text-[#171269] mb-4">
                            <i data-lucide="file-text" stroke-width="1.5" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-medium text-lg text-[#050b14] mb-2">2. Concepto</h3>
                        <p class="text-gray-500">Selecciona el concepto de pago correspondiente a tu trámite o colegiatura.</p>
                    </div>
                    <!-- Tarjeta Paso 3 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-[#171269]/5 flex items-center justify-center text-[#171269] mb-4">
                            <i data-lucide="banknote" stroke-width="1.5" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-medium text-lg text-[#050b14] mb-2">3. Monto</h3>
                        <p class="text-gray-500">Ingresa el monto exacto a pagar en efectivo o mediante tarjeta.</p>
                    </div>
                    <!-- Tarjeta Paso 4 -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 rounded-xl bg-[#171269]/5 flex items-center justify-center text-[#171269] mb-4">
                            <i data-lucide="receipt" stroke-width="1.5" class="w-6 h-6"></i>
                        </div>
                        <h3 class="font-medium text-lg text-[#050b14] mb-2">4. Comprobante</h3>
                        <p class="text-gray-500">Recibe tu comprobante de pago y consérvalo para cualquier duda o aclaración.</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 w-full">
                <div class="aspect-square md:aspect-[4/5] rounded-3xl overflow-hidden bg-gray-200">
                    <img src="https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Terminal de pago" class="w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

<!-- Sección de Contacto -->
<section class="py-13 lg:py-12 px-6 bg-up-green relative overflow-hidden">

    <!-- Glows decorativos + halftone navy difuminado -->
    <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#00103e]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-[28rem] h-[28rem] bg-white/15 rounded-full blur-3xl"></div>
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="contacto-dots" width="16" height="16" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1.6" fill="rgba(0,16,62,1)"></circle>
                </pattern>
                <radialGradient id="contacto-fade" cx="0%" cy="100%" r="55%">
                    <stop offset="0" stop-color="white" stop-opacity="1"></stop>
                    <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                </radialGradient>
                <mask id="contacto-mask"><rect width="100%" height="100%" fill="url(#contacto-fade)"></rect></mask>
            </defs>
            <rect width="100%" height="100%" fill="url(#contacto-dots)" mask="url(#contacto-mask)" opacity="0.10"></rect>
        </svg>
    </div>

    <div class="max-w-4xl mx-auto relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-semibold tracking-tight mb-6 text-[#00103e]">¿Tienes alguna duda o deseas alguna aclaración?</h2>
        <p class="text-xl text-[#00103e]/80 mb-12 max-w-2xl mx-auto">
            Acércate al departamento de contabilidad para recibir apoyo y asesoría personalizada en el seguimiento de tus pagos.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6">
            <a href="tel:2444461425" class="group flex items-center justify-center gap-4 bg-[#00103e] hover:bg-[#001a5c] px-8 py-5 rounded-2xl transition-all duration-300 border border-white/10 hover:border-up-green/50 shadow-lg shadow-black/10 hover:-translate-y-0.5">
                <div class="bg-up-green/15 p-3 rounded-full text-up-green group-hover:bg-up-green group-hover:text-[#00103e] transition-colors">
                    <i data-lucide="phone" stroke-width="1.5" class="w-6 h-6"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm text-white font-medium">Llámanos</p>
                    <p class="text-lg font-semibold tracking-tight text-white">244 446 1425 <span class="text-sm text-slate-400 font-normal">EXT: 4</span></p>
                </div>
            </a>

            <a href="mailto:finanzas@iup-sur.edu.mx" class="group flex items-center justify-center gap-4 bg-[#00103e] hover:bg-[#001a5c] px-8 py-5 rounded-2xl transition-all duration-300 border border-white/10 hover:border-up-green/50 shadow-lg shadow-black/10 hover:-translate-y-0.5">
                <div class="bg-up-green/15 p-3 rounded-full text-up-green group-hover:bg-up-green group-hover:text-[#00103e] transition-colors">
                    <i data-lucide="mail" stroke-width="1.5" class="w-6 h-6"></i>
                </div>
                <div class="text-left">
                    <p class="text-sm text-white font-medium">Escríbenos</p>
                    <p class="text-lg font-semibold tracking-tight text-white">finanzas@iup-sur.edu.mx</p>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Sección de Preguntas Frecuentes -->
<section class="py-12 px-6 bg-white">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-semibold tracking-tight text-[#171269] mb-4">Preguntas frecuentes</h2>
            <p class="text-lg text-gray-500">Resuelve tus dudas rápidamente con nuestra información general.</p>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden" open>
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Cuáles son las fechas límite de pago?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-700 text-lg leading-relaxed">
                    <p>Generalmente, los pagos de colegiatura deben realizarse dentro de los primeros días de cada mes. Te recomendamos consultar el calendario escolar vigente o contactar al departamento de finanzas para conocer las fechas exactas de tu programa.</p>
                </div>
            </details>

            <!-- FAQ Item 2 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Cuánto tiempo tarda en reflejarse mi pago por transferencia?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-700 text-lg leading-relaxed">
                    <p>Las transferencias electrónicas suelen reflejarse en un lapso de 24 a 48 horas hábiles. Es indispensable enviar tu comprobante al correo de finanzas para agilizar la validación y registro en tu estado de cuenta.</p>
                </div>
            </details>

            <!-- FAQ Item 3 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Puedo solicitar factura de mi pago?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-700 text-lg leading-relaxed">
                    <p>Sí, para solicitar tu factura debes enviar un correo al departamento de contabilidad adjuntando tu comprobante de pago y tu Constancia de Situación Fiscal actualizada, dentro del mismo mes en que realizaste el depósito.</p>
                </div>
            </details>
        </div>
    </div>
</section>


<?php get_footer(); ?>