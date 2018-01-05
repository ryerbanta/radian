<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package radian
 */

get_header(); ?>

    <main id="main" class="d-flex justify-content-center pb-2 pb-lg-4 pt-2 pt-lg-4">

    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'resources/template-parts/content', get_post_type() );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

    </main><!-- #main -->

<?php
get_footer();
