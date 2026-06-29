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
          <a href="https://iup-sur.edu.mx/" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/alter-logoiup.svg' ) ); ?>" class="h-full w-auto max-h-[60px]" alt="Logo Instituto Universitario">
          </a>

          <!-- Desktop Menu -->
          <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'hidden lg:flex items-center space-x-8 font-bold',
                'walker'         => new IUP_Desktop_Walker(),
                'fallback_cb'    => false,
                'depth'          => 0,
            ) );
            ?>

          <!-- Social & CTA -->
          <?php
          iup_render_social_links( array(
              'wrapper_class' => 'hidden lg:flex items-center space-x-4',
              'link_class'    => 'text-white hover:text-up-green transition-colors',
              'icon_class'    => 'w-5 h-5',
          ) );
          ?>

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
    <?php
    wp_nav_menu( array(
        'theme_location' => 'primary',
        'container'      => false,
        'menu_class'     => 'space-y-1',
        'walker'         => new IUP_Mobile_Walker(),
        'fallback_cb'    => false,
        'depth'          => 0,
    ) );
    ?>

    <!-- Panel footer: CTA + redes -->
    <?php
    iup_render_social_links( array(
        'wrapper_class' => 'flex items-center justify-center gap-6',
        'link_class'    => 'text-white hover:text-up-green transition-colors',
        'icon_class'    => 'w-5 h-5',
    ) );
    ?>

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