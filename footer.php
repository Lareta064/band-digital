    <!--  FOOTER AREA START  -->
    <section id="footer" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-sm-8 col-md-8">
            <div class="footer-widget footer-link">
              <h4>Мы заботимся о том, чтобы вы <br />быстро развивали свой бизнес</h4>
              <p>
                Маркетинговое и диджитал агентство полного цикла: мы решаем задачи по продвижению и рекламе, делаем
                сайты и презентации, чтобы это не пришлось делать вам.
              </p>
            </div>
          </div>
          <div class="col-lg-2 col-sm-4 col-md-4">
           
            <div class="footer-widget footer-link">
              <h4>Информация</h4>
              <?php
                  wp_nav_menu([
                    'theme_location' => 'footer_left',
                    'container'       => false,
                    'container_class' => false,
                    'container_id'    => false,
                    'menu_class'      => false,
                    'menu_id'         => false,
                    'echo'            => true,
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 2,
                    'walker'          => new  WP_Bootstrap_Navwalker(),
                  ]);
              ?>

            </div>
          </div>

          <div class="col-lg-2 col-sm-6 col-md-6">
            <div class="footer-widget footer-link">
              <h4>Сылки</h4>
              <?php
                  wp_nav_menu([
                    'theme_location' => 'footer_right',
                    'container'       => false,
                    'container_class' => false,
                    'container_id'    => false,
                    'menu_class'      => false,
                    'menu_id'         => false,
                    'echo'            => true,
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 2,
                    'walker'          => new  WP_Bootstrap_Navwalker(),
                  ]);
              ?> 
              
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 col-md-6">
             <?php get_sidebar('contacts'); ?>   
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="footer-copy">© <?php  echo date('Y '); echo get_bloginfo('name');?>  inc. Все права защищены.</div>
          </div>
        </div>
      </div>
    </section>
    <!--  FOOTER AREA END  -->

    <!-- 
    Essential Scripts
    =====================================-->

    <!-- Main jQuery -->
  <?php wp_footer();?>
  </body>
</html>
