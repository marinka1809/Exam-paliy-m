<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam
 */

?>
	</div><!-- #content -->

    <section class="section clients-section">
        <div class="container">
            <h1><?php echo get_theme_mod('title-clients', ''); ?> </h1>
            <?php $args = array(
                'post_type' => 'clients',
            );

            $clientsQuery = new WP_Query($args);

            if ( $clientsQuery->have_posts() ) :?>
                <ul class="sl">
                    <?php while ( $clientsQuery->have_posts() ) : $clientsQuery->the_post();?>
                        <li class="sl_slide">
                            <a href="<?php echo get_post_meta($post->ID, 'link_client', 1);?>" target="_blank">
                                <?php the_post_thumbnail();?>
                            </a>
                        </li>
                    <?php endwhile;  ?>
                </ul>
            <?php endif;
            wp_reset_postdata();?>
        </div>
    </section>
    <section class=" contacts-section" style=" background: url('<?php echo get_theme_mod('background-contacts', ''); ?>') 50% 50% no-repeat;">
        <div class="section bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <header class="section-header">
                            <h1><?php echo get_theme_mod('titel-contacts', ''); ?></h1>
                            <p><?php echo get_theme_mod('description-contacts', ''); ?></p>
                        </header>
                        <address>
                            <p>
                                <a href="tel:<?php echo get_theme_mod('phone'); ?>"><span class="fa <?php echo get_theme_mod('phone-icon'); ?>"></span><?php echo get_theme_mod('phone'); ?></a>
                            </p>
                            <p>
                                <span class="fa <?php echo get_theme_mod('adress-icon'); ?>"></span><?php echo get_theme_mod('adress'); ?>
                            </p>
                        </address>
                        <?php echo get_theme_mod('map', ''); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo do_shortcode('[contact-form-7 id="7" title="Contact Form"]') ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="site-info">
            <?php  $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );?>
            <p class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                    <?php if ( has_custom_logo() ) {
                        echo '<img src="'. esc_url( $logo[0] ) .'">';
                    }?>
                    <?php bloginfo( 'name' ); ?>
                </a>
            </p>
        </div><!-- .site-info -->
        <div class="copyright">
            <p>&copy; <?php echo date('Y'); ?><?php echo get_theme_mod('copyright_textbox'); ?></p>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
