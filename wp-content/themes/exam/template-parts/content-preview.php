<?php
/** Template part for displaying posts previous ...*/
?>
<li class="col-md-6 item">
    <article id="post-<?php the_ID(); ?>" <?php post_class('news'); ?>>

        <?php the_post_thumbnail(); ?>

        <div class="text-block">

            <a href="<?php echo get_permalink();?>"><h1><?php the_title( ); ?></h1></a>
            <a href="<?php  echo get_permalink();?>"><?php the_excerpt(); ?></a>

            <div class="meta-date">
                <?php
                $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
                if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
                    $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
                }

                $time_string = sprintf( $time_string,
                    esc_attr( get_the_date( 'c' ) ),
                    esc_html( get_the_date() ),
                    esc_attr( get_the_modified_date( 'c' ) ),
                    esc_html( get_the_modified_date() )
                );
                ?>
                <a href="<?php echo get_permalink();?>" class="fa <?php echo get_theme_mod('time-icon', ''); ?>" rel="bookmark"> <?php echo $time_string?> </a>
            </div>
            <a href="<?php echo get_permalink();?>" style="background: url('<?php echo get_theme_mod('icon-link', ''); ?>')"> hh</a>
        </div><!-- .text-bloc -->
    </article><!-- #post-## -->
</li>
<?php

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'skokov' ),
				'after'  => '</div>',
			) );

?>