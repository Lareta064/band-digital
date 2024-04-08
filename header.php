<!DOCTYPE html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="seo & digital marketing" />
    <meta
      name="keywords"
      content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company"
    />
   <?php wp_head();?>
    <title>Promodise - seo and digital агентство</title>

  </head>

  <body data-spy="scroll" data-target=".fixed-top">
    <nav class="navbar navbar-expand-lg fixed-top trans-navigation">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" alt="" class="img-fluid b-logo" />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#mainNav"
          aria-controls="mainNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon">
            <i class="fa fa-bars"></i>
          </span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
          <?php
          wp_nav_menu([
					'theme_location' => 'header',
					'container'       => false,
					'container_class' => false,
					'container_id'    => false,
					'menu_class'      => 'nav navbar-nav menu_nav justify-content-center',
					'menu_id'         => false,
					'echo'            => true,
					'items_wrap'      => '<ul  class="%2$s">%3$s</ul>',
					'depth'           => 2,
          'walker'          => new  WP_Bootstrap_Navwalker(),
				]);
          
          ?>
          <!-- <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/"> Главная </a>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarWelcome"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
                >О нас</a
              >
              <div class="dropdown-menu" aria-labelledby="navbarWelcome">
                <a class="dropdown-item" href="about.html"> О компании </a>
                <a class="dropdown-item" href="about.html"> Об услугах </a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link smoth-scroll" href="service.html">Услуги</a>
            </li>
            <li class="nav-item">
              <a class="nav-link smoth-scroll" href="pricing.html">Цены</a>
            </li>
            <li class="nav-item">
              <a class="nav-link smoth-scroll" href="blog.html">Журнал</a>
            </li>
            <li class="nav-item">
              <a class="nav-link smoth-scroll" href="contact.html">Контакты</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>
    <!--MAIN HEADER AREA END -->