<?php get_header(); ?>

<!-- ===================== HERO ===================== -->
<section class="bg-up-blue-dark text-white pt-40 pb-20 px-6 relative overflow-hidden">
  <!-- Patrón de puntos sutil -->
  <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px;"></div>
  <!-- Gradientes decorativos -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute -top-[25%] -right-[10%] w-[50%] h-[50%] rounded-full bg-up-blue blur-[120px] opacity-60"></div>
    <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-up-green blur-[150px] opacity-20"></div>
  </div>

  <div class="relative max-w-7xl mx-auto text-center">
    <!-- Badge de vigencia -->
    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 text-white/90 text-xs sm:text-sm font-medium mb-6 sm:mb-8 backdrop-blur-sm">
      <span class="flex h-2 w-2 rounded-full bg-up-green"></span>
      Última actualización: Enero – Abril 2026
    </div>

    <h1 class="text-4xl md:text-6xl lg:text-7xl font-semibold text-white tracking-tight mb-6 max-w-4xl mx-auto leading-tight">
      Invierte en tu futuro con
      <span class="text-transparent bg-clip-text bg-gradient-to-r from-up-green/90 to-up-green">transparencia</span>
    </h1>

    <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto mb-10 font-normal leading-relaxed">
      Conoce el tabulador oficial de colegiaturas y servicios administrativos del
      Instituto Universitario de Puebla, Región Sur. Calidad académica a costos accesibles.
    </p>

    <!-- Beneficio destacado -->
    <div class="flex justify-center">
      <div class="group  text-white px-6 py-4 md:px-8  flex flex-col sm:flex-row items-center text-center sm:text-left gap-3 md:gap-4 transition-transform w-full sm:w-auto">
        <div>
          <p class="text-sm text-center text-green-50 font-medium">Beneficio exclusivo</p>
          <p class="text-xl font-semibold tracking-tight">¡Inscripción sin costo!</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===================== ALERTA INFORMATIVA (traslapada) ===================== -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mb-45 lg:-mb-20  -mt-12 relative z-10">
  <div class="bg-white rounded-2xl shadow-lg shadow-black/5 ring-1 ring-gray-100 p-5 md:p-6 flex flex-col sm:flex-row gap-4 items-start">
    <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-blue-50 text-up-blue flex items-center justify-center">
      <i data-lucide="info" class="w-5 h-5" stroke-width="1.5"></i>
    </div>
    <p class="text-base text-gray-600 leading-relaxed">
      Los precios están expresados en Moneda Nacional (MXN). La institución realiza un
      ajuste anual en las colegiaturas para cubrir incrementos operativos y de inflación
      (mayo de cada año). Dicho ajuste <strong class="font-semibold text-up-text">nunca superará el 10% de aumento</strong>.
      Los costos mostrados están vigentes y registrados ante PROFECO.
    </p>
  </div>
</div>

