<?php get_header(); ?>
	
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			<?php get_template_part('inc/meta'); ?>
			
			<div class="entry">
				
				<?php the_excerpt(); ?>
				
			</div>
			
		</div>
		
		<?php endwhile; ?>
		
		<?php get_template_part('inc/nav'); ?>
		
	<?php else : ?>
		
		<?php get_template_part('inc/404'); ?>
		
	<?php endif; ?>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>