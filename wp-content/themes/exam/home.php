<?php
/**
 * The main template file
 */

get_header();
?>

<section class="title-section" style=" background: url('<?php echo get_theme_mod('background-page-title', ''); ?>') 50% 50% no-repeat;">
    <div class="section bg">
        <div class="container">
            <h1><?php single_post_title();?> </h1>
        </div>
    </div>
</section>

<div class="container content">
    <div class="row">
        <main class="col-sm-8">

            <?php if ( have_posts() ) : ?>
                <ul class="row news-list-section" >
                    <?php /* Start the Loop */
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'preview' );
                    endwhile; ?>
                </ul>
                <div class="blog-nav">
                    <?php
                    echo paginate_links();?>
                </div>

            <?php   else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>

        </main><!-- #main -->
        <?php get_sidebar();?>
    </div><!-- #row -->
</div><!-- #container-fluid -->

<?php

get_footer();