<!-- ===================== COLEGIATURA MENSUAL + PANEL LATERAL ===================== -->
<section class="py-16 pt-56 lg:py-20 lg:pt-30 px-6 bg-white relative overflow-hidden">
  <!-- Fondo decorativo -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-28 -left-28 w-96 h-96 bg-up-blue/8 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 -right-28 w-96 h-96 bg-up-green/8 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8 items-start">

    <!-- ========== COLUMNA PRINCIPAL: COLEGIATURA MENSUAL ========== -->
    <div class="lg:col-span-2 bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden">
      <!-- Encabezado -->
      <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gray-50/60">
        <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
          <h2 class="text-2xl font-semibold text-up-text tracking-tight">Colegiatura Mensual</h2>
          <p class="text-sm text-gray-500">Costo dependiendo de la licenciatura</p>
        </div>
      </div>

      <div class="px-6 sm:px-8 py-6 space-y-10">

        <!-- Grupo: Ciencias Sociales -->
        <div>
          <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest pb-3 mb-5 border-b border-gray-100">
            Ciencias Sociales, Jurídicas y Administrativas
          </h3>
          <div class="space-y-6">
            <!-- Programa -->
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Derecho</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,365.00</span></div>
              </div>
            </div>
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Criminología</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,400.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,520.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,665.00</span></div>
              </div>
            </div>
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Psicología</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,635.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,775.00</span></div>
              </div>
            </div>
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Administración y Contaduría</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,362.00</span></div>
              </div>
            </div>
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Ciencias Periciales</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,255.00</span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grupo: Educación -->
        <div>
          <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest pb-3 mb-5 border-b border-gray-100">
            Educación
          </h3>
          <div class="space-y-6">
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Educación Inicial</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,350.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,470.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,600.00</span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grupo: Creatividad -->
        <div>
          <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest pb-3 mb-5 border-b border-gray-100">
            Creatividad, Comunicación y Servicios
          </h3>
          <div class="space-y-6">
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Diseño Gráfico</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,362.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,370.00</span></div>
              </div>
            </div>
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Gastronomía</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,350.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">5º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,470.00</span></div>
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">8º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,600.00</span></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Grupo: Tecnología -->
        <div>
          <h3 class="text-[11px] font-bold text-gray-400 uppercase tracking-widest pb-3 mb-5 border-b border-gray-100">
            Tecnología y Datos
          </h3>
          <div class="space-y-6">
            <div>
              <p class="text-base font-semibold text-up-text mb-2">Lic. en Software y Big Data</p>
              <div class="space-y-1.5">
                <div class="flex items-center justify-between gap-4 text-sm"><span class="text-gray-500">2º Cuatrimestre</span><span class="font-semibold text-up-blue whitespace-nowrap">$1,250.00</span></div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <!-- Nota de fechas límite -->
      <div class="px-6 sm:px-8 py-4 border-t border-gray-100 bg-gray-50/60 flex items-start gap-2.5">
        <i data-lucide="info" class="w-4 h-4 text-up-blue shrink-0 mt-0.5" stroke-width="1.5"></i>
        <p class="text-xs text-gray-500 leading-relaxed">
          <span class="font-semibold text-gray-600">Fecha límite de pago sin recargos:</span> día 7 de cada mes.
          <span class="text-gray-400">•</span> +$100.00 del día 8 al 14
          <span class="text-gray-400">•</span> +$170.00 del día 15 al último día del mes.
        </p>
      </div>
    </div>

    <!-- ========== PANEL LATERAL ========== -->
    <aside class="space-y-6">

      <!-- Reinscripción -->
      <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-start justify-between gap-3 mb-1">
          <h3 class="text-lg font-semibold text-up-text tracking-tight">Reinscripción</h3>
          <span class="text-[11px] font-medium px-2.5 py-1 rounded-full bg-blue-50 text-up-blue whitespace-nowrap">Cuatrimestral</span>
        </div>
        <p class="text-sm text-gray-500 mb-4">El primer mes de inicio de cada Cuatrimestre.</p>
        <div class="divide-y divide-gray-100 border-t border-gray-100">
          <div class="flex items-center justify-between gap-4 py-3">
            <span class="text-sm text-gray-500">Cuota Regular</span>
            <span class="text-sm font-semibold text-up-text text-right">Costo vigente de colegiatura</span>
          </div>
          <div class="flex items-center justify-between gap-4 py-3">
            <span class="text-sm text-gray-500">Recargo</span>
            <span class="text-sm font-semibold text-up-text whitespace-nowrap">+10% del monto inicial</span>
          </div>
        </div>
      </div>

      <!-- Incorporación SEP -->
      <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
        <div class="flex items-start justify-between gap-3 mb-1">
          <h3 class="text-lg font-semibold text-up-text tracking-tight">Incorporación SEP</h3>
          <span class="text-[11px] font-medium px-2.5 py-1 rounded-full bg-green-50 text-up-green whitespace-nowrap">Anual</span>
        </div>
        <p class="text-sm text-gray-500 mb-4">Al iniciar ciclo escolar.</p>
        <div class="divide-y divide-gray-100 border-t border-gray-100">
          <div class="flex items-center justify-between gap-4 py-3">
            <span class="text-sm text-gray-500">Cuota anual</span>
            <span class="text-sm font-semibold text-up-blue whitespace-nowrap">$1,200.00</span>
          </div>
          <div class="flex items-center justify-between gap-4 py-3">
            <span class="text-sm text-gray-500">Recargo</span>
            <span class="text-sm font-semibold text-up-text whitespace-nowrap">+$120.00</span>
          </div>
        </div>
      </div>

      <!-- Otros Conceptos Administrativos -->
      <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6">
        <h3 class="text-lg font-semibold text-up-text tracking-tight mb-4">Otros Conceptos Administrativos</h3>
        <div class="divide-y divide-gray-100 border-t border-gray-100">
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Examen Ordinario de 2da Vuelta</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$250.00</span></div>
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Examen Extraordinario</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$500.00</span></div>
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Reposición de Credencial</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$200.00</span></div>
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Constancia Simple</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$200.00</span></div>
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Constancia con Historial Académico</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$250.00</span></div>
          <div class="flex items-center justify-between gap-4 py-3"><span class="text-sm text-gray-600">Baja y devolución de documentos</span><span class="text-sm font-semibold text-up-blue whitespace-nowrap">$350.00</span></div>
        </div>
      </div>

      <!-- Formas de Pago (navy) -->
      <div class="bg-up-blue-dark rounded-3xl shadow-lg shadow-black/10 p-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 22px 22px;"></div>
        <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full bg-up-blue blur-[80px] opacity-60 pointer-events-none"></div>

        <h3 class="relative z-10 text-lg font-semibold text-white tracking-tight mb-5">Formas de Pago</h3>

        <div class="relative z-10 space-y-4">
          <!-- SPEI -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4">
            <p class="text-sm font-semibold text-white">Transferencia SPEI</p>
            <p class="text-xs font-medium text-up-green/90 tracking-wide mb-2">BANCO SANTANDER</p>
            <p class="font-mono text-sm text-white tracking-wider bg-white/5 border border-white/10 rounded-lg px-3 py-2 mb-2 break-words">0146 5065 5089 8992 14</p>
            <p class="text-xs text-blue-100/80 leading-relaxed">Sociedad para el fomento de la educación y la salud de la mixteca S.C.</p>
            <p class="text-[11px] text-blue-100/60 mt-1">RFC: FES070703IM6</p>
          </div>
          <!-- Depósito -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4">
            <p class="text-sm font-semibold text-white">Depósito en banco</p>
            <p class="text-xs font-medium text-up-green/90 tracking-wide mb-2">BANCO SANTANDER</p>
            <p class="font-mono text-sm text-white tracking-wider bg-white/5 border border-white/10 rounded-lg px-3 py-2 mb-2 break-words">6550 8989 921</p>
            <p class="text-xs text-blue-100/80 leading-relaxed">Sociedad para el fomento de la educación y la salud de la mixteca S.C.</p>
            <p class="text-[11px] text-blue-100/60 mt-1">RFC: FES070703IM6</p>
          </div>
          <!-- Caja -->
          <div class="bg-white/5 border border-white/10 rounded-2xl p-4">
            <p class="text-sm font-semibold text-white">Caja de la Institución</p>
            <p class="text-xs text-blue-100/80 mt-0.5">Pago en efectivo</p>
          </div>
        </div>
      </div>

    </aside>
  </div>
