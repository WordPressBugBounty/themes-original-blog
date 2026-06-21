<?php
$hot_topics_query = new WP_Query( $hot_topics_args );
if ( $hot_topics_query->have_posts() ) {
	?>
	<div class="banner-hot-topics">
		<div class="content-wrap">
			<?php
			while ( $hot_topics_query->have_posts() ) :
				$hot_topics_query->the_post();
				?>
				<div class="single-card-container list-card">
					<div class="single-card-image">
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					</div>
					<div class="single-card-detail">
						<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="card-meta">
								<?php
								original_blog_posted_on();
								?>
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
