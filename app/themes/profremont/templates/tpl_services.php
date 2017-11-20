<?php 
/*
Template Name: Шаблон каталог услуг
*/
?>
<?php get_header(); ?>
<?php 
$args = array(
	'child_of' => get_the_ID(),
	'numberposts' => -1,
	'hierarchical' => 0,
	'post_status' => 'publish',
	'order' => 'ASC'
);

$arrServices = get_pages( $args );
?>
<?php if( $arrServices ) : ?>
	<div class="content services">

		<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

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
			foreach( $arrServices as $children ) { ?>
				<a href="<?php echo get_page_link($children->ID); ?>" class="services-item">
					<figure>
						<img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($children->ID), 'medium' ) ?>" alt="<?php echo $image_desc; ?>">
					</figure>
					<div class="services-text">
						<h4><?php echo $children->post_title; ?></h4>
						<?php echo get_field('services_subtitle', $children->ID); ?>
					</div>
				</a>
			<?php } ?>
		</div>

		<div class="block-seo container">
			<?php echo get_field('services_seo_text', get_the_ID()); ?>
		</div>
		
		<?php if(get_field('insert_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

	</div>
<?php endif; ?>
	<?php get_footer(); ?>