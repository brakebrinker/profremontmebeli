<?php 
/*
Template Name: Шаблон список Вопрос-ответ
*/
?>
<?php get_header(); ?>
<?php 
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
	'post_type' => 'faq',
	'posts_per_page' => get_option('posts_per_page'),
	'post_status' => 'publish',
	'paged' => $paged,
);
query_posts($args);
?>
<?php if ( have_posts() ) : ?>
 <div class="content works">
  
	<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

 <h2>
 	<?php 
 	if (get_field('seo_h1', get_queried_object_id())) 
 		echo get_field('seo_h1', get_queried_object_id());
 	else
 		the_title();
 	?>
 </h2>
 <div class="content-subtitle"><?php echo get_field('articles_subtitle', get_the_ID()); ?></div>

 <div class="works_wrapper container">
	<?php 
		while( have_posts() ){ 
			the_post(); 
			$images = get_field('post_photos', get_the_ID());
		?>
		<div class="article-item">
			<h3 class="article-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="article-text">
				<blockquote><?php the_excerpt(); ?></blockquote>
			</div>
		</div>
	   <?php } ?>
 </div>
<div class="pagination-container container">
	<?php
	the_posts_pagination( array(
		'end_size' => 1,
		'mid_size' => 1,
		'prev_text'    => __(''),
		'next_text'    => __(''),
	) );
	?>
</div>
<?php wp_reset_query();	?>

 <div class="block-seo container">
   <?php echo get_field('works_seo_text', get_the_ID()); ?>
 </div>

 <?php if(get_field('works_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

 </div>
<?php endif; ?>
<?php get_footer(); ?>