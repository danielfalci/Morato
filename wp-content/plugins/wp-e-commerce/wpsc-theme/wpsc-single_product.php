<?php
	// Setup globals
	// @todo: Get these out of template
	global $wp_query;

	// Setup image width and height variables
	// @todo: Investigate if these are still needed here
	$image_width  = get_option( 'single_view_image_width' );
	$image_height = get_option( 'single_view_image_height' );
?>

<?php include("wpsc-cart_widget.php") ?>



<div id="single_product_page_container">
	
	<?php
		// Breadcrumbs
		wpsc_output_breadcrumbs();

		// Plugin hook for adding things to the top of the products page, like the live search
		do_action( 'wpsc_top_of_products_page' );
	?>
	

		
	<div class="tituloCategoria">
		<h1 class="prodtitle">
			<?php if(get_option('hide_name_link') == 1) : ?>
				<?php echo wpsc_the_product_title(); ?>
			<?php else: ?> 
				<a class="wpsc_product_title" href="<?php echo wpsc_the_product_permalink(); ?>"><?php echo wpsc_the_product_title(); ?></a>
			<?php endif; ?>
		</h1> 
		<span></span>
	</div>
	
	
	
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
							<li>
								<?php wpsc_print_category_image(get_option('category_image_width'), get_option('category_image_height')); ?>
								
								<a href="<?php wpsc_print_category_url();?>" class="wpsc_category_link <?php wpsc_print_category_classes_section(); ?>" title="<?php wpsc_print_category_name(); ?>"><?php wpsc_print_category_name(); ?></a>
								<?php if(wpsc_show_category_description()) :?>
									<?php wpsc_print_category_description("<div class='wpsc_subcategory'>", "</div>"); ?>				
								<?php endif;?>
								
								<?php wpsc_print_subcategory("<ul>", "</ul>"); ?>
							</li>
					<?php wpsc_end_category_query(); ?>
					<li><a href="#">Pe&ccedil;as</a>
						<ul><li><a href="<?php bloginfo('url'); ?>/?page_id=7">Sob encomenda</a></li></ul>
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
	<div class="single_product_display group">
