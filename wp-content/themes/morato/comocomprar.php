<?php
/**
 * Template Name: comoComprar
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html>
<head>

<style type="text/css">

</style>
</head>

<body>


<div class="comoJanela">
<div class="howbuy">



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<div class="clearFix"></div>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->



<?php endwhile; // end of the loop. ?>


<!--<h1>Como comprar</h1>

<h2>Passo 1</h2>
<p>No menu da esquerda est&atilde;o todas as categorias dos produtos: Botas, Cal&ccedil;as, Camisas, Capacetes, etc.</p>
<img src="images/comocomprar/menu.jpg" alt="menu" width="226" height="321" />

<p>Ap&oacute;s escolher a categoria, selecione o produto desejado na listagem clicando em sua foto ou nome.</p>
<img src="images/comocomprar/galeria.jpg" alt="galeria" width="400" height="342" />

<p>Selecione tamanho, cor ou outra varia&ccedil;&atilde;o dispon&iacute;vel no produto e a quantidade desejada, em seguida clique em Adicionar ao Carrinho.</p>
<img src="images/comocomprar/produto.jpg" alt="produto" width="560" height="258" />

<p>Seu produto ser&aacute; adicionado ao Carrinho de compras. Para comprar mais produtos, clique no bot&atilde;o Continuar comprando ou selecione uma categoria no menu da esquerda.</p>
<img src="images/comocomprar/continuarcompra.jpg" alt="continuarcompra" width="170" height="33" />

<p>Para finalizar sua compra, clique no bot&atilde;o Ver carrinho de compras localizado no topo ou na parte inferior.</p>
<img src="images/comocomprar/carrinho.jpg" alt="carrinho" width="236" height="31" />
<img src="images/comocomprar/fecharcompra.jpg" alt="fecharcompra" width="132" height="32" />

<p>Voc&ecirc; ser&aacute; levado ao carrinho de compras.</p>
<img src="images/comocomprar/cartfinal.jpg" alt="cartfinal" width="560" height="330" />

<p>Digite seu CEP e em seguida clique em Calcular para gerar o valor do frete. Agora, com o frete calculado, clique em Finalizar a Compra.</p>


<h2>Passo 2</h2>
<p>Voc&ecirc; ser&aacute; levado &agrave; p&aacute;gina do Pagseguro, onde dever&aacute; preencher seus dados de cobran&ccedil;a e envio.</p>
<img src="images/comocomprar/endereco.jpg" alt="endereco" width="560" height="269" />

<p>Preencha seus dados de endere&ccedil;o e clique em Continuar</p>

<p>Caso j&aacute; tenha cadastro no Pagseguro, fa&ccedil;a Login. Se n&atilde;o, preencha os campos indicados e clique em Continuar.</p>
<img src="images/comocomprar/login.jpg" alt="login" width="560" height="145" />

<p>Selecione a forma de pagamento desejada e depois clique em Confirmar.</p>
<img src="images/comocomprar/cobranca.jpg" alt="cobranca" width="560" height="329" />

<p>Fa&ccedil;a o pagamento com a forma de cobran&ccedil;a escolhida e pronto! Em instantes, voc&ecirc; dever&aacute; receber um e-mail confirmando sua compra.</p>

<img src="images/comocomprar/pedido.jpg" alt="pedido" width="560" height="290" />
<p>Para outras d&uacute;vidas ou informa&ccedil;&otilde;es, mande sua mensagem pela p&aacute;gina Contato. Obrigado!</p>
-->
</div></div>
</body></html>