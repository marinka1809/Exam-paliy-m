<?php
/**
 * The front page template.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hromadske-tv
 */

get_header(); ?>

    <div id="primary" class="content-area">

        <main id="main" class="site-main" role="main">
            <section class="section dignity-section ">
                <div class="container">
                    <div class="row"></div>
                    <?php
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile; // End of the loop.
                    ?>
                </div>
                <a id="scroll-down" class="fa fa-chevron-down" href="#welcome-section"></a>
                </div>
            </section>

            <?php if ( get_post_meta($post->ID, 'welcome-display', 1) ) :?>
                <section class="section welcome-section" id="welcome-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-5">
                                <?php
                                while ( have_posts() ) : the_post();
                                    the_post_thumbnail();
                                endwhile; // End of the loop.
                                ?>
                            </div>
                            <div class="col-sm-7">
                                <h1> <?php  echo get_post_meta($post->ID, 'welcome-title', 1);?></h1>
                                <p><?php  echo get_post_meta($post->ID, 'welcome-description', 1);?></p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ( get_post_meta($post->ID, 'info-display', 1) ) :?>
                <section class="section services-section">
                    <div class="container">
                        <header class="section-header">
                            <h1> <?php  echo get_post_meta($post->ID, 'services-title', 1);?></h1>
                            <p><?php  echo get_post_meta($post->ID, 'services-description', 1);?></p>
                        </header>

                        <?php
                        $args = array(
                        'post_type' => 'services',
                        'posts_per_page' => 3,
                        );

                        $servicesPosts = new WP_Query($args);

                        if ( $servicesPosts->have_posts() ) :?>
                        <ul class="row flex-block">

                            <?php while ( $servicesPosts->have_posts() ) : $servicesPosts->the_post();?>
                                <li class="col-sm-6 col-md-4">
                                    <div class="item-service">
                                        <div class="img-wrapper"><?php the_post_thumbnail();?></div>
                                        <h3><?php the_title();?></h3>
                                        <p><?php the_excerpt();?></p>
                                    </div>
                                </li>
                            <?php endwhile;  ?>
                        </ul>
                        <?php endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
            <?php endif; ?>

            <?php if ( get_post_meta($post->ID, 'portfolio-display', 1) ) :?>
                <section class="section portfolio-section">
                    <div class="container">
                        <header class="section-header">
                            <h1> <?php  echo get_post_meta($post->ID, 'portfolio-title', 1);?></h1>
                            <p><?php  echo get_post_meta($post->ID, 'portfolio-description', 1);?></p>
                        </header>
                        <?php
                        $args = array(
                            'post_type' => 'portfolio',
                        );

                        $servicesPosts = new WP_Query($args);

                        if ( $servicesPosts->have_posts() ) :?>
                            <ul class="row ">

                                <?php while ( $servicesPosts->have_posts() ) : $servicesPosts->the_post();?>
                                    <li class="col-sm-6 col-md-4" data-lable="<?php echo get_post_meta($post->ID, 'label-image', 1)?>">
                                        <div class="wrapper">
                                            <?php the_post_thumbnail('portfolio');?>
                                            <div class="hover-block">
                                                <span><?php echo get_post_meta($post->ID, 'label-image', 1)?></span>
                                            </div>
                                        </div>
                                    </li>
                                <?php endwhile;  ?>
                            </ul>
                        <?php endif;
                        wp_reset_postdata();
                        ?>

                    </div>
                </section>
            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php

get_footer();
