<?php 
/*
Template Name: Шаблон Главная страница
*/
?>
<?php get_header(); ?>
<div class="content">
<?php if( have_rows('slider_slides') ): ?>
<div class="content-main-slider">
	<div class="content-slider-wrapper">
	<?php while( have_rows('slider_slides') ): the_row(); 

		$sliderImg = get_sub_field('slider_img');
		$sliderTitle = get_sub_field('slider_title');
		$sliderSubtitle = get_sub_field('slider_subtitle');
		$sliderNavText = get_sub_field('slider_nav_text');
		?>
		<div>
			<?php if ($sliderImg) { ?>
			<img src="<?php echo $sliderImg; ?>" alt="<?php echo $sliderTitle; ?>">
			<?php } ?>
			<?php if ($sliderTitle) { ?>
			<p class="slide-main-title">Своя настоящая<br> <span>служба контроля<br> качества</span></p>
			<?php } ?>
			<?php if ($sliderSubtitle) { ?>
			<p class="slide-green-title"><span>Гарантия</span>на работы до 24 месяцев</p>
			<?php } ?>
		</div>

	<?php endwhile; ?>
	</div>

	<div class="slider-nav-wrapper">
		<ul class="container content-slider-nav">
		<?php while( have_rows('slider_slides') ): the_row(); 

		$sliderNavText = get_sub_field('slider_nav_text');
		?>
		<li><?php echo $sliderNavText; ?></li>
		<?php endwhile; ?>
		</ul>
	</div>

	<div class="container">
		<div class="slider-left"></div>
		<div class="slider-right"></div>
	</div>
</div>
<?php endif; ?>

<div class="content-services container">
	<h2>Услуги компании</h2>
	<div class="content-subtitle"><?php echo get_field('home_services_subtitle', get_the_ID()); ?></div>
	<?php if( have_rows('home_services') ): ?>
	<div class="content-services_item-wrapper">
		<?php while( have_rows('home_services') ): the_row(); 

			$link = get_sub_field('link');
			$title = get_sub_field('title');
			$img = get_sub_field('img');
			?>
			<a href="<?php echo $link; ?>" class="content-services_item">
				<img src="<?php echo $img; ?>" alt="item" />
				<p><?php echo $title; ?></p>
			</a>

		<?php endwhile; ?>
	</div>
	<?php endif; ?>
</div>

<div class="content-advantages container">
	<h2>Наши преимущества</h2>
	<div class="content-subtitle"><?php echo get_field('home_benefits_subtitle', get_the_ID()); ?></div>
	<?php if( have_rows('home_benefits') ): ?>
	<div class="content-advantages_firs-row">
		<?php while( have_rows('home_benefits') ): the_row(); 
		$text = get_sub_field('text');
		$title = get_sub_field('title');
		$img = get_sub_field('img');
		?>
		<div class="advantages-item" style="background: url(<?php echo $img; ?>) no-repeat top left"><span><?php echo $title; ?></span> <p><?php echo $text; ?></p>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<?php if( have_rows('home_benefits_without') ): 
		$bCount = 5;
	?>
	<div class="content-advantages_row">
		<ol>
			<?php while( have_rows('home_benefits_without') ): the_row(); 
				$text = get_sub_field('text');
			?>
			<li class="number-<?php echo $bCount; ?> list-number"><?php echo $text; ?></li>
			<?php 
				$bCount++;
				endwhile; 
			?>
		</ol>
	</div>
	<?php endif; ?>
</div>

<div class="content-contacts">
	<div class="container">

		<div class="content-contacts_left left">
			<div class="right-now inline">Закажите ремонт уже сегодня</div>
			<p class="inline"><?php echo get_option('work_modes'); ?></p>
		</div>

		<div class="content-contacts_right right">
			<p class="inline"><?php echo get_option('mobile_phone'); ?></p>
			<a href="#" class="send-request inline button-green">Отправить заявку</a>
		</div>

	</div>
</div>

