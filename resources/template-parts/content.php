<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package radian
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="h1">', '</h1>' );
		else :
			the_title( '<h2 class="h1"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<p class="small text-uppercase">
            <a href="<?php echo radian_get_blog_posts_page_url() ?>">DISCOVER</a> /
			<?php radian_posted_on(); ?>
		</p><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<section>
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'radian' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
		?>
	</section>

    <footer class="d-flex justify-content-center">

       <div class="col-md-8 col-lg-6 p-0">

            <div class="m-0 mb-3 mt-3 row">

                <?php
                $categories = get_the_terms( $post->ID, 'category' );
                if ($categories && ! is_wp_error($categories)): ?>
                    <?php foreach($categories as $category): ?>
                        <a href="<?php echo get_term_link( $category->slug, 'category'); ?>" rel="tag" class="btn btn-outline-primary btn-sm mr-2 text-lowercase <?php echo $category->slug; ?>"># <?php echo $category->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php
                $tags = get_the_terms( $post->ID, 'post_tag' );
                if ($tags && ! is_wp_error($tags)): ?>
                    <?php foreach($tags as $tag): ?>
                        <a href="<?php echo get_term_link( $tag->slug, 'post_tag'); ?>" rel="tag" class="btn btn-outline-primary btn-sm mr-2 text-lowercase <?php echo $tag->slug; ?>"># <?php echo $tag->name; ?></a>
                    <?php endforeach; ?>
                <?php endif; ?>


            </div>

            <a href="<?php echo radian_get_blog_posts_page_url() ?>" class="btn btn-primary">Back to Discover</a>

        </div>
    </footer>

</article>
