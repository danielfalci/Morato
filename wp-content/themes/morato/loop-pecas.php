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
		<div class="stockTitulo"><img src="<?php bloginfo('template_directory'); ?>/images/icnPrancheta.png" alt="icnPrancheta" width="16" height="16" /> Fa&ccedil;a seu pedido</div>
		<p>Preencha corretamente os dados abaixo com a(s) pe&ccedil;a(s) para encomenda.<br/>Os campos assinalados com * s&atilde;o de preenchimento obrigat&oacute;rio.</p>
		<form action="<?php bloginfo('template_directory'); ?>/pecasAction.php" method="post">

				<label for="nome">Nome*</label><br/>
				<input type="text" class="large" id="nome" name="nome"/><br/>

			
			<div class="colunas70">
				<label for="email">E-mail*</label><br/>
				<input type="text" class="large" id="email" name="mail"/><br/>
			</div>
			
			<div class="colunas30">
				<label for="telefone">Telefone*</label><br/>
				<input type="text" class="small" id="telefone" name="telefone"/><br/>
			</div>
			
			<div class="colunas30">
				<label for="marcamoto">Marca da moto*</label><br/>	
				<select id="marcamoto" name="marcamoto">
					<option value="">FABRICANTE</option><option value="ADLY">ADLY</option><option value="AGRALE">AGRALE</option><option value="AMAZONAS">AMAZONAS</option><option value="APRILIA">APRILIA</option><option value="ATALA">ATALA</option><option value="BAJAJ">BAJAJ</option><option value="BENELLI">BENELLI</option><option value="BETA">BETA</option><option value="BIMOTA">BIMOTA</option><option value="BMW">BMW</option><option value="BRANDY">BRANDY</option><option value="BRAVA">BRAVA</option><option value="BRP">BRP</option><option value="BUELL">BUELL</option><option value="BUENO">BUENO</option><option value="BYCRISTO">BYCRISTO</option><option value="CAGIVA">CAGIVA</option><option value="CALOI">CALOI</option><option value="DAELIM">DAELIM</option><option value="DAFRA">DAFRA</option><option value="DAYANG">DAYANG</option><option value="DAYUN">DAYUN</option><option value="DERBI">DERBI</option><option value="DUCATI">DUCATI</option><option value="EMME">EMME</option><option value="FOX">FOX</option><option value="FYM">FYM</option><option value="GARINI">GARINI</option><option value="GAS GAS">GAS GAS</option><option value="GREEN">GREEN</option><option value="HAOBAO">HAOBAO</option><option value="HARLEY-DAVIDSON">HARLEY-DAVIDSON</option><option value="HARTFORD">HARTFORD</option><option value="HERO">HERO</option><option value="HONDA">HONDA</option><option value="HUSABERG">HUSABERG</option><option value="HUSQVARNA">HUSQVARNA</option><option value="IROS">IROS</option><option value="JIAPENG VOLCANO">JIAPENG VOLCANO</option><option value="JOHNNYPAG">JOHNNYPAG</option><option value="JONNY">JONNY</option><option value="KAHENA">KAHENA</option><option value="KASINSKI">KASINSKI</option><option value="KAWASAKI">KAWASAKI</option><option value="KIMCO">KIMCO</option><option value="KIN MOTORS">KIN MOTORS</option><option value="KTM">KTM</option><option value="KZUKI">KZUKI</option><option value="L'AQUILA">L'AQUILA</option><option value="LANDUM">LANDUM</option><option value="LAVRALE">LAVRALE</option><option value="LERIVO">LERIVO</option><option value="LON-V">LON-V</option><option value="MAGRÃO TRICICLOS">MAGRÃO TRICICLOS</option><option value="MALAGUTI">MALAGUTI</option><option value="MIZA">MIZA</option><option value="MOTO GUZZI">MOTO GUZZI</option><option value="MOTO Z">MOTO Z</option><option value="MRX">MRX</option><option value="MV AGUSTA">MV AGUSTA</option><option value="MVK">MVK</option><option value="ORCA">ORCA</option><option value="ORION">ORION</option><option value="PEGASSI">PEGASSI</option><option value="PEUGEOT">PEUGEOT</option><option value="PIAGGIO">PIAGGIO</option><option value="REGAL RAPTOR">REGAL RAPTOR</option><option value="SANYANG">SANYANG</option><option value="SHINERAY">SHINERAY</option><option value="SIAMOTO">SIAMOTO</option><option value="SUNDOWN">SUNDOWN</option><option value="SUZUKI">SUZUKI</option><option value="TARGOS">TARGOS</option><option value="TRAXX">TRAXX</option><option value="TRIUMPH">TRIUMPH</option><option value="WUYANG">WUYANG</option><option value="YAMAHA">YAMAHA</option>
				</select><br/>
			</div>
			
			<div class="colunas70">
				<label for="modelo">Modelo*</label><br/>
				<input type="text" class="large" id="modelo" name="modelomoto"/><br/>
			</div>
			
			<div class="colunas30">
				<label for="anofabricacao">Ano de fabrica&ccedil;&atilde;o*</label><br/>	
				<select id="anofabricacao" name="anofabricacao">
					<option value="">ANO</option>
		<option value="">Todos</option>
		<option value="2010">2010</option>
		<option value="2009">2009</option>
		<option value="2008">2008</option>
		<option value="2007">2007</option>
		<option value="2006">2006</option>
		<option value="2005">2005</option>
		<option value="2004">2004</option>
		<option value="2003">2003</option>
		<option value="2002">2002</option>
		<option value="2001">2001</option>
		<option value="2000">2000</option>
		<option value="1999">1999</option>
		<option value="1998">1998</option>
		<option value="1997">1997</option>
		<option value="1996">1996</option>
		<option value="1995">1995</option>
		<option value="1994">1994</option>
		<option value="1993">1993</option>
		<option value="1992">1992</option>
		<option value="1991">1991</option>
		<option value="1990">1990</option>
		<option value="1989">1989</option>
		<option value="1988">1988</option>
		<option value="1987">1987</option>
		<option value="1986">1986</option>
		<option value="1985">1985</option>
		<option value="1984">1984</option>
		<option value="1983">1983</option>
		<option value="1982">1982</option>
		<option value="1981">1981</option>
		<option value="1980">1980</option>
		<option value="1979">1979</option>
		<option value="1978">1978</option>
		<option value="1977">1977</option>
		<option value="1976">1976</option>
		<option value="1975">1975</option>
		<option value="1974">1974</option>
		<option value="1973">1973</option>
		<option value="1972">1972</option>
		<option value="1971">1971</option>
		<option value="1970">1970</option>
		<option value="1969">1969</option>
		<option value="1968">1968</option>
		<option value="1967">1967</option>
		<option value="1966">1966</option>
		<option value="1965">1965</option>
		<option value="1964">1964</option>
		<option value="1963">1963</option>
		<option value="1962">1962</option>
		<option value="1961">1961</option>
		<option value="1960">1960</option>
		<option value="1959">1959</option>
		<option value="1958">1958</option>
		<option value="1957">1957</option>
		<option value="1956">1956</option>
		<option value="1955">1955</option>
		<option value="1954">1954</option>
		<option value="1953">1953</option>
		<option value="1952">1952</option>
		<option value="1951">1951</option>
		<option value="1950">1950</option>
		<option value="1949">1949</option>
		<option value="1948">1948</option>
		<option value="1947">1947</option>
		<option value="1946">1946</option>
		<option value="1945">1945</option>
		<option value="1944">1944</option>
		<option value="1943">1943</option>
		<option value="1942">1942</option>
		<option value="1941">1941</option>
		<option value="1940">1940</option>
		<option value="1939">1939</option>
		<option value="1938">1938</option>
		<option value="1937">1937</option>
		<option value="1936">1936</option>
		<option value="1935">1935</option>
		<option value="1934">1934</option>
		<option value="1933">1933</option>
		<option value="1932">1932</option>
		<option value="1931">1931</option>
		<option value="1930">1930</option>
		<option value="1929">1929</option>
		<option value="1928">1928</option>
		<option value="1927">1927</option>
		<option value="1926">1926</option>
		<option value="1925">1925</option>
		<option value="1924">1924</option>
		<option value="1923">1923</option>
		<option value="1922">1922</option>
		<option value="1921">1921</option>
		<option value="1920">1920</option>
		<option value="1919">1919</option>
		<option value="1918">1918</option>
		<option value="1917">1917</option>
		<option value="1916">1916</option>
		<option value="1915">1915</option>
		<option value="1914">1914</option>
				</select><br/>
			</div>
			
			<div class="colunas70">
				<label for="nomepeca">Nome da pe&ccedil;a</label><br/>
				<input type="text" class="large" id="nomepeca" name="nomepeca" /><br/>
			</div>
			<div class="clearFix"></div>
			<p>Caso queira solicitar mais de uma pe&ccedil;a, utilize o campo de &#8220;OBSERVA&Ccedil;&Otilde;ES&#8221; abaixo:</p>
			
			<label for="observacoes">Observa&ccedil;&otilde;es*</label><br/>
			<textarea id="observacoes" name="observacoes"></textarea><br/>
			<div class="clearFix"></div>
			<br/>
			<button class="botoes" type="submit">
                                                                <input type="hidden" name="Submit" />
			<img src="<?php bloginfo('template_directory'); ?>/images/icnBtnSeguir.png" alt="icnBtnSeguir" width="16" height="16" /> Enviar pedido
			</button>
			<div class="clearFix"></div>
		</form>
		
	</div>
</div>

<?php endwhile; // end of the loop. ?>
