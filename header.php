<!doctype html>
<html <?php language_attributes(); ?> class="scroll-smooth">

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Instituto Universitario - Región Sur de Puebla</title>
  <?php wp_head(); ?>

  <style>
    /* ===== Menú móvil ===== */
    #mobile-menu { opacity: 0; visibility: hidden; transition: opacity .3s ease, visibility .3s ease; }
    #mobile-menu.open { opacity: 1; visibility: visible; }

    #mobile-menu-panel { transform: translateX(100%); transition: transform .35s cubic-bezier(.4, 0, .2, 1); }
    #mobile-menu.open #mobile-menu-panel { transform: translateX(0); }

    /* Acordeón de submenús (anida sin límite): 0fr → 1fr anima sin saber la altura */
    .submenu { display: grid; grid-template-rows: 0fr; transition: grid-template-rows .3s ease; }
    .submenu.open { grid-template-rows: 1fr; }
    .submenu-inner { overflow: hidden; }

    .submenu-chevron { transition: transform .3s ease; }
    .submenu-toggle[aria-expanded="true"] .submenu-chevron { transform: rotate(180deg); }
  </style>
</head>


<body <?php body_class('antialiased selection:bg-up-green/70 selection:text-black overflow-x-hidden'); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="fixed w-full z-50 transition-all">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 animate-fade-in-down">
        <div class="flex justify-between items-center h-26">
          <!-- Logo -->
          <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/alter-logoiup.svg' ) ); ?>" class="h-full w-auto max-h-[60px]" alt="Logo Instituto Universitario">
          </div>

          <!-- Desktop Menu -->
          <div class="hidden lg:flex items-center space-x-8 font-bold">
            <a
              href="#"
              class="text-lg text-white hover:text-up-green transition-colors"
            >
              Inicio
            </a>
            <a
              href="#conocenos"
              class="text-lg text-white hover:text-up-green transition-colors"
            >
              Conócenos
            </a>
            <a
              href="#oferta"
              class="text-lg text-white hover:text-up-green transition-colors"
            >
              Oferta educativa
            </a>
            <a
              href="#servicios"
              class="text-lg text-white hover:text-up-green transition-colors"
            >
              Servicios
            </a>
            <a
              href="#contacto"
              class="text-lg text-white hover:text-up-green transition-colors"
            >
              Contacto
            </a>
          </div>

          <!-- Social & CTA -->
          <div class="hidden lg:flex items-center space-x-4">
  <a href="#" class="text-white hover:text-up-green transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
      <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
    </svg>
  </a>
  <a href="#" class="text-white hover:text-up-green transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
      <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
      <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
      <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
    </svg>
  </a>
  <a href="#" class="text-white hover:text-up-green transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
      <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.74a4.85 4.85 0 0 1-1.01-.05z"/>
    </svg>
  </a>
  <a href="#" class="text-white hover:text-up-green transition-colors">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
      <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.988l4.265 5.638 4.741-5.638Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z"/>
    </svg>
  </a>
          </div>

          <!-- Mobile menu button -->
          <div class="lg:hidden flex items-center">
            <button id="mobile-menu-button" type="button" class="text-white hover:text-up-green transition-colors" aria-label="Abrir menú" aria-controls="mobile-menu" aria-expanded="false">
              <i data-lucide="menu" class="w-6 h-6" stroke-width="1.5"></i>
            </button>
          </div>
        </div>
      </div>
</header>

