<?php
global $wp_query;	
/*
 * Most functions called in this page can be found in the wpsc_query.php file
 */
?>
<div id="default_products_page_container" class="wrap wpsc_container">

<div class="bannerProduto">
	
		<?php if(function_exists( 'wp_bannerize' )) wp_bannerize("container_before=&container_after=&before=&after=");?>
		<div id="bannerTitulo"></div>
	
	
	<span class="dobraPlaca"></span>
	<div class="clearFix"></div>
</div>

<?php wpsc_output_breadcrumbs(); ?>
	
	<?php do_action('wpsc_top_of_products_page'); // Plugin hook for adding things to the top of the products page, like the live search ?>
	<?php if(wpsc_display_categories()): ?>
	  <?php if(wpsc_category_grid_view()) :?>
			<div class="wpsc_categories wpsc_category_grid group">
				<?php wpsc_start_category_query(array('category_group'=> get_option('wpsc_default_category'), 'show_thumbnails'=> 1)); ?>
					<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_grid_item  <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>">
						<?php wpsc_print_category_image(get_option('category_image_width'),get_option('category_image_height')); ?>
					</a>
					<?php wpsc_print_subcategory("", ""); ?>
				<?php wpsc_end_category_query(); ?>
				
			</div><!--close wpsc_categories-->
	  <?php else:?>
	  		<div class="categoriasProdutos">
				<ul class="wpsc_categories">
					
					<?php wpsc_start_category_query(array('category_group'=>get_option('wpsc_default_category'), 'show_thumbnails'=> get_option('show_category_thumbnails'))); ?>
							<li class="liPrincipal">
							<span class="pontosPlacasTop"></span>
							<span class="pontosPlacasBottom"></span>
							<span class="dobraPlaca"></span>
								<?php wpsc_print_category_image(get_option('category_image_width'), get_option('category_image_height')); ?>
								
								<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>"><?php wpsc_print_category_name(); ?></a>
								<?php if(wpsc_show_category_description()) :?>
									<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>				
								<?php endif;?>
								
								<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
							</li>
					<?php wpsc_end_category_query(); ?>
					<li>
						<span class="pontosPlacasTop"></span>
						<span class="pontosPlacasBottom"></span>
						<span class="dobraPlaca"></span>
						<a href="#">Pe&ccedil;as</a>
						<ul>
							<li><a href="<?php bloginfo('url'); ?>/?page_id=7">Sob encomenda</a></li>
						</ul>
					</li>
					<li>
						<span class="pontosPlacasTop"></span>
						<span class="pontosPlacasBottom"></span>
						<span class="dobraPlaca"></span>
						<img src="<?php bloginfo('template_directory'); ?>/images/pagSeguro.gif" alt="pagSeguro" class="pagSeguro" />
					</li>
				</ul>
			</div>
		<?php endif; ?>
	<?php endif; ?>
