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
			'footer_left' => 'Меню в футере - левая колонка',
			'footer_right' => 'Меню в футере - правая колонка'
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
	
	// добавляем сайдбар
	add_action( 'widgets_init', 'bd_sidebar_init' );

	function bd_sidebar_init(){
		register_sidebar( array(
			'name'          => sprintf(__('Сайдбар на странице Блог') ),
			'id'            => "widget-sidebar",
			'description'   => '',
			'class'         => 'widget-sidebar-wrapper',
			'before_widget' => '<article  class="sidebar-widget ">',
			'after_widget'  => "</article>\n",
			'before_title'  => '<h5 class="mb-3">',
			'after_title'   => "</h5>\n",
			
		) );
	}

	/**
	 * Добавление нового виджета Download_Widget.
	 */
	class Download_Widget extends WP_Widget {

		// Регистрация виджета используя основной класс
		function __construct() {
			// вызов конструктора выглядит так:
			// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
			parent::__construct(
				'download_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: download_widget
				'Полезные ссылки',
				array( 'description' => 'Добавьте ссылки на полезные файлы', 'classname' => 'download' )
			);

			// скрипты/стили виджета, только если он активен
			// if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			// 	add_action('wp_enqueue_scripts', array( $this, 'add_download_widget_scripts' ));
			// 	add_action('wp_head', array( $this, 'add_download_widget_style' ) );
			// }
		}

		/**
		 * Вывод виджета во Фронт-энде
		 *
		 * @param array $args     аргументы виджета.
		 * @param array $instance сохраненные данные из настроек
		 */
		function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			$link_text = apply_filters( 'widget_link_text', $instance['link_text'] );
			$file = apply_filters( 'widget_file', $instance['file'] );

			echo $args['before_widget'];
			if ( ! empty( $title ) ) {
				echo $args['before_title'] . $title . $args['after_title'];
			}
			echo __( '<a href="'.$file.'"><i class="fa fa-file-pdf"></i>'. $link_text. '</a>', 'text_domain' );
			echo $args['after_widget'];
		}

		/**
		 * Админ-часть виджета
		 *
		 * @param array $instance сохраненные данные из настроек
		 */
		function form( $instance ) {
			$title = @ $instance['title'] ?: '';
			$link_text = @ $instance['link_text'] ?: 'Текст ссылки';
			$file = @ $instance['file'] ?: 'URL ссылки';

			?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'file' ); ?>"><?php _e( 'URL ссылки:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'file' ); ?>" name="<?php echo $this->get_field_name( 'file' ); ?>" type="text" value="<?php echo esc_attr( $file ); ?>">
			</p>
			<p>
				<label for="<?php echo $this->get_field_id( 'link_text' ); ?>"><?php _e( 'Текст ссылки:' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'link_text' ); ?>" name="<?php echo $this->get_field_name( 'link_text' ); ?>" type="text" value="<?php echo esc_attr( $link_text ); ?>">
			</p>			
			<?php
		}

		/**
		 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance новые настройки
		 * @param array $old_instance предыдущие настройки
		 *
		 * @return array данные которые будут сохранены
		 */
		function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['link_text'] = ( ! empty( $new_instance['link_text'] ) ) ? strip_tags( $new_instance['link_text'] ) : '';
			$instance['file'] = ( ! empty( $new_instance['file'] ) ) ? strip_tags( $new_instance['file'] ) : '';			
			return $instance;
		}

		// скрипт виджета
		function add_download_widget_scripts() {
			// фильтр чтобы можно было отключить скрипты
			if( ! apply_filters( 'show_my_widget_script', true, $this->id_base ) )
				return;

			$theme_url = get_stylesheet_directory_uri();

			wp_enqueue_script('my_widget_script', $theme_url .'/my_widget_script.js' );
		}

		// стили виджета
		function add_download_widget_style() {
			// фильтр чтобы можно было отключить стили
			if( ! apply_filters( 'show_my_widget_style', true, $this->id_base ) )
				return;
			?>
			<style type="text/css">
				.my_widget a{ display:inline; }
			</style>
			<?php
		}

	}
	// регистрация Download_Widget в WordPress
	add_action( 'widgets_init', 'register_download_widget' );

	function register_download_widget() {
		register_widget( 'Download_Widget' );
	}