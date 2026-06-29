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
                Alcanza tu meta, <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/90 to-up-green">obtén tu título universitario</span>
            </h1>
            
            <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto mb-7 lg:mb-12 font-normal leading-relaxed">
                Explora las diversas opciones que ofrecemos para adaptarnos a tus necesidades. Desde excelencia académica hasta proyectos de investigación, encuentra tu camino ideal.
            </p>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#opciones" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-[16px] lg:text-lg font-medium text-white bg-up-green rounded-full hover:bg-up-green/90 transition-all">
                    Opciones de titulación
                    <i data-lucide="arrow-down" class="ml-2 w-5 h-5"></i>
                </a>
                <a href="#requisitos" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-[16px] lg:text-lg font-medium text-white bg-white/10 rounded-full hover:bg-white/20 transition-all border border-white/5 backdrop-blur-sm">
                    Revisar requisitos
                </a>
            </div>
        </div>
</section>

<!-- Opciones Section -->
<section id="opciones" class="py-14 lg:py-16 bg-white relative">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14 lg:mb-20">
            <h2 class="text-up-blue text-base font-medium tracking-tight mb-3 uppercase">Modalidades</h2>
            <h3 class="text-3xl md:text-4xl font-semibold text-[#050b14] tracking-tight mb-3 lg:mb-6">Elige el camino que mejor se adapte a ti</h3>
            <p class="text-lg text-gray-800 font-normal">Contamos con múltiples alternativas para que concluyas esta etapa de la manera que resalte tus fortalezas y objetivos profesionales.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Option 1 -->
            <div class="group bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-up-green/30 transition-all duration-300 relative overflow-hidden flex flex-col h-full">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-gray-50 to-transparent -z-10 group-hover:from-up-green/5 transition-colors"></div>
                <div class="w-14 h-14 rounded-2xl bg-gray-50 text-up-blue flex items-center justify-center mb-8 group-hover:bg-up-blue group-hover:text-white transition-colors">
                    <i data-lucide="award" class="w-7 h-7"></i>
                </div>
                <h4 class="text-xl font-medium text-[#050b14] tracking-tight mb-4">Titulación por promedio</h4>
                <p class="text-lg text-gray-800 font-normal mt-auto">Promedio mínimo general de 9.0 sin haber presentado recursamientos.</p>
            </div>

            <!-- Option 2 -->
            <div class="group bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-up-green/30 transition-all duration-300 relative overflow-hidden flex flex-col h-full">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-gray-50 to-transparent -z-10 group-hover:from-up-green/5 transition-colors"></div>
                <div class="w-14 h-14 rounded-2xl bg-gray-50 text-up-blue flex items-center justify-center mb-8 group-hover:bg-up-blue group-hover:text-white transition-colors">
                    <i data-lucide="file-text" class="w-7 h-7"></i>
                </div>
                <h4 class="text-xl font-medium text-[#050b14] tracking-tight mb-4">Examen general de conocimientos</h4>
                <p class="text-lg text-gray-800 font-normal mt-auto">Evaluación integral de los conocimientos adquiridos durante toda la carrera.</p>
            </div>

            <!-- Option 3 -->
            <div class="group bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-up-green/30 transition-all duration-300 relative overflow-hidden flex flex-col h-full ring-1 ring-up-green/20">                    
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-gray-50 to-transparent -z-10 group-hover:from-up-green/5 transition-colors"></div>
                <div class="w-14 h-14 rounded-2xl bg-gray-50 text-up-blue flex items-center justify-center mb-8 group-hover:bg-up-blue group-hover:text-white transition-colors">
                    <i data-lucide="book-open" class="w-7 h-7"></i>
                </div>
                <h4 class="text-xl font-medium text-[#050b14] tracking-tight mb-4">Elaboración de tesis</h4>
                <p class="text-lg text-gray-800 font-normal mt-auto">Investigación académica con defensa formal ante un jurado evaluador.</p>
            </div>

            <!-- Option 4 -->
            <div class="group bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:border-up-green/30 transition-all duration-300 relative overflow-hidden flex flex-col h-full">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-gray-50 to-transparent -z-10 group-hover:from-up-green/5 transition-colors"></div>
                <div class="w-14 h-14 rounded-2xl bg-gray-50 text-up-blue flex items-center justify-center mb-8 group-hover:bg-up-blue group-hover:text-white transition-colors">
                    <i data-lucide="library" class="w-7 h-7"></i>
                </div>
                <h4 class="text-xl font-medium text-[#050b14] tracking-tight mb-4">Estudios de maestría</h4>
                <p class="text-lg text-gray-800 font-normal mt-auto">Inicia tu posgrado; debe ser cursada integralmente en nuestra institución.</p>
            </div>
        </div>
    </div>
