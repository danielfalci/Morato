=== Evermore ===
Contributors: bennettmcelwee
Tags: extract,more,abbreviate,short
Requires at least: 1.5
Tested up to: 2.7
Stable tag: 2.3

Evermore automatically abbreviates all posts when they appear on a multiple-post page such as the main blog page.

== Description ==

Evermore automatically abbreviates all posts when they appear on a multiple-post page such as the main blog page. It has the same effect as putting &lt;!--more--&gt; after the first paragraph of every post. All formatting and HTML tags are preserved in the abbreviated post.

If the post already has a &lt;!--more--&gt; in it, then this plugin does nothing to it and the existing &lt;!--more--&gt; will behave as usual.

If you want to disable the plugin for any specific post, then include the codeword &lt;!--nevermore--&gt; in the post. This won't show up in the post, but it will prevent the post from being abbreviated by Evermore. 

To change the length of the preview that Evermore creates, log in to your WordPress administration console and go to Settings, then click Evermore. You will see the Evermore configuration screen where you can set the following options.

* The number of paragraphs each preview should contain
* The minimum length of the preview. Sometimes, the first paragraph of a post can be very short (just a short sentence, or a picture). This option allows you to add extra paragraphs to make the preview a more reasonable length.
* Where to put the "read more" link: either at the end of the last paragraph, or on a new line by itself

== Installation ==

1. Copy evermore.php into your WordPress plugins directory (wp-content/plugins).
2. Log in to WordPress Admin. Go to the Plugins page and click Activate for Evermore


== Frequently Asked Questions ==


= What is this good for? =

The main page of a blog can often be too full. By default, WordPress displays the last ten posts on the main page, so viewers have to do a lot of scrolling to see if there's something interesting. With Evermore, all posts of the main page are abbreviated down to the first paragraph, so visitors can easily scan  your posts, find something interesting, and become hooked.

= I want one of my posts to appear in full! =

Include the magic word &lt;!--nevermore--&gt; in any post and Evermore will ignore that post. The magic word won't appear when people view your post, but Evermore will see it and obey.

= I've changed my mind. How can I get my posts back the way they were? =

Just go to your WordPress Admin screen and disable the Evermore plugin. Everything will be back as it was.

= Why not just add &lt;!--more--&gt; to my posts? =

You can manually add &lt;!--more--&gt; to all your posts. This has exactly the same effect as Evermore. But with Evermore, you can turn the abbreviations on or off with a few clicks just by enabling or disabling the plugin. With the manual way, you have to manually go in and edit each post.
