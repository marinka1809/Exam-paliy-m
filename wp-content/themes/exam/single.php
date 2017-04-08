<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package exam
 */

get_header(); ?>

<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') 50% 50% no-repeat;">
    <div class="section bg">
        <div class="container">
            <h1><?php single_post_title();?> </h1>
        </div>
    </div>
</section>

<div class="container content">
    <div class="row">
        <main class="col-sm-8 singl-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content' );

			the_post_navigation();

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
        <?php get_sidebar();?>
	</div><!-- #primary -->

<?php

get_footer();
