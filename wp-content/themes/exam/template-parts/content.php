<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package exam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->
    <?php

    wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'exam' ),
        'after'  => '</div>',
    ) );
    ?>

</article><!-- #post-## -->
