<?php
/**
 * The template for the content footer sidebar area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
	return;
}

// If we get this far, we have widgets. Let's do this.
?>
<aside id="content-bottom" class="content-bottom">
	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <div id="widget-area" class="widget-area">
			<?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div><!-- .widget-area -->
	<?php endif; ?>
</aside><!-- .content-footer -->