<!-- ===== Mobile menu ===== -->
<div id="mobile-menu" class="fixed inset-0 z-[60] lg:hidden" aria-hidden="true">
  <!-- Backdrop -->
  <div id="mobile-menu-backdrop" class="absolute inset-0 bg-black/60 backdrop-blur-sm"></div>

  <!-- Panel -->
  <div id="mobile-menu-panel" class="absolute right-0 top-0 h-full w-[86%] max-w-sm bg-up-blue-dark/95 backdrop-blur-xl border-l border-white/10 shadow-2xl flex flex-col">

    <!-- Panel header -->
    <div class="flex items-center justify-between px-6 h-26 border-b border-white/10 shrink-0">
      <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/alter-logoiup.svg' ) ); ?>" class="h-auto w-auto max-h-[48px]" alt="Logo Instituto Universitario">
      <button id="mobile-menu-close" type="button" class="text-white hover:text-up-green transition-colors" aria-label="Cerrar menú">
        <i data-lucide="x" class="w-6 h-6" stroke-width="1.5"></i>
      </button>
    </div>

    <!-- Nav -->
    <nav class="flex-1 overflow-y-auto px-4 py-6">
      <ul class="space-y-1">

        <!-- Item simple -->
        <li>
          <a href="#" class="flex items-center px-3 py-3 text-lg font-bold text-white hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">
            Inicio
          </a>
        </li>

        <!-- Item con submenú -->
        <li>
          <button type="button" class="submenu-toggle w-full flex items-center justify-between px-3 py-3 text-lg font-bold text-white hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">
            <span>Conócenos</span>
            <i data-lucide="chevron-down" class="submenu-chevron w-5 h-5 text-up-green" stroke-width="2"></i>
          </button>
          <div class="submenu">
            <div class="submenu-inner">
              <ul class="ml-3 my-1 pl-3 border-l border-white/10 space-y-1">
                <li><a href="#conocenos" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Misión y visión</a></li>
                <li><a href="#" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Historia</a></li>
                <li><a href="#" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Instalaciones</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Item con submenú + submenús anidados -->
        <li>
          <button type="button" class="submenu-toggle w-full flex items-center justify-between px-3 py-3 text-lg font-bold text-white hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">
            <span>Oferta educativa</span>
            <i data-lucide="chevron-down" class="submenu-chevron w-5 h-5 text-up-green" stroke-width="2"></i>
          </button>
          <div class="submenu">
            <div class="submenu-inner">
              <ul class="ml-3 my-1 pl-3 border-l border-white/10 space-y-1">

                <!-- Submenú anidado (nivel 2) -->
                <li>
                  <button type="button" class="submenu-toggle w-full flex items-center justify-between px-3 py-2.5 text-base font-semibold text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">
                    <span>Licenciaturas</span>
                    <i data-lucide="chevron-down" class="submenu-chevron w-4 h-4 text-up-green" stroke-width="2"></i>
                  </button>
                  <div class="submenu">
                    <div class="submenu-inner">
                      <ul class="ml-3 my-1 pl-3 border-l border-white/10 space-y-0.5">
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Ciencias Forenses</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Derecho</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Criminología</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Psicología</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Enfermería</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Administración de Empresas</a></li>
                      </ul>
                    </div>
                  </div>
                </li>

                <!-- Otro submenú anidado (nivel 2) -->
                <li>
                  <button type="button" class="submenu-toggle w-full flex items-center justify-between px-3 py-2.5 text-base font-semibold text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">
                    <span>Maestrías</span>
                    <i data-lucide="chevron-down" class="submenu-chevron w-4 h-4 text-up-green" stroke-width="2"></i>
                  </button>
                  <div class="submenu">
                    <div class="submenu-inner">
                      <ul class="ml-3 my-1 pl-3 border-l border-white/10 space-y-0.5">
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Educación</a></li>
                        <li><a href="#" class="block px-3 py-2 text-sm text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Intervención Pedagógica</a></li>
                      </ul>
                    </div>
                  </div>
                </li>

                <!-- Subitem simple (nivel 1) -->
                <li><a href="#oferta" class="block px-3 py-2.5 text-base font-semibold text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Incorporación UNAM</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Item con submenú -->
        <li>
          <button type="button" class="submenu-toggle w-full flex items-center justify-between px-3 py-3 text-lg font-bold text-white hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">
            <span>Servicios</span>
            <i data-lucide="chevron-down" class="submenu-chevron w-5 h-5 text-up-green" stroke-width="2"></i>
          </button>
          <div class="submenu">
            <div class="submenu-inner">
              <ul class="ml-3 my-1 pl-3 border-l border-white/10 space-y-1">
                <li><a href="#servicios" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Becas</a></li>
                <li><a href="#" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Biblioteca</a></li>
                <li><a href="#" class="block px-3 py-2.5 text-base font-medium text-slate-200 hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">Bolsa de trabajo</a></li>
              </ul>
            </div>
          </div>
        </li>

        <!-- Item simple -->
        <li>
          <a href="#contacto" class="flex items-center px-3 py-3 text-lg font-bold text-white hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">
            Contacto
          </a>
        </li>

      </ul>
    </nav>

    <!-- Panel footer: CTA + redes -->
    <div class="px-6 py-5 border-t border-white/10 shrink-0">
      <a href="#contacto" class="block w-full text-center bg-up-green text-black font-semibold py-3 rounded-lg hover:bg-[#47a23e] transition-colors mb-5">
        Informes
      </a>
      <div class="flex items-center justify-center gap-6">
        <a href="#" aria-label="Facebook" class="text-white hover:text-up-green transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
          </svg>
        </a>
        <a href="#" aria-label="Instagram" class="text-white hover:text-up-green transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
            <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
          </svg>
        </a>
        <a href="#" aria-label="TikTok" class="text-white hover:text-up-green transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.74a4.85 4.85 0 0 1-1.01-.05z"/>
          </svg>
        </a>
        <a href="#" aria-label="X" class="text-white hover:text-up-green transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.988l4.265 5.638 4.741-5.638Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</div>

