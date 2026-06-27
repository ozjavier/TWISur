<!-- footer.php -->
</main>

<footer class="bg-white pt-14 md:pt-20 pb-10 border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-8 md:mb-16"
        >
          <!-- Brand -->
          <div class="space-y-6">
          <div class="flex items-center gap-2 cursor-pointer">
            <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/logoiup.svg' ) ); ?>" class="h-full w-full max-w-fit max-h-[120px] antialiased" alt="Logo Instituto Universitario">
          </div>
            <p class="text-base text-slate-800 font-light">
              Instituto Universitario para la Región Sur de Puebla. Formando
              líderes con excelencia internacional.
            </p>
            <div class="flex space-x-4">
              <!-- Facebook -->
              <a
                href="#"
                aria-label="Facebook"
                class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-800 hover:text-up-green hover:border-up-green/40 transition-all"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                </svg>
              </a>
              <!-- Instagram -->
              <a
                href="#"
                aria-label="Instagram"
                class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-800 hover:text-up-green hover:border-up-green/40 transition-all"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                  <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                  <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                </svg>
              </a>
              <!-- TikTok -->
              <a
                href="#"
                aria-label="TikTok"
                class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-800 hover:text-up-green hover:border-up-green/40 transition-all"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.74a4.85 4.85 0 0 1-1.01-.05z"/>
                </svg>
              </a>
              <!-- X -->
              <a
                href="#"
                aria-label="X"
                class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-800 hover:text-up-green hover:border-up-green/40 transition-all"
              >
                <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                  <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.988l4.265 5.638 4.741-5.638Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z"/>
                </svg>
              </a>
            </div>
          </div>

          <!-- Nav -->
          <div>
            <h4 class="text-lg font-semibold text-slate-900 mb-6">Navega</h4>
            <ul class="space-y-2">
              <li>
                <a
                  href="#"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Inicio
                </a>
              </li>
              <li>
                <a
                  href="#conocenos"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Conócenos
                </a>
              </li>
              <li>
                <a
                  href="#oferta"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Oferta Educativa
                </a>
              </li>
              <li>
                <a
                  href="#servicios"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Servicios
                </a>
              </li>
              <li>
                <a
                  href="#contacto"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Contacto
                </a>
              </li>
            </ul>
          </div>

          <!-- Contact -->
          <div id="contacto">
            <h4 class="text-lg font-semibold text-slate-900 mb-6">Contacto</h4>
            <ul class="space-y-2">
              <li class="flex items-start gap-3 text-base text-slate-800">
                <i
                  data-lucide="map-pin"
                  class="w-5 h-5 text-up-blue shrink-0 mt-0.5"
                  stroke-width="1.5"
                ></i>
                <span class="">Atlixco, Puebla, México.</span>
              </li>
              <li class="flex items-center gap-3 text-base text-slate-800">
                <i
                  data-lucide="phone"
                  class="w-5 h-5 text-up-blue shrink-0"
                  stroke-width="1.5"
                ></i>
                <span class="">+52 244 144 9783</span>
              </li>

            </ul>
          </div>

          <!-- Certs -->
          <div>
            <h4 class="text-lg font-semibold text-slate-900 mb-6">
              Certificaciones
            </h4>
            <div
              class="flex items-start flex-col gap-3 opacity-80 grayscale hover:grayscale-0 transition-all duration-300"
            >
              <img src="<?php echo esc_url( get_theme_file_uri( 'assets/img/certificacion-bureau.svg' ) ); ?>" class="w-full max-w-fit h-auto max-h-[60px] brightness-0" alt="Certificación Bureau ISO 9001:2015">
              <div class="text-slate-800">
                <p class="text-pretty text-sm">
                  <strong class="text-[12px]">Institución Certificada Internacionalmente</strong>
                </p>
                <p>ISO 9001:2015 <br>NMX-CC-9001-IMNC-2015</p>
            </div>
            </div>
          </div>
        </div>

        <div
          class="pt-8 border-t border-slate-200 flex flex-col md:flex-row items-center justify-between gap-4"
        >
          <p class="text-center md:text-left text-sm text-slate-500 font-light">
            © 2026 Instituto Universitario de la Región Sur de Puebla. Todos los derechos
            reservados.
          </p>
          <div class="flex gap-6">
            <a
              href="#"
              class="text-sm text-slate-500 hover:text-slate-900 transition-colors"
            >
              Aviso de privacidad
            </a>
            <a
              href="#"
              class="text-sm text-slate-500 hover:text-slate-900 transition-colors"
            >
              Términos y condiciones
            </a>
          </div>
        </div>
      </div>
    </footer>


<?php wp_footer(); ?>
</body>
</html>