</section>

<!-- ===================== TABULADOR: EGRESO Y TITULACIÓN ===================== -->
<section class="py-16 lg:py-24 px-6 bg-gray-50/50 border-y border-gray-100 relative overflow-hidden">
  <!-- Fondo decorativo -->
  <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute -top-28 -right-28 w-96 h-96 bg-up-blue/8 rounded-full blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-96 h-96 bg-up-green/8 rounded-full blur-3xl"></div>
  </div>

  <div class="max-w-7xl mx-auto relative z-10">
    <!-- Encabezado de sección -->
    <div class="text-center max-w-3xl mx-auto mb-12 lg:mb-16">
      <h2 class="text-up-blue text-base font-medium tracking-tight mb-3 uppercase">Tabulador</h2>
      <h3 class="text-3xl md:text-4xl font-semibold text-up-text tracking-tight mb-4">
        Conceptos de Egreso y Titulación
      </h3>
      <p class="text-lg text-gray-600 font-normal">
        Desglose de los trámites administrativos por nivel académico. Acércate a
        servicios escolares para conocer el detalle de cada paquete.
      </p>
    </div>

    <!-- Dos paneles: Licenciatura / Maestría -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">

      <!-- Nivel Licenciatura -->
      <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-up-blue/5 to-transparent rounded-full blur-2xl pointer-events-none -translate-y-1/3 translate-x-1/4"></div>
        <div class="flex items-center gap-3 mb-6 relative z-10">
          <div class="w-11 h-11 rounded-2xl bg-blue-50 text-up-blue flex items-center justify-center">
            <i data-lucide="graduation-cap" class="w-6 h-6" stroke-width="1.5"></i>
          </div>
          <h4 class="text-xl font-semibold text-up-text tracking-tight">Nivel Licenciatura</h4>
        </div>
        <ul class="divide-y divide-gray-100 relative z-10">
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Paquete de Titulación</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$17,500.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Liberación de no adeudos y biblioteca</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$1,200.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Certificado Parcial</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$1,500.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Curso Seminario de Tesis</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$4,000.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Revisión de Proyectos</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$2,500.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Examen Profesional (Proyecto o Tesis)</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$4,000.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Examen General de Conocimientos</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$5,000.00</span></li>
        </ul>
      </div>

      <!-- Nivel Maestría -->
      <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-6 sm:p-8 relative overflow-hidden ring-1 ring-up-green/20">
        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-bl from-up-green/5 to-transparent rounded-full blur-2xl pointer-events-none -translate-y-1/3 translate-x-1/4"></div>
        <div class="flex items-center gap-3 mb-6 relative z-10">
          <div class="w-11 h-11 rounded-2xl bg-green-50 text-up-green flex items-center justify-center">
            <i data-lucide="book-open" class="w-6 h-6" stroke-width="1.5"></i>
          </div>
          <h4 class="text-xl font-semibold text-up-text tracking-tight">Nivel Maestría</h4>
        </div>
        <ul class="divide-y divide-gray-100 relative z-10">
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Paquete de Titulación</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$18,000.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Liberación de no adeudos y biblioteca</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$1,200.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Certificado Parcial</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$1,500.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Curso Seminario de Tesis</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$4,000.00</span></li>
          <li class="flex items-center justify-between gap-4 py-4 group"><span class="text-base text-gray-700 group-hover:text-up-text transition-colors">Examen Profesional en Defensa de Tesis</span><span class="text-lg font-semibold text-up-blue whitespace-nowrap">$4,000.00</span></li>
        </ul>
      </div>

    </div>
  </div>
</section>

<!-- ===================== CTA FINAL ===================== -->
<section class="bg-up-green  py-8 lg:py-10 px-6">
  <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-6">
    <div class="text-center md:text-left">
      <h2 class="text-xl md:text-2xl font-semibold text-up-blue-dark tracking-tight">Estamos aquí para ayudarte</h2>
      <p class="text-up-blue-dark mt-1">Resolvemos tus dudas sobre costos y trámites escolares.</p>
    </div>
    <a href="#contacto" class="w-full md:w-auto inline-flex items-center justify-center gap-2 px-7 py-3.5 text-sm font-semibold rounded-xl text-white bg-slate-900 hover:bg-slate-800 transition-colors shadow-sm shrink-0">
      Solicita informes
      <i data-lucide="arrow-right" class="w-4 h-4" stroke-width="2"></i>
    </a>
  </div>
</section>

<?php get_footer(); ?>