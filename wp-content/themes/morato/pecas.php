<?php
/**
 * Template Name: Pecas
 *
 * A custom page template
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0

 */

get_header(); ?>

		<div id="container" class="paginasBkg">
			<div id="content" role="main">

			<?php
			/* Run the loop to output the page.
			 * If you want to overload this in a child theme then include a file
			 * called loop-page.php and that will be used instead.
			 */
			get_template_part( 'loop', 'pecas' );
			?>

			</div><!-- #content -->
		</div><!-- #container -->

<div class="sidebarContato"><?php get_sidebar(); ?></div>
<?php get_footer(); ?>
