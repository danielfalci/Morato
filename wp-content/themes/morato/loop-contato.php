<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
          <div id="primary" class="widget-area" role="complementary">
                    <ul class="xoxo">
                              <?php dynamic_sidebar( 'secondary-widget-area' ); ?>
                    </ul>
          </div><!-- #secondary .widget-area -->
<?php endif; ?>

<div class="tituloCategoria">
	<h1 class="prodtitle">
		<?php the_title(); ?>
	</h1>
	<span></span>
</div>
<div class="clearFix"></div>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<div class="holder">
	<div class="formulario">	
		<div class="stockTitulo"><img src="<?php bloginfo('template_directory'); ?>/images/icnFaleConosco.png" alt="icnFaleConosco" width="16" height="16" /> Fale Conosco</div>
		
		<?php if(isset($_GET['enviado'])){ ?>
			<div class="enviadoOK"><img src="<?php bloginfo('template_directory'); ?>/images/icnConfirmado.png" alt="Sucesso" width="16" height="16" />  Sua mensagem foi enviada com sucesso e será respondida o mais breve possível!</div>
		<?php } ?>
		
		<p>Preencha corretamente os dados abaixo:<br/>Os campos assinalados com * s&atilde;o de preenchimento obrigat&oacute;rio.</p>
		<form action="<?php bloginfo('template_directory'); ?>/contatoAction.php" method="post">
			<label for="nome">Nome*</label><br/>
			<input type="text" class="large" id="nome" name="nome" /><br/>
			<label for="email">E-mail*</label><br/>
			<input type="text" class="large" id="email" name="mail" /><br/>
			<label for="telefone">Telefone*</label><br/>
			<input type="text" class="small" id="telefone" name="telefone" /><br/>
                                                      <label for="requisicao">Assunto*</label><br/>
			<select id="requisicao" name="assunto">
                                                            <option>-- Selecione --</option>
                                                            <option values="Sugestões">Sugestões</option>
                                                            <option values="Contato">Contato</option>
                                                            <option values="Reclamações">Reclamações</option>
                                                            <option values="Parceiros" <?php if(isset($_GET['assunto'])){ echo "selected='selected'"; } ?> >Parcerias</option>
			</select><br/>
			<label for="mensagem">Mensagem*</label><br/>
			<textarea id="mensagem" name="mensagem"></textarea><br/>
			<div class="clearFix"></div>
			<br/>
			
			<button class="botoes" type="submit">
			<img src="<?php bloginfo('template_directory'); ?>/images/icnBtnSeguir.png" alt="icnBtnSeguir" width="16" height="16" /> Enviar mensagem
			</button>
			<div class="clearFix"></div>
	          <input type="hidden" name="Submit" />
	          <input type="hidden" name="urlretorno" value="<?php echo home_url( '/?page_id=9' ); ?>" />
                                                      
		</form>
		
		
		
		
	</div>
	<div class="clearFix"></div><br/><br/>
	<div class="formulario">	
		<div class="stockTitulo"><img src="<?php bloginfo('template_directory'); ?>/images/icnInfo.png" alt="icnInfo" width="16" height="16" /> Localiza&ccedil;&atilde;o</div>
		<p><iframe width="665" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?f=q&amp;source=s_q&amp;hl=pt-BR&amp;geocode=&amp;q=Rua+Professor+Morais,+582+-+Savassi+-+Belo+Horizonte+-+MG+-+30150-370&amp;sll=-14.239424,-53.186502&amp;sspn=54.667001,93.076172&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Prof.+Morais,+582+-+Savassi,+Belo+Horizonte+-+Minas+Gerais,+30150-370&amp;z=14&amp;ll=-19.938282,-43.931542&amp;output=embed"></iframe></p>
		<div class="left">
			<p class="tituloEndereco">Endere&ccedil;o</p>
			<p class="Endereco">Rua Professor Morais, 582 - Savassi - Belo Horizonte - MG - 30150-370</p>
		</div>
		<div class="right">
			<p class="tituloEndereco">Telefone</p>
			<p class="Endereco">31 3223 7996</p>
		</div>
		<div class="clearFix"></div>
	</div>
</div>
<?php endwhile; // end of the loop. ?>

