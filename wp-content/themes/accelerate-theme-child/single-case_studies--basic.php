<?php
/**
 * The template for displaying case studies
 *
 *
 * @package WordPress
 * @subpackage Accelerate_Theme
 * @since Accelerate Theme 1.1
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
                $image_3 = get_field('image_3'); ?>

                <article class="case-study">
                    <aside class="case-study-sidebar">
                        <!-- standard title tag -->
                        <h2><?php the_title(); ?></h2>
                        <!-- everything below uses the variables assigned above -->
                        <h5><?php echo $services ?></h5>
                        <h6><?php echo $client ?></h6>

                        <?php the_content(); ?>
                        <p><strong><a href="<?php echo $link; ?>">Site Link</a></strong></p>
                    </aside>

                    <div class="case-study-images">
                        <!-- Print the images out only if they exist (prevents broken images). Note: uses variables assigned above lines 21-23 -->
                        <?php if($image_1) { ?>
                            <img src="<?php echo $image_1; ?>" />
                        <?php } ?>
                        <?php if($image_2) { ?>
                            <img src="<?php echo $image_2; ?>" />
                        <?php } ?>
                        <?php if($image_3) { ?>
                            <img src="<?php echo $image_3; ?>" />
                        <?php } ?>
                    </div>

                    <?php 
                    /* NOTE THIS IS THE BASIC VERSION.

                    To get more options with WP images, instead of setting the ACF images to "image URL" 
                    by using  <img src="<?php echo $image_3; ?>" />

                    Instead, we set the image to "image ID" in ACF settings and use:

                        echo wp_get_attachment_image( $image_1, $size );

                    Because this will allow you to take advantage of a bunch of awesome WordPress functionality like captions and sizes and cool stuff like that. 
                    When we put the images within an HTML5 <figure> tag it will automatically load captions.

                    That is why this file is called "single-case_studies--basic.php" (because "image ID" is not being used).

                    The file used in this project is using this more advanced technique and is called: 
                    "single-case_studies.php"

                    Keep in mind, if you want to revert to this more basic version, you would need to change the ACF settings for the images to "image URL" again. Currently, they are set for "image ID" to take advantage of the more advanced stuff beyond this basic version.

                    */ ?>

            <?php endwhile; // end of the loop. ?>

        </div><!-- #content -->
    </div><!-- #primary -->
<?php get_footer(); ?>