<?php
		/**
		 * Start the product loop here.
		 * This is single products view, so there should be only one
		 */
			

		while ( wpsc_have_products() ) : wpsc_the_product(); ?>
		
		
			
	                        
					<div class="imagecol">
						<?php if ( wpsc_the_product_thumbnail() ) : ?>
								<a rel="<?php echo wpsc_the_product_title(); ?>" class="<?php echo wpsc_the_product_image_link_classes(); ?>" href="<?php echo wpsc_the_product_image(); ?>">
									<img class="product_image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="<?php echo wpsc_the_product_title(); ?>" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo wpsc_the_product_thumbnail(get_option('product_image_width'),get_option('product_image_height'),'','single'); ?>"/>
								</a>
								<?php 
								if ( function_exists( 'gold_shpcrt_display_gallery' ) )
									echo gold_shpcrt_display_gallery( wpsc_the_product_id() );
								?>
						<?php else: ?>
									<a href="<?php echo wpsc_the_product_permalink(); ?>">
									<img class="no-image" id="product_image_<?php echo wpsc_the_product_id(); ?>" alt="No Image" title="<?php echo wpsc_the_product_title(); ?>" src="<?php echo WPSC_CORE_THEME_URL; ?>wpsc-images/noimage.png" width="<?php echo get_option('product_image_width'); ?>" height="<?php echo get_option('product_image_height'); ?>" />
									</a>
						<?php endif; ?>
					</div><!--close imagecol-->
					
					
					
					<form class="product_form" enctype="multipart/form-data" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="1" id="product_<?php echo wpsc_the_product_id(); ?>">
					
					<div class="productdetails">
							<div class="stockTitulo">
								<?php if(wpsc_show_stock_availability()): ?>
									<?php if(wpsc_product_has_stock()) : ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="in_stock"><?php _e('Produto em estoque', 'wpsc'); ?></div>
									<?php else: ?>
										<div id="stock_display_<?php echo wpsc_the_product_id(); ?>" class="out_of_stock"><?php _e('Produto n&atilde;o dispon&iacute;vel', 'wpsc'); ?></div>
									<?php endif; ?>
								<?php endif; ?>
							</div>
						
							
					<div class="produtoOpcoes">
						<?php /** the variation group HTML and loop */?>
                        <?php if (wpsc_have_variation_groups()) { ?>
                       
                       
						<div class="wpsc_variation_forms">
                        	
							<?php while (wpsc_have_variation_groups()) : wpsc_the_variation_group(); ?>
								<label for="<?php echo wpsc_vargrp_form_id(); ?>"><?php echo wpsc_the_vargrp_name(); ?>:</label><br/>
								<?php /** the variation HTML and loop */?>
								<select class="wpsc_select_variation" name="variation[<?php echo wpsc_vargrp_id(); ?>]" id="<?php echo wpsc_vargrp_form_id(); ?>">
								<?php while (wpsc_have_variations()) : wpsc_the_variation(); ?>
									<option value="<?php echo wpsc_the_variation_id(); ?>" <?php echo wpsc_the_variation_out_of_stock(); ?>><?php echo wpsc_the_variation_name(); ?></option>
								<?php endwhile; ?>
								</select><br/>
							<?php endwhile; ?>
                            
						</div><!--close wpsc_variation_forms-->
                        
						<?php } ?>
						<?php /** the variation group HTML and loop ends here */?>


						<?php if(wpsc_show_stock_availability()): ?>
									<?php if(wpsc_product_has_stock()) : ?>

							<?php
							/**
							 * Quantity options - MUST be enabled in Admin Settings
							 */
							?>
							<?php if(wpsc_has_multi_adding()): ?>
							
                            	<label for="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>">Quantidade:</label>
								<div class="wpsc_quantity_update">
								<input type="text" id="wpsc_quantity_update_<?php echo wpsc_the_product_id(); ?>" name="wpsc_quantity_update" size="2" value="1" />
								<input type="hidden" name="key" value="<?php echo wpsc_the_cart_item_key(); ?>"/>
								<input type="hidden" name="wpsc_update_quantity" value="true" />
                                </div><!--close wpsc_quantity_update-->
                
							<?php endif ;?>
							
							<?php endif; ?>
								<?php endif; ?>
							
						</div>
							<div class="wpsc_product_price precoProdutoSingle">
									<p class="pricedisplay <?php echo wpsc_the_product_id(); ?>"><?php _e('', 'wpsc'); ?><span id='product_price_<?php echo wpsc_the_product_id(); ?>' class="currentprice pricedisplay"><?php echo wpsc_the_product_price(); ?></span></p>
														
								
							</div><!--close wpsc_product_price-->
							
							<!--sharethis-->
							<?php if ( get_option( 'wpsc_share_this' ) == 1 ): ?>
							<div class="st_sharethis" displayText="ShareThis"></div>
							<?php endif; ?>
							<!--end sharethis-->
							<input type="hidden" value="add_to_cart" name="wpsc_ajax_action" />
							<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="product_id" />					
							<?php if( wpsc_product_is_customisable() ) : ?>
								<input type="hidden" value="true" name="is_customisable"/>
							<?php endif; ?>
							
						
					</div><!--close productdetails-->
					
					
					
							<?php
							/**
							 * Cart Options
							 */
							?>

							<?php if((get_option('hide_addtocart_button') == 0) &&  (get_option('addtocart_or_buynow') !='1')) : ?>
								<?php if(wpsc_product_has_stock()) : ?>
									<div class="wpsc_buy_button_container">
											<?php if(wpsc_product_external_link(wpsc_the_product_id()) != '') : ?>
											<?php $action = wpsc_product_external_link( wpsc_the_product_id() ); ?>
											<input class="wpsc_buy_button" type="submit" value="<?php echo wpsc_product_external_link_text( wpsc_the_product_id(), __( 'Buy Now', 'wpsc' ) ); ?>" onclick="return gotoexternallink('<?php echo $action; ?>', '<?php echo wpsc_product_external_link_target( wpsc_the_product_id() ); ?>')">
											<?php else: ?>
										<button type="submit" name="Buy" class="wpsc_buy_button" id="product_<?php echo wpsc_the_product_id(); ?>_submit_button"><img src="<?php bloginfo('template_directory'); ?>/images/icnBtnAdicionar.png" alt="icnBtnCart" width="16" height="16" /> Adicionar ao carrinho</button>
											<?php endif; ?>
										<div class="wpsc_loading_animation">
											<img title="Loading" alt="Loading" src="<?php echo wpsc_loading_animation_url(); ?>" />
											<?php _e('Updating cart...', 'wpsc'); ?>
										</div><!--close wpsc_loading_animation-->
									</div><!--close wpsc_buy_button_container-->
								<?php else : ?>
									<p class="soldout"><?php _e('This product has sold out.', 'wpsc'); ?></p>
								<?php endif ; ?>
							<?php endif ; ?>
						
					
						<?php
							if ( (get_option( 'hide_addtocart_button' ) == 0 ) && ( get_option( 'addtocart_or_buynow' ) == '1' ) )
								echo wpsc_buy_now_button( wpsc_the_product_id() );
					
							echo wpsc_product_rater();

							echo wpsc_also_bought( wpsc_the_product_id() );
						
						if(wpsc_show_fb_like()): ?>
	                      
                        <?php endif; ?>
					<div class="FB_like">
	<iframe src="https://www.facebook.com/plugins/like.php?href=<?php echo wpsc_the_product_permalink(); ?>&amp;layout=standard&amp;show_faces=true&amp;width=435&amp;action=like&amp;font=arial&amp;colorscheme=dark" frameborder="0"></iframe>
