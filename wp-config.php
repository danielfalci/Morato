<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'morato');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'root');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'r~NJ%|$GEL@cn#)Dw-]M!c)3_f}<=sWswjq[QoEWG^NM=EG9N5&0JP`kJf9s`ed:');
define('SECURE_AUTH_KEY',  'MhpzmJA P$%9zfBN3q}wQ kP~7cb;/cVnupUx|Z2WOs=ZD>sI`doB;WKqllSf5ii');
define('LOGGED_IN_KEY',    '+.i3mZ,Y:3o3f2HbwmxJAt#)9JUV8=QK`W|t!_0#A;G+9.w~?Zf?V@[O2q,sAh^T');
define('NONCE_KEY',        '+?PVm^>yXL*;||Jzqjl[:Wv;#K1/5]5;}HhsBE]qQgP.+_<:k>(B%Dje=T}FmcxZ');
define('AUTH_SALT',        'PFk>7XKi&#Z*}6j]3s5!>|y[Hj^*_-d940-`B=:~FZP gd<fOq1gg`pbQt(RsG)=');
define('SECURE_AUTH_SALT', 'dE*Nps:y/w[BE6l@ulB^1sg5`P^Y~,QflM<}S!x8E0wS[tDvhV<.pj3y1WHBRv,/');
define('LOGGED_IN_SALT',   ']Oq$XVfO@M%^mY7.~ eNme8DuS9;NaI`PQ`4K^R8TQ|0dzZQNGvRoKG0.C.WM}$&');
define('NONCE_SALT',       'Z}r9?[r!cyyq$ch+W;if*p1/iQd:^]^-]M~uA/j66W!6TqDZDI9h>cIAS|(>><Ac');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
