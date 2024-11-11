<div class="row">
	<div class="col-lg-12">
		<div class="blog-post">
			<!--<?php
				if( has_post_thumbnail() ) {
						the_post_thumbnail('large', array('class' => 'img-fluid'));
					}
				else {
					echo '<img src="'.get_template_directory_uri(  ).'/images/blog/blog-2.jpg" />';
				}
				
			?>-->
			<div class="mt-4 mb-3 d-flex">
				<div class="post-author mr-3">
					<i class="fa fa-user"></i>
					<span class="h6 text-uppercase"><?php the_author();?></span>
				</div>

				<div class="post-info">
					<i class="fa fa-calendar-check"></i>
					<span><? echo get_post_time( 'j F Y' );?></span>
				</div>
			</div>
			
			<?php the_content( );?>
			<div class="mt-5 mb-3">
				<h5 class="d-inline-block mr-3">Метки:</h5>
				<ul class="list-inline d-inline-block">
					<li class="list-inline-item"><a href="#">Agency</a>,</li>
					<li class="list-inline-item"><a href="#">Marketing</a>,</li>
					<li class="list-inline-item"><a href="#">Business</a></li>
				</ul>
			</div>
			<div class="my-4">
				<h5 class="d-inline-block mr-3">Поделитесь:</h5>
				<ul class="list-inline d-inline-block">
					<li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
					<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
				</ul>
			</div>
		</div>



	</div>
</div>