</section>

    <!-- Promocional / Trust Section -->
    <section class="py-14 lg:py-24 bg-up-blue-dark relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <!-- Simple pattern mimicking a grid -->
            <svg class="h-full w-full" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid-pattern" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="0.5"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern)" />
            </svg>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 lg:px-8 flex flex-col lg:flex-row items-center gap-8 lg:gap-16">
            <div class="lg:w-1/2 text-white">
                <h2 class="text-3xl md:text-5xl font-semibold tracking-tight mb-6 leading-tight">
                    Universidad certificada internacionalmente en <span class="text-up-green">enseñanza y aprendizaje</span>
                </h2>
                <p class="text-lg text-slate-200 mb-8 font-normal leading-relaxed">
                    Nuestros programas académicos están diseñados para asegurar tu excelencia profesional. Titularte en nuestra institución es garantía de respaldo y reconocimiento laboral a nivel nacional.
                </p>
                <ul class="space-y-4 mb-10">
                    <li class="flex items-center gap-3 text-lg text-gray-200">
                        <div class="w-6 h-6 rounded-full bg-up-green flex items-center justify-center shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        Programas actualizados y docentes capacitados
                    </li>
                    <li class="flex items-center gap-3 text-lg text-gray-200">
                        <div class="w-6 h-6 rounded-full bg-up-green flex items-center justify-center shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        Cobertura integral durante tu estancia
                    </li>
                </ul>
            </div>
            
            <div class="lg:w-1/2 w-full relative">
                <!-- Abstract Image Representation / Modern Graphic -->
                <div class="aspect-[4/3] rounded-3xl overflow-hidden bg-up-blue-dark relative border border-white/10 shadow-2xl">
                    <div class="absolute inset-0 bg-gradient-to-tr from-up-blue to-transparent opacity-50"></div>
                    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 flex gap-4">
                        <div class="w-24 h-32 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 transform -rotate-12 shadow-xl"></div>
                        <div class="w-24 h-32 rounded-xl bg-up-green shadow-[0_0_30px_rgba(82,184,72,0.4)] z-10 flex items-center justify-center">
                            <i data-lucide="graduation-cap" class="w-10 h-10 text-white"></i>
                        </div>
                        <div class="w-24 h-32 rounded-xl bg-white/5 backdrop-blur-md border border-white/10 transform rotate-12 shadow-xl"></div>
                    </div>
                </div>py-14 lg:py-24 bg-white
            </div>
        </div>
    </section>

    <!-- Requisitos Section -->
    <section id="requisitos" class="py-14 lg:py-18 bg-gray-50 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-4 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-16">
                <!-- Sticky Sidebar -->
                <div class="lg:w-1/3 lg:sticky lg:top-32 h-fit">
                    <div class="w-16 h-16 rounded-2xl bg-up-blue-dark flex items-center justify-center mb-6 shadow-lg shadow-up-blue-dark/20">
                        <i data-lucide="list-checks" class="w-8 h-8 text-white"></i>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-semibold text-[#050b14] tracking-tight mb-6">Requisitos para titulación</h2>
                    <p class="text-lg text-gray-800 font-normal mb-8">
                        Asegúrate de cumplir con todos los lineamientos establecidos por la institución para comenzar tu trámite sin contratiempos.
                    </p>
                    <a href="#proceso" class="inline-flex items-center gap-2 text-up-blue font-medium text-lg hover:text-up-green transition-colors group">
                        Ver proceso paso a paso 
                        <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>

                <!-- Lista de Requisitos -->
                <div class="lg:w-2/3">
                    <div class="grid gap-4">
                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Plan de estudios al 100%</h4>
                                <p class="text-base text-gray-600">Haber concluido y aprobado la totalidad de las materias del mapa curricular.</p>
                            </div>
                        </div>
                        
                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Libre de adeudos</h4>
                                <p class="text-base text-gray-600">No tener adeudos financieros ni de material con la institución (biblioteca, laboratorios).</p>
                            </div>
                        </div>

                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Pago de titulación</h4>
                                <p class="text-base text-gray-600">Haber realizado el pago completo correspondiente al paquete de titulación.</p>
                            </div>
                        </div>

                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Documentación oficial</h4>
                                <p class="text-base text-gray-600">Contar con el Certificado de licenciatura original.</p>
                            </div>
                        </div>

                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Prácticas y Servicio Social</h4>
                                <p class="text-base text-gray-600">Presentar las constancias de liberación de prácticas profesionales y servicio social.</p>
                            </div>
                        </div>

                        <!-- Req Item -->
                        <div class="bg-white p-6 rounded-2xl border border-gray-200 flex gap-5 items-start hover:border-up-blue/20 transition-colors shadow-sm">
                            <div class="w-8 h-8 rounded-full bg-up-green flex items-center justify-center shrink-0 mt-0.5">
                                <i data-lucide="check" class="w-5 h-5 text-up-blue-dark"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-medium text-[#050b14] mb-1">Modalidad seleccionada</h4>
                                <p class="text-base text-gray-600">Elegir y cumplir con los requisitos específicos de una de las modalidades de titulación disponibles.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Proceso Section -->
<section id="proceso" class="py-14 lg:py-24 bg-up-blue-dark text-white">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="text-center mb-20">
            <h2 class="text-3xl md:text-5xl font-semibold tracking-tight mb-6">Proceso de titulación</h2>
            <p class="text-lg text-slate-200 max-w-2xl mx-auto font-normal">Sigue estos 5 sencillos pasos para formalizar la culminación de tus estudios universitarios.</p>
        </div>

        <div class="relative">
                <!-- Línea conectora horizontal (visible en desktop) -->
                <div class="hidden lg:block absolute top-10 left-[10%] right-[10%] h-0.5 bg-white/10 z-0"></div>

                <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-8 relative z-10">
                <!-- Paso 1 -->
                <div class="flex flex-col items-center text-center group relative">
                    <div class="w-20 h-20 rounded-full bg-up-blue border-4 border-up-blue-dark flex items-center justify-center text-2xl font-semibold text-white mb-6 shadow-xl transition-all duration-300 group-hover:bg-up-green group-hover:scale-110">
                        1
                    </div>
                    <h4 class="text-xl font-medium tracking-tight mb-3">Solicitud de titulación</h4>
                    <p class="text-base text-gray-200">Presenta tu solicitud en el departamento de servicios escolares al concluir tu plan.</p>
                    <!-- Conector vertical (solo móvil, entre pasos) -->
                    <div class="md:hidden absolute top-full left-1/2 -translate-x-1/2 w-0.5 h-16 bg-white/10" aria-hidden="true"></div>
                </div>

                <!-- Paso 2 -->
                <div class="flex flex-col items-center text-center group relative">
                    <div class="w-20 h-20 rounded-full bg-up-blue border-4 border-up-blue-dark flex items-center justify-center text-2xl font-semibold text-white mb-6 shadow-xl transition-all duration-300 group-hover:bg-up-green group-hover:scale-110">
                        2
                    </div>
                    <h4 class="text-xl font-medium tracking-tight mb-3">Verificación de documentos</h4>
                    <p class="text-base text-gray-200">El departamento verifica que cumplas con todos los requisitos para iniciar.</p>
                    <!-- Conector vertical (solo móvil, entre pasos) -->
                    <div class="md:hidden absolute top-full left-1/2 -translate-x-1/2 w-0.5 h-16 bg-white/10" aria-hidden="true"></div>
                </div>

                <!-- Paso 3 -->
                <div class="flex flex-col items-center text-center group relative">
                    <div class="w-20 h-20 rounded-full bg-up-blue border-4 border-up-blue-dark flex items-center justify-center text-2xl font-semibold text-white mb-6 shadow-xl transition-all duration-300 group-hover:bg-up-green group-hover:scale-110">
                        3
                    </div>
                    <h4 class="text-xl font-medium tracking-tight mb-3">Pago de derechos</h4>
                    <p class="text-base text-gray-200">Realiza el pago correspondiente al proceso en la caja de la universidad.</p>
                    <!-- Conector vertical (solo móvil, entre pasos) -->
                    <div class="md:hidden absolute top-full left-1/2 -translate-x-1/2 w-0.5 h-16 bg-white/10" aria-hidden="true"></div>
                </div>

                <!-- Paso 4 -->
                <div class="flex flex-col items-center text-center group relative">
                    <div class="w-20 h-20 rounded-full bg-up-blue border-4 border-up-blue-dark flex items-center justify-center text-2xl font-semibold text-white mb-6 shadow-xl transition-all duration-300 group-hover:bg-up-green group-hover:scale-110">
                        4
                    </div>
                    <h4 class="text-xl font-medium tracking-tight mb-3">Desarrollo de la modalidad</h4>
                    <p class="text-base text-gray-200">Completa los requisitos específicos de la modalidad que hayas elegido.</p>
                    <!-- Conector vertical (solo móvil, entre pasos) -->
                    <div class="md:hidden absolute top-full left-1/2 -translate-x-1/2 w-0.5 h-16 bg-white/10" aria-hidden="true"></div>
                </div>

                <!-- Paso 5 -->
                <div class="flex flex-col items-center text-center group relative">
                    <div class="w-20 h-20 rounded-full bg-up-blue border-4 border-up-blue-dark flex items-center justify-center text-2xl font-semibold text-white mb-6 shadow-xl transition-all duration-300 group-hover:bg-up-green group-hover:scale-110">
                        5
                    </div>
                    <h4 class="text-xl font-medium tracking-tight mb-3">Ceremonia de titulación</h4>
                    <p class="text-base text-gray-200">Asiste a la ceremonia oficial para recibir con orgullo tu título profesional.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- FAQ Section -->
<section class="py-12 px-6 bg-white">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-semibold tracking-tight text-[#171269] mb-4">Preguntas frecuentes</h2>
            <p class="text-lg text-gray-800 ">Resolvemos las dudas más comunes sobre el proceso de titulación.</p>
        </div>

        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Cuánto tiempo toma el proceso de titulación?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-800  text-lg leading-relaxed">
                    <p>El tiempo puede variar dependiendo de la modalidad elegida. Generalmente, una vez entregada toda la documentación y aprobado el método (ej. tesis o examen), los trámites administrativos ante las autoridades educativas toman entre 3 a 6 meses.</p>
                </div>
            </details>

            <!-- FAQ Item 2 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Cuál es el costo del trámite de titulación?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-800  text-lg leading-relaxed">
                    <p>Los costos se actualizan periódicamente y dependen de los aranceles vigentes. Te invitamos a acercarte al área de finanzas o cajas de la universidad para obtener el costo exacto del paquete de titulación actual.</p>
                </div>
            </details>

            <!-- FAQ Item 3 -->
            <details class="group border border-gray-200 rounded-2xl bg-gray-50 hover:bg-gray-100/50 transition-colors [&_summary::-webkit-details-marker]:hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-1.5 p-6 font-medium text-[#050b14]">
                    <span class="text-lg">¿Puedo iniciar el trámite si aún debo mi servicio social?</span>
                    <div class="bg-white p-1.5 rounded-full border border-gray-200 group-open:bg-[#171269] group-open:border-[#171269] group-open:text-white transition-colors">
                        <i data-lucide="chevron-down" stroke-width="1.5" class="w-5 h-5 transition duration-300 group-open:-rotate-180"></i>
                    </div>
                </summary>
                <div class="px-6 pb-6 text-gray-800  text-lg leading-relaxed">
                    <p>No. Uno de los requisitos obligatorios para iniciar cualquier trámite de titulación es contar con la carta de liberación tanto de prácticas profesionales como de servicio social.</p>
                </div>
            </details>
        </div>
    </div>
</section>



<?php get_footer(); ?>