</div><!--close FB_like-->
					
		
					<form onsubmit="submitform(this);return false;" action="<?php echo wpsc_this_page_url(); ?>" method="post" name="product_<?php echo wpsc_the_product_id(); ?>" id="product_extra_<?php echo wpsc_the_product_id(); ?>">
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="prodid"/>
						<input type="hidden" value="<?php echo wpsc_the_product_id(); ?>" name="item"/>
					</form>
					<div class="clearFix"></div>
					</div>
					</form><!--close product_form-->
					
					<div class="productcol">			
						<?php do_action('wpsc_product_before_description', wpsc_the_product_id(), $wp_query->post); ?>
						<div class="product_description">
							<div class="stockTitulo"><div class="infoproduto">Informa&ccedil;&otilde;es do produto</div></div>
							<div class="descricao">
							<p><span class="descricaotitle">Descri&ccedil;&atilde;o:</span></p>
							<?php echo wpsc_the_product_description(); ?>
							<p><span class="descricaotitle">Aten&ccedil;&atilde;o:</span></p>
<p>Os dados acima s&atilde;o meramente explicativos, podendo conter imprecis&otilde;es e estarem sujeitos a altera&ccedil;&otilde;es sem pr&eacute;vio aviso. Para informa&ccedil;&otilde;es mais exatas e detalhadas, ligue diretamente na Morato Racing: (31) 3223-7996</p>
							</div>
							
						</div><!--close product_description -->
						<?php do_action( 'wpsc_product_addons', wpsc_the_product_id() ); ?>		
						<?php if ( wpsc_the_product_additional_description() ) : ?>
							<div class="single_additional_description">
								<p><?php echo wpsc_the_product_additional_description(); ?></p>
							</div><!--close single_additional_description-->
						<?php endif; ?>		
						<?php do_action( 'wpsc_product_addon_after_descr', wpsc_the_product_id() ); ?>
						<?php
						/**
						 * Custom meta HTML and loop
						 */
						?>
                        <?php if (wpsc_have_custom_meta()) : ?>
						<div class="custom_meta">
							<?php while ( wpsc_have_custom_meta() ) : wpsc_the_custom_meta(); ?>
								<strong><?php echo wpsc_custom_meta_name(); ?>: </strong><?php echo wpsc_custom_meta_value(); ?><br />
							<?php endwhile; ?>
						</div><!--close custom_meta-->
                        <?php endif; ?>
						<?php
						/**
						 * Form data
						 */
						?>
						
						
		</div><!--close single_product_display-->
		
		
		<br/>
		<button type="button" class="botoes" onclick="window.location.href='<?php bloginfo('url'); ?>'"> 
			<img src="<?php bloginfo('template_directory'); ?>/images/icnBtnVoltar.png" width="16" height="16" /> 
			<span>Continuar Comprando</span>
		</button>
		
		<button type="button" class="botoes right" onclick="window.location.href='<?php echo get_option('shopping_cart_url'); ?>'"> 
			<img src="<?php bloginfo('template_directory'); ?>/images/icnBtnCart.png" width="16" height="16" /> 
			<span>Fechar Compra</span>
		</button>
		<div class="clearFix"></div>
</div>	
		<?php echo wpsc_product_comments(); ?>

<!--<div class="sidebarContato"><//?php get_sidebar(); ?></div>-->

<?php endwhile;

    do_action( 'wpsc_theme_footer' ); ?> 	
<div class="clearFix"></div>
</div><!--close single_product_page_container-->
