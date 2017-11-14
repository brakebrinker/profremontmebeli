<?php 
/*
Template Name: Шаблон страницы Материалы
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>

<?php 

$args = array(
	'taxonomy'  => 'category',
	'exclude'	=> '1',
	'orderby'	=> 'term_id'
);

$termsCategory = get_terms($args);

$argss = array(
	'taxonomy'  => 'properties',
	'orderby'	=> 'term_id'
);

$termsProperty = get_terms($argss);
?>

<div class="content materials">

	<div class="breadcrumbs"><a href="#">Главная страница</a> / <a href="#">Подбор материала</a></div>

	<h2><?php the_title(); ?></h2>
	<div class="content-subtitle"><?php echo get_field('materials_p_subtitle', get_the_ID()); ?></div>
	<?php if( $termsCategory && ! is_wp_error($termsCategory) ) { ?>
	<div class="materials-type small-container container">
	<h4>Подбор материала</h4>
		<?php foreach( $termsCategory as $term ) { ?>
			<a class="materials-item" href="<?php echo get_category_link( $term->term_id ) ?>">
			 <figure>
			 <?php if (get_field('category_img', 'category_' . $term->term_id)) { ?>
			   <img src="<?php echo get_field('category_img', 'category_' . $term->term_id) ?>" alt="material">
			 <?php } ?>
			 </figure>
			 <div class="materials-text">
			   <h3><?php if (get_field('category_title_search', 'category_' . $term->term_id)) {
			    echo get_field('category_title_search', 'category_' . $term->term_id);;
			   } else {
			     echo $term->name;
			   }
			   ?></h3>
			   <p><?php echo $term->description; ?></p>
			 </div>
			</a>
		<?php } ?>
	</div>
	<?php } ?>

	<?php if( $termsProperty && ! is_wp_error($termsProperty) ) { ?>
	<div class="materials-property small-container container">
		<h4>Свойства материалов</h4>
		<?php foreach( $termsProperty as $term ) { ?>
		<a class="materials-item" href="#">
			<figure>
			<?php if (get_field('properties_img', 'properties_' . $term->term_id)) { ?>
				<img src="<?php echo get_field('properties_img', 'properties_' . $term->term_id) ?>" alt="material">
			<?php } ?>
			</figure>
			<div class="materials-text">
				<h3><?php echo $term->name; ?></h3>
				<p><?php echo $term->description; ?></p>
			</div>
		</a>
		<?php } ?>
	</div>
	<?php } ?>

	<div class="block-seo container">
		<?php echo get_field('materials_p_seo', get_the_ID()); ?>
	</div>

	<?php if(get_field('insert_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

</div>

<?php endif; ?>
<?php get_footer(); ?>