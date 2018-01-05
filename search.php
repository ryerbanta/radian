<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package radian
 */

get_header(); ?>

    <main id="main" class="pb-0 pt-2 pt-lg-4">

        <header class="header">
            <h1>Discover</h1>
            <h2 class="h3"><?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search: %s', 'radian' ), '<span>' . get_search_query() . '</span>' );
            ?></h2>
        </header><!-- .page-header -->

        <form action="/" class="d-flex justify-content-center form mb-4 mt-3" method="get" role="form">

            <div class="col-md-8 col-lg-6 d-flex form-group p-md-0">

                <label for="s" class="sr-only">Search resources</label>

                <input class="col form-control form-control-lg mr-3" id="s" name="s" placeholder="Search for another kind of resource" type="search">

                <button class="btn btn-primary" type="submit">Find</button>

            </div>

        </form>

        <div class="d-flex justify-content-center">

            <div class="col-md-8 col-lg-6 p-md-0">

                <?php
                $args = array(
                    'smallest'                  => 1,
                    'largest'                   => 1,
                    'unit'                      => 'rem',
                    'number'                    => 10,
                    'format'                    => 'flat',
                    'orderby'                   => 'count',
                    'order'                     => 'ASC',
                    'link'                      => 'view',
                    'separator'                 => "\n",
                    'taxonomy'                  => array('post_tag', 'category'),
                    'echo'                      => true,
                );
                wp_tag_cloud($args);
                ?>
            </div>

        </div>

        <section class="bg-primary mt-3 pb-5 pt-3 text-white">


            <?php
            if ( have_posts() ) : ?>

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php the_title( '<h3 class="h3 mt-5 text-white"><a class="text-white" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
                    <p>
                        <?php echo get_the_excerpt(); ?>
                    </p>

                    <div class="d-flex justify-content-center">

                        <div class="col-md-8 col-lg-6 p-md-0">
                            <?php
                            $categories = get_the_terms( $post->ID, 'category' );
                            if ($categories && ! is_wp_error($categories)): ?>
                                <?php foreach($categories as $category): ?>
                                    <a href="<?php echo get_term_link( $category->slug, 'category'); ?>" rel="tag" class="btn btn-primary btn-sm mr-2 text-lowercase <?php echo $category->slug; ?>" style="border-color: white;"># <?php echo $category->name; ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            <?php
                            $tags = get_the_terms( $post->ID, 'post_tag' );
                            if ($tags && ! is_wp_error($tags)): ?>
                                <?php foreach($tags as $tag): ?>
                                    <a href="<?php echo get_term_link( $tag->slug, 'post_tag'); ?>" rel="tag" class="btn btn-primary btn-sm mr-2 text-lowercase <?php echo $tag->slug; ?>" style="border-color: white;"># <?php echo $tag->name; ?></a>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                    </div>


                <?php endwhile; else : ?>

                <h3 class="h3 mt-5 text-white">Unfortunately, we couldn't find any resources with that term.</h3>

            <?php endif; ?>


        </section>

    </main><!-- #main -->

<?php
get_footer();