<?php // */ ?>
	<div class="produtoscontainer">
	
	<?php if(wpsc_display_products()): ?>
		
		<?php if(wpsc_is_in_category()) : ?>
			<div class="wpsc_category_details">
				<?php if(wpsc_show_category_thumbnails()) : ?>
					<img src="<?php echo wpsc_category_image(); ?>" alt="<?php echo wpsc_category_name(); ?>" />
				<?php endif; ?>
				
				<?php if(wpsc_show_category_description() &&  wpsc_category_description()) : ?>
					<?php echo wpsc_category_description(); ?>
				<?php endif; ?>
			</div><!--close wpsc_category_details-->
		<?php endif; ?>
		<?php if(wpsc_has_pages_top()) : ?>
			<div class="wpsc_page_numbers_top">
				<?php wpsc_pagination(); ?>
			</div><!--close wpsc_page_numbers_top-->
		<?php endif; ?>		
		
		<?php $contador = 0; ?>
		<?php /** start the product loop here */?>
		<?php while (wpsc_have_products()) :  wpsc_the_product(); ?>
		<?php $contador++;if(($contador == 13) && ($_SERVER ['REQUEST_URI'] == "/morato/") )break; ?>			
			<div class="default_product_display product_view_<?php echo wpsc_the_product_id(); ?> <?php echo wpsc_category_class(); ?> group">   
				<h2 class="prodtitle entry-title">
							<?php if(get_option('hide_name_link') == 1) : ?>
								<?php echo wpsc_the_product_title(); ?>
							<?php else: ?> 
								<a class="wpsc_product_title" href="<?php echo wpsc_the_product_permalink(); ?>"><?php echo wpsc_the_product_title(); ?></a>
							<?php endif; ?>
						</h2>   
				<?php if(wpsc_show_thumbnails()) :?>
					<div class="" id="imagecol_<?php echo wpsc_the_product_id(); ?>">
						<?php if(wpsc_the_product_thumbnail()) :
						?>
							<a class="wpsc_product_title" href="<?php echo wpsc_the_product_permalink(); ?>">
								<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(); ?>"/>
								<span></span>
							</a>
						<?php else: ?>
								<a href="<?php echo wpsc_the_product_permalink(); ?>">
								<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
								<span></span>
								</a>
						<?php endif; ?>
						
					</div><!--close imagecol-->
				<?php endif; ?>
					<div class="productcol">
					
						
						
						<?php							
							do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post);
							do_action('wpsc_product_addons', wpsc_the_product_id());
						?>
						
						
						
				
						
						
												
							<!-- THIS IS THE QUANTITY OPTION MUST BE ENABLED FROM ADMIN SETTINGS -->
							

							<div class="wpsc_product_price">
								<?php if( wpsc_show_stock_availability() ): ?>
									
								<?php endif; ?>
								<?php if(wpsc_product_is_donation()) : ?>
									<label for="donation_price_<?php echo wpsc_the_product_id(); ?>"><?php _e('Donation', 'wpsc'); ?>: </label>
									<input type="text" id="donation_price_<?php echo wpsc_the_product_id(); ?>" name="donation_price" value="<?php echo wpsc_calculate_price(wpsc_the_product_id()); ?>" size="6" />

								<?php else : ?>
									
									<p class="pricedisplay product_<?php echo wpsc_the_product_id(); ?>"><?php _e('', 'wpsc'); ?><span id='product_price_<?php echo wpsc_the_product_id(); ?>' class="currentprice pricedisplay"><?php echo wpsc_the_product_price(); ?></span></p>
									
									
									<!-- multi currency code -->
									<?php if(wpsc_product_has_multicurrency()) : ?>
	                                	<?php echo wpsc_display_product_multicurrency(); ?>
                                    <?php endif; ?>
									
									<?php if(wpsc_show_pnp()) : ?>
										<p class="pricedisplay"><?php _e('Shipping', 'wpsc'); ?>:<span class="pp_price"><?php echo wpsc_product_postage_and_packaging(); ?></span></p>
									<?php endif; ?>
								<?php endif; ?>
							</div><!--close wpsc_product_price-->
							
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action"/>
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id"/>
					
							<!-- END OF QUANTITY OPTION -->
							
							
						</form><!--close product_form-->
						
						<?php if((get_option('hide_addtocart_button') == 0) && (get_option('addtocart_or_buynow')=='1')) : ?>
							<?php echo wpsc_buy_now_button(wpsc_the_product_id()); ?>
						<?php endif ; ?>
						
						<?php echo wpsc_product_rater(); ?>
						
						
					<?php // */ ?>
				</div><!--close productcol-->
			<?php if(wpsc_product_on_special()) : ?><span class="sale"><?php _e('Sale', 'wpsc'); ?></span><?php endif; ?>
		</div><!--close default_product_display-->

		<?php endwhile; ?>
		<?php /** end the product loop here */?>
		<?php if(wpsc_product_count() == 0):?>
			<a href="http://www.moratoracing.com.br" class="nenhumProduto"><?php  _e('', 'wpsc'); ?></a>
		<?php endif ; ?>
	    <?php do_action( 'wpsc_theme_footer' ); ?> 	
	    <div class="clearFix"></div>
	    </div>
	    
<div class="clearFix"></div>
		<?php if(wpsc_has_pages_bottom()) : ?>
			<div class="wpsc_page_numbers_bottom">
				<?php wpsc_pagination(); ?>
			</div><!--close wpsc_page_numbers_bottom-->
		<?php endif; ?>
	<?php endif; ?>
</div><!--close default_products_page_container-->
