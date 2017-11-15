<?php 
/*
Template Name: Шаблон каталог услуг
*/
?>
<?php get_header(); ?>
<?php 
$args = array(
	'post_type' => 'services',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'order' => 'ASC'
);
query_posts($args);
?>
<?php if ( have_posts() ) : ?>
	<div class="content services">

		<div class="breadcrumbs"><a href="#">Главная страница</a> / <a href="#">Подбор материала</a></div>

		<h2>
			<?php 
			if (get_field('seo_h1', get_queried_object_id())) 
				echo get_field('seo_h1', get_queried_object_id());
			else
				the_title();
			?>
		</h2>
		<div class="content-subtitle"><?php echo get_field('services_subtitle', get_the_ID()); ?></div>

		<div class="services_wrapper container">
			<?php 
			while( have_posts() ){ 
				the_post(); 
				?>
				<a href="<?php the_permalink(); ?>" class="services-item">
					<figure>
						<img src="<?php the_post_thumbnail_url( 'medium' ); ?>" alt="<?php the_title(); ?>">
					</figure>
					<div class="services-text">
						<h4><?php the_title(); ?></h4>
						<?php echo get_field('services_subtitle', get_the_ID()); ?>
					</div>
				</a>
			<?php } 
			wp_reset_query();
			?>
		</div>

		<div class="block-seo container">
			<?php echo get_field('services_seo_text', get_the_ID()); ?>
		</div>
		
		<?php if(get_field('insert_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

	</div>
<?php endif; ?>
	<?php get_footer(); ?>