<div class="content-try">
	<div class="container">
		<h2>Примерка тканей</h2>
		<div class="content-subtitle">Не знаете, какую ткань или кожу выбрать для замены у дивана? Не беда! С нашей новой услугой<br> «Примерка ткани» все стало намного проще.</div>

		<a href="#" class="more-button button-orange">Узнать подробнее</a>
	</div>
</div>

<div class="content-how-work container">
	<h2>Как мы работаем</h2>
	<div class="content-subtitle"><?php echo get_field('home_how_we_work_subtitle', get_the_ID()); ?></div>
	<?php if( have_rows('home_how_we_work') ): 
		$hwCount = 1;
	?>
	<ul>
		<?php while( have_rows('home_how_we_work') ): the_row(); 
			$text = get_sub_field('text');
		?>
		<li><p><?php echo $text; ?></p><em>Шаг <?php echo $hwCount; ?></em></li>
		<?php 
			$hwCount++;
			endwhile; 
		?>
	</ul>
	<?php endif; ?>
</div>

<div class="content-contacts">
	<div class="container">

		<div class="content-contacts_left left">
			<div class="right-now inline">Закажите ремонт уже сегодня</div>
			<p class="inline"><?php echo get_option('work_modes'); ?></p>
		</div>

		<div class="content-contacts_right right">
			<p class="inline"><?php echo get_option('mobile_phone'); ?></p>
			<a href="#" class="send-request inline button-green">Отправить заявку</a>
		</div>

	</div>
</div>

<div class="content-repair-select small-container container">
	<h2>Ремонт мебели на дому и в мастерской</h2>
	<?php if( have_rows('home_repair') ): ?>
		<?php $arrRm = get_field('home_repair', get_the_ID()); ?>
	<div class="content-repair-switch">
		<span class="inline home"><?php echo $arrRm[0]['title']; ?></span>
		<label class="switch">
			<input type="checkbox">
			<span class="slider round"></span>
		</label>
		<span class="inline workshop"><?php echo $arrRm[1]['title']; ?></span>
	</div> 

	<div class="content-repair-block home">
			<?php echo $arrRm[0]['text']; ?>
		<figure class="right">
			<img src="<?php echo $arrRm[0]['img']; ?>" alt="image">
		</figure>
	</div>

	<div class="content-repair-block workshop">
		<figure class="left">
			<img src="<?php echo $arrRm[1]['img']; ?>" alt="image">
		</figure>
		<?php echo $arrRm[1]['text']; ?>
	</div>
	<?php endif; ?>
</div>

<div class="content-price container">
	<h2>Стоимость услуг</h2>
	<div class="content-subtitle"><?php echo get_field('home_cost_subtitle', get_the_ID()); ?>
	</div>
	<div class="content-price-block">
		<div class="content-price_table">
			<?php if( have_rows('home_cost_items') ): ?>
			<ul>
				<?php while( have_rows('home_cost_items') ): the_row(); 
					$title = get_sub_field('title');
					$price = get_sub_field('price');
				?>
				<li><span><?php echo $title; ?></span> <span><?php echo $price; ?></span></li>
				<?php endwhile; ?>
			</ul>
			<?php endif; ?>
			<a href="#" class="button-green">Заказать ремонт</a>
			<p>Для более точной цены вы можете прислать нам фотографии мебели <span class="whatsapp">в Whatsapp</span> и <span class="viber">Viber</span>: <?php echo get_option('mobile_phone'); ?></p>
		</div>
		<a class="button-yellow mobile-show calc-button">Калькулятор стоимости</a>
		<div class="catalog-calculator calculator">

			<iframe src="calc/index.html" style="border: none; width:100%; height: 650px;"> </iframe>
		</div>
	</div>
</div>

<div class="content-review container">
	<h2>Отзывы</h2>
	<div class="content-subtitle"><?php echo get_field('home_cost_subtitle', get_the_ID()); ?></div>
	<div class="content-review_slider">
		<a href="#" class="simple-arrow-left"></a>
		<a href="#" class="simple-arrow-right"></a>
		<?php if( have_rows('home_reviews_items') ): ?>
		<div class="content-review_slider-container small-container">
			<?php while( have_rows('home_reviews_items') ): the_row(); 
				$name = get_sub_field('name');
				$date = get_sub_field('date');
				$review = get_sub_field('review');
			?>
			<div><?php echo $review; ?> <p><span><?php echo $name; ?>,</span> <?php echo $date; ?></p></div>
			<?php endwhile; ?>
		</div>  
		<?php endif; ?>
	</div>
