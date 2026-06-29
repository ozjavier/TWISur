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
            <?php
            iup_render_social_links( array(
                'wrapper_class' => 'flex space-x-4',
                'link_class'    => 'w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-800 hover:text-up-green hover:border-up-green/40 transition-all',
                'icon_class'    => 'w-5 h-5',
            ) );
            ?>
          </div>

          <!-- Nav -->
          <div>
            <h4 class="text-lg font-semibold text-up-blue-dark mb-6">Navega</h4>
            <ul class="space-y-2">
              <li>
                <a
                  href="https://iup-sur.edu.mx/"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Inicio
                </a>
              </li>
              <li>
                <a
                  href="https://iup-sur.edu.mx/conocenos/"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Conócenos
                </a>
              </li>
              <li>
                <a
                  href="https://iup-sur.edu.mx/#Programas"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Oferta Educativa
                </a>
              </li>
              <li>
                <a
                  href="https://iup-sur.edu.mx/contacto/"
                  class="text-base text-slate-800 hover:text-up-green transition-colors"
                >
                  Contacto
                </a>
              </li>
            </ul>
          </div>

          <!-- Contact -->
          <div id="contacto">
            <h4 class="text-lg font-semibold text-up-blue-dark mb-6">Contacto</h4>
              <ul class="space-y-2">
                <?php if ( iup_contact( 'address' ) ) : ?>
                <li class="flex items-start gap-3 text-base text-slate-800">
                  <i data-lucide="map-pin" class="w-5 h-5 text-up-blue shrink-0 mt-0.5" stroke-width="1.5"></i>
                  <span><?php echo nl2br( esc_html( iup_contact( 'address' ) ) ); ?></span>
                </li>
                <?php endif; ?>

                <?php if ( iup_contact( 'phone' ) ) : ?>
                <li class="flex items-center gap-3 text-base text-slate-800">
                  <i data-lucide="phone" class="w-5 h-5 text-up-blue shrink-0" stroke-width="1.5"></i>
                  <a href="tel:<?php echo esc_attr( preg_replace( '/[^\d+]/', '', iup_contact( 'phone' ) ) ); ?>" class="hover:text-up-blue transition-colors">
                    <?php echo esc_html( iup_contact( 'phone' ) ); ?>
                  </a>
                </li>
                <?php endif; ?>

                <?php if ( iup_whatsapp_url() ) : ?>
                <li class="flex items-center gap-3 text-base text-slate-800">
                  <?php echo iup_whatsapp_svg( 'w-5 h-5 text-up-blue shrink-0 fill-current' ); ?>
                  <a href="<?php echo esc_url( iup_whatsapp_url() ); ?>" target="_blank" rel="noopener noreferrer" class="hover:text-up-blue transition-colors">
                    Contactar vía WhatsApp
                  </a>
                </li>
                <?php endif; ?>
              </ul>
          </div>

          <!-- Certs -->
          <div>
            <h4 class="text-lg font-semibold text-up-blue-dark mb-6">
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
            <a
              href="https://iup-sur.edu.mx/costos-iup/"
              class="text-sm text-slate-500 hover:text-slate-900 transition-colors"
            >
              Costos IUP
            </a>            
          </div>
        </div>
      </div>
    </footer>


<?php wp_footer(); ?>
</body>
</html>