<?php 
/*
Template Name: Шаблон страницы Материалы
*/
?>
<?php get_header(); ?>
<?php if ( have_posts() ) : ?>

<div class="content materials">

	<div class="breadcrumbs"><a href="#">Главная страница</a> / <a href="#">Подбор материала</a></div>

	<h2><?php the_title(); ?></h2>
	<div class="content-subtitle"><?php echo get_field('materials_p_subtitle', get_the_ID()); ?></div>

	<div class="materials-type small-container container">
	<h4>Подбор материала</h4>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/material1.jpg" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Материалы из натуральной кожи</h3>
	   <p>Поможет вам, когда старое кресло «оскалилось» пружинами, а диван перестал раскладываться</p>
	 </div>
	</a>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/material2.jpg" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Материалы из кожзама (экокожи)</h3>
	   <p>Это один из основных видов услуг, оказываемых нашей компанией.</p>
	 </div>
	</a>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/material3.jpg" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Материалы из кожзама (экокожи)</h3>
	   <p>Это один из основных видов услуг, оказываемых нашей компанией.</p>
	 </div>
	</a>

	</div>

	<div class="materials-property small-container container">
	<h4>Свойства материалов</h4>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/materials-bg1.png" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Антикоготь</h3>
	   <p>Компания Профремонтмебели осуществляет перетяжку мебели в Москве и Подмосковье уже более 10 лет.</p>
	 </div>
	</a>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/materials-bg2.png" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Лекгочистящиеся</h3>
	   <p>Компания Профремонтмебели выполняет обивку мебели любого типа и сложности.</p>
	 </div>
	</a>

	<a class="materials-item" href="#">
	 <figure>
	   <img src="images/materials-bg3.png" alt="material">
	 </figure>
	 <div class="materials-text">
	   <h3>Долговечные ткани</h3>
	   <p>Любимое кресло, диван  – это не просто предмет интерьера, который не жалко выкинуть и купить новый, это – священное место отдыха.</p>
	 </div>
	</a>

	</div>

	<div class="block-seo container">
		<?php echo get_field('materials_p_seo', get_the_ID()); ?>
	</div>

	<?php if(get_field('insert_all_services', get_the_ID())) get_template_part( 'all', 'services' ); ?>

</div>

<?php endif; ?>
<?php get_footer(); ?>