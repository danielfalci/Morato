<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	<div class="clearFix"></div>
	</div><!-- #main -->
	<div class="sombraContent"></div>
	<div class="pattern"></div>
	<dir class="bkgBody">
		<img src="<?php bloginfo('template_directory'); ?>/images/bkgBody.jpg" />
	</dir>
	<div id="footer" role="contentinfo">
		<span class="footerDetail"></span>
		<div id="colophon">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div class="newsletter">
				<h3>Novidades</h3>
				<p>Fique por dentro das promo&ccedil;&otilde;es!<br/>Cadastre seu e-mail e receba novidades!</p>
				<input type="text" value="Digite seu e-mail"/><div class="clearFix"></div><br/>
				<button type="button">Cadastrar</button>
				<a href="mailto:moratoloja@hotmail.com" class="msn"></a>
				<a href="http://www.facebook.com/moratoracing" target="_blank" class="twitter"></a>
				<div class="clearFix"></div>
				<p class="menu2Foot">
					<a class="comoCC" href="<?php bloginfo('url'); ?>/comocomprar.html">Como Comprar?</a>  |
					<a href="<?php echo home_url( '/?page_id=9&assunto=parceiros' ); ?>">Seja nosso parceiro!</a>
				</p>
			</div>
			<div class="endereco">
				<h3>Endere&ccedil;o</h3>
				<p>Rua Professor Morais, 582 - Savassi Belo Horizonte - MG - 30150-370</p>
				<p class="telefone">31 3223 7996</p>
				<div class="menuFooter">
					<?php wp_nav_menu( array( 'menu' => 'Principal' ) ); ?>
				</div>
			</div>
			<div class="comoComprar">
				<h3>Como Comprar?</h3>
				<a class="comoCC" href="<?php bloginfo('url'); ?>/comocomprar.html"><img src="<?php bloginfo('template_directory'); ?>/images/icnCesta.png" alt="icnCesta" width="46" height="46" />
				<img src="<?php bloginfo('template_directory'); ?>/images/icnCarteira.png" alt="icnCarteira" width="46" height="46" />
				<img src="<?php bloginfo('template_directory'); ?>/images/icnCaixa.png" alt="icnCaixa" width="46" height="46" />
				<img src="<?php bloginfo('template_directory'); ?>/images/icnCaminhao.png" alt="icnCaminhao" width="46" height="46" />
				</a>
				

				<br/><br/><br/>
				<h3>Parceiros</h3>
				
				<p class="logoParceiro">
					<a href="http://www.22screw.com/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/logo22.png" alt="logo22" width="126" height="56" /></a>
				</p>
			</div>
			<div class="clearFix"></div>
			<div class="footerFinal">
				Todos os direitos reservados &copy; Morato Racing 2011
			</div>

		</div><!-- #colophon -->
	</div><!-- #footer -->

	<div class="signIntensiva">
    	<a title="Intensiva Experincia Digital" target="_blank" href="http://www.intensiva.com.br"></a>
	</div>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>
