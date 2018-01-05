<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package radian
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="d-flex header justify-content-center">
        <h1 class="sr-only">
		    <?php the_title(); ?>
        </h1>
	</header>

	<section>
		<?php
			the_content();
		?>
	</section><!-- .entry-content -->

</article>