<main class="">

<script>
  (function () {
    var header = document.getElementById('site-header');
    var scrolledClass = ['bg-up-blue-dark/90', 'backdrop-blur-md', 'border-b', 'border-up-green','border-b-1'];

    function onScroll() {
      if (window.scrollY > 0) {
        header.classList.add(...scrolledClass);
      } else {
        header.classList.remove(...scrolledClass);
      }
    }

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll(); // estado inicial por si la página carga con scroll
  })();

  /* ===== Menú móvil: abrir/cerrar + acordeones anidados ===== */
  (function () {
    var menu = document.getElementById('mobile-menu');
    var openBtn = document.getElementById('mobile-menu-button');
    var closeBtn = document.getElementById('mobile-menu-close');
    var backdrop = document.getElementById('mobile-menu-backdrop');
    if (!menu || !openBtn) return;

    function openMenu() {
      menu.classList.add('open');
      menu.setAttribute('aria-hidden', 'false');
      openBtn.setAttribute('aria-expanded', 'true');
      document.documentElement.style.overflow = 'hidden';
    }
    function closeMenu() {
      menu.classList.remove('open');
      menu.setAttribute('aria-hidden', 'true');
      openBtn.setAttribute('aria-expanded', 'false');
      document.documentElement.style.overflow = '';
    }

    openBtn.addEventListener('click', openMenu);
    if (closeBtn) closeBtn.addEventListener('click', closeMenu);
    if (backdrop) backdrop.addEventListener('click', closeMenu);
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && menu.classList.contains('open')) closeMenu();
    });

    /* Acordeón: cada toggle abre/cierra el .submenu que le sigue (cualquier nivel) */
    menu.querySelectorAll('.submenu-toggle').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var expanded = btn.getAttribute('aria-expanded') === 'true';
        btn.setAttribute('aria-expanded', String(!expanded));
        var sub = btn.nextElementSibling;
        if (sub && sub.classList.contains('submenu')) {
          sub.classList.toggle('open', !expanded);
        }
      });
    });

    /* Al tocar un enlace real, cierra el menú */
    menu.querySelectorAll('a[href]').forEach(function (a) {
      a.addEventListener('click', closeMenu);
    });
  })();
</script>