<?php
/*
Template Name: Data
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
	<section id="content" class="single-post data-page">
		<header class="single-post-header">
			<div class="container">
				<div class="twelve columns">
					<h1><span class="icon-archive"></span> <?php the_title(); ?></h1>
				</div>
			</div>
		</header>
		<div class="container">
			<div class="eight columns">
				<?php the_content(); ?>
				<?php dynamic_sidebar('data-main'); ?>
			</div>
			<div class="three columns offset-by-one">
				<aside id="sidebar">
					<ul class="widgets">
						<?php dynamic_sidebar('data-sidebar'); ?>
					</ul>
				</aside>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
