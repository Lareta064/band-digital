<?php
	
	function bd_setup(){
	// возможность загрузить картинку логотипа в админке
		add_theme_support( 'custom-logo', [
			'height'      => '50',
			'width'       => '130',
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => '',
			]
	)	;
	};

	// возможность менять title
	add_theme_support('title-tag');
	//previe whis thumbnail
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 730, 480, true );//===свой размер миниатюры по умолчанию, параметр true делает точн по этому размеру===
	## отключаем создание миниатюр файлов для указанных размеров
	add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );

	function delete_intermediate_image_sizes( $sizes ){

		// размеры которые нужно удалить
		return array_diff( $sizes, [
			'medium_large',
			'large',
			'1536x1536',
			'2048x2048',
		] );
	}
	// create menus 
	function bd_menus(){
		$location = array(
			'header' => 'Меню в шапке',
			'footer' => 'Меню в подвале'
		);
		register_nav_menus($location);
	}
	 add_action('init', 'bd_menus');
	
	if ( ! file_exists( get_template_directory() . '/class-wp-bootstrap-navwalker.php' ) ) {
		// File does not exist... return an error.
		return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
	} else {
		// File exists... require it.
		require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
	}
	
	/* подключение стилей и скриптов */

	add_action( 'wp_enqueue_scripts', 'bd_scripts' );
	// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
	function bd_scripts() {
		
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css' , array());
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css' , array());
		wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/plugins/animate-css/animate.css' , array());
		wp_enqueue_style( 'icofont', get_template_directory_uri() . '/plugins/icofont/icofont.css' , array());
		wp_enqueue_style( 'main', get_template_directory_uri() . '/css/style.css' , array('icofont'));



		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery',  get_template_directory_uri() .'/plugins/jquery/jquery.min.js', array(), '1.0.0', true);
		
		
		wp_enqueue_script( 'popper', get_template_directory_uri() .'/plugins/bootstrap/js/popper.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/plugins/bootstrap/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'wow', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'easing', get_template_directory_uri() . '/plugins/counterup/jquery.easing.1.3.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'google-map', get_template_directory_uri() . '/plugins/google-map/gmap3.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'maps',  'https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap');
		wp_enqueue_script( 'contact', get_template_directory_uri() . '/plugins/jquery/contact.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
 
	}

	// свой класс построения меню:

	// удаляет H2 из шаблона пагинации
	add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
	function my_navigation_template( $template, $class ){
		/*
		Вид базового шаблона:
		<nav class="navigation %1$s" role="navigation">
			<h2 class="screen-reader-text">%2$s</h2>
			<div class="nav-links">%3$s</div>
		</nav>
		*/

		return '
		<nav class="navigation %1$s" role="navigation">
			<div class="nav-links">%3$s</div>
		</nav>
		';
	}

	// выводим пагинацию
	the_posts_pagination( array(
		'end_size' => 2,
	) );
?>