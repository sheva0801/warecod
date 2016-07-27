<?php
	$post = $params["post"];
	$show_meta = $params["show_meta"];
	?>

<div class="four columns post-grid-item post-grid-item-caption-bolow">
	<div class="grid-content-wrapper">
		<?php if ($show_meta): ?>
		<div class="meta">
				<?php echo_post_meta($post,array('date','sources','categories')); ?>
		</div>
		<?php endif; ?>
		<?php
			$thumb_src = odm_get_thumbnail($post->ID);
			if (isset($thumb_src)):
				echo $thumb_src;
			endif;
		?>

		<?php
		if (isset($post->title_and_link) && $post->title_and_link != "") :
			echo $post->title_and_link;
		else:
			?>
			<a class="post-grid-item-title" href="<?php echo get_permalink($post->ID); ?>" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a>
			<?php
		endif;
		?>
		<?php
		if (isset($post->description) && $post->description != "") :?>
			<div class="post-grid-item-list">
					<?php echo $post->description;   ?>
			</div>
			<?php
		endif;
		?>
	</div>
</div>
