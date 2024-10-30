<?php
/*
Plugin Name: InterConverse
Plugin URI: http://interconverse.com
Description: Shorten long blog post URLs into InterConverse campaign links via interconverse.com that will be unobtrusively tagged on the bottom of each post.  Use the shortened url to easily share your posts on websites or social networking sites like Facebook, Twitter and Pinterest. No account or password is needed to use the PinnedURL service through this Wordpress Plugin.
Version: 1.0
Author: InterConverse
Author URI: http://interconverse.com
License: GPL2
*/

// Send post_id to interconverse
function new_interconverse($post_id) {
    if( ( $_POST['post_status'] == 'publish' ) && ( $_POST['original_post_status'] != 'publish' ) )
	{
		$post = get_post($post_id);
		$bpurl = plugins_url( 'purlpost.php', __FILE__ );
		$blogposturl = "http://platform.interconverse.com/purlwp.php?blogpost=".get_permalink($post->ID)."&pdir=".$bpurl;
		?>
		
		<script type="text/javascript">
			window.location.href = "<?php echo $blogposturl; ?>";
		</script>

		<?php

		exit;
	}
}
add_action('publish_post', 'new_interconverse');
?>