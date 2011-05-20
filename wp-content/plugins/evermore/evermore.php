<?php
/*
Plugin Name: Evermore
Plugin URI: http://www.thunderguy.com/semicolon/wordpress/evermore-wordpress-plugin/
Description: Abbreviate all posts when viewed on multiple post pages. This makes all posts behave as if there is a "&lt;!--more--&gt;" at an appropriate spot inside the content.
Version: 2.3
Author: Bennett McElwee
Author URI: http://www.thunderguy.com/semicolon/

$Revision: 93942 $

Copyright (C) 2005-09 Bennett McElwee

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the
Free Software Foundation, Inc.,
51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

The GNU General Public License is also available at
http://www.gnu.org/copyleft/gpl.html

Bennett McElwee, bennett at thunderguy dotcom
*/ 

/*
INSTALLATION

1. Copy this file into the plugins directory in your WordPress installation (wp-content/plugins).
2. Log in to WordPress Admin. Go to the Plugins section and click Activate for this plugin.
3. If desired, go to the Settings section, click Evermore and adjust settings.

USAGE

Evermore automatically abbreviates all posts when they appear on a multiple-post page such as the main blog page. It has the same effect as putting  <!--more--> after the specified paragraph of every post. All formatting and HTML tags are preserved in the abbreviated post.

If the post already has a <!--more--> in it, then this plugin does nothing to it and the existing <!--more--> will behave as usual.

If you want to disable the plugin for any specific post, then include the codeword <!--nevermore--> in the post. This won't show up in the post, but it will prevent the post from being abbreviated by Evermore. 

DEVELOPMENT NOTES

All globals begin with "tguy_em_" (for Thunderguy Evermore)
Tested with PHP 4.4.x, WordPress 1.5 to 2.7.1.
*/

if (!is_plugin_page()) :


// Add the "more" link immediately after reading the post from the database
add_filter('the_posts', 'tguy_em_addmoreall');
add_action('admin_menu', 'tguy_em_add_admin_pages');


function tguy_em_addmoreall($posts) {
/*	Add a "more" link immediately after reading posts from the database.
*/
	$count = count($posts);
	for ($i = 0; $i < $count; ++$i) {
		$posts[$i]->post_content = tguy_em_addmore($posts[$i]->post_content);
	}
	return $posts;
}

function tguy_em_addmore($post_content) {
/*	Add a "more" comment in an appropriate place, unless
	there is already a "<!--more-->" (we don't add an extra one) or
	a "<!--nevermore-->" (user has disabled evermore for this post).
*/
	// Only continue if content has no "more" and no "nevermore"
	if ((false === strpos($post_content, '<!--more-->'))
	&&  (false === strpos($post_content, '<!--nevermore-->'))) {
		$options = get_option('tguy_more_evermore');
		if (!$options) {
			$options = tguy_em_get_default_options();
		}
		$char_skip_count = intval($options['em_min_chars_to_skip']);
		$para_skip_count = intval($options['em_paras_to_skip']);
		$link_on_new_para = $options['em_link_on_new_para'];

		// Skip a number of initial characters
		$skipped_chars = substr($post_content, 0, $char_skip_count);
		$unskipped_chars = substr($post_content, $char_skip_count);

		// Use regex-fu to break the post into paragraphs. This scheme
		// may fail on pathological combinations of <br> and
		// newline chars. It can also fail on nested block-level tags
		// (e.g. nested divs). So don't do that!

		// Pattern matching an HTML tag that indicates a paragraph
		$para_tag = '(?:p|pre|blockquote|div|ol|ul|h[1-6]|table)';
		// Pattern matching two consecutive newlines with optional space between
		$double_newline = "(?:\r\n *\r\n|\r *\r|\n *\n|<br\s*/?>\s*<br\s*/?>)";
		// Pattern matching optional whitespace
		$ws = '\s*';
		// Pattern matching paragraph body (must start at the beginning
		// of a paragraph, and be followed by a paragraph end)
		$body = '.+?';
		// Pattern matching the end of a paragraph
		$end = "(?:$double_newline|</$para_tag>|(?<=\W)(?=$ws<$para_tag\W))";

		// Get all the skipped paragraphs, but separate the end of the final paragraph so
		// we can add a "run-on" more if necessary.
		// regex finds: a para body; followed by (n-1) end+body pairs; followed by an end; followed by something.
		$para_skip_dec = $para_skip_count - 1;
		if (preg_match("!^($ws$body(?:$end$ws$body){".$para_skip_dec."})($end)$ws\S!is", $unskipped_chars, $matches)) {
			$skipped_paras = $matches[1];
			$skipped_end = $matches[2];
			$unskipped_paras = substr($unskipped_chars, strlen($skipped_paras) + strlen($skipped_end));
			if ($link_on_new_para) {
				// Add 2 newlines after the more, to stop WP adding
				// a <br> after the more which leaves a spurious blank line.
				return $skipped_chars . $skipped_paras . $skipped_end . "<!--more-->\n\n" . $unskipped_paras;
			} else {
				return $skipped_chars . $skipped_paras . '<!--more-->' . $skipped_end . $unskipped_paras;
			}
		}
	}
	// No "more" was added. If the request includes the magic word, then add diagnostic info in a comment at the end of the post
	if ($_GET['evermore_diagnostics']) {
		return $post_content . "<!--\n" . htmlspecialchars(tguy_em_get_diagnostics($post_content, $options)) . "\n-->";
	}
	return $post_content;
}

