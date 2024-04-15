<?php get_header(); ?>
<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
    <div class="overlay dark-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 m-auto text-center col-sm-12 col-md-12">
                <div class="banner-content content-padding">
                    <h1 class="text-white">
						<?php printf( esc_html__('Результаты по запросу : %s', 'band_digital'), '<span>' . get_search_query() . '</span>' );?></h1>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <?php 
                        $cnt = 0; // создается счетчки со значением стартовым = 0
                        if ( have_posts() ) : while ( have_posts() ) : the_post();  
                            $cnt++;
                            $ostatok = $cnt % 3;
                            switch($ostatok){
                                case(0):?>
                                    <div class="col-lg-12">
                                
                                <?php
                                break;
                                default:?>
                                    <div class="col-lg-6">
                                
                                <?php
                                break;
                            }?>

                                    <div class="blog-post">
                                        <?php 
                                            //должно находится внутри цикла
                                            if( has_post_thumbnail() ) {
                                                the_post_thumbnail('large', array('class' => 'img-fluid'));
                                            }
                                            else {
                                                echo '<img src="'.get_template_directory_uri(  ).'/images/blog/blog-2.jpg" />';
                                                }
                                            ?>
                                        <!-- <img src="images/blog/blog-1.jpg" alt="" class="img-fluid"> -->
                                        <div class="mt-4 mb-3 d-flex">
                                            <div class="post-author mr-3">
                                                <i class="fa fa-user"></i>
                                                <span class="h6 text-uppercase"><?php the_author(); ?></span>
                                            </div>

                                            <div class="post-info">
                                                <i class="fa fa-calendar-check"></i>
                                            <?php the_date( 'j F Y', '<span>', '</span>' ); ?>
                                            </div>
                                        </div>
                                        <a href="<? get_the_permalink(); ?>" class="h4 ">
                                            <? the_title();?>
                                        </a>
                                        <p class="mt-3"><? the_excerpt( );?></p>
                                        <a href="blog-single.html" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            <?php
                        endwhile; else: ?>
                        Записей нет.
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <?php
                        $paginArgs = array(
                            'show_all'     => false, // показаны все страницы участвующие в пагинации
                            'end_size'     => 1,     // количество страниц на концах
                            'mid_size'     => 1,     // количество страниц вокруг текущей
                            'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
                            'prev_text'    => __('«'),
                            'next_text'    => __('»'),
                            'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
                            'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
                            
                            'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
                        );
                        the_posts_pagination( $paginArgs );
                    ?>
                </div>            
            </div> <!--col-lg-8-->  
            <div class="col-lg-4">
                      <div class="row">

                        <div class="col-lg-12">
                            <?php dynamic_sidebar( 'widget-sidebar' ); ?> 
                        </div> 
                       
                    </div>
                </div>
            </div>   
        </div>
    </div>
</section>
<?php get_footer(); ?>