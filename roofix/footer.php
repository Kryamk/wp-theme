<?php
/**
 * @author  RadiusTheme
 * @since   1.0
 * @version 1.0
 */
namespace radiustheme\roofix;
if ( function_exists( 'elementor_theme_do_location' ) && elementor_theme_do_location( 'footer' ) ) {
	return;
}
?>
<?php
	if ( RDTheme::$footer_area == 1 || RDTheme::$footer_area === 'on' ){
		get_template_part( 'template-parts/footer/footer', RDTheme::$footer_style );
	}
?>
		<!-- Search Box Start Here -->
		<div id="header-search" class="header-search">
			<button type="button" class="close">×</button>
			<form class="header-search-form" action="<?php echo esc_url( home_url( '/' ) )  ?>">
				<input type="search" name="s" class="search-text" placeholder="<?php esc_attr_e( 'Search Here...', 'roofix' );?>" required>
			    <button type="submit" class="search-btn">
			       <i class="fas fa-search"></i>
			    </button>
			</form>
		</div>
	</div>
</div>
	<?php wp_footer();?>
	</body>
</html>