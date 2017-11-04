<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
 <div class="content examples">
  
     <div class="breadcrumbs"><a href="#">Главная страница</a> / <a href="#">Подбор материала</a></div>

     <h2><?php single_cat_title(); ?></h2>
     <div class="content-subtitle">На этой странице показан вид фильтра и карточки материала</div>
     <div id="tax-items-container">
         <?php
             $argsColor = array(
              'taxonomy' => 'colors',
              'hide_empty' => true,
             );
             $argsTexture = array(
              'taxonomy' => 'textures',
              'hide_empty' => true,
             );
             $argsProperty = array(
              'taxonomy' => 'properties',
              'hide_empty' => true,
             );

             $colors = get_terms( $argsColor );
             $textures = get_terms( $argsTexture );
             $properties = get_terms( $argsProperty );
         ?>

         <?php $term = get_queried_object(); ?>
         <div id="<?php echo $term->slug; ?>" class="filters-block container">
           <div class="widget">
            <div class="title">Фильтры:</div>
           </div>
             <div id="colors" class="widget">
                 <div class="test">
                     <h3>Цвет</h3>
                     <div class="close-filter"></div>
                 </div>
                 <ul>
                     <?php foreach( $colors as $color ) { ?>
                         <li>
                      <span>
                        <input type="checkbox" id="<?php echo $color->slug ?>" name="color_<?php echo $color->term_taxonomy_id ?>" class="color cl_<?php echo $color->term_taxonomy_id ?>"
                            <?php if (in_array($color->slug, $_GET['colors'])) {
                                echo 'checked';
                            } ?>
                        >
                        <label for="<?php echo $color->slug ?>"><?php echo $color->name; ?></label>
                      </span>
                         </li>
                     <?php } ?>
                     <li class="button-orange show-filter">Показать</li>
                 </ul>
             </div>

             <div id="textures" class="widget">
                 <div class="test">
                     <h3>Дизайн и рисунок</h3>
                     <div class="close-filter"></div>
                 </div>
                 <ul>
                     <?php foreach( $textures as $texture ) { ?>
                         <li>
                     <span>
                       <input type="checkbox" id="<?php echo $texture->slug ?>" name="texture_<?php echo $texture->term_taxonomy_id ?>" class="texture tr_<?php echo $texture->term_taxonomy_id ?>"
                           <?php if (in_array($texture->slug, $_GET['textures'])) {
                               echo 'checked';
                           } ?>>
                       <label for="<?php echo $texture->slug ?>"><?php echo $texture->name; ?></label>
                     </span>
                         </li>
                     <?php } ?>
                     <li class="button-orange show-filter">Показать</li>
                 </ul>
             </div>

             <div id="properties" class="widget">
                 <div class="test">
                     <h3>Свойство</h3>
                     <div class="close-filter"></div>
                 </div>
                 <ul>
                     <?php foreach( $properties as $property ) { ?>
                         <li>
                      <span>
                        <input type="checkbox" id="<?php echo $property->slug ?>" name="property_<?php echo $property->term_taxonomy_id ?>" class="property pr_<?php echo $property->term_taxonomy_id ?>"
                            <?php if (in_array($property->slug, $_GET['properties'])) {
                                echo 'checked';
                            } ?>>
                        <label for="<?php echo $property->slug ?>"><?php echo $property->name; ?></label>
                      </span>
                         </li>
                     <?php } ?>
                     <li class="button-orange show-filter">Показать</li>
                 </ul>
             </div>

           <div class="widget">
             <a class="remove">Сбросить фильтры</a>
           </div>
         </div>

         <div class="examples_wrapper container">
         <?php while ( have_posts() ) : the_post();
            $matImg = get_field('material_img', get_the_ID());
         ?>
           <a href="<?php the_permalink(); ?>" class="examples-item">
             <figure>
               <img src="<?php echo $matImg['sizes']['medium']; ?>" alt="image">
             </figure>
             <div class="examples-text">
               <h4><?php the_title(); ?></h4>
               <?php echo get_field('material_subtext', get_the_ID()); ?>
             </div>
           </a>
         <?php endwhile; // End of the loop. ?>
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
     </div>

     <div class="block-seo container">
       <h2>Блок для SEO-текста</h2>
       <p><span>Ремонт мебели на дому</span>
    Эта услуга пользуется все большей и большей популярностью среди Москвичей и жителей Подмосковья, поскольку вы всегда держите под контролем ход выполнения всех работ и можете вносить коррективы, что говорится "на ходу". Кроме того, сокращаются общие издержки - не требуется оплачивать транспортировку, вы платите только за работу и материалы. Но все же, если ремонт мебели на дому не возможен, то мы выполняем транспортировку максимально бережно и соблюдаем все сроки. Вы можете быть спокойны - ваша мебель предстанет перед вами в потрясающем виде!</p>
    <p><span>Особенности обивки стульев</span>
    При восстановительных работах вы можете выбрать материал, который пойдет на новую обивку, самостоятельно. Ведь именно от него будет зависеть не только стиль мебели, но и то, как долго вы сможете им пользоваться. Кроме того, выбор обивки стула зависит от того, где используется этот предмет мебели. К примеру, если это ресторанные или барные стулья, то подойдет искусственная кожа – она хорошо противостоит жидкостям, которые могут попасть на стул. Для стульев, которые находятся в людных местах, например, в кинотеатрах или офисах, нужен очень износостойкий и прочный материал, например, шенилл.</p>
     </div>
     <?php get_template_part( 'all', 'services' ); ?>
</div>
<?php endif; ?>
<?php get_footer(); ?>