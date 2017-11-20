<?php 
/*
Template Name: Шаблон Услуга
*/
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="content catalog">
		<?php if ( get_field('services_on_bg', get_the_ID()) ) { ?>
		<div class="catalog-banner" <?php if (get_field('services_banner', get_the_ID())) { ?>style="background: url(<?php echo get_field('services_banner', get_the_ID()); ?>) no-repeat center; background-size: cover; <?php } ?>">
			<div class="container micro-container">

				<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

				<h1><?php if (get_field('services_title_bg', get_the_ID())) {
						echo get_field('services_title_bg', get_the_ID()); 
					} else {
						if (get_field('seo_h1', get_queried_object_id())) 
							echo get_field('seo_h1', get_queried_object_id());
						else
							echo strip_tags(get_the_title());
					}
					?></h1>
				<div class="content-subtitle"><?php echo get_field('services_subtitle', get_the_ID()); ?></div>

			</div>
		</div>
		<?php } else { ?>
		<div class="catalog-just container small-container">

			<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>

			<h1>
				<?php 
				if (get_field('seo_h1', get_queried_object_id())) 
					echo get_field('seo_h1', get_queried_object_id());
				else
					echo strip_tags(get_the_title());
				?>
			</h1>
			<div class="content-subtitle"><?php echo get_field('services_subtitle', get_the_ID()); ?></div>

		</div>
		<?php } ?>

		<div class="catalog-banner-text container small-container">
			<?php the_content(); ?>
		</div>

		<div class="catalog-list container small-container">
			<div class="single-text_advantages">
				<h4><?php echo get_field('services_title_advantages', get_the_ID()); ?></h4>
				<?php if( have_rows('services_advantages') ): 
				$count = 0;
				?>
				<ol>
					<?php while( have_rows('services_advantages') ): the_row(); 
				 // vars
					$advName = get_sub_field('advantages_name');
					$advText = get_sub_field('advantages_field');
					$count++;
					?>
					<li class="single-text-list list-<?php echo $count; ?>">
						<?php if( $advName ): ?>
							<span><?php echo $advName; ?> </span>
						<?php endif; ?>
						<?php if( $advText ) echo $advText; ?>
					</li>

				<?php endwhile; ?>
			</ol>
		<?php endif; ?>
	</div>
</div>

<?php if( have_rows('services_photos') ): ?>
	<div class="catalog-slider container small-container">
		<div class="catalog-slider_wrapper">
			<?php while( have_rows('services_photos') ): the_row(); 
			 // vars
			$photoBefore = get_sub_field('photo_before');
			$photoAfter = get_sub_field('photo_after');
			?>
			<?php if( $photoBefore ): ?>
				<figure>
					<img src="<?php echo $photoBefore['url']; ?>" alt="image">
				</figure>
			<?php endif; ?>
			<?php if( $photoAfter ): ?>
				<figure>
					<img src="<?php echo $photoAfter['url']; ?>" alt="image">
				</figure>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
	<div class="slider-left"></div>
	<div class="slider-right"></div>
</div>
<?php endif; ?>

<div class="catalog-problems container">
	<h2><?php echo get_field('services_subservices_title', get_the_ID()); ?></h2>
	<div class="content-subtitle"><?php echo get_field('services_subservices_subtitle', get_the_ID()); ?></div>
<?php if( have_rows('services_photos') ): ?>
	<div class="catalog-problems_images">
		<div class="mobile-1000">
			<?php while( have_rows('services_subservices') ): the_row(); ?>
			<?php $servImg = get_sub_field('image'); ?>
			<?php $servTitle = get_sub_field('title'); ?>
			<div class="catalog-problems_item">

				<figure>
					<img src="<?php echo $servImg['url']; ?>" alt="image">
				</figure>

				<div class="catalog-problems_text">
					<?php echo $servTitle; ?>
				</div>

			</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
</div>

<?php if (get_field('services_calc', get_the_ID())) { ?>
<div class="catalog-calculator calculator small-container container">
	<?php echo do_shortcode('[profcalc]'); ?>
</div>
<?php } ?>


<div class="catalog-list container small-container">
	<div class="single-text_advantages">
		<h4><?php echo get_field('services_point_title', get_the_ID()); ?></h4>
				<?php if( have_rows('services_points') ): 
				$count = 0;
				?>
				<ol>
					<?php while( have_rows('services_points') ): the_row(); 
				 // vars
					$pointName = get_sub_field('point_name');
					$pointText = get_sub_field('point_text');
					$count++;
					?>
					<li class="single-text-list list-<?php echo $count; ?>">
						<?php if( $pointName ): ?>
							<span><?php echo $pointName; ?> </span>
						<?php endif; ?>
						<?php if( $pointText ) echo $pointText; ?>
					</li>
				<?php endwhile; ?>
			</ol>
		<?php endif; ?>
	</div>
	<?php echo get_field('services_point_text', get_the_ID()); ?>
</div>

<div class="catalog-gallery container">
	<h2>Галерея выполненных работ</h2>
	<div class="catalog-gallery_wrapper">
		<?php 
		$images = get_field('services_gallery', get_the_ID());
		
		if( $images ): ?>
			<?php foreach( $images as $image ): ?>
				<a href="<?php echo $image['url']; ?>" data-lightbox="roadtrip" data-title="<?php echo $image['caption']; ?>"><img src="<?php echo $image['sizes']['medium']; ?>" alt="image"></a>
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
</div>

<?php if (get_field('services_show_form', get_the_ID())) { ?>
<div class="content-order-now container">
	<div class="content-order-now_form">
	<?php get_template_part( 'form_order', 'now' ); ?>
	</div>
</div>
<?php } ?>

<?php if(get_field('insert_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

</div>
<?php endwhile; // End of the loop. ?>
<?php get_footer(); ?>