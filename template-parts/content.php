<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SlResponsive
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if(!is_singular()):?>
		<div class="post-thumb-wrapper">
			<?php the_post_thumbnail('slresponsive-blogroll-thumb');?>
		</div>
		<?php endif;?>
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php slresponsive_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
		<?php if(is_singular()):?>
		<div class="post-thumb-wrapper">
			<?php the_post_thumbnail('slresponsive-blogroll-thumb');?>
		</div>
		<?php endif;?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'slresponsive' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'slresponsive' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer row">
		<?php slresponsive_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
