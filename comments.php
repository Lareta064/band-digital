<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments my-4">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="mb-5">Комментарии:</h3>
		
		<?php the_comments_navigation(); ?>

		<ol class="comment-list p-0">
			<?php
			wp_list_comments(
				array(
					'walker'            => new Bootstrap_Walker_Comment(),
					'max_depth'         => '2',
					'style'             => 'ol',
					
					'type'              => 'all',
					'reply_text'        => __('Ответить <i class="fa fa-reply"></i>'),
					'page'              => '',
					'per_page'          => '10',
					'avatar_size'       => 80,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
					'short_ping'        => false,    // С версии 3.6,
					'echo'              => true,     // true или false
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bd' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$defaults = [
		'comment_field'        => '
									  <div class="form-group mb-3">
										<textarea id="comment" cols="30" rows="6" name="comment" class="form-control"  placeholder="Комментарий"  aria-required="true" required ></textarea>
									 </div>
								  ',
		
		'fields'               => [
			
			
			'author' => '<div class="row"><div class="col-md-6">
							<div class="form-group mb-3">
								<input type="text" name="author" class="form-control" required  value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="Имя">
							</div></div>',
			'email'  => '<div class="col-md-6">
			               <div class="form-group mb-3">
								<input type="email"  name="email" class="form-control" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"  required placeholder="Email">
							</div>
						</div></div>',
	
			'cookies' => '<p class="comment-form-cookies-consent">
			                  <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />
				              <label for="wp-comment-cookies-consent">Запомнить мои данные для этого сайта</label>
			            </p>',
		],

		'must_log_in'          => '<p class="must-log-in">' .
			sprintf( __( '<a href="%s">Войти</a> чтобы оставить комментарий' ), wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '
		</p>',
		'logged_in_as'         => '<p class="logged-in-as">' .
			sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s">Вы вошли как %2$s</a>. <a href="%3$s">Выйти?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '
		</p>',
		'comment_notes_before' => '<p class="comment-notes">
			<span id="email-notes">Ваш email защищен от спама</span>
		</p>',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_container'      => 'comment-respond',
		'class_form'           => 'comment-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'title_reply_before'   => '<h3 id="reply-title" class="mt-5 mb-2">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="btn btn-hero btn-circled" >Оставить комментарий</button>',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'html5',
	];

	comment_form( $defaults );
	?>

</div><!-- #comments -->


<div class="comments my-4">
	<h3 class="mb-5">Комментарии:</h3>

	<div class="media mb-4">
		<img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">
		<div class="media-body">
			<h5>Антон Колесников</h5>
			<span class="text-muted">20 января 2020</span>
			<p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>

			<a href="#" class="reply">Ответить <i class="fa fa-reply"></i></a>

				<div class="media mt-5">
					<img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">
					<div class="media-body">
						<h5>Егор Савицкий</h5>
						<span class="text-muted">20 января 2020</span>
						<p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>

						<a href="#" class="reply">Ответить <i class="fa fa-reply"></i></a>
					</div>
				</div>
		</div>
	</div>
	<div class="media mb-4">
		<img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">
		<div class="media-body">
			<h5>Валентин Крашков</h5>
			<span class="text-muted">14 февраля 2020</span>
			<p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>

			<a href="#" class="reply">Ответить <i class="fa fa-reply"></i></a>
		</div>
	</div>
</div>

<div class="mt-5 mb-3">
	<h3 class="mt-5 mb-2">Оставьте комментарий</h3>
	<p class="mb-4">Ваш E-mail защищен от спама</p>
	<form action="#" class="row">
		<div class="col-lg-12">
			<div class="form-group mb-3">
				<textarea cols="30" rows="6" class="form-control"  placeholder="Комментарий"></textarea>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group mb-3">
				<input type="text" class="form-control" placeholder="Имя">
			</div>
		</div>

		<div class="col-lg-6">
			<div class="form-group mb-4">
				<input type="email" class="form-control" placeholder="Email">
			</div>
		</div>

		<div class="col-lg-12">
			<a href="#" class="btn btn-hero btn-circled">Оставить комментарий</a>
		</div>
	</form>
</div>