function tguy_em_get_diagnostics(&$post_content, $options) {
	// Return a string with diagnostic info on the raw post data.
	$diagnostic_reason = "";

	$char_skip_count = intval($options['em_min_chars_to_skip']);
	$para_skip_count = intval($options['em_paras_to_skip']);
	$link_on_new_para = $options['em_link_on_new_para'];

	$diagnostic_extra_info = "";
	if (false !== strpos($post_content, '<!--more-->')) {
		$diagnostic_reason .= "Post contained (more)";
	}
	if (false !== strpos($post_content, '<!--nevermore-->')) {
		$diagnostic_reason .= "Post contained (nevermore)";
	}
	if (strlen($post_content) <= $char_skip_count) {
		$diagnostic_reason .= "Post was too short";
	}
	if ($diagnostic_reason == "") {
		// We must analyse the content to determine the reason
		$diagnostic_reason .= "Post did not contain end-of-paragraph";
		// Mark newlines, escape HTML
		$diagnostic_unskipped_chars = substr($post_content, $char_skip_count);
		$diagnostic_unskipped_chars = str_replace("\\", "\\\\", $diagnostic_unskipped_chars);
		$diagnostic_unskipped_chars = str_replace(
			array("\n", "\r"),
			array("\\n", "\\r"),
			$diagnostic_unskipped_chars);
		$diagnostic_extra_info = "Post content (unskipped)
[" . $diagnostic_unskipped_chars . "]
";
	}
	return "Evermore was not triggered. Diagnostics:
Skip chars [$char_skip_count] 
Skip paragraphs [$para_skip_count] 
New paragraph [".($link_on_new_para?'true':'false')."] 
Post length [".strlen($post_content)."] 
Reason [$diagnostic_reason] 
".$diagnostic_extra_info;
}

function tguy_em_add_admin_pages() {
	add_options_page('Evermore', 'Evermore', 10, __FILE__, 'tguy_em_options_page');

	// Create option in options database if not there already:
	add_option('tguy_more_evermore', tguy_em_get_default_options(), 'Options for the Evermore plugin');
}

function tguy_em_get_default_options() {
	$options = array();
	$options['em_min_chars_to_skip'] = 100;
	$options['em_paras_to_skip'] = 1;
	$options['em_link_on_new_para'] = true;
	return $options;
}



endif; // if (!is_plugin_page())


function tguy_em_options_page() {
	// See if user has submitted form
	if ( isset($_POST['submitted']) ) {
		check_admin_referer('evermore-update-options_all');
		$options = array();
		$options['em_min_chars_to_skip'] = intval($_POST['em_min_chars_to_skip']);
		$options['em_paras_to_skip'] = intval($_POST['em_paras_to_skip']);
		$options['em_link_on_new_para'] = (bool)($_POST['em_link_on_new_para']);
		update_option('tguy_more_evermore', $options);
		echo '<div id="message" class="updated fade"><p><strong>Plugin settings saved.</strong></p></div>';
	}
	
	// Draw the Options page for the plugin.
	$options = get_option('tguy_more_evermore');

	$action_url = $_SERVER[PHP_SELF] . '?page=' . basename(__FILE__);
?>
	<div class='wrap'>
		<h2>Evermore</h2>
		<p><cite>Evermore</cite> automatically displays a short preview of your posts on your blog home page.
		The preview also appears on the archive and category pages.
		For each post, the first few paragraphs are shown along with a "read more" link to read the full post.</p>
		
		<form name="evermore" action="" method="post">
			<?php
			if (function_exists('wp_nonce_field')) {
				wp_nonce_field('evermore-update-options_all');
			}
			?>
			<input type="hidden" name="submitted" value="1" />
				
			<h3>Settings</h3>
			<ul>
				<li>
				<label for="em_paras_to_skip">
					Create previews containing the first
					<input type="text" id="em_paras_to_skip" name="em_paras_to_skip"
						size="2" maxlength="3"
						value="<?php echo $options['em_paras_to_skip']; ?>" />
					paragraphs of each post
				</label>
				</li>
				<li>
				<label for="em_min_chars_to_skip">
					Ensure the preview is at least
					<input type="text" id="em_min_chars_to_skip" name="em_min_chars_to_skip"
						size="4" maxlength="4"
						value="<?php echo $options['em_min_chars_to_skip']; ?>" />
					characters long
				</label>
				</li>
				<li>
				Add a "read more" link to the full post<br />
				<label for="em_link_on_new_para">
					<input type="checkbox" id="em_link_on_new_para" name="em_link_on_new_para" <?php echo ($options['em_link_on_new_para']==true?"checked=\"checked\"":"") ?> />
					Show the "Read more" link on a line by itself
				</label><br />
					Note that the actual text appearing on the link depends on your WordPress theme.
				</li>
			</ul>
			<script type="text/javascript">
			<!--
			function tguy_em_set_defaults() {
				document.getElementById("em_paras_to_skip").value = 1;
				document.getElementById("em_min_chars_to_skip").value = 100;
				document.getElementById("em_link_on_new_para").checked = true;
			}
			document.write('<p class="submit"><input type="submit" class="button-secondary" name="Defaults" value="Use Defaults" onclick="tguy_em_set_defaults(); return false;" /></p>');
			//-->
			</script>
			<noscript>
			<p><strong>Defaults:</strong> Previews contain first 1 paragraph; count first 100 characters in first paragraph; show "Read more" on a line by itself.</p>
			</noscript>
			<p class="submit">
				<input name="Submit" class="button-primary" value="Save Changes" type="submit">
			</p>
		</form>
	</div>
<?php
}
