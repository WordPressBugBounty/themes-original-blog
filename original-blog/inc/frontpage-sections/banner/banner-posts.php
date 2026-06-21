<?php
$banner_posts_query = new WP_Query( $banner_posts_args );
if ( $banner_posts_query->have_posts() ) {
	?>
	<div class="main-banner-posts">
		<div class="content-wrap banner-carousel artify-navigation">
			<?php
			while ( $banner_posts_query->have_posts() ) :
				$banner_posts_query->the_post();
				?>
				<div class="carousel-container">
					<div class="single-card-container tile-card">
						<div class="single-card-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<div class="single-card-detail">
							<div class="card-categories">
								<?php original_blog_categories_list(); ?>
							</div>
							<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="card-meta">
								<?php
								original_blog_posted_by();
								original_blog_posted_on();
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}