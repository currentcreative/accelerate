<?php
/**
 * The template for displaying the case studies archive page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 1.0
 */

get_header(); ?>

    <div id="primary" class="site-content">
        <div id="content" role="main">
            
            <?php while ( have_posts() ) : the_post(); 

                /* Get Advanced Custom Fieds and assign them to variables */
                $services = get_field('services');
                $client = get_field('client');
                $link = get_field('site_link');
                $image_1 = get_field('image_1');
                $image_2 = get_field('image_2');
                $image_3 = get_field('image_3'); 
                /* new variable for advanced image sizing (below) */
                $size = "full";
            ?>

                <article class="case-study">
                    <aside class="case-study-sidebar">
                        <!-- standard title tag -->
                        <h2><?php the_title(); ?></h2>
                        <!-- everything below uses the variables assigned above -->
                        <h5><?php echo $services ?></h5>
                        <h6><?php echo $client ?></h6>

                        <?php the_excerpt(); ?>
                        <p><strong><a href="<?php echo $link; ?>">Site Link</a></strong></p>
                    </aside>

                    <div class="case-study-images">
                        <!-- Print the images out only if they exist (prevents broken images). Note: uses variables assigned above lines 21-23 -->
                        <?php
                            if($image_1) {    
                                echo wp_get_attachment_image( $image_1, $size );
                            }
                        ?>
                    </div>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->


<?php get_footer(); ?>



            