</div>

<div class="content-order-now container">
	<div class="content-order-now_form">
		<?php get_template_part( 'form_order', 'now' ); ?>
	</div>

</div>

<div class="content-corporate">
	<div class="container">
		<h2>Ремонт мебели <br>для корпоративных клиентов</h2>
		<div class="content-subtitle">Одной из основных наших компетенций явлеяется ремонт мебели для организаций. Мы<br> работаем и ремонтируем мебель в кафе, ресторанах, заведениях быстрого питания, банках,<br> салонах красоты и многих других.</div>
		<a href="#" class="more-button button-orange">Узнать подробнее</a>
	</div>
</div>

<div class="content-our-clients">
	<div class="container">
		<h4>Наши клиенты</h4>
		<div class="content-our-clients_wrap">
			<div class="mobile-scroll">
				<?php 
				$climages = get_field('home_clients', get_the_ID());
				
				if( $climages ): ?>
					<?php foreach( $climages as $image ): ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="content-order-faq container">
	<h2>Статьи, Вопросы и ответы</h2>
	<div class="content-subtitle"><?php echo get_field('home_articles_subtitle', get_the_ID()); ?></div>
		<?php if( have_rows('home_articles_ch') ): 
			$arrArtc = get_field('home_articles_ch', get_the_ID());
			$firsElems = ceil(count($arrArtc)/2);
			$secondElems = count($arrArtc) - $firsElems; 
			$countArt = 0 
		?>
			<?php while( have_rows('home_articles_ch') ): the_row(); 
				$title = get_sub_field('title');
				$link = get_sub_field('link');
				$countArt++;
			?>
			<?php if ($countArt == 1) echo '<ul class="left">' ?>
			<?php if ($countArt == $firsElems + 1) echo '<ul class="right">' ?>
			<li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
			<?php if ($countArt == $firsElems || $countArt == count($arrArtc)) echo '</ul>' ?>
			<?php endwhile; ?>
		<?php endif; ?>
</div>

<div class="content-contacts">
	<div class="container">

		<div class="content-contacts_left left">
			<a href="#" class="right-now inline">Закажите ремонт уже сегодня</a>
			<p class="inline"><?php echo get_option('work_modes'); ?></p>
		</div>

		<div class="content-contacts_right right">
			<p class="inline"><?php echo get_option('mobile_phone'); ?></p>
			<a href="#" class="send-request inline button-green">Отправить заявку</a>
		</div>

	</div>
</div>

<div class="content-seo-block small-container container">
	<h2><?php echo get_field('home_seo_title', get_the_ID()); ?></h2>
	<div class="content-subtitle"><?php echo get_field('home_seo_subtitle', get_the_ID()); ?></div>

	<?php if( have_rows('home_seo_columns') ): ?>
	<div class="seo-container">
		<?php while( have_rows('home_seo_columns') ): the_row(); 
			$title = get_sub_field('title');
			$text = get_sub_field('text');
		?>
		<div class="seo-container_col left">
			<span><?php echo $title; ?></span>
			<?php echo $text; ?>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>
	<div class="seo-more-wrapper left">
		<a href="#" class="seo-more trans-button">Прочесть полностью</a>
	</div>
</div>

<?php if( have_rows('home_art_also') ): ?>
<div class="content-also container">
	<h4>Также мы занимаемся</h4>
	<div class="content-also_wrapper">
		<div class="mobile-scroll">
		<?php while( have_rows('home_art_also') ): the_row(); 
			$title = get_sub_field('title');
			$link = get_sub_field('link');
		?>
		<a href="<?php echo $link; ?>" class="also-link"><?php echo $title; ?></a>
		<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif; ?>

</div>
<?php get_footer(); ?>