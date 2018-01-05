<?php
/**
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * ^ Hi, Michael here. I left this comment from Automattic because there's
 * something about "this is the WordPress construct of pages" that just
 * sounds unexpectedly scifi.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package radian
 */

get_header(); ?>

<main id="main" class="d-flex justify-content-center pb-2 pb-lg-4 pt-2 pt-lg-4" role="main">

    <?php
    while ( have_posts() ) : the_post();

        get_template_part( 'resources/template-parts/content', 'page' );

        /**
         * If comments are open and there is at least one, we'll
         * load the template.
         */
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<?php
get_footer();
