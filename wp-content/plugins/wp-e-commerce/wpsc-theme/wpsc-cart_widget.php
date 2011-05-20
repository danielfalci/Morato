

<div class="cartTopMorato">
	<div class="shopping-cart-wrapper">
		<div class="topoBemvindo">Bem vindo a nova loja virtual <span class="white">Morato Racing</span></div>
		<div class="topoCart">
			<img src="<?php bloginfo('template_directory'); ?>/images/icnCart.png" />
			<?php if(wpsc_cart_item_count() > 0): ?>
			    
					<a target="_parent" href="<?php echo get_option('shopping_cart_url'); ?>" title="<?php _e('Checkout', 'wpsc'); ?>" class="gocheckout">Carrinho de compras: <?php printf( _n('%d item', '%d items', wpsc_cart_item_count(), 'wpsc'), wpsc_cart_item_count() ); ?></a>
					
			<?php else: ?>
				 <?php _e('Seu carrinho est&aacute; vazio', 'wpsc'); ?><br />
			<?php endif; ?>
		</div>
	</div>
	<div class="clearFix"></div>
</div>

<?php if(isset($cart_messages) && count($cart_messages) > 0) { ?>
	<?php foreach((array)$cart_messages as $cart_message) { ?>
	  <span class="cart_message"><?php echo $cart_message; ?></span>
	<?php } ?>
<?php } ?>

<?php
wpsc_google_checkout();


?>