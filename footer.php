<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package enrichmg
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div id="bottom-container" style="background-color:#000000;">
        <?php if ( is_active_sidebar( 'custom-footer-widget' ) ) : ?>
		<div class="widget-area">
			<?php dynamic_sidebar( 'custom-footer-widget' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

    
    </div> 
        
        
        <div class="site-info">
   
            <?php
            get_template_part( 'site', 'info' );
			?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>