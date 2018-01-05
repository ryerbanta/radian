<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package radian
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="bg-dark d-flex justify-content-center pb-5 pt-5 text-white">

        <div class="col-md-8 col-lg-6 d-flex justify-content-between p-0">

            <div>

                <!--
                # Our logo. These are two separate `<svg>` blocks so that we can style them a little more easily.
                # For instance, whether we want to reorganize it based on screen size.
                -->
                <a class="align-items-center col d-flex p-0 radian__logo" href="<?php echo esc_url( home_url('/') ); ?>">

                    <span class="sr-only">Home</span>

                    <svg aria-labelledby="radianCircles radianCirclesDescription" class="col pl-0 pr-3" viewBox="0 0 150 150" xmlns="http://www.w3.org/2000/svg">

                        <title id="radianCircles">Circles</title>
                        <desc id="radianCirclesDescription">Circles inset in circles as if radiating outward.</desc>

                        <g transform="translate(-25 1)" stroke="#FFFFFF" stroke-width="3" fill="none" fill-rule="evenodd">
                            <circle opacity=".9" cx="100.3" cy="73.9" r="73.2"/>
                            <circle opacity=".5" cx="100.3" cy="73.9" r="55.5"/>
                            <circle opacity=".3" cx="100.3" cy="73.9" r="47.5"/>
                            <circle opacity=".7" cx="100.3" cy="73.9" r="65"/>
                            <circle opacity=".2" cx="100.3" cy="73.9" r="38.2"/>
                        </g>

                    </svg>

                    <svg aria-labelledby="radianLogo" class="col-8 p-0" viewBox="0 0 198 35" xmlns="http://www.w3.org/2000/svg">

                        <title id="radianLogo">Radian</title>

                        <g fill-rule="nonzero" fill="#FFFFFF">
                            <path d="M.2.4h9.4C15.5.4 20 3.9 20 9.7c0 4.6-2.9 8-7.4 8.8l9.2 15.9H18L9.5 19h-6v15.4H.3V.4H.2zm10 15.4c3.8-.2 6.6-2.2 6.6-6.2 0-4.1-3.1-6.4-7.2-6.4H3.4v12.6h6.8zM45.1.3h2.5l12.5 34h-3.5L54 26.9H38.6L36 34.3h-3.5L45.1.3zm7.8 23.5L46.3 5l-6.6 18.8h13.2zM74.1.3h8.4c10.9 0 17 6.1 17 17.2 0 10.7-6.2 16.7-17 16.7h-8.3V.3h-.1zm7.8 31c8 0 14.4-4.5 14.4-14 0-8.9-4.7-14.1-13.9-14.1h-5v28.2h4.5v-.1zM114.9.3h3.2v34h-3.2M144.8.3h2.5l12.5 34h-3.5l-2.6-7.4h-15.4l-2.6 7.4h-3.5l12.6-34zm7.8 23.5L146 5l-6.6 18.8h13.2zM173.8.3h5.4l14.7 31.5V.3h3.2v34h-5.5L177 2.8v31.5h-3.3V.3"/>
                        </g>

                    </svg>

                </a>

                <form action="/" class="align-items-center d-flex justify-content-center form mt-2" method="get" role="form">
                    <label for="s" class="sr-only">Search resources</label>
                    <input class="col form-control form-control-sm radian__input--transparent rounded-0" id="s" name="s" placeholder="Search" type="search" style="height: 33.555555px">
                    <button class="border-0 btn btn-secondary rounded-0" type="submit" style="height: 31px;">
                        <svg viewBox="0 0 32 32" fill="#ffffff" width="18px" height="18px">
                            <title>search</title>
                            <path d="M31.008 27.231l-7.58-6.447c-0.784-0.705-1.622-1.029-2.299-0.998 1.789-2.096 2.87-4.815 2.87-7.787 0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12c2.972 0 5.691-1.081 7.787-2.87-0.031 0.677 0.293 1.515 0.998 2.299l6.447 7.58c1.104 1.226 2.907 1.33 4.007 0.23s0.997-2.903-0.23-4.007zM12 20c-4.418 0-8-3.582-8-8s3.582-8 8-8 8 3.582 8 8-3.582 8-8 8z"></path>
                        </svg>
                    </button>
                </form>

            </div>

            <nav role="navigation">

                <?php  wp_nav_menu( array(
                    'container' => false,
                    'depth' => 1,
                    'menu_class' => 'list-unstyled small'
                ) ); ?>

            </nav>

        </div>

	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
